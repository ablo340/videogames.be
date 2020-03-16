<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use App\Repository\JeuxRepository;
use App\Entity\Jeux;

class HomeController extends AbstractController
{
    /**
     * @Route("api/home", name="api_home", methods={"GET"})
     */
    //show all games
    public function home(JeuxRepository $repoJeu)
    {
        //Find all games
        $jeux = $repoJeu->findAll();

        $encoders = array(new JsonEncoder());
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(2);

        // Add Circular reference handler
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($jeux, 'json');

        
        $response = new Response($jsonContent);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
        
    }

    /**
     * @Route("/api/game/{id}", name="api_game_show", methods={"GET"})
     */
    //show one game
    public function showOneGame(Jeux $jeux)
    {
        //find one game
        //$jeux = $repoJeu->findOneById($jeux->getId());

        $encoders = array(new JsonEncoder());
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(2);

        // Add Circular reference handler
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($jeux, 'json');

        
        $response = new Response($jsonContent);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
