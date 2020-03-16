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
    public function home(JeuxRepository $repoJeu) //show all games
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
    public function showOneGame(Jeux $jeux )//show one game
    {
        return $this->render('home/jeux.html.twig', [
            'jeux' => $jeux
        ]);
    }
}
