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
            $beer['price'],
            $beer['rates_sum'],
            $beer['rates_number']
        );
    }

    public function addBeer(Beer $beer) {
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

    public function getBeerByName(string $searchString) {
        $searchString = '%'.strtolower($searchString).'%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.beers WHERE LOWER(name) LIKE :search OR LOWER(description) LIKE :search
        ');

        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBeerTypes() {
        $stmt = $this->database->connect()->prepare('
            SELECT "type" FROM public.beers GROUP BY "type"
        ');

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBestBeers($type) {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM best_beers WHERE "type" = :type
        ');

        $stmt->bindParam(':type', $type, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addRate($beer_id, $rate) {
        $stmt = $this->database->connect()->prepare('
            UPDATE beers SET rates_sum = rates_sum + :rate, rates_number = rates_number + 1 WHERE id = :id
         ');

        $stmt->bindParam(':rate', $rate, PDO::PARAM_STR);
        $stmt->bindParam(':id', $beer_id, PDO::PARAM_STR);
        $stmt->execute();
    }
}
