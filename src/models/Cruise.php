<?php

class Cruise
{
    private $title;
    private $startDate;
    private $endDate;
    private $basin;
    private $freePlaces;
    private $price;
    private $placeOfEmbarkation;
    private $timeOfEmbarkation;
    private $placeOfDisembarkation;
    private $timeOfDisembarkation;
    private $description;
    private $image;
    private $xLocation;
    private $yLocation;
    private $id;
    private $user_id;

    public function __construct($title, $startDate, $endDate, $basin, $freePlaces, $price, $placeOfEmbarkation, $timeOfEmbarkation, $placeOfDisembarkation, $timeOfDisembarkation, $description, $image, $xLocation,$yLocation, $user_id)
    {
        $this->title = $title;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->basin = $basin;
        $this->freePlaces = $freePlaces;
        $this->price = $price;
        $this->placeOfEmbarkation = $placeOfEmbarkation;
        $this->timeOfEmbarkation = $timeOfEmbarkation;
        $this->placeOfDisembarkation = $placeOfDisembarkation;
        $this->timeOfDisembarkation = $timeOfDisembarkation;
        $this->description = $description;
        $this->image = $image;
        $this->xLocation = $xLocation;
        $this->yLocation = $yLocation;
        $this->user_id = $user_id;
    }


    public function getUserId(): int
    {
        return $this->user_id;
    }

    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }


    public function getXLocation(): float
    {
        return $this->xLocation;
    }

    public function setXLocation($xLocation): void
    {
        $this->xLocation = $xLocation;
    }

    public function getYLocation(): float
    {
        return $this->yLocation;
    }

    public function setYLocation($yLocation): void
    {
        $this->yLocation = $yLocation;
    }

    public function getStartDate(): string
    {
        return $this->startDate;
    }

    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    public function getEndDate(): string
    {
        return $this->endDate;
    }

    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    public function getBasin(): string
    {
        return $this->basin;
    }

    public function setBasin($basin)
    {
        $this->basin = $basin;
    }


    public function getFreePlaces(): int
    {
        return $this->freePlaces;
    }

    public function setFreePlaces($freePlaces)
    {
        $this->freePlaces = $freePlaces;
    }


    public function getPrice(): string
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getPlaceOfEmbarkation(): string
    {
        return $this->placeOfEmbarkation;
    }

    public function setPlaceOfEmbarkation($placeOfEmbarkation)
    {
        $this->placeOfEmbarkation = $placeOfEmbarkation;
    }

    public function getTimeOfEmbarkation(): string
    {
        return $this->timeOfEmbarkation;
    }


    public function setTimeOfEmbarkation($timeOfEmbarkation)
    {
        $this->timeOfEmbarkation = $timeOfEmbarkation;
    }


    public function getPlaceOfDisembarkation(): string
    {
        return $this->placeOfDisembarkation;
    }

    public function setPlaceOfDisembarkation($placeOfDisembarkation)
    {
        $this->placeOfDisembarkation = $placeOfDisembarkation;
    }


    public function getTimeOfDisembarkation(): string
    {
        return $this->timeOfDisembarkation;
    }


    public function setTimeOfDisembarkation($timeOfDisembarkation)
    {
        $this->timeOfDisembarkation = $timeOfDisembarkation;
    }


    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }


}