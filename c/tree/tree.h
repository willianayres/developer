#ifndef TREE_H_INCLUDED
#define TREE_H_INCLUDED

typedef struct tree
{
    char data;
    struct tree* left;
    struct tree* right;
}tree;

tree* treeInsert(tree*,tree*,char);

tree* treeDestroy(tree*);

tree* treeSearch(tree*,char);

tree* treeRemove(tree*,char);

void treePrint(tree*,int);

void treePrintInorder(tree*);

void treePrintPostorder(tree*);

void postorder(tree*);

int treeEmpty(tree*);

int treeSize(tree*);

int treeHeight(tree*);

char treeMin(tree*);

char treeMax(tree*);

#endif // TREE_H_INCLUDED
