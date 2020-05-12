import time
from selenium import webdriver
from selenium.webdriver.chrome.options import Options
from bs4 import BeautifulSoup
import pymysql
conexão = pymysql.connect(
    host = "localhost",
    user = "root",
    passwd = "",
    database = "funcionariosbd"
)

url  = "http://www.transparencia.pmmc.com.br/funcionalismopublico/salarios"

option = Options()
option.headless = True
driver = webdriver.Chrome(options = option) 
#driver = webdriver.Firefox() 
driver.get (url)
time.sleep(1)

for cont in range(1,19):
    for i in range(1,11): 
        nome1 = driver.find_element_by_xpath("/html/body/div[2]/div/div[1]/div/div/div[1]/form/div/div[2]/div[2]/div/table/tbody/tr["+str(i)+"]/td[2]")
        nome2 = BeautifulSoup(nome1.text,'html.parser')
        nome = nome2
        print(nome)
        time.sleep(0.1)
        cargo1 = driver.find_element_by_xpath("/html/body/div[2]/div/div[1]/div/div/div[1]/form/div/div[2]/div[2]/div/table/tbody/tr["+str(i)+"]/td[3]")
        cargo2 = BeautifulSoup(cargo1.text,'html.parser')
        cargo = cargo2
        print(cargo)
        time.sleep(0.1)
        total_bruto1 = driver.find_element_by_xpath("/html/body/div[2]/div/div[1]/div/div/div[1]/form/div/div[2]/div[2]/div/table/tbody/tr["+str(i)+"]/td[4]")
        total_bruto2 = BeautifulSoup(total_bruto1.text,'html.parser')
        total_bruto=total_bruto2
        print(total_bruto)
        time.sleep(0.1)
        
        n = str(nome)
        c = str(cargo)
        s = str(total_bruto)
        cursor = conexão.cursor()
        com_sql = "INSERT INTO funcionarios(nome,cargo,salario)VALUES (%s,%s,%s)"
        valor = (n,c,s)
        cursor.execute(com_sql,valor)

        conexão.commit()
        print(cursor.rowcount,"concluido")

    driver.find_element_by_css_selector("#tbFuncionarios_next > a").click()
    time.sleep(0.3)  
driver.quit()
