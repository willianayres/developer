#include <stdio.h>
#include <stdlib.h>
#include "queue.h"

// Function to initialize a QUEUE by pointing the front and the rear to NULL. //
Queue* queueConstructor()
{
    // Allocate memory for the Queue. //
    Queue* queue=(Queue*)malloc(sizeof(Queue));
    // Check if there is enough memory. //
    if(queue==NULL)
    {
        printf("\nNot enough memory!\n\n");
        exit(1);
    }
    // Starts the Queue by pointing to NULL. //
    else
    {
        queue->front=NULL;
        queue->rear=NULL;
    }
    return queue;
}

// Function to insert a new element on the Queue. //
void queueInsert(Queue* queue,int data)
{
    // Allocate memory for new element. //
    Node* newElement=(Node*)malloc(sizeof(Node));
    // Check if there is enough memory to put a new element on the Queue. //
    if(newElement==NULL)
    {
        printf("\nNot enough memory!\n\n");
        exit(1);
    }
    // Data field from the element receives the data. //
    newElement->data=data;
    // The next element filed of the new element points to NULL, because it is the last element. //
    newElement->next=NULL;
    // If the Queue is empty. //
    if(queueEmpty(queue))
    {
        // The new element will become the front and the rear of the Queue. //
        queue->front=newElement;
        queue->rear=newElement;
    }
    else
    {
        // If the Queue is not empty, then the new element will become the rear of the Queue. //
        queue->rear->next=newElement;
        queue->rear=newElement;
    }
}

// Function to remove the element of the front of a Queue. //
void queueRemove(Queue* queue)
{
    // Auxiliary pointer. //
    Node* aux=queue->front;
    // Front becomes the next element from the Queue. //
    queue->front=queue->front->next;
    // Check if the Queue becomes empty. //
    if(queueEmpty(queue))
        queue->rear=NULL;
    // Clear the memory of the old front. //
    free(aux);
    // Return the data. //
}

// Function to print the whole Queue. //
void queuePrint(Queue* queue)
{
    printf("\nPrinting the Queue:\nFront -> ");
    // Iterate the Queue. //
    for(Node* aux=queue->front;aux!=NULL;aux=aux->next)
        // Print the data of each element of the Queue. //
        printf("%d ",aux->data);
    printf("-> Rear.\n");
}

// Function to delete the Queue. //
void queueDelete(Queue* queue)
{
    // Auxiliary pointer. //
    Node* aux;
    // Iterate the Queue until it is empty. //
    while(!queueEmpty(queue))
    {
        // Auxiliary receives the front. //
        aux=queue->front;
        // The second element becomes the front. //
        queue->front=queue->front->next;
        // Deallocate the old front memory. //
        free(aux);
    }
    printf("\nThe Queue was deleted successfully!\n");
}

// Function to check if the Queue is empty. //
int queueEmpty(Queue* queue)
{
    // It will return 1 if the front equals to NULL. //
    if(queue->front==NULL)
        return 1;
    else
        return 0;
}

// Function to check the size of the Queue. //
int queueSize(Queue* queue)
{
    // Counter the number of elements in Queue. Starts with 1, because it'll gonna check if it is not empty. //
    int count=1;
    // If the Queue is empty, return the size equals to 0. //
    if(queueEmpty(queue))
        return 0;
    else
    {
        // Until it reaches the end of the Queue. //
        for(Node* aux=queue->front;aux->next!=NULL;aux=aux->next)
            count++;
    }
    // Return the size of the Queue if it's not empty. //
    return count;
}

// Function to get the front of the Queue without event removing it. //
int queueFront(Queue* queue)
{
    return queue->front->data;
}

// Function to check if an element is on the Queue. //
int queueFindData(Queue* queue,int data)
{
    for(Node* aux=queue->front;aux!=NULL;aux=aux->next)
    {
        if(aux->data==data)
            return 1;
    }
    return 0;
}

