"""
12) Faça um algoritimo que leia o preço de um produto e mostre seu novo preço, com 5% de desconto.
"""
pr = float(input('Preço do produto: '))
print('O produto de R${:.2f} na promoção de 5% de desconto vai custar R${:.2f}.'.format(pr, pr*0.95))
