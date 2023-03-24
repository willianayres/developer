"""
71) Crie um programa que simule o funcionamento de um caixa eletrônico. No início, pergunte
ao usuário qual será o valor a ser sacado (número inteiro) e o programa vai informar quantas
cédulas de cada valor serão entregues.
OBS: Considere que o caixa possui cédulas de R$50, R$20, R$10 e R$1.
"""
print('=' * 30)
print('BANCO WILL'.center(30))
print('=' * 30)
v = int(input('Que valor você quer sacar? R$'))
cinq = v // 50
vinte = v % 50 // 20
dez = v % 50 % 20 // 10
cinco = v % 50 % 20 % 10 // 5
um = v % 50 % 20 % 10 % 5
if cinq != 0:
    print(f'Total de \033[33m{cinq:>2}\033[m cédulas de \033[33mR$50\033[m')
if vinte != 0:
    print(f'Total de \033[32m{vinte:>2}\033[m cédulas de \033[32mR$20\033[m')
if dez != 0:
    print(f'Total de \033[31m{dez:>2}\033[m cédulas de \033[31mR$10\033[m')
if cinco != 0:
    print(f'Total de \033[36m{cinco:>2}\033[m cédulas de \033[36mR$5\033[m')
if um != 0:
    print(f'Total de \033[30m{um:>2}\033[m cédulas de \033[30mR$1\033[m')
print('=' * 30)
print('Volte sempre ao BANCO WILL! Tenha um bom dia!')
