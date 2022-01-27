<?php
require_once 'AppController.php';
require_once __DIR__ .'/../models/Cruise.php';
class CruiseController extends AppController
{
    const MAX_FILE_SIZE=1024*1024;
    const SUPPORTED_TYPES = ['image/png','image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads';

    private $message = [];

    public function addCruise()
    {
        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.'/'.$_FILES['file']['name']
            );
            $cruise = new Cruise($_POST['title'], $_POST['startDate'], $_POST['endDate'], $_POST['basin'], $_POST['freePlaces'], $_POST['price'], $_POST['placeOfEmbarkation'], $_POST['timeOfEmbarkation'], $_POST['placeOfDisembarkation'], $_POST['timeOfDisembarkation'],$_POST['description'], $_FILES['file']['name']);
            $this->render('cruise_description', ['messages'=>$this->message,  'cruise' => $cruise]);

        }
        else{
            $this->render('add_cruise', ['messages'=>$this->message ]);
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
}