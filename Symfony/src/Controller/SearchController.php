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
     * @Route("/recherche", name="Search")
     */
    public function Filter(ConsoleRepository $repoConsole, JeuxRepository $repoJeu, Request $request)
    {

        $repository = $this->getDoctrine()->getRepository(Jeux::class);

        $nom = $request->query->get('recherche'); //item searched

        $jeux = $repository->findOneBy([ // searching item
            'nom' => $nom
        ]);
        
        if($jeux != null){
            $this->addFlash('notice', "Resultat de la rechercher"); //flash message

            return $this->render('home/search.html.twig', [
                'jeux' => $jeux
            ]);
        }
        else{
            $this->addFlash('notice', "le jeu que vous chercher n'existe pas"); //flash message
            return $this->render('home/home.html.twig', [
                'jeux' => $jeux
            ]);
        }
    }
}
