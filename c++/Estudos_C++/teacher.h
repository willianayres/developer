#ifndef TEACHER_H_INCLUDED
#define TEACHER_H_INCLUDED

#include <iostream>     // � chamada todas as biliotecas para utiliza��o
#include <vector>
#include <string>
#include "user.h"

class Teacher:public User  // Herda a classe User, podendo acessar suas vari�veis e m�todos.
{
    public:
        std::vector<std::string> classes_teaching;
        void output();
        Teacher();
};


#endif // TEACHER_H_INCLUDED
