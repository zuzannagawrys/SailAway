<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
class UserRepository extends Repository
{
    public function getUser(string $email): ?User
    {
        $stmt= $this->database->connect()->prepare(
            'SELECT * FROM public.users WHERE email =:email'
        );
        $stmt->bindParam(':email',$email,PDO::PARAM_STR);
        $stmt->execute();
        $user= $stmt->fetch(PDO::FETCH_ASSOC);
        if($user == false){
            return null;
        }
        $user2= new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname'],
            $user['nick']
        );
        $user2->setId($user['user_id']);
        return $user2;
    }
    public function addUser(User $user)
    {

        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (name, surname, email, password, nick)
            VALUES (?, ?, ?,?,?)
        ');
        $stmt->execute([
            $user->getName(),
            $user->getSurname(),
            $user->getEmail(),
            $user->getPassword(),
            $user->getNick()
        ]);
    }
}