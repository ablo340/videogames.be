<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ConsoleRepository;
use App\Repository\JeuxRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Entity\Jeux;
use App\Entity\Console;

class SearchController extends AbstractController
{
    /**
     * @Route("/filter", name="filter")
     */
    public function Filter(ConsoleRepository $repoConsole, JeuxRepository $repoJeu, Request $request)
    {
        //Find all games
        $consoles = $repoConsole->findAll();

        $form = $this->createFormBuilder()
                     ->add('genre', ChoiceType::class, array(
                        'choices' => array(
                            'Aventure' => 'Aventure',
                            'Course' => 'Course',
                            'Combat' => 'Combat',
                            'Guerre' => 'Guerre',
                            'Sport' => 'Sport',
                        ),
                    ))
                     ->add('console', EntityType::class, [
                        'class' => Console::class,
                        'choice_label' => 'nom'
                    ])
                     ->add('nom')
                     ->getForm();
        
        if($form->isSubmitted()){
            $data = $request->getContent();
            $content = json_decode($data, true);

            $repository = $this->getDoctrine()->getRepository(Jeux::class);

                

            $jeux = $repository->findOneBy([
                'nom' => 'FIFA 19'
            ]);


            return $this->redirectToRoute('game_show', [
                'id' => $jeux->getId(),
                'jeux' => $jeux
            ]);
        }
        

        return $this->render('home/search.html.twig', [
            'formJeu' => $form->CreateView(),
            'consoles' => $consoles
        ]);
    }

    /**
     * @Route("/search/filter", name="search_filter")
     */
    public function SearchFilter(ConsoleRepository $repoConsole, JeuxRepository $repoJeu)
    {
        //Find all games
        $consoles = $repoConsole->findAll();

        $jeux = $repoJeu->findOneBy([
            'nom' => $_GET['nom'],
            'Console' => $_GET['console'],
            'genre' => $_GET['genre']
        ]);

        return $this->render('home/home.html.twig', [
            'consoles' => $consoles,
            'jeux' => $jeux
        ]);
    }
    
}
