<?php


namespace App\Controller;

use App\Entity\Page;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServicesController extends AbstractController
{
    #[Route('/services', name: 'services')]
    public function index(EntityManagerInterface $em): Response
    {
        // Récupérer la page avec le slug 'accueil'
        $page = $em->getRepository(Page::class)->findOneBy(['slug' => 'services']);

        if (!$page) {
            throw $this->createNotFoundException('La page d\'accueil n\'a pas été trouvée.');
        }

        // Rendre le template avec la page
        return $this->render('page/services.html.twig', [
            'page' => $page,
        ]);
    }
}
