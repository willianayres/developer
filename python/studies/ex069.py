"""
69) Crie um programa que leia a idade e o sexo de várias pessoas. A cada pessoa cadastrada,
o programa deverá perguntar se o usuário quer ou não continuar. No final, mostre:
A) Quantas pessoas tem mais de 18 anos;
B) Quantos homens foram cadastrados;
C) Quantas mulheres tem menos de 20 anos.
"""
print('=' * 30)
print('CADASTRE UMA PESSOA'.center(30))
print('=' * 30)
total = homem = mulher = 0
while True:
    idade = int(input('Idade: '))
    sexo = ' '
    while sexo not in 'MF':
        sexo = str(input('Sexo: [M/F] ')).strip().upper()[0]
    print('-'*30)
    c = ' '
    while c not in 'SN':
        c = str(input('Quer continuar? [S/N] ')).strip().upper()
    if idade >= 18:
        total += 1
    if sexo in 'Mm':
        homem += 1
    if sexo in 'Ff' and idade < 20:
        mulher += 1
    if c == 'S':
        print('=' * 30)
        print('CADASTRE UMA PESSOA'.center(30))
        print('=' * 30)
    else:
        print(' FIM DO PROGRAMA '.center(30, '='))
        break
print(f'Total de pessoas com mais de 18 anos: {total}.')
print(f'Ao todo temos {homem} homens cadastrados.')
print(f'E temos {mulher} mulheres com menos de 20 anos.')
