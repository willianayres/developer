from ex115.cores import cor


def leiaInt(msg, c=cor['cls']):
    while True:
        try:
            n = int(input(f'{c}{msg}{cor["cls"]}'))
        except (TypeError, ValueError):
            print(f'{cor["Vm"]}ERRO: Por favor, digite um número inteiro válido{cor["cls"]}')
            continue
        else:
            return n


def leiaFloat(msg, c=cor['cls']):
    while True:
        try:
            n = float(input(f'{c}{msg}{cor["cls"]}'))
        except (TypeError, ValueError):
            print(f'{cor["Vm"]}ERRO: Por favor, digite um número real válido.{cor["cls"]}')
            continue
        else:
            return n


def checkEnt(num=0, M=0, m=0):
    if num < m or num > M:
        print(f'{cor["Vm"]}ERRO: Digite uma opção válida{cor["cls"]}')
        return False
    else:
        return True
