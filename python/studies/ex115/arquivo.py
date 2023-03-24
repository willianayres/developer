def arqExiste(nome):
    try:
        a = open(nome, 'rt')
        a.close()
    except FileNotFoundError:
        return False
    else:
        return True


def arqCriar(nome):
    try:
        a = open(nome, 'wt+')
        a.close()
    except:
        print('Houve um ERRO na criação do arquivo!')
    else:
        print(f'Arquivo {nome} criado com sucesso!')


def arqLer(nome):
    from ex115.prints import titulo
    try:
        a = open(nome, 'rt')
    except:
        print('ERRO ao abrir o arquivo!')
    else:
        titulo('PESSOAS CADASTRADAS', '=', 50)
        for linha in a:
            dado = linha.split(';')
            dado[1] = dado[1].replace('\n', '')
            print(f'   {dado[0]:<36}{dado[1]:>3} anos')
    finally:
        a.close()


def cadastrar(arq, nome='desconhecido', idade=0):
    try:
        a = open(arq, 'at')
    except:
        print('Houve um ERRO na abertura do arquivo!')
    else:
        try:
            a.write(f'{nome};{idade}\n')
        except:
            print('Houve um ERRO na hora de escrever os dados!')
        else:
            print(f'Novo registro de {nome} adicionado.')
            a.close()