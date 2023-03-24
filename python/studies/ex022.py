"""
22) Crie um programa que leia um nome completo de uma pessoa e mostre:
-> O nome com todas as letras maiúsculas.
-> O nome com todas as letras minúsculas.
-> Quantas letras ao tod(sem considerar espaços).
-> Quantas letras tem o primeiro nome.
"""
nome = str(input('Digite seu nome completo: ')).strip()
print('Analisando o seu nome...')
print('Seu nome em maiúsculas é {}.'.format(nome.upper()))
print('Seu nome em minúsculas é {}.'.format(nome.lower()))
print('Seu nome tem ao todo {} letras.'.format(len(nome)-nome.count(' ')))
dividido = nome.split()
print('Seu primeiro nome é {} e ele tem {} letras.'.format(dividido[0], len(dividido[0])))
