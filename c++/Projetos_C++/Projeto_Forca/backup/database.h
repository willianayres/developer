#ifndef DATABASE_H_INCLUDED
#define DATABASE_H_INCLUDED

typedef struct
{
    int row;
    int col;
    char* sortWord;
    char* typeWord;
    char** database;
}Database;

#endif // DATABASE_H_INCLUDED
