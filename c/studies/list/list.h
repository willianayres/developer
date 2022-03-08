#ifndef LIST_H_INCLUDED
#define LIST_H_INCLUDED

#include "node.h"

// Structure for the data of the list. //
typedef struct
{
    Node* start;
}List;

// Function no initialize the list. //
List* listConstructor();

// Function to copy a List to another list. //
List* listCopy(List*);

// Function to concatenate 2 Lists. //
List* listConcatenate(List*,List*);

// Function to concatenate 2 Lists in order. //
List* listConcatenateOrdenate(List*,List*);

// Function to invert a List. //
List* listInvert(List*);

// Function to insert a new element on the top of the List. //
void listInsertTop(List*,int);

// Function to insert a new element on the bottom of the List. //
void listInsertBottom(List*,int);

// Function to insert elements in order. //
void listInsertOrdenate(List*,int);

// Function to check if there is an element on the List. //
void listFindElement(List*,int);

// Function to remove an element from the list. //
void listRemove(List*,int);

// Function to remove a repeated element from the List. //
void listRemoveReapeated(List*,int);

// Function to print the data that is on the List. //
void listPrint(List*);

// Function to delete the List. //
void listDelete(List*);

// Function to check if the List is empty. //
int listEmpty(List*);

// Function to check the position of an Element on the List. //
int listElementPosition(List*,int);

// Function to check if an element is repeated on the List. //
int listFindRepeatedElement(List*,int);

// List to get the element in a specified position. //
int listGetElement(List*,int);

// Function to check the size of the list. //
int listSize(List*);

// Function to check the biggest element on the list. //
int listMaxElement(List*);

// Function to check the lowest element on the list. //
int listMinElement(List*);

// Function to find a letter on the top of the List. //
int listFindLetterTop(List*);

// Function to check if two lists are equal. //
int listEqual(List*,List*);

#endif // LIST_H_INCLUDED
