from selenium import webdriver
from bs4 import BeautifulSoup
import time

driver = webdriver.Chrome(executable_path=r'C:\Users\user\Documents\GitHub\team4\Team4\public\chromedriver.exe') # chrome瀏覽器
driver.get('https://www.instagram.com/p/B6Mi0RoDZwG/')

source = driver.page_source
soup = BeautifulSoup(source,'html.parser')
result = soup.select_one('div.KL4Bh img').get("src")
driver.quit()
print(result)
