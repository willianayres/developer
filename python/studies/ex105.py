"""
105) Faça um programa que tenha uma função chamada notas() que pode receber várias notas de alunos
e vai retornar um dicionário com as seguintes informações:
- Quantidade de notas;
- A maior nota;
- A menor nota;
- A média da turma;
- A situação.
Adicione também as docstrings da função.
"""


def notas(* nota, sit=False):
    """
    -> Função para analisar notas e situações de vários alunos.
    :param nota: uma ou mais notas dos alunos (aceita várias).
    :param sit: valor opcional, indicando se deve ou não adicionar a situação.
    :return: dicionário com várias informações sobre a situação da turma.
    """
    dados = dict()
    dados['Total'] = len(nota)
    dados['Maior'] = max(nota)
    dados['Menor'] = min(nota)
    dados['Média'] = sum(nota) / len(nota)
    if sit:
        if dados['Média'] >= 7:
            dados['Situação'] = 'BOA'
        elif dados['Média'] < 5:
            dados['Situação'] = 'RUIM'
        else:
            dados['Situação'] = 'RAZOÁVEL'
    return dados


resp = notas(5.5, 2.5, 10, 6.5, sit=True)
print(resp)
help(notas)
