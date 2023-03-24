"""
113) Reescreva a função leiaInt() que fizemos do exercício 104, incluindo agora a possibilidade da
digitação de um número de tipo inválido. Aproveite e crie também uma função leiaFloat() com a mesma
funcionalidade.
"""


def leiaInt(msg):
    while True:
        try:
            v = int(input(msg))
        except (ValueError, TypeError):
            print('\033[31mERRO: por favor, digite um número inteiro válido.\033[m')
            continue
        except KeyboardInterrupt:
            print('\033[31mUsuário preferiu não digitar esse número.\033[m')
            return 0
        else:
            return v


def leiaFloat(msg):
    while True:
        try:
            v = float(input(msg))
        except (ValueError, TypeError):
            print('\033[31mERRO: por favor, digite um número real válido.\033[m')
        except KeyboardInterrupt:
            print('\033[31mUsuário preferiu não digitar esse número.\033[m')
            return 0.0
        else:
            return v


In = leiaInt('Digite um Inteiro: ')
Rl = leiaFloat('Digite um Real: ')
print(f'O valor inteiro digitado foi {In} e o real foi {Rl}')
