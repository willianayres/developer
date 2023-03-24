"""
56) Desenvolva um programa que leia o nome, idade, e sexo de 4 pessoas. No final do programa
mostre:
-> A média de idade do grupo.
-> Qual é o nome do homem mais velho.
-> Quantas mulheres tem menos de 20 anos?
"""
media = 0
iv = 0
velho = ''
aux = 0
for c in range(0, 4):
    print(' {}ª PESSOA '.format(c+1).center(20, '-'))
    nome = str(input('Nome: ')).strip()
    idade = int(input('Idade: '))
    sexo = str(input('Sexo [M/F]: ')).strip().upper()
    media += idade
    if idade >= iv and sexo == 'M':
        iv = idade
        velho = nome
    if sexo == 'F' and idade < 20:
        aux += 1
media /= 4
print('-'*20)
print('A média da idade é de {:.1f} anos.'.format(media))
print('O homem mais velho tem {} e se chama {}.'.format(iv, velho))
print('Ao todo são {} mulheres com menos de 20 anos.'.format(aux))
