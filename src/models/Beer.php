<?php


class Beer
{
    private $name;
    private $description;
    private $image;
    private $rates_sum;
    private $rates_number;
    private $type;
    private $brewery;
    private $country;
    private $alcohol;
    private $price;

    public function __construct($name, $description, $image, $type, $brewery, $country, $alcohol, $price)
    {
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
        $this->rates_sum = 0;
        $this->rates_number = 0;
        $this->type = $type;
        $this->brewery = $brewery;
        $this->country = $country;
        $this->alcohol = $alcohol;
        $this->price = $price;
    }

    /*Getters and setters*/

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage($image): void
    {
        $this->image = $image;
    }

    public function getRatesSum(): int
    {
        return $this->rates_sum;
    }

    public function setRatesSum($rates_sum): void
    {
        $this->rates_sum = $rates_sum;
    }

    public function getRatesNumber(): int
    {
        return $this->rates_number;
    }

    public function setRatesNumber($rates_number): void
    {
        $this->rates_number = $rates_number;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType($type): void
    {
        $this->type = $type;
    }

    public function getBrewery(): string
    {
        return $this->brewery;
    }

    public function setBrewery($brewery): void
    {
        $this->brewery = $brewery;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry($country): void
    {
        $this->country = $country;
    }

    public function getAlcohol(): string
    {
        return $this->alcohol;
    }

    public function setAlcohol($alcohol): void
    {
        $this->alcohol = $alcohol;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }
}