#ifndef DOUBLECHAINLIST_H_INCLUDED
#define DOUBLECHAINLIST_H_INCLUDED

typedef struct node
{
    struct node* prev;
    int data;
    struct node* next;
}ListD;

ListD* insertOnListD(ListD*,int);

ListD* findElementOnList(ListD*,int);

ListD* removeElementFromList(ListD*,int);

#endif // DOUBLECHAINLIST_H_INCLUDED
