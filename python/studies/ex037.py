"""
37) Escreva um programa que leia um número inteiro qualquer e peça para o usuário escolher
qual será a base de conversão:
-> 1 para binário;
-> 2 para octal;
-> 3 para hexadecimal.
"""
print('*'*20)
print('CONVERSOR DE NÚMEROS')
print('*'*20)
n = int(input('Digite o número que deseja converter: '))
print('Agora escolha a base desejada:')
print('(1) binária')
print('(2) octal')
print('(3) hexadecimal')
op = int(input('Sua opção: '))
if op == 1:
    print('O número {} na base decimal é {} na base binária.'.format(n, bin(n)[2:]))
elif op == 2:
    print('O número {} na base decimal é {} na base octal.'.format(n, oct(n)[2:]))
elif op == 3:
    print('O número {} na base decimal é {} na base hexadecimal.'.format(n, hex(n)[2:]))
