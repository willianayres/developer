"""
10) Crie um programa que leia quantos Reais uma pessoa tem na carteira e mostre quantos
Dólares ela pode comprar. (US$1,00 = R$4,93)
"""
din = float(input('Quantos dinheiro você tem na carteira? R$'))
print('Com R${:.2f} você pode comprar US${:.2f}.'.format(din, din/4.93))
