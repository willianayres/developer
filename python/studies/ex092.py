"""
92) Crie um programa que leia nome, ano de nascimento e carteira de trabalho e cadastre-os
(com idade) em um dicionário se por acaso a CTPS for diferente de zero, o dicionário receberá
também o ano de contratação e o salário. Calcule e acrescente, além da idade, com quantos anos
a pessoa vai se aposentar.
"""
from datetime import date
cadastro = dict()
cadastro['Nome'] = str(input('Nome: ')).strip()
ano = int(input('Ano de nascimento: '))
cadastro['Idade'] = date.today().year - ano
cadastro['CTPS'] = int(input('Carteira de Trabalho (0 não tem): '))
if cadastro['CTPS'] != 0:
    cadastro['Ano de contratação'] = int(input('Ano de contratação: '))
    cadastro['Salário'] = float(input('Salário: R$'))
    cadastro['Aposentadoria'] = cadastro['Idade'] + (35 - (date.today().year - cadastro['Ano de contratação']))
for k, v in cadastro.items():
    print(f'{k} tem valor {v}')
