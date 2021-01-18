<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Beer.php';

class BeerRepository extends Repository
{
    public function getBeer(int $id): ?Beer
    {
        $statement = $this->database->connect()->prepare('
            SELECT * FROM public.beers WHERE id = :id
        ');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $beer = $statement->fetch(PDO::FETCH_ASSOC);

        if ($beer == false) {
            return null;
        }

        return new Beer(
            $beer['name'],
            $beer['description'],
            $beer['image'],
            $beer['type'],
            $beer['brewery'],
            $beer['country'],
            $beer['alcohol'],
            $beer['price']
        );
    }

    public function addBeer(Beer $beer): void {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO beers (name, description, image, rates_sum, rates_number, type, brewery, country, alcohol, price)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ');

        $stmt->execute([
            $beer->getName(),
            $beer->getDescription(),
            $beer->getImage(),
            $beer->getRatesSum(),
            $beer->getRatesNumber(),
            $beer->getType(),
            $beer->getBrewery(),
            $beer->getCountry(),
            $beer->getAlcohol(),
            $beer->getPrice(),
        ]);
    }
}
