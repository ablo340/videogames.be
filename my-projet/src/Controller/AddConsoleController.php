<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Console;
use App\Form\ConsoleType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

class AddConsoleController extends AbstractController
{
    /**
     * @Route("/add/console", name="add_console")
     * @Route("add/console/{id}/edit", name="edit_console")
     */
    public function Console(Console $console = null, Request $request, ObjectManager $manager)
    {

        if(!$console){
            $console = new Console;
        }

        //form to create or set a game
        $form = $this->createForm(ConsoleType::class, $console);

        $form->handleRequest($request);

        if($form->isSubmitted()){

            if(!$console->getId()){
                $console->setDateDeSortie(new \DateTime()); //set date
            }

            $manager->persist($console); //prepare game
            $manager->flush();

            $this->addFlash('notice', 'la console a bien été ajoutée');

            return $this->redirectToRoute('console_show', [
                'id' => $console->getId()
            ]);
        }

        return $this->render('home/add_console.html.twig', [
            'formConsole' => $form->CreateView(),
            'editMode' => $console->getId() !== null
        ]);
    }
}
