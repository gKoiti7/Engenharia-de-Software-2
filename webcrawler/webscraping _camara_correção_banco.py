import time
import requests
import pandas as pd  
from bs4 import BeautifulSoup
from selenium import webdriver
from selenium.webdriver.chrome.options import Options
import json
import pymysql

# ALTERAR PARA A CONEXÃO COM O BANCO
conexão = pymysql.connect(
    host = 'localhost',
    user = 'root',
    passwd = '',
    database = 'camarabd'
 )
cursor = conexão.cursor()

camara = {}
url = "http://www.cmmc.com.br/projetos/plo.php?pg=0"
option = Options()
option.headless = True
driver = webdriver.Chrome(options=option) 
driver.get(url)

# Verificar quantidade de páginas com range de 1 até um valor qualquer
cont = {}
for i in range(1, 20):
    try:
        element = driver.find_element_by_xpath("//center//a["+str(i)+"]//b")
        html_content = element.get_attribute('outerHTML')
        soup = BeautifulSoup(html_content, 'html.parser')
        cont[i] = soup.b.string     
    except:
        exit

driver.quit()
cont2 = len(cont.values())

# Puxar tabela com Pandas e salvar no vetor
for i in range(cont2):
    df_full = pd.read_html('http://www.cmmc.com.br/projetos/plo.php?pg='+str(i), header=0)[8]        
    df = df_full[['AUTOR', 'ASSUNTO', 'ANOTAÇÃO']]
    df.columns = ['autor', 'assunto', 'anotacao']
    camara[i] = df.to_dict('records')
    
# Criação do Json
js = json.dumps(camara)
fp = open('projetos.json', 'w')
fp.write(js)
#print(json.dumps(js))
fp.close()

# Manipulação do Json para inserção no BD
with open('projetos.json','r') as arq:
    obj = json.load(arq)

projetos = list(obj.values())

# Subir dados para o BD
contador =len(cont)
for x in range(0,contador):
     for y in range(0, 12):
         try:
             servlist = list(projetos[x][y].values())
             sql = "INSERT INTO projetos(Autor, Assunto, Anotação) VALUES(%s,%s,%s)"
             cursor.execute(sql, servlist)
             conexão.commit()
         except:
             print("concluido")