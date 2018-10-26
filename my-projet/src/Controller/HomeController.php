<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\JeuxRepository;
use App\Entity\Jeux;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    //show all games
    public function home(JeuxRepository $repoJeu)
    {
        //Find all games
        $jeux = $repoJeu->findAll();

        return $this->render('home/home.html.twig', [
            'jeux' => $jeux
        ]);
    }

    /**
     * @Route("/game/{id}", name="game_show")
     */
    //show one game
    public function showOneGame(Jeux $jeux)
    {
        return $this->render('home/jeux.html.twig', [
            'jeux' => $jeux
        ]);
    }
}
