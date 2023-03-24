def lin(ch='=', tam=40, c='\033[0:0:0m'):
    print(f'{c}{ch * tam}\033[0:0:0m')


def tit(msg='TITULO', tam=0, ch='=', c='\033[0:0:0m'):
    if tam == 0:
        tam = 40
    lin(ch, tam, c)
    print(f'{c}{msg:^{tam}}\033[0:0:0m')
    lin(ch, tam, c)


def menu(lista, corv='\033[0:0:0m', cori='\033[0:0:0m'):
    for i, v in enumerate(lista):
        print(f'{corv}{i+1} - {cori}{v}\033[0:0:0m')


def pensar(msg='', t=1):
    from time import sleep
    sleep(t)
    print(msg)
    sleep(t)
