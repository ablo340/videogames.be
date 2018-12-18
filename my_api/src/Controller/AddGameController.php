<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Repository\JeuxRepository;
use App\Repository\ConsoleRepository;
use App\Entity\Jeux;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use App\Entity\Console;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use App\Form\JeuxType;
use Symfony\Component\HttpFoundation\Response;


class AddGameController extends AbstractController
{
    /**
     * @Route("api/add/game", name="api_add_game", methods={"POST"})
     */
    public function Add_Game(Request $request)
    {
        try
        {
            //api
            $data = $request->getContent();
            $content = json_decode($data, true);

            //ajout
            $console = $this->getDoctrine()
                            ->getRepository(Console::class)
                            ->find($content["console_id"]);
            
            $jeu = new Jeux();

            $jeu->setNom($content["nom"]);
            $jeu->setGenre($content["genre"]);
            $jeu->setCommentaire($content["commentaire"]);
            $jeu->setImage($content["image"]);
            $date = $content["date_de_sortie"];
            $jeu->setDateDeSortie(\DateTime::createFromFormat('Y-m-d', $date));
            $jeu->setConsole($console);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($jeu);
            $em->flush();
        }
        catch(Exception $e)
        {
            return 0;
        }

        return new Response('', Response::HTTP_CREATED);
        
    }

    /**
     * 
     * @Route("api/add/game/{id}/edit", name="api_edit_game", methods={"PUT"})
     */
    public function Edit_Game(Jeux $jeu, Request $request)
    {
        try
        {
            //api
            $data = $request->getContent();
            $content = json_decode($data, true);

            //ajout
            $console = $this->getDoctrine()
                            ->getRepository(Console::class)
                            ->find($content["console_id"]);
            

            $jeu->setNom($content["nom"]);
            $jeu->setGenre($content["genre"]);
            $jeu->setCommentaire($content["commentaire"]);
            $jeu->setImage($content["image"]);
            $date = $content["date_de_sortie"];
            $jeu->setDateDeSortie(\DateTime::createFromFormat('Y-m-d', $date));
            $jeu->setConsole($console);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($jeu);
            $em->flush();
        }
        catch(Exception $e)
        {
            return 0;
        }

        return new Response('', Response::HTTP_CREATED);
        
    }
}
