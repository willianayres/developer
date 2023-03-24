def lerInt(msg='Valor: ', M=-1, m=-1, c='\033[0:0:0m'):
    from Jogos.cores import cor
    while True:
        try:
            while True:
                n = int(input(f'{c}{msg}{c}'))
                if (M and m) != -1:
                    if M < n or n < m:
                        print(f'{cor["Vm"][1]}Valor inválido! Digite um número entre {M} e {m}.{c}')
                    else:
                        break
                else:
                    break
        except (TypeError, ValueError):
            print(f'{cor["Vm"][1]}ERRO: Por favor, digite um número inteiro válido!{c}')
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


def lerStr(msg='', val='', up=False, fat=-1):
    from Jogos.cores import cor
    try:
        while True:
            ch = str(input(msg)).strip()
            if up:
                ch = ch.upper()
            if fat != -1:
                if fat == 0:
                    ch = ch[0]
                else:
                    ch = ch[:fat]
            if val == '':
                break
            else:
                if ch not in val:
                    print(f'{cor["Vm"][1]}Opção inválida! Tente novamente.{cor["cls"]}')
                else:
                    break
    except IndexError:
        print(f'{cor["Vmc"][1]}Houve um ERRO na leitura da palavra!{cor["cls"]}')
        ch = ' '
        return ch
    except:
        print(f'{cor["Vm"][1]}Houve um ERRO na leitura da palavra!{cor["cls"]}')
    else:
        return ch

