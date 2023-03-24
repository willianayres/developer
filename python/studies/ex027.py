"""
27) Faça um programa que leia um nome completo de uma pessoa, mostrando em seguida o primeiro
e o último nome separadamente.
"""
nome = str(input('Digite seu nome completo: ')).strip()
print('Muito prazer em te conhecer!')
print('Primeiro nome: {}.'.format(nome[:nome.find(' ')]))
print('Último nome: {}.'.format(nome[nome.rfind(' '):]))
