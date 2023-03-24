"""
57) Faça um programa que leia o sexo de uma pessoa, mas só aceite os valores 'M' ou 'F'.
Caso esteja errado, peça a digitação novamente até ter um valor correto.
"""
sexo = ''
while sexo != 'M' and sexo != 'F':
    sexo = str(input('Sexo [M/F]: ')).strip().upper()[0]
    if sexo != 'M' and sexo != 'F':
        print('Sexo inválido. Digite novamente.')
