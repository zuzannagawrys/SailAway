<?php
require_once 'AppController.php';
require_once __DIR__ .'/../models/Cruise.php';
require_once __DIR__.'/../repository/CruiseRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/RequestRepository.php';
require_once __DIR__.'/../repository/NotificationRepository.php';
class RequestController extends AppController
{
    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads';

    private $message = [];
    private $cruiseRepository;
    private $userRepository;
    private $requestRepository;
    private $notificationRepository;

    public function __construct()
    {
        parent::__construct();
        $this->cruiseRepository = new CruiseRepository();
        $this->userRepository = new UserRepository();
        $this->requestRepository = new RequestRepository();
        $this->notificationRepository = new NotificationRepository();
    }

    public function requests()
    {
        $user_id = $_SESSION['username'];
        $requests = $this->requestRepository->getRequestsToUserBroader($user_id);
        return $this->render('requests', ['messages' => $this->message, 'requests' => $requests]);

    }
    public function requestAccepted()
    {
        $id=$_GET['id'];
        $id=substr($id, 1);
        [$requesting_user_id,$cruise_id]=explode('a', $id, 2);
        $user_id = $_SESSION['username'];
        $this->notificationRepository->addNotification($requesting_user_id,$user_id,$cruise_id,true);
        $cruise=$this->cruiseRepository->getCruise($cruise_id);
        $this->userRepository->addParticipatedCruise($cruise_id,$requesting_user_id, $cruise->getTitle());
        $this->cruiseRepository->decreaseFreePlaces($cruise_id);
        $this->requestRepository->deleteRequest($requesting_user_id,$user_id,$cruise_id);
    }
    public function requestDenied()
    {
        $id=$_GET['id'];
        $id=substr($id, 1);
        [$requesting_user_id,$cruise_id]=explode('a', $id, 2);
        $user_id = $_SESSION['username'];
        $this->notificationRepository->addNotification($requesting_user_id,$user_id,$cruise_id,false);
        $this->requestRepository->deleteRequest($requesting_user_id,$user_id,$cruise_id);
    }

}