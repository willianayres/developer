#ifndef FILE_H_INCLUDED
#define FILE_H_INCLUDED

#include <stdio.h>

FILE* openFile(char*,char*);

void closeFile(FILE*);

void clearFile(char*);

#endif // FILE_H_INCLUDED
