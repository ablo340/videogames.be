<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Jeux;
use App\Entity\Console;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use App\Repository\JeuxRepository;

class DeleteController extends AbstractController
{
    /**
     * @Route("api/delete/game/{id}", name="api_delete_game", methods={"DELETE"})
     */
    public function DeleteGame(Jeux $jeu, Request $request, ObjectManager $manager)
    {

        $manager->remove($jeu);
        $manager->flush();
        return new Response('', Response::HTTP_CREATED);
    }

    /**
     * @Route("api/delete/console/{id}", name="api_delete_console", methods={"DELETE"})
     */
    public function DeleteConsole(JeuxRepository $repoJeu, Console $console, Request $request, ObjectManager $manager)
    {
        //Find all games
        $jeux = $repoJeu->findAll();

        //delete the game bound
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

        return new Response('', Response::HTTP_CREATED);
    }
}
