<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Beer.php';
require_once __DIR__.'/../repository/BeerRepository.php';
require_once __DIR__.'/../repository/CommentRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';

class BeerController extends AppController {

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];
    private $beerRepository;
    private $commentRepository;
    private $userRepository;


    public function __construct() {
        parent::__construct();
        $this->beerRepository = new BeerRepository();
        $this->commentRepository = new CommentRepository();
        $this->userRepository = new UserRepository();
    }

    public function beer($given_id) {
        if(!isset($_GET['id']) && !$given_id)
            return $this->render('search');

        if($given_id)
            $id = $given_id;
        else
            $id = (int)$_GET['id'];

        $beer = $this->beerRepository->getBeer($id);
        $comments = $this->commentRepository->getComments($id);

        return $this->render('beer', ['beer' => $beer, 'comments' => $comments]);
    }

    public function beers($query) {
        if(!isset($_GET['query']))
            return $this->render('search');

        $beers = $this->beerRepository->getBeerByName($_GET['query']);

        $result = [];
        foreach ($beers as $beer) {
            $result[] = new Beer(
                $beer['name'],
                $beer['description'],
                $beer['image'],
                $beer['type'],
                $beer['brewery'],
                $beer['country'],
                $beer['alcohol'],
                $beer['price'],
                $beer['rates_sum'],
                $beer['rates_number'],
                $beer['id']
            );
        }

        return $this->render('search', ['query' => $_GET['query'], 'beers' => $result]);
    }

    public function catalog() {
        $types = $this->beerRepository->getBeerTypes();

        return $this->render('catalog', ['types' => $types]);
    }

    public function addComment() {
        if ($this->isPost()) {
            $comment = new Comment($_POST['content'], $_SESSION['login'], $_POST['rate'], $_POST['beer_id']);
            $user_id = $this->userRepository->getUser($_SESSION['login'], True);
            $this->commentRepository->addComment($comment, $user_id);

            /*$this->beer($_POST['beer_id']); */
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/beer?id={$_POST['beer_id']}");
        }
    }

    public function addBeer() {
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file']) ) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            $beer = new Beer(
                $_POST['name'],
                $_POST['description'],
                $_FILES['file']['name'],
                $_POST['type'],
                $_POST['brewery'],
                $_POST['country'],
                $_POST['alcohol'],
                $_POST['price']
            );

            $this->beerRepository->addBeer($beer);


            return $this->render('beer', ['beer' => $beer]);
        }

        return $this->render('add_beer', ['messages' => $this->messages]);
    }

    public function bestBeersSearch() {
        $decoded = $this->validRequest();

        if ($decoded) {
            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->beerRepository->getBestBeers($decoded['search']));
        }
    }

    public function search($query) {
        $decoded = $this->validRequest();

        if ($decoded) {
            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->beerRepository->getBeerByName($decoded['search']));
        }
    }

    private function validRequest() {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            return $decoded;
        }
        return null;
    }

    private function validate(array $file): bool {
        if($file['size'] > self::MAX_FILE_SIZE) {
            $this->messages[] = "Rozmiar wybranego zdjęcia jest za duży!";
            return false;
        }

        if(!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->messages[] = "Typ pliku nie jest obsługiwany!";
            return false;
        }

        return true;
    }
}