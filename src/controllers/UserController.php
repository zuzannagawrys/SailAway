<?php
require_once 'AppController.php';
require_once __DIR__ .'/../models/Cruise.php';
require_once __DIR__.'/../repository/CruiseRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';
class UserController extends AppController
{
    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads';

    private $message = [];
    private $cruiseRepository;
    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->cruiseRepository = new CruiseRepository();
        $this->userRepository = new UserRepository();
    }

    public function user_profile()
    {
        $user_id = $_GET['id'];
        $user = $this->userRepository->getUserById($user_id);
        $organised_cruises = $this->cruiseRepository->getCruisesByUserId($user_id);
        return $this->render('user_profile', ['messages' => $this->message, 'user' => $user, 'organised_cruises' => $organised_cruises]);

    }
}