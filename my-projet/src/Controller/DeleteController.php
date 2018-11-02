<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Jeux;
use App\Entity\Console;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

class DeleteController extends AbstractController
{
    /**
     * @Route("/delete/game/{id}", name="delete_game")
     */
    public function DeleteGame(Jeux $jeu, Request $request, ObjectManager $manager)
    {

        $manager->remove($jeu);
        $manager->flush();

        return $this->redirectToRoute('home'
        );
    }

    /**
     * @Route("/delete/console/{id}", name="delete_console")
     */
    public function DeleteConsole(Console $console, Request $request, ObjectManager $manager)
    {

        $manager->remove($console);
        $manager->flush();

        return $this->redirectToRoute('consoles'
        );
    }
}
