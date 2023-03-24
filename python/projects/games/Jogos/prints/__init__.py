def lin(ch='=', tam=40, c='\033[0m'):
    from Jogos.cores import cor
    print(f'{c}{ch * tam}{cor["cls"]}')


def tit(msg='TITULO', tam=0, ch='=', c='\033[0m'):
    from Jogos.cores import cor
    if tam == 0:
        tam = 40
    lin(ch, tam, c)
    print(f'{c}{msg:^{tam}}{cor["cls"]}')
    lin(ch, tam, c)


def menu(lista, corv='\033[m', cori='\033[0m'):
    from Jogos.cores import cor
    for i, v in enumerate(lista):
        print(f'{corv}{i+1} - {cori}{v}{cor["cls"]}')


def pensar(msg='', t=1):
    from time import sleep
    sleep(t)
    print(msg)
    sleep(t)
