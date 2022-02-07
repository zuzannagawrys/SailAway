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
        $participated_cruises= $this->userRepository->getParticipatedCruisesByUserId($user_id);
        return $this->render('user_profile', ['messages' => $this->message, 'user' => $user, 'organised_cruises' => $organised_cruises, 'participated_cruises' => $participated_cruises]);

    }
    public function editImage(){
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';



        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.'/'.$_FILES['file']['name']
            );
            echo json_encode($this->userRepository->setUserImage($_FILES['file']['name']));
        }
        return $this->render('user_profile', ['messages'=>$this->message ]);
    }
    private function validate(array $file):bool
    {
        if($file['size'] > self::MAX_FILE_SIZE){
            $this->message[]='File is too large for destination file system.';
            return false;
        }
        if(!isset($file['type']) || !in_array($file['type'],self::SUPPORTED_TYPES))
        {
            $this->message[]='File type is not supported.';
            return false;
        }
        return true;
    }
}