#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <locale.h>
#include <conio.h>
#include "FilaIn.h"
#include "Programa.h"


int main()
{
    // Ajustes do console.
    setlocale(LC_ALL,"portuguese");
    system("title SIMULADOR DE CONTROLE DE PISTA DE DECOLAGEM");
    system("mode con:cols=100 lines=40");

    // Declara o inicio da fila.
    Fila *fi;
    // Inicializa a fila.
    fi = cria_Fila();
    // Funão de menu.
    menu(fi);
    // Finaliza a fila.
    libera_Fila(fi);

    // Termina o programa.
    return 0;
}


