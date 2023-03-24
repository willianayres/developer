"""
30) Crie um programa que leia um número inteiro e mostre na tela se ele é PAR ou ÍMPAR.
"""
n = float(input('\033[35mMe diga um número qualquer: \033[m'))
n = int(n)
if n % 2 == 0:
    print('O número {} é \033[34mPAR\033[m.'.format(n))
else:
    print('O número {} é \033[34mÍMPAR\033[m.'.format(n))
