#include <stdio.h>
#include <stdlib.h>
#include "stack.h"

// Function to initialize the Stack. //
Stack* stackConstructor()
{
    // Allocate memory for the Stack. //
    Stack* stack=(Stack*)malloc(sizeof(Stack));
    // Check if there is enough memory. //
    if(stack==NULL)
    {
        printf("\nNot Enough memory!\n\n");
        exit(1);
    }
    // Start the Stack by pointing to null. //
    else
        stack->top=NULL;
    return stack;
}

// Function to push an element on the Stack. //
void stackPush(Stack* stack,int data)
{
    // Pointer to the new element. //
    Node* newElement=(Node*)malloc(sizeof(Node));
    if(newElement==NULL)
    {
        printf("\nNot enough memory!\n\n");
        exit(1);
    }
    // Save the new element data. //
    newElement->data=data;
    // The next field from the new elements points to the old top. //
    newElement->next=stack->top;
    // The new element becomes the top. //
    stack->top=newElement;
}

// Function to remove an element from the top of the Stack. //
void stackPop(Stack* stack)
{
    // Check if the stack is not empty. //
    if(stackEmpty(stack))
    {
        printf("The Stack is empty!\n");
        return;
    }
    else
    {
        // Auxiliary pointer. //
        Node* aux;
        // Auxiliary receives the top. //
        aux=stack->top;
        // The top now is the old second element. //
        stack->top=stack->top->next;
        // Deallocate the memory of the auxiliary pointer. //
        free(aux);
    }
}

// Function to print the whole Stack. //
void stackPrint(Stack* stack)
{
    printf("\nPrinting the Stack:\nTop -> ");
    // Iterate the Stack. //
    for(Node* aux=stack->top;aux!=NULL;aux=aux->next)
        // Print the element of the Stack. //
        printf("%d ",aux->data);
    printf("-> NULL.\n");
}

// Function to delete the Stack. //
void stackDelete(Stack* stack)
{
    // Iterate the Stack until it is not empty. //
    while(!stackEmpty(stack))
        stackPop(stack);
    printf("\nThe Stack was deleted successfully!\n");
}

// Check if the Stack is empty. //
int stackEmpty(Stack* stack)
{
    // If it points to null, it is empty. //
    if(stack->top==NULL)
        return 1;
    else
        return 0;
}

// Function to check the data from the top element of the Stack. //
int stackTop(Stack* stack)
{
    // Return the data of the top of the stack. //
    return stack->top->data;
}

// Function to check the size of the Stack. //
int stackSize(Stack* stack)
{
    // Counter for the size. //
    int size=0;
    // Iterate the Stack. //
    for(Node* aux=stack->top;aux!=NULL;aux=aux->next)
    {
        // Increment the size. //
        size++;
        // Points to the next node. //
        aux=aux->next;
    }
    // Return the size. //
    return size;
}

// Function to check if there is an element on the Stack. //
int stackFindData(Stack* stack,int data)
{
    // Iterate the Stack. //
    for(Node* aux=stack->top;aux!=NULL;aux=aux->next)
    {
        // If the data of the node on the stack is equal to the actual data. //
        if(aux->data==data)
            // Return true. //
            return 1;
    }
    return 0;
}

