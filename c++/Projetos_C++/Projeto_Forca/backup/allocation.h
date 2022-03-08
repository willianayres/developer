#ifndef ALLOCATION_H_INCLUDED
#define ALLOCATION_H_INCLUDED

bool checkEspaceM(char**);

bool checkEspaceS(char*);

bool parameterCheck(int row,int col);

char* allocS(int);

char** allocM(int,int);

void freeString(char*);

void freeMatrix(char**,int,int);

#endif // ALLOCATION_H_INCLUDED
