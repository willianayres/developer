"""
94) Crie um programa que leia nome, sexo e idade de várias pessoa, guardando os dados de cada
pessoa em um dicionário e todos os dicionários em uma lista. No final, mostre:
A) Quantas pessoas foram cadastradas;
B) A média de idade do grupo;
C) Uma lista com todas as mulheres;
D) Uma lista com todas as pessoas com idade acima da média.
"""
pessoas = list()
pessoa = dict()
mulheres = list()
cont = 0
while True:
    pessoa['Nome'] = str(input('Nome: ')).strip()
    while True:
        pessoa['Sexo'] = str(input('Sexo: [M/F] ')).upper().strip()[0]
        if pessoa['Sexo'] in 'MF':
            break
        else:
            print('ERRO! Por favor, digite apenas M ou F.')
    pessoa['Idade'] = int(input('Idade: '))
    pessoas.append(pessoa.copy())
    cont += pessoa['Idade']
    if pessoa['Sexo'] == 'F':
        mulheres.append(pessoa['Nome'])
    pessoa.clear()
    while True:
        d = str(input('Quer continuar? [S/N] ')).upper().strip()[0]
        if d in 'SN':
            break
        else:
            print('ERRO! Por favor, digite apenas S ou N.')
    if d == 'N':
        break
media = cont / len(pessoas)
print('=-=' * 25)
print(f'- O grupo tem {len(pessoas)} pessoas.')
print(f'- A média de idade é de {media:5.2f} anos')
if len(mulheres) != 0:
    print('- As mulheres cadastradas foram: ', end='')
    for i in mulheres:
        print(i, end=' ')
else:
    print('Não foram cadastradas nenhuma mulher.')
print('\n- Lista de pessoas que estão acima da média de idade:')
for i in pessoas:
    if i['Idade'] >= media:
        print('     ', end='')
        for k, v in i.items():
            print(f'{k} = {v};', end=' ')
        print()
print('\n<< ENCERRADO >>')
