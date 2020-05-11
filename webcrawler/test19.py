import time
import requests
from selenium import webdriver
from selenium.webdriver.chrome.options import Options
from bs4 import BeautifulSoup

url  = "http://www.transparencia.pmmc.com.br/funcionalismopublico/salarios"

option = Options()
option.headless = True
driver = webdriver.Chrome(options = option) 
#driver = webdriver.Firefox() 
driver.get (url)
time.sleep(1)

for cont in range(1,570):
    print(cont)
    for i in range(1,10): 
        driver.find_element_by_css_selector("#tabela > tr:nth-child("+str(i)+")> td:nth-child(5) > a > span").click()
        time.sleep(0.6)
        nome1 = driver.find_element_by_id("nome")
        nome2 = BeautifulSoup(nome1.text,'html.parser')
        nome = nome2
        print(nome)

        time.sleep(0.1)
        cargo1 = driver.find_element_by_css_selector("#cargo")
        cargo2 = BeautifulSoup(cargo1.text,'html.parser')
        cargo = cargo2
        print(cargo)

        time.sleep(0.1)
        total_bruto1 = driver.find_element_by_css_selector("#bruto")
        total_bruto2 = BeautifulSoup(total_bruto1.text,'html.parser')
        total_bruto=total_bruto2
        print(total_bruto)

        time.sleep(0.1)
        total_liquido1 = driver.find_element_by_css_selector("#liquido")
        total_liquido2 = BeautifulSoup(total_liquido1.text,'html.parser')
        total_liquido = total_liquido2
        print(total_liquido)
        
        time.sleep(0.1)
        
        driver.find_element_by_css_selector("#modalFuncionario > div > div > div.modal-header > button > span").click()
        time.sleep(0.1)
    driver.find_element_by_css_selector("#tbFuncionarios_next > a").click()
    time.sleep(1)
   
   
driver.quit()
 