<?php

namespace App\Controller;

use App\Remote\LoggerRemote;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Psr\Container\NotFoundExceptionInterface;
use App\Remote\RemoteInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use function Symfony\Component\String\u;

final class RemoteController extends AbstractController
{
    #[Route('/', name: 'home', methods: ['GET', 'POST'])]
    public function index(Request $request, RemoteInterface $remote): Response
    {
        if ('POST' === $request->getMethod()) {
            try {
                $button = $request->request->getString('button');
                $remote->press($button);
            } catch (NotFoundExceptionInterface $e) {
                throw $this->createNotFoundException(sprintf('Button "%s" not found.', $button), previous: $e);
            }

            $this->addFlash('success', sprintf('%s pressed', u($button)->replace('-', ' ')->title(allWords: true)));

            return $this->redirectToRoute('home');
        }

        return $this->render('index.html.twig', ['buttons' => $remote->buttons()]);
    }
}
