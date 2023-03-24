"""
17) Faça um programa que leia o comprimento do cateto oposto e do cateto adjacente de um
triângulo retângulo, calcule e mostre o comprimento da hipotenusa.
"""
from math import hypot
co = float(input('Digite o tamanho do cateto oposto: '))
ca = float(input('Digite o tamanho do cateto adjacente: '))
print('O comprimento da hipotenusa do triângulo de catetos {} e {} é de {:.2f}'.format(co, ca, hypot(co, ca)))
