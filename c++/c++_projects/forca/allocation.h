#ifndef ALLOCATION_H_INCLUDED
#define ALLOCATION_H_INCLUDED

// Function to check if there's enough memory to allocate a character matrix. //
bool checkEspaceM(char**);

// Function to check if there's enough memory to allocate a string. //
bool checkEspaceS(char*);

// Function to check if the parameters are valid. //
bool parameterCheck(int row,int col);

// Function to allocate the memory to a string. //
char* allocS(int);

// Function to allocate the memory to a string matrix. //
char** allocM(int,int);

// Function to deallocate the space of a string. //
void freeString(char*);

// Function to deallocate the space of a string matrix. //
void freeMatrix(char**,int,int);

#endif // ALLOCATION_H_INCLUDED
