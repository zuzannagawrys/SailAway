<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/Cruise.php';
class CruiseRepository extends Repository
{
    public function getCruise(string $cruise_id): ?Cruise
    {
        $stmt= $this->database->connect()->prepare(
            'SELECT * FROM public.cruises WHERE cruise_id =:cruise_id'
        );
        $stmt->bindParam(':cruise_id',$cruise_id,PDO::PARAM_STR);
        $stmt->execute();
        $cruise= $stmt->fetch(PDO::FETCH_ASSOC);
        if($cruise_id == false){
            return null;
        }
         $cruise2=new Cruise(
            $cruise['title'],
            $cruise['start_date'],
            $cruise['end_date'],
            $cruise['basin'],
            $cruise['free_places'],
            $cruise['price'],
            $cruise['place_of_embarkation'],
            $cruise['time_of_embarkation'],
            $cruise['place_of_disembarkation'],
            $cruise['time_of_disembarkation'],
            $cruise['description'],
            $cruise['image'],
            $cruise['xlocation'],
            $cruise['ylocation'],
            $cruise['user_id']
        );
        $cruise2->setId($cruise['cruise_id']);
        return $cruise2;

    }
    public function addCruise(Cruise $cruise): void
    {
        $date = new DateTime();
        $stmt=$this->database->connect()->prepare(
            ' INSERT INTO cruises (title,user_id,start_date,end_date,basin,free_places,price,place_of_embarkation,time_of_embarkation,place_of_disembarkation,time_of_disembarkation, created_at, image, description, xlocation, ylocation)
                    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) 
        ');

        $stmt->execute([
            $cruise->getTitle(),
            $cruise->getUserId(),
            $cruise->getStartDate(),
            $cruise->getEndDate(),
            $cruise->getBasin(),
            $cruise->getFreePlaces(),
            $cruise->getPrice(),
            $cruise->getPlaceOfEmbarkation(),
            $cruise->getTimeOfEmbarkation(),
            $cruise->getPlaceOfDisembarkation(),
            $cruise->getTimeOfDisembarkation(),
            $date->format('Y-m-d'),
            $cruise->getImage(),
            $cruise->getDescription(),
            $cruise->getXLocation(),
            $cruise->getYLocation()
        ]);
    }
    public function getCruises(): array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM cruises
        ');
        $stmt->execute();
        $cruises= $stmt->fetchAll((PDO::FETCH_ASSOC));
        foreach ($cruises as $cruise)
        {
             $cruise2= new Cruise(
                $cruise['title'],
                $cruise['start_date'],
                $cruise['end_date'],
                $cruise['basin'],
                $cruise['free_places'],
                $cruise['price'],
                $cruise['place_of_embarkation'],
                $cruise['time_of_embarkation'],
                $cruise['place_of_disembarkation'],
                $cruise['time_of_disembarkation'],
                $cruise['description'],
                $cruise['image'],
                $cruise['xlocation'],
                $cruise['ylocation'],
                $cruise['user_id']
            );
            $cruise2->setId($cruise['cruise_id']);
            $result[]=$cruise2;
        }
        return $result;

    }
    public function getCruisesByUserId(int $user_id): array
    {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM cruises WHERE user_id = :search
        ');
        $stmt->bindParam(':search', $user_id, PDO::PARAM_STR);
        $stmt->execute();
        $cruises= $stmt->fetchAll((PDO::FETCH_ASSOC));
        foreach ($cruises as $cruise)
        {
            $cruise2= new Cruise(
                $cruise['title'],
                $cruise['start_date'],
                $cruise['end_date'],
                $cruise['basin'],
                $cruise['free_places'],
                $cruise['price'],
                $cruise['place_of_embarkation'],
                $cruise['time_of_embarkation'],
                $cruise['place_of_disembarkation'],
                $cruise['time_of_disembarkation'],
                $cruise['description'],
                $cruise['image'],
                $cruise['xlocation'],
                $cruise['ylocation'],
                $cruise['user_id']
            );
            $cruise2->setId($cruise['cruise_id']);
            $result[]=$cruise2;
        }
        return $result;

    }
    public function getCruiseByTitle(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM cruises WHERE LOWER(basin) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getCruiseById(int $id)
    {

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM cruises WHERE cruises.cruise_id LIKE :search
        ');
        $stmt->bindParam(':search', $id, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getCruiseByStartDate(string $date)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM cruises WHERE cruises.start_date = :search
        ');
        $stmt->bindParam(':search', $date, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function decreaseFreePlaces($cruise_id)
    {
        $stmt = $this->database->connect()->prepare('
            UPDATE cruises SET free_places = free_places-1 WHERE cruises.cruise_id = :cruise_id
        ');
        $stmt->bindParam(':cruise_id', $cruise_id, PDO::PARAM_STR);
        $stmt->execute();
    }
}