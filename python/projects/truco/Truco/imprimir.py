def print_mao(c):
    for i in range(0, len(c)):
        print('\033[1:97:100m┌\033[90m♢\033[1:97m──────┐   \033[m', end='')
    print()
    for i in range(0, len(c)):
        print(f'\033[1:97:100m│ ''\033[1:31m'f'{c[i][0]:<1}   {c[i][1]:<2}\033[1:97m│   'if c[i][2] == 'v'else
              f'\033[1:97:100m│ ''\033[1:97m'f'{c[i][0]:<1}   {c[i][1]:<2}\033[1:97m│   ', end='')
    print('\033[m')
    for i in range(0, len(c)):
        print('\033[1:97:100m│\033[90m♢\033[1:97m      │   \033[m', end='')
    print()
    for i in range(0, len(c)):
        print(f'\033[1:97:100m│ ''\033[1:31m'f'{c[i][1]:<1}   {c[i][0]:<2}\033[1:97m│   'if c[i][2] == 'v'else
              f'\033[1:97:100m│ ''\033[1:97m'f'{c[i][1]:<1}   {c[i][0]:<2}\033[1:97m│   ', end='')
    print('\033[m')
    for i in range(0, len(c)):
        print('\033[1:97:100m└──────\033[90m♢\033[1:97m┘   \033[m', end='')
    print()
    for i in range(0, len(c)):
        print(f'{f"Carta {i+1}":<9}    ', end='')
    print()


def print_carta(carta):
    print('\033[1:97:100m┌\033[90m♢\033[1:97m──────┐\033[m')
    print(f'\033[1:97:100m│ ''\033[1:31m'f'{carta[0]:<1}   {carta[1]:<2}\033[1:97m│\033[m' if carta[2] == 'v' else
          f'\033[1:97:100m│ ''\033[1:97m'f'{carta[0]:<1}   {carta[1]:<2}\033[1:97m│\033[m')
    print('\033[1:97:100m│\033[90m♢\033[1:97m      │\033[m')
    print(f'\033[1:97:100m│ ''\033[1:31m'f'{carta[1]:<1}   {carta[0]:<2}\033[1:97m│\033[m' if carta[2] == 'v' else
          f'\033[1:97:100m│ ''\033[1:97m'f'{carta[1]:<1}   {carta[0]:<2}\033[1:97m│\033[m')
    print('\033[1:97:100m└──────\033[90m♢\033[1:97m┘\033[m')


def linha(ch='―', tam=30, cor='\033[m'):
    print(f'{cor}{ch * tam}\033[m')


def jogo(placar):
    print(f'>> Jogador: {placar[0]:<3}   >> Pc:  {placar[1]:<3}\n')


def menu(lista):
    for i, v in enumerate(lista):
        print(f'{i + 1} - {v}\033[1:97m')
