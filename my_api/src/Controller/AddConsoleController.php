<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Console;
use App\Form\ConsoleType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class AddConsoleController extends AbstractController
{
    /**
     * @Route("api/add/console", name="api_add_console", methods={"POST"})
     */
    public function Add_Console(Request $request)
    {

        try
        {
            //api
            $data = $request->getContent();
            $content = json_decode($data, true);

            //ajout           
            $console = new Console();

            $console->setNom($content["nom"]);
            $console->getFabricant($content["fabricant"]);
            $console->setPrix($content["prix"]);
            $console->setImage($content["image"]);
            $date = $content["date_de_sortie"];
            $console->setDateDeSortie(\DateTime::createFromFormat('Y-m-d', $date));
            $console->setDescription($content["description"]);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($console);
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
     * @Route("api/add/console/{id}/edit", name="api_edit_console", methods={"PUT"})
     */
    public function Edit_Console(Console $console, Request $request)
    {
        try
        {
            //api
            $data = $request->getContent();
            $content = json_decode($data, true);

            //ajout
            $console->setNom($content["nom"]);
            $console->getFabricant($content["fabricant"]);
            $console->setPrix($content["prix"]);
            $console->setImage($content["image"]);
            $date = $content["date_de_sortie"];
            $console->setDateDeSortie(\DateTime::createFromFormat('Y-m-d', $date));
            $console->setDescription($content["description"]);
            
            $em = $this->getDoctrine()->getManager();
            $em->persist($console);
            $em->flush();
        }
        catch(Exception $e)
        {
            return 0;
        }

        return new Response('', Response::HTTP_CREATED);
    }
}
