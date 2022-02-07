<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/ParticipatedCruise.php';
class UserRepository extends Repository
{
    public function getUserById(int $user_id): ?User
    {
        $stmt= $this->database->connect()->prepare(
            'SELECT * FROM public.users WHERE user_id =:user_id'
        );
        $stmt->bindParam(':user_id',$user_id,PDO::PARAM_STR);
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
        $user2->setImage($user['profile_image']);
        return $user2;
    }
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
        $user2->setImage($user['profile_image']);
        return $user2;
    }
    public function setUserPicture(int $user_id, string $img): ?User
    {
        $stmt= $this->database->connect()->prepare(
            'SELECT * FROM public.users WHERE user_id =:user_id'
        );
        $stmt->bindParam(':user_id',$user_id,PDO::PARAM_STR);
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
        $user2->setImage($img);
        $stmt = $this->database->connect()->prepare('
            UPDATE users profile_image= :profile_image WHERE users.user_id = :user_id
        ');
        $stmt->bindParam(':user_id',$user_id,PDO::PARAM_STR);
        $stmt->bindParam(':profile_image',$img,PDO::PARAM_STR);
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
    public function addParticipatedCruise(int $cruise_id, int $user_id, string $cruise_title )
    {

        $stmt = $this->database->connect()->prepare('
            INSERT INTO participated_cruises (user_id,cruise_title,cruise_id)
            VALUES (?,?, ?) ON CONFLICT DO NOTHING
        ');
        $stmt->execute([
            $user_id,
            $cruise_title,
            $cruise_id
        ]);
    }
    public function getParticipatedCruisesByUserId(int $user_id): array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM participated_cruises WHERE user_id = :search
        ');
        $stmt->bindParam(':search', $user_id, PDO::PARAM_STR);
        $stmt->execute();
        $cruises= $stmt->fetchAll((PDO::FETCH_ASSOC));
        foreach ($cruises as $cruise)
        {
            $result[]= new ParticipatedCruise(
                $cruise['user_id'],
                $cruise['cruise_title'],
                $cruise['cruise_id']
            );
        }
        return $result;
    }
}