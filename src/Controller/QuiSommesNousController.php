<?php


namespace App\Controller;

use App\Entity\Page;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuiSommesNousController extends AbstractController
{
    #[Route('/quisommesnous', name: 'quisommesnous')]
    public function index(EntityManagerInterface $em): Response
    {
        // Récupérer la page avec le slug 'accueil'
        $page = $em->getRepository(Page::class)->findOneBy(['slug' => 'quisommesnous']);

        if (!$page) {
            throw $this->createNotFoundException('La page d\'accueil n\'a pas été trouvée.');
        }

        // Rendre le template avec la page
        return $this->render('page/quisommesnous.html.twig', [
            'page' => $page,
        ]);
    }
}
