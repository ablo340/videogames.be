<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ConsoleRepository;
use App\Entity\Console;

class ConsoleController extends AbstractController
{
    /**
     * @Route("/consoles", name="consoles")
     */
    //show all consoles
    public function Consoles(ConsoleRepository $repoConsole)
    {
        //Find all games
        $consoles = $repoConsole->findAll();

        return $this->render('home/console_list.html.twig', [
            'consoles' => $consoles
        ]);
    }

    /**
     * @Route("/console/{id}", name="console_show")
     */
    //show one console
    public function showOneConsole(Console $consoles)
    {
        return $this->render('home/console.html.twig', [
            'consoles' => $consoles
        ]);
    }
}
