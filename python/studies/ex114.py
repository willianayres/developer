"""
114) Crie um código em Python que teste se o site Pudim está acessível pelo computador usado.
"""
import urllib
import urllib.request
try:
    site = urllib.request.urlopen('http://www.pudim.com.br')
except Exception:
    print('\033[1:31mO site Pudim não está acessível no momento.\033[0m')
else:
    print('\033[1:32mConsegui acessar o site Pudim com sucesso!\033[0m')
