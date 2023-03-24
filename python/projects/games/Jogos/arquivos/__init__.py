from Jogos.cores import cor


def arqExiste(arq):
    try:
        a = open(arq, 'rt')
        a.close()
    except FileNotFoundError:
        return False
    else:
        return True


def arqCria(arq):
    try:
        a = open(arq, 'wt')
        a.close()
    except:
        print(f'{cor["Vm"][1]}Houve um ERRO na criação do arquivo!{cor["cls"]}')
    else:
        print(f'{cor["Vd"][1]}Arquivo {arq} criado com sucesso!{cor["cls"]}')


def arqLer(arq):
    d = list()
    try:
        a = open(arq, 'rt')
    except:
        print(f'{cor["Vm"][1]}Houve um ERRO ao abrir o arquivo!{cor["cls"]}')
    else:
        for linha in a:
            dado = linha.split(';')
            dado[-1] = dado[-1].replace('\n', '')
            d.append(dado)
        a.close()
        return d


def arqEscreve(arq, dados, tst=False):
    try:
        a = open(arq, 'at')
    except:
        print(f'{cor["Vm"][1]}Houve um ERRO ao abrir o arquivo!{cor["cls"]}')
    else:
        try:
            for i, v in enumerate(dados):
                if i == len(dados) - 1:
                    a.write(f'{v}\n')
                else:
                    a.write(f'{v};')
        except:
            print(f'{cor["Vm"][1]}Houve um ERRO na hora de escrever os dados!{cor["cls"]}')
        else:
            if tst:
                print(f'{cor["Am"][1]}Novo registro adicionado.{cor["cls"]}')
            a.close()


def arqLimpa(arq):
    try:
        a = open(arq, 'wt+')
        a.close()
    except:
        print(f'{cor["Vm"][1]}Houve um ERRO na limpeza do arquivo!{cor["cls"]}')
    else:
        print(f'{cor["Vd"][1]}Arquivo {arq} limpo com sucesso!{cor["cls"]}')
