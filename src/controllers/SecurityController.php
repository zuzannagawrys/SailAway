<?php
require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
class SecurityController extends AppController
{
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login()
    {
        $userRepository = new UserRepository();

        if(!$this->isPost()){
           return $this->render('login');
        }
        $email= $_POST["email"];
        $password= md5($_POST["password"]);
        $user =  $userRepository->getUser($email);
        if(!$user)
        {
            return $this->render('login', ['messages' => ["User not found"]]);
        }
        if($user->getEmail() !== $email)
        {
            return $this->render('login', ['messages' => ["User with this email does not exist!"]]);
        }
        if($user->getPassword() !== $password){
            return $this->render('login', ['messages'=>["Incorrect password!"]]);
        }
        $url="http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/map_view");
        die();
    }
    public function registration()
    {
        if (!($this->isPost())) {
            return $this->render('registration');
        }
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];


        if ($password !== $confirmedPassword) {
            return $this->render('registration', ['messages' => ['Please provide proper password']]);
        }

        //TODO try to use better hash function
        $user = new User($email, md5($password), $name, $surname,$username);

        $this->userRepository->addUser($user);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }
}