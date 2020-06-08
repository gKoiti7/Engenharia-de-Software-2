import time
import requests
import pandas as pd  
from bs4 import BeautifulSoup
from selenium import webdriver
from selenium.webdriver.firefox.options import Options
import json
import pymysql
from Crawler_com_historico import Funcao_Alimentar_Banco


servidores = {}
url = "http://www.transparencia.pmmc.com.br/funcionalismopublico/salarios"

option = Options()
option.headless = True
driver = webdriver.Firefox(  options=option)

driver.get(url)
time.sleep(2)
element = driver.find_element_by_xpath("//ul[@class='pagination']/li[8]/a")
html_content = element.get_attribute('outerHTML')
soup = BeautifulSoup(html_content, 'html.parser')
contador3 = int(soup.a.string)


for i in range(0, contador3 ):
    element = driver.find_element_by_xpath("/html/body/div[2]/div/div[1]/div/div/div[1]/form/div/div[2]/div[2]/div/table")

    html_content = element.get_attribute('outerHTML')

    soup = BeautifulSoup(html_content, 'html.parser')
    table = soup.find(name='table')

    df_full = pd.read_html(str(table))[0].head(10)    
    df = df_full[['Nome', 'Cargo', 'Remuneração']]
    df.columns = ['nome', 'cargo', 'remuneracao']

    servidores[i] = df.to_dict('records')

    driver.find_element_by_css_selector("#tbFuncionarios_next > a").click()
    time.sleep(0.01)

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

Funcao_Alimentar_Banco(servidores,contador3)
