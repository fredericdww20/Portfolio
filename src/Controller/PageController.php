<?php


namespace App\Controller;

use App\Entity\Page;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    #[Route('/{slug}', name: 'page_show')]
    public function show(Page $page): Response
    {
// Récupérer les éléments de contenu par ID
        $contentElements = [];
        foreach ($page->getContentElements() as $element) {
            $contentElements[$element->getId()] = $element; // Utilise l'ID unique de l'élément
        }

        return $this->render('page/accueil.html.twig', [
            'page' => $page,
            'contentElements' => $contentElements,
        ]);
    }
}
