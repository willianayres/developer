#include <stdio.h>
#include <stdlib.h>
#include "doublechainlist.h"

// Function to insert an element on the start of the List. //
ListD* insertOnListD(ListD* list,int data)
{
    // Allocate memory to the new element. //
    ListD* newElement=(ListD*)malloc(sizeof(ListD));
    // The previous field points to NULL, because there is no previous element. //
    newElement->prev=NULL;
    // Put the data on the element. //
    newElement->data=data;
    // Points to the old start of the List. //
    newElement->next=list;
    // If the list is not NULL. //
    if(list!=NULL)
        // The previous field of the old start, points to the new element. //
        list->prev=newElement;
    // Return the new element. //
    return newElement;
}

// Find an element on the List. //
ListD* findElementOnList(ListD* list,int data)
{
    // Auxiliary pointer. //
    ListD* aux;
    // Iterate the List until it points to NULL. //
    for(aux=list;aux!=NULL;aux=aux->next)
    {
        // If the data is on the List. //
        if(aux->data==data)
            // Return the list on the data position. //
            return aux;
    }
    // If the data is not on the List, return NULL. //
    return NULL;
}

// Remove an element from the List. //
ListD* removeElementFromList(ListD* list,int data)
{
    // Auxiliary pointer and check if the element is on the List. //
    ListD* aux=findElementOnList(list,data);
    // If the element is not on the list, the auxiliary points to NULL, them return the old List. //
    if(aux==NULL)
        return list;
    // Check if it is the first element from the list. //
    if(list==aux)
        // The start of the list receives the next element from the List. //
        list=aux->next;
    else
        // Remove the element from the List. //
        aux->prev->next=aux->next;
    // Check if it is the last element from the List. //
    if(aux->next!=NULL)
        aux->next->prev=aux->prev;
    // Deallocate the memory of the auxiliary pointer. //
    free(aux);
    // Return the new List. //
    return list;
}

