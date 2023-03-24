#ifndef STACK_H_INCLUDED
#define STACK_H_INCLUDED

#include "node.h"

// Structure to indicate the top of the Stack. //
typedef struct
{
    Node* top;
}Stack;

// Function to initialize the Stack. //
Stack* stackConstructor();

// Function to push an element on the Stack. //
void stackPush(Stack*,int);

// Function to remove an element from the top of the Stack. //
void stackPop(Stack*);

// Function to print the whole Stack. //
void stackPrint(Stack*);

// Function to print the whole Stack. //
void stackDelete(Stack*);

// Check if the Stack is empty. //
int stackEmpty(Stack*);

// Function to print the whole Stack. //
int stackTop(Stack*);

// Function to check the size of the Stack. //
int stackSize(Stack*);

// Function to check if there is an element on the Stack. //
int stackFindData(Stack*,int);

#endif // STACK_H_INCLUDED
