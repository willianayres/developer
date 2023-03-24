"""
39) Faça um programa que leia o ano de nascimento de um jovem e informe, de acordo com a sua
idade:
-> Se ele ainda vai se alistar ao serviço militar;
-> Se é a hora de se alistar;
-> Se ja passou do tempo de alistamento.
Seu programa também deverá mostrar o tempo que falta ou que passou do prazo.
"""
from datetime import date
ano = int(input('Digite o ano do seu nascimento: '))
aux = date.today().year - ano
if aux < 18:
    print('Você ainda não precisa se alistar, porém faltam {} anos para se alistar.'.format(18 - aux))
elif aux == 18:
    print('Você precisa se alistar esse ano. Corra antes que perca o prazo!')
elif aux > 18:
    print('Você perdeu o prazo de alistamento em {} anos. SE FODEU!'.format(aux - 18))
