def titulo(msg='TITULO', comp='-', tam=0):
    if tam == 0:
        tam = len(msg) + 4

    print(f'{comp}' * tam)
    print(f'{msg}'.center(tam))
    print(f'{comp}' * tam)


def lin(comp='-', tam=0):
    print(f'{comp}' * tam)


def menu(lista, tit='MENU', comp='-', tam=0):
    from ex115.inputs import leiaInt, checkEnt
    titulo(tit, comp, tam)
    from ex115.cores import cor

    for i, v in enumerate(lista):
        print(f'{cor["Am"]}{i + 1} {cor["cls"]}-{cor["Az"]} {v}{cor["cls"]}')
    print(end='')
    lin('=', 50)
    while True:
        n = leiaInt('Sua opção: ', cor['Vd'])
        if checkEnt(n, 3, 1):
            break
    return n
