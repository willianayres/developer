"""
115) Crie um pequeno sistema modularizado que permita cadastrar pessoas pelo seu nome e idade
em um arquivo de texto simples. O sistema só vai ter 2 opções: cadastrar uma nova pessoa e listar
todas as pessoas cadastradas.
"""
from ex115 import prints, arquivo, inputs
from time import sleep

arq = 'cursoemvideo.txt'

if not arquivo.arqExiste(arq):
    arquivo.arqCriar(arq)

while True:
    n = prints.menu(['Ver pessoas cadastradas', 'Cadastrar nova Pessoa', 'Sair do Sistema'], 'MENU PRINCIPAL', '=', 50)
    if n == 1:
        arquivo.arqLer(arq)
    elif n == 2:
        prints.titulo('NOVO CADASTRO', '=', 50)
        nome = str(input('Nome: ')).strip()[:31]
        idad = inputs.leiaInt('Idade: ')
        arquivo.cadastrar(arq, nome, idad)
    else:
        prints.titulo('Saindo do sistema... Até logo!', '=', 50)
        break
    sleep(1)
