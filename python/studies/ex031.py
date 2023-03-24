"""
31) Desenvolva um programa que pergunte a distância de uma viagem em Km. Calcule o preço da
passagem, cobrando R$0,50 por Km para viagens de até 200Km e R$0,45 para viagens mais longas.
"""
d = float(input('Quantos Km terá a sua viagem? '))
print('Você está prestes a começar uma viagem de {:.1f}Km.'.format(d))
if d <= 200:
    print('O preço da sua passagem será de R${:.2f}.'.format(0.5*d))
else:
    print('O preço da sua passagem será de R${:.2f}.'.format(0.45*d))
