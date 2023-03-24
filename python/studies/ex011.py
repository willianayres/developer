"""
11) Faça um programa que leia a largura e a altura de uma parede em metros, calcule a sua área e a
quantidade de tinta necessária para pintá-la, sabendo que cada litro de tinta pinta 2m².
"""
lar = float(input('Qual é a largura da parede? '))
com = float(input('Qual é a altura da parede? '))
print('A dimensão da parede de {:.2f}m x {:.2f}m é de {:.2f} m².'.format(lar, com, lar*com))
print('Você precisa de {:.3f} litros de tinta para pintar a parede.'.format((lar*com)/2))
