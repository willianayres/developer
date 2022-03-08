#include <iostream>
#include <string>
#include "user.h"

// Para separar em arquivos, no .h vai todas as declarações de variáveis e funções
// da classe, porém as implementações ficam no arquivo .c

//clas User{
std::string User::get_status()
{
    return status;
}
void User::set_status(std::string status)
{
    if(status=="Gold"||status=="Silver"||status=="Bronze")
        this->status = status;
    else
        this->status = "No status";
}
User::User(){
    std::cout << "User created\n";
}

User::User(std::string first_name, std::string last_name)
{
    this->first_name = first_name;
    this->last_name = last_name;
}
void output_status(User user);
std::ostream& operator << (std::ostream& output, const User user);
std::istream& operator >> (std::istream& input, User &user);
//}

void output_status(User user)
{
    std::cout << user.status;
}

std::ostream& operator << (std::ostream& output, const User user)
{
    output << "First Name: " << user.first_name << "  Last Name: " << user.last_name << "  Status: " << user.status << ".\n";
    return output;
}

std::istream& operator >> (std::istream& input, User &user)
{
    input >> user.first_name >> user.last_name;
    return input;
}
