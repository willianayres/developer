"""
96) Faça um programa que tenha uma função chamada área(), que receba as dimensões de um terreno
retangular(largura e comprimento) e mostre na tela a área do terreno.
"""


def área(larg, comp):
    a = larg * comp
    print(f'A área de um terreno {larg:.1f}x{comp:.1f} é de {a:.2f}m^2.')


print('Controle de Terrenos'.center(20))
print('-' * 20)
l = float(input('LARGURA (m): '))
c = float(input('COMPRIMENTO (m): '))
área(l, c)
