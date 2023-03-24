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
    struct aviao dados;       // Dados do avião.
    struct elemento *prox;    // Ponteiro para próximo elemento.
};


typedef struct elemento Elemen;


// Função para criar a fila.
Fila* cria_Fila(){
    Fila* fi = (Fila *)malloc(sizeof(Fila));   // Aloca a fila.
    if(fi != NULL){
        fi->fim = NULL;                        // Obriga o inicio e o fim da fila apontarem para nulo.
        fi->inicio = NULL;
    }
    return fi;
}


// Função para destruir a fila.
void libera_Fila(Fila* fi){
    if(fi != NULL){                             // Enquanto o inicio não apontar para nulo.
        Elemen* no;                             // Nó para auxiliar.
        while(fi->inicio != NULL){              // Percorre toda a fila.
            no = fi->inicio;
            fi->inicio = fi->inicio->prox;
            free(no);                           // Libera o nó e atualiza ele.
        }
        free(fi);
    }
}


// Função para dizer o tamanho da fila.
int tamanho_Fila(Fila* fi){
    if(fi == NULL)
        return 0;
    int cont = 0;
    Elemen* no = fi->inicio;        // Nó auxiliar.
    while(no != NULL){              // Enquanto nó não aponta pra nulo, ele passa para o próximo elemento
        cont++;                     // e incrementa o contador.
        no = no->prox;
    }
    return cont;
}


// Função para dizer se a fila está cheia.
int Fila_cheia(Fila* fi){
    return 0;
}


// Função para dizer se a fila esta vazia.
int Fila_vazia(Fila* fi){
    if(fi == NULL)
        return 1;
    if(fi->inicio == NULL)
        return 1;
    return 0;
}


// Função para inserir algum avião na fila.
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


// Função para remover algum avião da fila.
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


// Função para consultar os dados do primeiro avião da fila.
int consulta_Fila(Fila* fi, struct aviao *a){
    if(fi == NULL)
        return 0;
    if(fi->inicio == NULL)
        return 0;
    *a = fi->inicio->dados;
    return 1;
}


// Função para listar todos os aviões da fila.
void listar_Fila(Fila* fi){
    if(fi == NULL || fi->inicio == NULL){
        printf("A fila está vazia.\n\n");
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



