<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ExceptionController extends AbstractController
{
    /**
     * @Route("/_error/{statusCode}", name="exception")
     */
    public function showException(Request $request)
    {
        $statusCode = $request->query->get('statusCode');
        return $this->render('bundles/TwigBundle/Exception/error404.html.twig', [
            'status_code' => "404",
            'status_text' => "Pas trouvé"
        ]);
    }
}
