<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Repository\JeuxRepository;
use App\Repository\ConsoleRepository;
use App\Entity\Jeux;
use App\Entity\Console;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use App\Form\JeuxType;

class AddGameController extends AbstractController
{
    /**
     * @Route("add/game", name="add_game")
     * @Route("add/game/{id}/edit", name="edit_game")
     */
    public function Game(Jeux $jeu = null, Request $request, ObjectManager $manager)
    {

        if(!$jeu){
            $jeu = new Jeux;
        }

        //form to create or set a game
        $form = $this->createForm(JeuxType::class, $jeu);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            if($jeu->getConsole() == null){// if there is no console in db
                $this->addFlash('notice', "Il n'y a pas de console. Veuillez ajouter d'abord une console" );
                return $this->redirectToRoute('add_game');
            }

            $manager->persist($jeu); //prepare game
            $manager->flush();

            $this->addFlash('notice', 'le jeu a bien été ajouté'); // flash message

            return $this->redirectToRoute('game_show', [
                'id' => $jeu->getId()
            ]);
        }

        return $this->render('home/add_game.html.twig', [
            'formJeu' => $form->CreateView(),
            'editMode' => $jeu->getId() !== null
        ]);
    }
}
