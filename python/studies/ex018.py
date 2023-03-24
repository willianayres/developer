"""
18) Faça um programa que leia um ângulo qualquer e mostre na tela o valor do seno, cosseno
e tangente desse ângulo.
"""
from math import sin, cos, tan, radians
a = int(input('Digite o valor de algum ângulo: '))
print('O valor do SENO de {} é {:.2f}'.format(a, sin(radians(a))))
print('O valor do COSSENO de {} é {:.2f}'.format(a, cos(radians(a))))
print('O valor da TANGENTE de {} é {:.2f}'.format(a, tan(radians(a))))
