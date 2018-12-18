<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Jeux;
use App\Entity\Console;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

class DeleteController extends AbstractController
{
    /**
     * @Route("api/delete/game/{id}", name="api_delete_game", methods={"DELETE"})
     * @Method("DELETE")
     */
    public function DeleteGame(Jeux $jeu, Request $request, ObjectManager $manager)
    {

        $manager->remove($jeu);
        $manager->flush();

        return $this->redirectToRoute('api_home'
        );
    }

    /**
     * @Route("api/delete/console/{id}", name="api_delete_console", methods={"DELETE"})
     */
    public function DeleteConsole(Console $console, Request $request, ObjectManager $manager)
    {

        $manager->remove($console);
        $manager->flush();

        return $this->redirectToRoute('api_consoles'
        );
    }
}
