<?php

class Request
{
    private $requestingUserId;
    private $requestedUserId;
    private $cruiseId;

    public function __construct(int $requestingUserId, int  $requestedUserId, int $cruiseId)
    {
        $this->requestingUserId = $requestingUserId;
        $this->requestedUserId = $requestedUserId;
        $this->cruiseId = $cruiseId;
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