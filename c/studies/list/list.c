#include <stdio.h>
#include <stdlib.h>
#include "list.h"

// Function no initialize the list. //
List* listConstructor()
{
    // Initialize the list and allocate memory for it. //
    List* list=(List*)malloc(sizeof(List));
    // Check if there is enough memory. //
    if(list==NULL)
    {
        printf("\nNot enough memory!\n");
        exit(1);
    }
    // Start the list pointing to NULL. //
    else
        list->start=NULL;
    // Return the start of the list. //
    return list;
}

// Function to copy a List to another list. //
List* listCopy(List* list)
{
    // Start a new List. //
    List* copyList=listConstructor();
    // Auxiliary pointer. //
    Node* aux=list->start;
    // Iterate the list. //
    while(aux!=NULL)
    {
        // Insert the same element on the new copied list. //
        listInsertBottom(copyList,aux->data);
        aux=aux->next;
    }
    // Return the new Copied List. //
    return copyList;
}

// Function to concatenate 2 Lists. //
List* listConcatenate(List* l1,List* l2)
{
    // New List to save the concatenate lists. //
    List* l3=listConstructor();
    // Iterate the first List. //
    for(Node* aux=l1->start;aux!=NULL;aux=aux->next)
        // Put all the elements from the first List on the new List. //
        listInsertBottom(l3,aux->data);
    // Iterate the second List. //
    for(Node* aux=l2->start;aux!=NULL;aux=aux->next)
        // Put all the elements from the second List on the new List. //
        listInsertBottom(l3,aux->data);
    // Return the concatenate List. //
    return l3;
}

// Function to concatenate 2 Lists in order. //
List* listConcatenateOrdenate(List* l1,List* l2)
{
    List* l3=listConstructor();
    for(Node* aux=l1->start;aux!=NULL;aux=aux->next)
    // Put all the elements from the first List on the new List. //
        listInsertOrdenate(l3,aux->data);
    for(Node* aux=l2->start;aux!=NULL;aux=aux->next)
        // Put all the elements from the second List on the new List. //
        listInsertOrdenate(l3,aux->data);
    // Return the concatenate List. //
    return l3;
}

// Function to invert a List. //
List* listInvert(List* list)
{
    List* l=listConstructor();
    // Iterate the list from the end to the start. //
    for(int i=listSize(list);i>=0;i--)
        listInsertBottom(l,listGetElement(list,i));
    return l;
}

// Function to insert a new element on the top of the List. //
void listInsertTop(List* list,int data)
{
    // Allocate memory for the new element. //
    Node* newElement=(Node*)malloc(sizeof(Node));
    if(newElement==NULL)
    {
        printf("\nNot enough memory!\n\n");
        exit(1);
    }
    // Attribute the data. //
    newElement->data=data;
    // Point to the next item. //
    newElement->next=list->start;
    // Turns the new element as the start. //
    list->start=newElement;
}

// Function to insert a new element on the bottom of the List. //
void listInsertBottom(List* list,int data)
{
    // Allocate memory for the new element. //
    Node* newElement=(Node*)malloc(sizeof(Node));
    // Check if there is enough memory. //
    if(newElement==NULL)
    {
        printf("\nNot enough memory!\n\n");
        exit(1);
    }
    // New element next field points to null. //
    newElement->next=NULL;
    // New element data field receives the data. //
    newElement->data=data;
    // If the list em empty, the list will start on the new element. //
    if(listEmpty(list))
        list->start=newElement;
    // Else will put the new element on the end of the list. //
    else
    {
        Node* aux=list->start;
        for(;aux->next!=NULL;aux=aux->next);
            aux->next=newElement;
    }
}

// Function to insert elements in order. //
void listInsertOrdenate(List* list,int data)
{
    // Allocate memory for the new element. //
    Node* newElement=(Node*)malloc(sizeof(Node));
    // Check if there is enough memory. //
    if(newElement==NULL)
    {
        printf("\nNot enough memory!\n\n");
        exit(1);
    }
    newElement->data=data;
    newElement->next=NULL;
    // If the list em empty, the list will start on the new element. //
    if(listEmpty(list))
        list->start=newElement;
    // Else will put the new element on the right spot. //
    else
    {
        // Auxiliary before Node. //
        Node* before=NULL;
        // Auxiliary List. //
        Node* aux=list->start;
        // Iterate the list until reaches the right spot. //
        while(aux!=NULL&&aux->data<data)
        {
            // Update the pointers. //
            before=aux;
            aux=aux->next;
        }
        // If before points to NULL put the element on the second position. //
        if(before==NULL)
        {
            list->start=newElement;
            newElement->next=aux;
        }
        // Put the element on the right position and update the pointers. //
        else
        {
            before->next=newElement;
            newElement->next=aux;
        }
    }
}

// Function to check if there is an element on the List. //
void listFindElement(List* list,int data)
{
    // Iterate the List. //
    for(Node* aux=list->start;aux!=NULL;aux=aux->next)
    {
        // If the data is on the List. //
        if(aux->data==data)
        {
            printf("\nThe element %d was find on the list!\n",data);
            return;
        }
    }
    // Did not find the element. //
    printf("\nThe element %d was not find on the list!\n",data);
}

// Function to remove an element from the list. //
void listRemove(List* list,int data)
{
    // Pointer to the element that is before the one that you want to remove. //
    Node* before=NULL;
    // Auxiliary pointer. //
    Node* aux=list->start;
    // Iterate the list and update the before pointer. //
    while(aux!=NULL&&aux->data!=data)
    {
        before=aux;
        aux=aux->next;
    }
    // If the iteration reach the end, the element was not on the List, so the function returns the base List. //
    if(aux==NULL)
        printf("\nThe element was not on the List!\n");
    // Remove the first element. //
    if(before==NULL)
        list->start=aux->next;
    // Remove the element from the middle of the list. //
    else
        before->next=aux->next;
    // Clear the allocated memory. //
    free(aux);
}

// Function to remove a repeated element from the List. //
void listRemoveReapeated(List* list,int data)
{
    // Pointer to the element that is before the one that you want to remove. //
    Node* temp=NULL;
    // Auxiliary pointer. //
    Node* aux=list->start;
    int count=0;
    // Iterate the list and update the before pointer. //
    while(aux!=NULL)
    {
        if(aux->data==data)
            count++;
        if(count>1)
            break;
        temp=aux;
        aux=aux->next;
    }
    // If the iteration reach the end, the element was not on the List, so the function returns the base List. //
    temp->next=aux->next;
    // Clear the allocated memory. //
    free(aux);
}

// Function to print the data that is on the List. //
void listPrint(List* list)
{
    printf("\nPrinting the List:\nStart -> ");
    // Iterate the list. //
    for(Node* aux=list->start;aux!=NULL;aux=aux->next)
        // Need to format the printing as the type of the data. //
        printf("%d ",aux->data);
    printf("-> End.\n\n");
}

// Function to delete the List. //
void listDelete(List* list)
{
    // Iterate the List. //
    while(list->start!=NULL)
    {
        // Temporary auxiliary pointer that receives the pointer to the next element of the List. //
        Node* temp=list->start->next;
        // Clear the allocated space of that element on the List. //
        free(list->start);
        // Update the auxiliary pointer to the List. //
        list->start=temp;
    }
    if(listEmpty(list))
        printf("\nThe List was deleted successfully!\n");
}

// Function to check if the List is empty. //
int listEmpty(List* list)
{
    // If the List is empty, return 1. //
    if(list->start==NULL)
        return 1;
    else
        return 0;
}

// Function to check the position of an Element on the List. //
int listElementPosition(List* list,int data)
{
    // Check if the List is empty. //
    if(listEmpty(list))
        return -1;
    // Auxiliary counter. //
    int count=1;
    // Iterate the List. //
    for(Node* aux=list->start;aux!=NULL;aux=aux->next)
    {
        // If it reaches the data, break the iteration.
        if(aux->data==data)
            break;
        // Increment the counter for each iteration. //
        count++;
    }
    // Return the counter. //
    return count;
}

// Function to check if an element is repeated on the List. //
int listFindRepeatedElement(List* list,int data)
{
    // Counter to element. //
    int count=0;
    // Iterate the List. //
    for(Node* aux=list->start;aux!=NULL;aux=aux->next)
    {
        // If the data is on the List. //
        if(aux->data==data)
            // Increment the counter. //
            count++;
        // If the counter is higher than 1, the element repeats on the List. //
        if(count>1)
            return 1;
    }
    return 0;
}

// List to get the element in a specified position. //
int listGetElement(List* list,int pos)
{
    // Check if the parameter is valid. //
    if(pos>listSize(list)||pos<0)
        return -1;
    else
    {
        // Auxiliary counter for the element you want to get. //
        int count=1;
        // Iterate the list. //
        for(Node* aux=list->start;aux!=NULL;aux=aux->next)
        {
            // If the counter is equal to the position. //
            if(count==pos)
                // Return the data from that position. //
                return aux->data;
            // Else update the counter. //
            count++;
        }
    }
    // Standard return. //
    return -1;
}

// Function to check the size of the list. //
int listSize(List* list)
{
    // Check if the List is empty. //
    if(listEmpty(list))
        return -1;
    // Auxiliary counter. //
    int count=0;
    // Iterate the list. //
    for(Node* aux=list->start;aux!=NULL;aux=aux->next)
        // Increment the counter for each iteration. //
        count++;
    // Return the counter. //
    return count;
}

// Function to check the biggest element on the list. //
int listMaxElement(List* list)
{
    // Check if the list is empty. //
    if(listEmpty(list))
        return 0;
    // The highest element will start with the first element. //
    int n=list->start->data;
    // Iterate the List. //
    for(Node* aux=list->start;aux!=NULL;aux=aux->next)
    {
        // If the list on that position is higher than the n. //
        if(aux->data>n)
            n=aux->data;
    }
    // Return the highest element. //
    return n;
}

// Function to check the lowest element on the list. //
int listMinElement(List* list)
{
    // Check if the list is empty. //
    if(listEmpty(list))
        return 0;
    // Start the n with the first element from the List. //
    int n=list->start->data;
    // Iterate the List. //
    for(Node* aux=list->start;aux!=NULL;aux=aux->next)
    {
        // If the data of the List on that position is lower than the n. //
        if(aux->data<n)
            // n receives the data from that position. //
            n=aux->data;
    }
    // Return the lowest element from the list. //
    return n;
}

// Function to find a letter on the top of the List. //
int listFindLetterTop(List* list)
{
    // Auxiliary alphabet. //
    char alphabet[]="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    // Iterate the alphabet. //
    for(int i=0;i<26;i++)
    {
        // If the top is a letter, return true. //
        if(list->start->data==alphabet[i])
            return 1;
    }
    return 0;
}

// Function to check if two lists are equal. //
int listEqual(List* list1,List* list2)
{
    // If the size of the Lists are different, return false automatically. //
    if(listSize(list1)!=listSize(list2))
        return 0;
    // Auxiliary Nodes. //
    Node* aux1=list1->start;
    Node* aux2=list2->start;
    // Iterate the Lists. //
    while(aux1!=NULL&&aux2!=NULL)
    {
        // If one element is different from the other List. //
        if(aux1->data!=aux2->data)
            // Return false. //
            return 0;
        aux1=aux1->next;
        aux2=aux2->next;
    }
    // Else, the Lists are equal. //
    return 1;
}


