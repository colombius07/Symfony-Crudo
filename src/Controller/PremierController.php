<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PremierController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function index(Request $request): Response
    {
        $greet = '';
        if ($name = $request->query->get('hello')) {
            $greet = sprintf('<h1>Bienvenu dans la fondation SCP  %s!</h1>', htmlspecialchars($name));
        }
        dump($request);
        return new Response(<<<EOF
            <html>
                <body>
                $greet
                    <img src="/images/under-construction.gif" />
                </body>
            </html>
        EOF
        );
    }
}
