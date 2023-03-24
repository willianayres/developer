"""
61) Refaça o exercício 51, lendo o primeiro termo e a razão de uma PA, mostrando os 10
primeiros termos da progressão, usando a estrutura while.
"""
print('='*21)
print('10 TERMOS DE UMA PA'.center(21))
print('='*21)
a0 = int(input('Digite o primeiro termo da PA: '))
q = int(input('Digite a razão da PA: '))
i = 0
print('{ ', end='')
while i != 10:
    print(a0 + i * q, end=' ')
    print('-> ' if i < 9 else '}', end='')
    i += 1
print('FIM')
