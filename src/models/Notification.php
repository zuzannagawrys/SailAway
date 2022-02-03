<?php

class Notification
{
    private $notifiedUserId;
    private $notifyingUserId;
    private $cruiseId;
    private $accepted;

    public function __construct(int $requestingUserId, int  $requestedUserId, int $cruiseId, bool $accepted)
    {
        $this->notifiedUserId = $requestingUserId;
        $this->notifyingUserId = $requestedUserId;
        $this->cruiseId = $cruiseId;
        $this->accepted = $accepted;
    }

    public function isAccepted(): bool
    {
        return $this->accepted;
    }

    public function setAccepted(bool $accepted): void
    {
        $this->accepted = $accepted;
    }


    public function getNotifiedUserId(): int
    {
        return $this->notifiedUserId;
    }

    public function setNotifiedUserId(int $notifiedUserId): void
    {
        $this->notifiedUserId = $notifiedUserId;
    }


    public function getNotifyingUserId(): int
    {
        return $this->notifyingUserId;
    }


    public function setNotifyingUserId(int $notifyingUserId): void
    {
        $this->notifyingUserId = $notifyingUserId;
    }

    public function getCruiseId(): int
    {
        return $this->cruiseId;
    }

    public function setCruiseId(int $cruiseId): void
    {
        $this->cruiseId = $cruiseId;
    }



}