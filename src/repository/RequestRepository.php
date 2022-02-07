<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Request.php';
require_once __DIR__.'/../models/RequestBroader.php';
require_once 'UserRepository.php';
require_once 'CruiseRepository.php';
class RequestRepository extends Repository
{

    public function __construct()
    {
        parent::__construct();
    }
    public function getRequest(int $requesting_user_id, int $requested_user_id, int $cruise_id): ?Request
    {
        $stmt= $this->database->connect()->prepare(
            'SELECT * FROM public.requests WHERE (requesting_user_id=:requesting_user_id AND requested_user_id =:requested_user_id AND cruise_id=:cruise_id)'
        );
        $stmt->bindParam(':requesting_user_id',$requesting_user_id,PDO::PARAM_STR);
        $stmt->bindParam(':requested_user_id',$requested_user_id,PDO::PARAM_STR);
        $stmt->bindParam(':cruise_id',$cruise_id,PDO::PARAM_STR);
        $stmt->execute();
        $request= $stmt->fetch(PDO::FETCH_ASSOC);
        if($request == false){
            return null;
        }
        return new Request(
            $request['requesting_user_id'],
            $request['requested_user_id'],
            $request['cruise_id']
        );
    }
    public function deleteRequest(int $requesting_user_id, int $requested_user_id, int $cruise_id)
    {
        $stmt= $this->database->connect()->prepare(
            'DELETE FROM public.requests WHERE (requesting_user_id=:requesting_user_id AND requested_user_id =:requested_user_id AND cruise_id=:cruise_id)'
        );
        $stmt->bindParam(':requesting_user_id',$requesting_user_id,PDO::PARAM_STR);
        $stmt->bindParam(':requested_user_id',$requested_user_id,PDO::PARAM_STR);
        $stmt->bindParam(':cruise_id',$cruise_id,PDO::PARAM_STR);
        $stmt->execute();

    }
    public function getRequestsToUser(int $requested_user_id): array
    {
        $result = [];
        $stmt= $this->database->connect()->prepare(
            'SELECT * FROM public.requests WHERE requested_user_id =:requested_user_id '
        );
        $stmt->bindParam(':requested_user_id',$requested_user_id,PDO::PARAM_STR);
        $stmt->execute();
        $requests= $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($requests as $request)
        {
            $result[]= new Request(
                $request['requesting_user_id'],
                $request['requested_user_id'],
                $request['cruise_id']
            );
        }
        return $result;
    }
    public function getRequestsToUserBroader(int $requested_user_id): array
    {
        $result = [];
        $stmt= $this->database->connect()->prepare(
            'SELECT u.nick, c.title, r.requesting_user_id, r.requested_user_id, r.cruise_id FROM requests r JOIN users u ON r.requesting_user_id=u.user_id JOIN cruises c ON c.cruise_id = r.cruise_id WHERE r.requested_user_id =:requested_user_id '
        );
        $stmt->bindParam(':requested_user_id',$requested_user_id,PDO::PARAM_STR);
        $stmt->execute();
        $requests= $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($requests as $request)
        {
            $result[]= new RequestBroader(
                $request['requesting_user_id'],
                $request['requested_user_id'],
                $request['cruise_id'],
                $request['nick'],
                $request['title']
            );
        }
        return $result;
    }
    public function addRequest(Request $request)
    {

        $stmt = $this->database->connect()->prepare('
            INSERT INTO requests (requesting_user_id, requested_user_id, cruise_id)
            VALUES (?, ?, ?) ON CONFLICT DO NOTHING
        ');
        $stmt->execute([
            $request->getRequestingUserId(),
            $request->getRequestedUserId(),
            $request->getCruiseId()
        ]);
    }
}