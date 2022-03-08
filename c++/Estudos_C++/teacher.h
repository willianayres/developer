#ifndef TEACHER_H_INCLUDED
#define TEACHER_H_INCLUDED

#include <iostream>     // É chamada todas as biliotecas para utilização
#include <vector>
#include <string>
#include "user.h"

class Teacher:public User  // Herda a classe User, podendo acessar suas variáveis e métodos.
{
    public:
        std::vector<std::string> classes_teaching;
        void output();
        Teacher();
};


#endif // TEACHER_H_INCLUDED
