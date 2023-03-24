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
        print('Houve um ERRO na criação do arquivo!')
    else:
        print(f'Arquivo {arq} criado com sucesso!')


def arqLer(arq):
    d = list()
    try:
        a = open(arq, 'rt')
    except:
        print('Houve um ERRO ao abrir o arquivo!')
    else:
        for linha in a:
            dado = linha.split(';')
            dado[-1] = dado[-1].replace('\n', '')
            d.append(dado)
        a.close()
        return d


def arqEscreve(arq, dados):
    try:
        a = open(arq, 'at')
    except:
        print('Houve um ERRO ao abrir o arquivo!')
    else:
        try:
            for i in dados:
                for v in range(0, len(i)):
                    if v == len(i) - 1:
                        a.write(f'{i[-1]}\n')
                    else:
                        a.write(f'{i[v]};')
        except:
            print('Houve um ERRO na hora de escrever os dados!')
        else:
            print('Novo registro adicionado.')
            a.close()
