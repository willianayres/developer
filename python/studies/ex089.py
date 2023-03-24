"""
89) Crie um programa que leia nome e duas notas de vários alunos e guarde tudo em uma lista composta.
No final, mostre um boletim contendo a média de cada um e permita que o usuário possa mostrar as
notas de cada aluno individualmente.
"""
boletim = []
nome = []
notas = []
while True:
    nome.append(str(input('Nome: ')).strip())
    notas.append(float(input('Nota 1: ')))
    notas.append(float(input('Nota 2: ')))
    notas.append((notas[0]+notas[1])/2)
    nome.append(notas[:])
    boletim.append(nome[:])
    nome.clear()
    notas.clear()
    d = ' '
    while d not in 'SN':
        d = str(input('Quer continuar? [S/N] ')).upper().strip()[0]
    if d == 'N':
        break
print('=-=' * 40)
print('Nº  NOME                 MÉDIA')
print('-' * 35)
for i in range(0, len(boletim)):
    print(f'{i:<3} {boletim[i][0]:<20} {boletim[i][1][2]:.1f}')
print('-' * 35)
while True:
    m = int(input('Mostrar notas de qual aluno? (999 interrompe): '))
    if m == 999:
        print('FINALIZANDO...')
        break
    if m <= len(boletim) - 1:
        print(f'Notas de {boletim[m][0]} são [{boletim[m][1][0]:.1f}, {boletim[m][1][1]:.1f}]')
    else:
        print('Aluno não existe. Tente novamente.')
    print('-' * 40)
print('<<< VOLTE SEMPRE >>>')
