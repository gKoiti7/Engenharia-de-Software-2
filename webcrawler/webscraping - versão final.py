import time
import requests
import pandas as pd  
from bs4 import BeautifulSoup
from selenium import webdriver
from selenium.webdriver.chrome.options import Options
import json
import pymysql

conexão = pymysql.connect(
    host = 'localhost',
    user = 'root',
    passwd = '',
    database = 'transparencia'
)

cursor = conexão.cursor()

servidores = {}
url = "http://www.transparencia.pmmc.com.br/funcionalismopublico/salarios"

option = Options()
option.headless = True
driver = webdriver.Chrome()  #options=option

driver.get(url)
time.sleep(8)

for i in range(1, 578):
    element = driver.find_element_by_xpath("/html/body/div[2]/div/div[1]/div/div/div[1]/form/div/div[2]/div[2]/div/table")

    html_content = element.get_attribute('outerHTML')

    soup = BeautifulSoup(html_content, 'html.parser')
    table = soup.find(name='table')

    df_full = pd.read_html(str(table))[0].head(10)    
    df = df_full[['Nome', 'Cargo', 'Remuneração']]
    df.columns = ['nome', 'cargo', 'remuneracao']

    servidores[i] = df.to_dict('records')

    driver.find_element_by_css_selector("#tbFuncionarios_next > a").click()
    time.sleep(1)

driver.quit()

# criar arquivo json
js = json.dumps(servidores)
fp = open('salarios.json', 'w')
fp.write(js)
fp.close()

# manipular json
with open('salarios.json','r') as arq:
    obj = json.load(arq)

servidores = list(obj.values())

# subir para o bd
for x in range(0, 577):
    for y in range(0, 10):
        servlist = list(servidores[x][y].values())
        sql = "INSERT INTO servidores(nome, cargo, salario) VALUES(%s,%s,%s)"
        cursor.execute(sql, servlist)
        conexão.commit()