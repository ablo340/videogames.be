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
    public function Consoles(ConsoleRepository $repoConsole) //show all consoles
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
    public function showOneConsole(Console $consoles) //show one console
    {
        return $this->render('home/console.html.twig', [
            'consoles' => $consoles
        ]);
    }
}
