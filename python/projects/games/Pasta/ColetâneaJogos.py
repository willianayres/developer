from Jogos.ParImpar import menuParImpar
from Jogos.Jokenpo import menuJok
from Jogos.Adivinhar import menuAdivinha
from Jogos.Perguntas import menuPerguntas
from Jogos.inputs import lerInt
from Jogos.cores import cor
from Jogos import prints


while True:
    prints.tit('COLETÂNEA DE JOGOS', 40, '=', cor['Mgc'][1])
    prints.menu(['Jokenpô', 'Jogo de Adivinhar', 'Par ou Ímpar', 'Perguntas', 'Sair'], cor['Amc'][1], cor['Azc'][1])
    esc = lerInt(f'{cor["Amc"][1]}Sua escolha >>{cor["cls"]} ', 5, 1)
    if esc == 1:
        menuJok()
    elif esc == 2:
        menuAdivinha()
    elif esc == 3:
        menuParImpar()
    elif esc == 4:
        menuPerguntas()
    else:
        break
