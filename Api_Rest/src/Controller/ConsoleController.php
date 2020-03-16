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
use App\Repository\ConsoleRepository;
use App\Entity\Console;

class ConsoleController extends AbstractController
{
    /**
     * @Route("api/consoles", name="api_consoles", methods={"GET"})
     */
    //show all consoles
    public function Consoles(ConsoleRepository $repoConsole)
    {
        //Find all games
        $consoles = $repoConsole->findAll();

        $encoders = array(new JsonEncoder());
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(2);

        // Add Circular reference handler
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($consoles, 'json');

        
        $response = new Response($jsonContent);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("api/console/{id}", name="api_console_show", methods={"GET"})
     */
    //show one console
    public function showOneConsole(Console $consoles)
    {
        $encoders = array(new JsonEncoder());
        $normalizer = new ObjectNormalizer();
        $normalizer->setCircularReferenceLimit(2);

        // Add Circular reference handler
        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object->getId();
        });
        $normalizers = array($normalizer);
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($consoles, 'json');

        
        $response = new Response($jsonContent);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }
}
