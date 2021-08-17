<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function homepage()
    {
        return $this->render('main/homepage.html.twig');
    }

    /**
     * @Route("/about", name="app_about")
     */
    public function about()
    {
        return $this->render('main/about.html.twig');
    }
}
