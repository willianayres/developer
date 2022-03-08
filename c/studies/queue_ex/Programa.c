#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <locale.h>
#include <conio.h>
#include "FilaIn.h"
#include "Programa.h"


// Função de menu.
void menu(Fila* fi){
    int n;
    do{
        system("cls");
        printf("<< SIMULADOR DE CONTROLE DE PISTA DE DECOLAGEM >>\n\n");
        printf("< 1 > Número de aviões aguardando na fila.\n\n");
        printf("< 2 > Autorizar a decolagem do primeiro avião na fila.\n\n");
        printf("< 3 > Adicionar um avião à fila.\n\n");
        printf("< 4 > Listar todos os aviões na fila.\n\n");
        printf("< 5 > Listar características do primeiro avião da fila.\n\n");
        printf("< 6 > Sair do simulador.\n\n");
        setbuf(stdin,NULL);
        scanf("%d",&n);
    }while(n < 1 || n > 6);
    escolha(&n,fi);
}


// Função para escolha do menu.
void escolha(int *n, Fila* fi){
    // Struct para auxiliar nas operações.
    struct aviao a;
    switch(*n){
    case 1 :
        system("cls");
        printf("< Número de aviões aguardando na fila >\n\n");
        printf("<  %d  >\n\n",tamanho_Fila(fi));                    // Printa o tamanho da fila na tela.
        printf("<< Aperte qualquer tecla >>");
        getch();
        break;
    case 2 :
        system("cls");
        printf("< Autorizar a decolagem do primeiro avião na fila >\n\n");
        if(consulta_Fila(fi,&a) == 1){
            printf("O avião %s da %s está autorizado para decolar.\n\n",a.ID,a.empresa);    // Printa as informações do avião
            remove_Fila(fi);                                                                // e libera ele para decolagem.
        }
        else
            printf("A fila de espera está vazia.\n\n");
        printf("<< Aperte qualquer tecla >>");
        getch();
        break;
    case 3 :
        system("cls");
        printf("< Adicionar um avião à fila >\n\n");                        // Le os dados do avião.
        printf("ID do avião: "); setbuf(stdin,NULL); scanf("%s",a.ID);
        printf("Molelo: "); setbuf(stdin,NULL); fgets(a.modelo,30,stdin);
        printf("Empresa: "); setbuf(stdin,NULL); fgets(a.empresa,10,stdin);
        printf("Destino: "); setbuf(stdin,NULL); fgets(a.destino,30,stdin);
        printf("Quantidade de passageiros: "); setbuf(stdin,NULL); scanf("%d",&a.n);
        for(int i = 0; i < strlen(a.empresa); i++){ if(a.empresa[i] == '\n') a.empresa[i] = '\0';}
        for(int i = 0; i < strlen(a.destino); i++){ if(a.destino[i] == '\n') a.destino[i] = '\0';}
        for(int i = 0; i < strlen(a.modelo); i++){ if(a.modelo[i] == '\n') a.modelo[i] = '\0';}
        if(insere_Fila(fi,a) != 0)                                          // Insere ele na fila.
            printf("\nAvião adicionado a lista de espera com sucesso.\n\n");
        printf("<< Aperte qualquer tecla >>");
        getch();
        break;
    case 4 :
        system("cls");
        printf("< Listar todos os aviões na fila>\n\n");
        listar_Fila(fi);                                        // Lista os aviões da fila.
        printf("<< Aperte qualquer tecla >>");
        getch();
        break;
    case 5 :
        system("cls");
        printf("< Listar características do primeiro avião da fila >\n\n");
        if(consulta_Fila(fi,&a) == 1){                          // Se a fila não estiver vazia, consulta os dados
            printf("ID: %s.\n",a.ID);                           // do primeiro avião da fila.
            printf("Empresa: %s.\n",a.empresa);
            printf("Modelo: %s.\n",a.modelo);
            printf("Destino: %s.\n",a.destino);
            printf("Quantidade de passageiros: %d.\n\n",a.n);
        }
        else
            printf("A fila está vazia.\n\n");
        printf("<< Aperte qualquer tecla >>");
        getch();
        break;
    case 6 :
        system("cls");                                          // Sai da função para termino do programa.
        return;
        break;
    }
    menu(fi);
}

