#ifndef FILE_H_INCLUDED
#define FILE_H_INCLUDED

#include <stdio.h>

// Function to open a file that receives the file path and the way it will open. //
FILE* openFile(char*,char*);

// Function to close a file. //
void closeFile(FILE*);

// Function to clear a content of a file. //
void clearFile(char*);

#endif // FILE_H_INCLUDED
