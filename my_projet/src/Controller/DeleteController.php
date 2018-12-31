<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Jeux;
use App\Entity\Console;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use App\Repository\JeuxRepository;

class DeleteController extends AbstractController
{
    /**
     * @Route("/delete/game/{id}", name="delete_game")
     */
    public function DeleteGame(Jeux $jeu, Request $request, ObjectManager $manager)
    {

        $manager->remove($jeu);
        $manager->flush();

        $this->addFlash('suppression', 'le jeu a bien été supprimé'); // flash message

        return $this->redirectToRoute('home'
        );
    }

    /**
     * @Route("/delete/console/{id}", name="delete_console")
     */
    public function DeleteConsole(JeuxRepository $repoJeu, Console $console, Request $request, ObjectManager $manager)
    {
        //Find all games
        $jeux = $repoJeu->findAll();

        //delete the game bound too
        foreach($jeux as $jeu){
            $jeu_Idconsole = $jeu->getConsole()->getId();
            if( $jeu_Idconsole == $console->getId() ){
                $manager->remove($jeu);
                $manager->flush();
            }
        }

        //delete console
        $manager->remove($console);
        $manager->flush();

        $this->addFlash('suppression', 'la console a bien été supprimée ainsi que tous les jeux liés à celle ci');  // flash message

        return $this->redirectToRoute('consoles'
        );
    }
}
