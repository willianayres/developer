"""
104) Crie um programa que tenha uma função chamada leiaInt(), que vai funcionar de forma semelhante
à função input() do Python, só que fazendo a validação para aceitar apenas um valor numérico.
Ex) n = leiaInt('Digite um n')
"""


def leiaInt(frase):
    while True:
        num = str(input(f'{frase}')).strip()
        if num.isnumeric():
            num = int(num)
            break
        else:
            print('\033[31mERRO! Digite um número inteiro válido.\033[m')
    return num


print('-' * 30)
n = leiaInt('Digite um número: ')
print(f'Você acabou de digitar o número {n}.')