import sys
import requests
from bs4 import BeautifulSoup
input =str(sys.argv)
#https://www.emag.ro/search/faina?ref=effective_search
#https://carrefour.ro/catalogsearch/result/?q=gel+de+dus
url="https://carrefour.ro/catalogsearch/result/?q=" + input
page = requests.get(url)
soup = BeautifulSoup(page.content,'html.parser')

names = soup.find_all('a',class_='product-item-link')[0]
name=names.get_text()

price = soup.find_all('span',class_='price')[0]
val = price.get_text()
val=val.strip()
name=name.strip()
#print(name+ "\n")
val=val.replace('/bucata','')
print(val)
