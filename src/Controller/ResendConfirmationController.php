<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\ConfirmationEmailSender;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResendConfirmationController extends AbstractController
{
    /**
     * @Route("/resend-confirmation", methods={"POST"})
     */
    public function resend(ConfirmationEmailSender $confirmationEmailSender)
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $user = $this->getUser();

        $confirmationEmailSender->send($user);

        return new Response(null, 204);
    }
}
