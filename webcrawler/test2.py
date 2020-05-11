import time
import requests
from selenium import webdriver
from selenium.webdriver.chrome.options import Options


url  = "http://www.transparencia.pmmc.com.br/"

option = Options()
option.headless = True
#driver = webdriver.Chrome(options = option) 
driver = webdriver.Chrome()
driver.get (url)
time.sleep(1)

driver.find_element_by_xpath("//html//body//div[2]//div[5]//div[1]//a//div/h1").click()
time.sleep(5)
driver.find_element_by_xpath("/html/body/div[2]/div/div[1]/div/div/div[1]/form/div/div[2]/div[2]/div/table/tbody/tr[1]/td[5]/a/span").click()
time.sleep(1)

element = driver.find_element_by_xpath("/html/body/div[3]/div/div/div[2]")
html_content = element.get_attribute('outerHTML')

print('htnk conteent')
print(html_content)

