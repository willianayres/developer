"""
16) Crie um programa que leia um número Real qualquer pelo teclado e mostre na tela a sua
porção Inteira. Ex: Digite um número: 6.127; O número 6.127 tem a parte Inteira 6.
"""
n = float(input('Digite um número: '))
print('O valor digitado foi {} e a sua porção Inteira é {}.'.format(n, int(n)))
