#include <stdio.h>
#include <stdlib.h>
#include "tree.h"

tree* treeInsert(tree* root,tree* r,char data)
{
    if(!r)
    {
        r=(tree*)malloc(sizeof(tree));
        if(!r)
        {
            printf("\nNOT ENOUGH MEMORY!\n");
            exit(1);
        }
        r->left=NULL;
        r->right=NULL;
        r->data=data;
        if(!root)
            return r;
        if(data<root->data)
            root->left=r;
        else
            root->right=r;
        return r;
    }
    if(data<r->data)
        treeInsert(r,r->left,data);
    else
        treeInsert(r,r->right,data);
}

tree* treeDestroy(tree* r)
{
    if(r!=NULL)
    {
        r->left=treeDestroy(r->left);
        r->right=treeDestroy(r->right);
        r=NULL;
    }
    return NULL;
}

tree* treeSearch(tree* r,char data)
{
    if(!r)
        return r;
    while(r->data!=data)
    {
        if(data<r->data)
            r=r->left;
        else
            r=r->right;
        if(r==NULL)
            break;
    }
    return r;
}

tree* treeRemove(tree* r,char data)
{
    tree *p, *p2;
    if(r->data==data)
    {
        if(r->left==r->right)
        {
            free(r);
            return NULL;
        }
        else if(r->left==NULL)
        {
            p=r->right;
            free(r);
            return p;
        }
        else if(r->right==NULL)
        {
            p=r->left;
            free(r);
            return p;
        }
        else
        {
            p2=r->right;
            p=r->right;
            while(p->left)
                p=p->left;
            p->left=r->left;
            free(r);
            return p2;
        }
    }
    if(r->data<data)
        r->right=treeRemove(r->right,data);
    else
        r->left=treeRemove(r->left,data);
    return r;
}

void treePrint(tree* r,int l)
{
    if(r==NULL)
        return;
    treePrint(r->left,l+1);
    for(int i=0;i<l;i++)
        printf("    ");
    printf("%c\n",r->data);
    treePrint(r->right,l+1);
}

void treePrintInorder(tree* r)
{
    if(!r)
        return;
    treePrintInorder(r->left);
    printf("%c ",r->data);
    treePrintInorder(r->right);
}

void treePrintPreorder(tree* r)
{
    if(!r)
        return;
    printf("%c ",r->data);
    treePrintPreorder(r->left);
    treePrintPreorder(r->right);
}

void treePrintPostorder(tree* r)
{
    if(!r)
        return;
    treePrintPostorder(r->left);
    treePrintPostorder(r->right);
    printf("%c ", r->data);
}

int treeEmpty(tree* r)
{
    return r==NULL;
}

int treeSize(tree* r)
{
    if(r==NULL)
        return 0;
    int countLeft=treeSize(r->left);
    int countRight=treeSize(r->right);
    return(countLeft+countRight+1);
}

int treeHeight(tree* r)
{
    if(r==NULL)
        return -1;
    else
    {
    int hl=treeHeight(r->left);
    int hr=treeHeight(r->right);
    if(hl<hr)
        return hr+1;
    else
        return hl+1;
    }
}

char treeMin(tree* r)
{
    while(r->left!=NULL)
        r=r->left;
    return r->data;
}

char treeMax(tree* r)
{
    while(r->right!=NULL)
        r=r->right;
    return r->data;
}


