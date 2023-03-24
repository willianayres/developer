"""
41) A Confederação Nacional da Natação precisa de um programa que leia o ano de nascimento
de um atleta e mostre sua categoria de acordo com a idade:
-> Até 9 anos: MIRIM;
-> Até 14 anos: INFANTIL;
-> Até 19 anos: JUNIOR;
-> Até 20 anos: SÊNIOR;
-> Acima: MASTER.
"""
from datetime import date
ano = float(input('Digite o ano de nascimento do atleta: '))
n = int(date.today().year - ano)
print('O atleta tem {} anos.'.format(n))
if 0 < n < 9:
    cat = str('MIRIM')
elif 9 <= n < 14:
    cat = str('INFANTIL')
elif 14 <= n < 19:
    cat = str('JUNIOR')
elif 19 <= n < 20:
    cat = str('SÊNIOR')
elif n >= 20:
    cat = str('MASTER')
else:
    print('Idade inválida!')
    cat = str('-1')

if cat != '-1':
    print(f'O atleta pertence a categoria {cat}!')
