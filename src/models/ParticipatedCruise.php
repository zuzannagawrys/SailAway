<?php

class ParticipatedCruise
{
    private $user_id;
    private $title;
    private $cruise_id;


    public function __construct(int $user_id,  string $title, int $cruise_id)
    {
        $this->user_id = $user_id;
        $this->title = $title;
        $this->cruise_id = $cruise_id;
    }


    public function getUserId(): int
    {
        return $this->user_id;
    }


    public function setUserId(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }


    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getCruiseId(): int
    {
        return $this->cruise_id;
    }

    public function setCruiseId(int $cruise_id): void
    {
        $this->cruise_id = $cruise_id;
    }


}