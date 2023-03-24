"""
51) Desenvolva um programa que leia o primeiro termo e a razão de uma PA. No final, mostre
os 10 primeiros termos dessa progressão.
"""
print('='*21)
print('10 TERMOS DE UMA PA'.center(21))
print('='*21)
a0 = int(input('Digite o primeiro termo da PA: '))
q = int(input('Digite a razão da PA: '))
print('{', end=' ')
for c in range(0, 10):
    print(a0 + c*q, end='')
    if c != 9:
        print(' ; ', end='')
print(' }')
