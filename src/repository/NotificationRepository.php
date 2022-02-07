<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/Notification.php';
require_once __DIR__.'/../models/NotificationBroader.php';
require_once 'UserRepository.php';
require_once 'CruiseRepository.php';
class NotificationRepository extends Repository
{

    public function __construct()
    {
        parent::__construct();
    }
    public function deleteNotification(int $notified_user_id, int $notifying_user_id, int $cruise_id)
    {
        $stmt= $this->database->connect()->prepare(
            'DELETE FROM public.notifications WHERE (notified_user_id=:notified_user_id AND notifying_user_id =:notifying_user_id AND cruise_id=:cruise_id)'
        );
        $stmt->bindParam(':notified_user_id',$notified_user_id,PDO::PARAM_STR);
        $stmt->bindParam(':notifying_user_id',$notifying_user_id,PDO::PARAM_STR);
        $stmt->bindParam(':cruise_id',$cruise_id,PDO::PARAM_STR);
        $stmt->execute();

    }
    public function getNotificationToUserBroader(int $notified_user_id): array
    {
        $result = [];
        $stmt= $this->database->connect()->prepare(
            'SELECT n.notified_user_id, n.notifying_user_id, n.cruise_id, n.accepted, u.nick, u.email, c.title FROM notifications n LEFT JOIN cruises c on c.cruise_id = n.cruise_id LEFT JOIN users u on u.user_id = n.notified_user_id WHERE notified_user_id =:notified_user_id '
        );
        $stmt->bindParam(':notified_user_id',$notified_user_id,PDO::PARAM_STR);
        $stmt->execute();
        $notifications= $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($notifications as $notification)
        {
            $result[]= new NotificationBroader(
                $notification['notified_user_id'],
                $notification['notifying_user_id'],
                $notification['cruise_id'],
                $notification['nick'],
                $notification['email'],
                $notification['title'],
                $notification['accepted']
            );
        }
        return $result;
    }
    public function addNotification(int $notified_user_id, int $notifying_user_id, int $cruise_id, int $accepted)
    {

        $stmt = $this->database->connect()->prepare('
            INSERT INTO notifications (notified_user_id, notifying_user_id, cruise_id, accepted)
            VALUES (?, ?, ?, ?) ON CONFLICT DO NOTHING
        ');
        $stmt->execute([
            $notified_user_id,
            $notifying_user_id,
            $cruise_id,
            $accepted
        ]);
    }
}