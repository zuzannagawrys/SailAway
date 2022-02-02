<?php

class RequestBroader
{
    private $requestingUserId;
    private $requestedUserId;
    private $cruiseId;
    private $requestingUserNick;
    private $cruiseTitle;


    public function __construct(int $requestingUserId, int  $requestedUserId, int $cruiseId, string $requestingUserNick, string $cruiseTitle)
    {
        $this->requestingUserId = $requestingUserId;
        $this->requestedUserId = $requestedUserId;
        $this->cruiseId = $cruiseId;
        $this->cruiseTitle = $cruiseTitle;
        $this->requestingUserNick = $requestingUserNick;
    }

    public function getRequestingUserNick(): string
    {
        return $this->requestingUserNick;
    }

    public function setRequestingUserNick(string $requestingUserNick): void
    {
        $this->requestingUserNick = $requestingUserNick;
    }

    public function getCruiseTitle(): string
    {
        return $this->cruiseTitle;
    }

    public function setCruiseTitle(string $cruiseTitle): void
    {
        $this->cruiseTitle = $cruiseTitle;
    }


    public function getRequestingUserId(): int
    {
        return $this->requestingUserId;
    }

    public function setRequestingUserId(int $requestingUserId): void
    {
        $this->requestingUserId = $requestingUserId;
    }


    public function getRequestedUserId(): int
    {
        return $this->requestedUserId;
    }


    public function setRequestedUserId(int $requestedUserId): void
    {
        $this->requestedUserId = $requestedUserId;
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