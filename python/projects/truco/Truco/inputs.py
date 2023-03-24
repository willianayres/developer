def lerInt(msg='Valor: ', M=-1, m=-1, c='\033[0:0:0m'):
    while True:
        try:
            while True:
                n = int(input(f'{c}{msg}{c}'))
                if (M and m) != -1:
                    if M < n or n < m:
                        print(f'\033[1:31:0mValor inválido! Digite um número entre {M} e {m}.{c}')
                    else:
                        break
                else:
                    break
        except (TypeError, ValueError):
            print(f'\033[1:31:0mERRO: Por favor, digite um número inteiro válido!{c}')
            continue
        else:
            return n


def lerFloat(msg='Valor: ', M=0, m=0):
    while True:
        try:
            while True:
                n = float(input(msg))
                if (M and m) != 0:
                    if M < n or n < m:
                        print(f'\033[1:31:0mValor inválido! Digite um número entre {M} e {m}.\033[0:0:0m')
                    else:
                        break
                else:
                    break
        except (TypeError, ValueError):
            print(f'\033[1:31:0mERRO: Por favor, digite um número inteiro válido!\033[0:0:0m')
            continue
        else:
            return n


def lerStr(msg='', val='', up=False, fat=-1):
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
                    print(f'\033[1:31:0mOpção inválida! Tente novamente.\033[0:0:0m')
                else:
                    break
    except IndexError:
        print(f'\033[1:31:0mHouve um ERRO na leitura da palavra!\033[0:0:0m')
        ch = ' '
        return ch
    except:
        print(f'\033[1:31:0mHouve um ERRO na leitura da palavra!\033[0:0:0m')
    else:
        return ch
