<?php
require_once 'AppController.php';
require_once __DIR__ .'/../models/Cruise.php';
require_once __DIR__.'/../repository/CruiseRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/RequestRepository.php';
require_once __DIR__.'/../repository/NotificationRepository.php';
class NotificationController extends AppController
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

    public function notifications()
    {
        $user_id = $_SESSION['username'];
        $notifications = $this->notificationRepository->getNotificationToUserBroader($user_id);
        return $this->render('notifications', ['messages' => $this->message, 'notifications' => $notifications]);

    }

    public function removeNotification()
    {
        $id=$_GET['id'];
        $id=substr($id, 1);
        [$notifying_user_id,$cruise_id]=explode('a', $id, 2);
        $user_id = $_SESSION['username'];
        $this->notificationRepository->deleteNotification($user_id,$notifying_user_id,$cruise_id);
    }

}