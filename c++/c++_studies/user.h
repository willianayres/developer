#ifndef USER_H_INCLUDED
#define USER_H_INCLUDED

// Classe User ( Apenas declarações )
class User
{
    std::string status = "Gold";
    public:
        std::string first_name;
        std::string last_name;
        std::string get_status();
        void set_status(std::string status);
        User();
        User(std::string first_name, std::string last_name);
        friend void output_status(User user);
        friend std::ostream& operator << (std::ostream& output, const User user);
        friend std::istream& operator >> (std::istream& input, User &user);
};

#endif // USER_H_INCLUDED
