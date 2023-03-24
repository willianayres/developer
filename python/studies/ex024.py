"""
24) Crie um programa que leia o nome de uma cidade e diga se ela começa ou não com o nome
'SANTO'.
"""
n = str(input('Em que cidade você nasceu? ')).strip()
print(n[:5].upper() == 'SANTO')
