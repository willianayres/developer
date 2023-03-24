"""
65) Crie um programa que leia vários números inteiros pelo teclado. No final da execução,
mostre a média entre todos os valores e qual foram o maior e o menor valores lidos. O
programa deve perguntar ao usuário se ele quer ou não continuar a digitar valores.
"""
n = soma = M = m = cont = 0
d = ''
while d != 'N':
    n = int(input('Digite um número: '))
    d = str(input('Quer continuar? [S/N] ')).strip().upper()
    if M == 0 and m == 0:
        M = m = n
    if d != 'S' and d != 'N':
        print('Opção inválida!')
        d = str(input('Quer continuar? [S/N] ')).strip().upper()
    else:
        soma += n
        cont += 1
        if n > M:
            M = n
        if n < m:
            m = n
print('Você digitou {} números e a média foi {:.2f}'.format(cont, soma/cont))
print('O maior valor foi {} e o menor foi {}'.format(M, m))
