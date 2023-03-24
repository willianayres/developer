"""
26) Faça um programa que leia uma frase pelo teclado e mostre:
-> Quantas vezes aparece a letra "A".
-> Em que posição ela aparece pela primeira vez.
-> Em que posição ela aparece pela última vez.
"""
frase = str(input('Digite uma frase: ')).strip().upper()
print('Quantas vezes aparece a letra "A"? {}.'.format(frase.count('A')))
print('Em que posição "A" aparece pela primeira vez? {}.'.format(frase.find('A')+1))
print('Em que posição "A" aparece pela última vez? {}.'.format(frase.rfind('A')+1))
