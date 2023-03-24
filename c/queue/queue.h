#ifndef QUEUE_H_INCLUDED
#define QUEUE_H_INCLUDED

#include "node.h"

typedef struct
{
    Node* front;
    Node* rear;
}Queue;

// Function to initialize a QUEUE by pointing the front and the rear to NULL. //
Queue* queueConstructor();

// Function to insert a new element on the Queue. //
void queueInsert(Queue*,int);

// Function to remove the element of the front of a Queue. //
void queueRemove(Queue*);

// Function to print the whole Queue. //
void queuePrint(Queue*);

// Function to delete the Queue. //
void queueDelete(Queue*);

// Function to check if the Queue is empty. //
int queueEmpty(Queue*);

// Function to check the size of the Queue. //
int queueSize(Queue*);

// Function to get the front of the Queue without event removing it. //
int queueFront(Queue*);

// Function to check if an element is on the Queue. //
int queueFindData(Queue*,int);

#endif // QUEUE_H_INCLUDED
