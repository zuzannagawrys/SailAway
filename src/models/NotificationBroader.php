<?php

class NotificationBroader
{
    private $notifiedUserId;
    private $notifyingUserId;
    private $cruiseId;
    private $notifyingUserNick;
    private $notifyingUserEmail;
    private $cruiseTitle;
    private $accepted;

    public function __construct(int $requestingUserId, int  $requestedUserId, int $cruiseId, string $notifyingUserName, string $notifyingUserEmail, string $cruiseName, bool $accepted)
    {
        $this->notifiedUserId = $requestingUserId;
        $this->notifyingUserId = $requestedUserId;
        $this->notifyingUserNick = $notifyingUserName;
        $this->notifyingUserEmail = $notifyingUserEmail;
        $this->cruiseTitle = $cruiseName;
        $this->cruiseId = $cruiseId;
        $this->accepted=$accepted;
    }

    public function isAccepted(): bool
    {
        return $this->accepted;
    }

    public function setAccepted(bool $accepted): void
    {
        $this->accepted = $accepted;
    }

    public function getNotifyingUserNick(): string
    {
        return $this->notifyingUserNick;
    }

    public function setNotifyingUserNick(string $notifyingUserName): void
    {
        $this->notifyingUserNick = $notifyingUserName;
    }

    public function getNotifyingUserEmail(): string
    {
        return $this->notifyingUserEmail;
    }

    public function setNotifyingUserEmail(string $notifyingUserEmail): void
    {
        $this->notifyingUserEmail = $notifyingUserEmail;
    }

    public function getCruiseTitle(): string
    {
        return $this->cruiseTitle;
    }

    public function setCruiseTitle(string $cruiseTitle): void
    {
        $this->cruiseTitle = $cruiseTitle;
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