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
        $_SESSION['logon']=1;
        $_SESSION['username']=$user->getId();
        $url="http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/map_view");
        die();
    }
    public function logout()
    {
        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();
        $this->render('login', ['messages'=>["Logout successful!"]]);
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

        $user = new User($email, md5($password), $name, $surname,$username);

        $this->userRepository->addUser($user);

        return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
    }
}