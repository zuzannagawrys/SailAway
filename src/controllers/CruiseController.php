<?php
require_once 'AppController.php';
require_once __DIR__ .'/../models/Cruise.php';
require_once __DIR__.'/../repository/CruiseRepository.php';
class CruiseController extends AppController
{
    const MAX_FILE_SIZE=1024*1024;
    const SUPPORTED_TYPES = ['image/png','image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads';

    private $message = [];
    private $cruiseRepository;

    public function __construct()
    {
        parent::__construct();
        $this->cruiseRepository=new CruiseRepository();
    }
    public function cruise_description()
    {
            $cruise=$this->cruiseRepository->getCruise($_GET['id']);
            return $this->render('cruise_description', ['messages'=>$this->message,  'cruise' => $cruise]);

    }

    public function addCruise()
    {
        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.'/'.$_FILES['file']['name']
            );
            $decoded=json_decode($_POST['location'], true, 4);
            $cruise = new Cruise($_POST['title'], $_POST['startDate'], $_POST['endDate'], $_POST['basin'], $_POST['freePlaces'], $_POST['price'], $_POST['placeOfEmbarkation'], $_POST['timeOfEmbarkation'], $_POST['placeOfDisembarkation'], $_POST['timeOfDisembarkation'],$_POST['description'], $_FILES['file']['name'],$_POST['xlocation'],$_POST['ylocation']);
            $this->cruiseRepository->addCruise($cruise);
            return $this->render('cruise_description', ['messages'=>$this->message,  'cruise' => $cruise]);

        }
            return $this->render('add_cruise', ['messages'=>$this->message ]);

    }
    public function search()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);
            echo json_encode($this->cruiseRepository->getCruiseByTitle($decoded['search']));
        }
    }
    public function searchStartDate()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);
            echo json_encode($this->cruiseRepository->getCruiseByStartDate($decoded['search']));
        }
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
    public function map_view()
    {
        $cruises=$this->cruiseRepository->getCruises();
        $this->render('map_view', ['cruises' =>$cruises]);
    }
}