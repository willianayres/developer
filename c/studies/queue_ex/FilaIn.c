#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include "FilaIn.h"


// Struct para fila.
struct fila{
    struct elemento *inicio;  // Inicio da fila.
    struct elemento *fim;     // Final da fila.
};


// Struct para cada elemento da fila.
struct elemento{
    struct aviao dados;       // Dados do avi�o.
    struct elemento *prox;    // Ponteiro para pr�ximo elemento.
};


typedef struct elemento Elemen;


// Fun��o para criar a fila.
Fila* cria_Fila(){
    Fila* fi = (Fila *)malloc(sizeof(Fila));   // Aloca a fila.
    if(fi != NULL){
        fi->fim = NULL;                        // Obriga o inicio e o fim da fila apontarem para nulo.
        fi->inicio = NULL;
    }
    return fi;
}


// Fun��o para destruir a fila.
void libera_Fila(Fila* fi){
    if(fi != NULL){                             // Enquanto o inicio n�o apontar para nulo.
        Elemen* no;                             // N� para auxiliar.
        while(fi->inicio != NULL){              // Percorre toda a fila.
            no = fi->inicio;
            fi->inicio = fi->inicio->prox;
            free(no);                           // Libera o n� e atualiza ele.
        }
        free(fi);
    }
}


// Fun��o para dizer o tamanho da fila.
int tamanho_Fila(Fila* fi){
    if(fi == NULL)
        return 0;
    int cont = 0;
    Elemen* no = fi->inicio;        // N� auxiliar.
    while(no != NULL){              // Enquanto n� n�o aponta pra nulo, ele passa para o pr�ximo elemento
        cont++;                     // e incrementa o contador.
        no = no->prox;
    }
    return cont;
}


// Fun��o para dizer se a fila est� cheia.
int Fila_cheia(Fila* fi){
    return 0;
}


// Fun��o para dizer se a fila esta vazia.
int Fila_vazia(Fila* fi){
    if(fi == NULL)
        return 1;
    if(fi->inicio == NULL)
        return 1;
    return 0;
}


// Fun��o para inserir algum avi�o na fila.
int insere_Fila(Fila* fi, struct aviao a){
    if(fi == NULL)
        return 0;
    Elemen* no = (Elemen *)malloc(sizeof(Elemen));
    if(no == NULL)
        return 0;
    no->dados = a;
    no->prox = NULL;
    if(fi->fim == NULL)
        fi->inicio = no;
    else
        fi->fim->prox = no;
    fi->fim = no;
    return 1;
}


// Fun��o para remover algum avi�o da fila.
void remove_Fila(Fila* fi){
    if(fi == NULL){
        printf("Fila vazia.");
        return;
    }
    if(fi->inicio == NULL){
        printf("Fila vazia.");
        return;
    }
    Elemen *no = fi->inicio;
    fi->inicio = fi->inicio->prox;
    if(fi->inicio == NULL)
        fi->fim = NULL;
    free(no);
}


// Fun��o para consultar os dados do primeiro avi�o da fila.
int consulta_Fila(Fila* fi, struct aviao *a){
    if(fi == NULL)
        return 0;
    if(fi->inicio == NULL)
        return 0;
    *a = fi->inicio->dados;
    return 1;
}


// Fun��o para listar todos os avi�es da fila.
void listar_Fila(Fila* fi){
    if(fi == NULL || fi->inicio == NULL){
        printf("A fila est� vazia.\n\n");
        return;
    }
    int cont = 0;
    Elemen* no = fi->inicio;
    while(no != NULL){
        printf("%d - ",cont+1);
        printf("%-30s   ",no->dados.destino);
        printf("%-10s   ",no->dados.empresa);
        printf("%s.\n\n",no->dados.ID);
        cont++;
        no = no->prox;
    }
    printf("\n");
}



