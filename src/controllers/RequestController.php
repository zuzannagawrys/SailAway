<?php
require_once 'AppController.php';
require_once __DIR__ .'/../models/Cruise.php';
require_once __DIR__.'/../repository/CruiseRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/RequestRepository.php';
class RequestController extends AppController
{
    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads';

    private $message = [];
    private $cruiseRepository;
    private $userRepository;
    private $requestRepository;

    public function __construct()
    {
        parent::__construct();
        $this->cruiseRepository = new CruiseRepository();
        $this->userRepository = new UserRepository();
        $this->requestRepository = new RequestRepository();
    }

    public function requests()
    {
        $user_id = $_SESSION['username'];
        $requests = $this->requestRepository->getRequestsToUserBroader($user_id);
        return $this->render('requests', ['messages' => $this->message, 'requests' => $requests]);

    }

    public function addCruise()
    {
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__) . self::UPLOAD_DIRECTORY . '/' . $_FILES['file']['name']
            );
            $cruise = new Cruise($_POST['title'], $_POST['startDate'], $_POST['endDate'], $_POST['basin'], $_POST['freePlaces'], $_POST['price'], $_POST['placeOfEmbarkation'], $_POST['timeOfEmbarkation'], $_POST['placeOfDisembarkation'], $_POST['timeOfDisembarkation'], $_POST['description'], $_FILES['file']['name'], $_POST['xlocation'], $_POST['ylocation'], $_SESSION['username']);
            $user = $this->userRepository->getUserById($cruise->getUserId());
            $this->cruiseRepository->addCruise($cruise);
            return $this->render('cruise_description', ['messages' => $this->message, 'cruise' => $cruise, 'user' => $user]);

        }
        return $this->render('add_cruise', ['messages' => $this->message]);

    }
}