"""
75) Desenvolva um programa que leia quatro valores pelo teclado e guarde-os em uma tupla.
No final, mostre:
A) Quantas vezes apareceu o valor 9;
B) Em que posição foi digitado o primeiro valor 3;
C) Quais foram os números pares.
"""
ntup = (int(input('Digite um número: ')), int(input('Digite outro número: ')),
        int(input('Digite mais um número: ')), int(input('Digite o último número: ')))
print(f'Você digitou os valores {ntup}')
print(f'O valor 9 apareceu {ntup.count(9)} vezes.')
if 3 in ntup:
    print(f'O valor 3 apareceu na {ntup.index(3)+1}ª posição.')
else:
    print('O valor 3 não foi digitado em nenhuma posição.')
print(f'Os valores pares digitados foram ', end='')
c = 0
for n in ntup:
    if n % 2 == 0 and n != 0:
        print(n, end=' ')
        c += 1
if c == 0:
    print('0')
