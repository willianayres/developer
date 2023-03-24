def lerInt(msg='Valor: ', M=0, m=0):
    from Jogos.cores import cor
    while True:
        try:
            while True:
                n = int(input(msg))
                if (M and m) != 0:
                    if M < n or n < m:
                        print(f'{cor["Vm"][1]}Valor inválido! Digite um número entre {M} e {m}.{cor["cls"]}')
                    else:
                        break
                else:
                    break
        except (TypeError, ValueError):
            print(f'{cor["Vm"][1]}ERRO: Por favor, digite um número inteiro válido!{cor["cls"]}')
            continue
        else:
            return n


def lerFloat(msg='Valor: ', M=0, m=0):
    from Jogos.cores import cor
    while True:
        try:
            while True:
                n = float(input(msg))
                if (M and m) != 0:
                    if M < n or n < m:
                        print(f'{cor["Vm"][1]}Valor inválido! Digite um número entre {M} e {m}.{cor["cls"]}')
                    else:
                        break
                else:
                    break
        except (TypeError, ValueError):
            print(f'{cor["Vm"][1]}ERRO: Por favor, digite um número inteiro válido!{cor["cls"]}')
            continue
        else:
            return n
