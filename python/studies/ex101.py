"""
101) Crie um programa que tenha uma função chamada voto() que vai receber como parâmetro o ano de
nascimento de uma pessoa, retornando um valor literal indicando se uma pessoa tem voto NEGADO,
OPCIONAL OU OBRIGATÓRIO nas eleições.
"""


def voto(a):
    from datetime import date
    idade = date.today().year - ano
    if idade < 0:
        idade = 0
    frase = str(f'Com {idade} anos: ')
    if 0 <= idade < 16:
        frase += 'NÃO VOTA.'
    elif 16 <= idade < 18 or idade > 65:
        frase += 'VOTO OPCIONAL.'
    else:
        frase += 'VOTO OBRIGATÓRIO.'
    return frase


print('-' * 30)
ano = int(input('Em que ano você nasceu? '))
print(voto(ano))
