<?php

namespace App\Controller;

use App\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route; 
use Doctrine\ORM\EntityManagerInterface;

class ReadClientController extends AbstractController
{
    private $entityManager; // Déclarez une propriété privée pour stocker l'EntityManager
    private $client = null;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager; // Injectez l'EntityManager via le constructeur
    }

    #[Route('/client', name: 'app_read_client')]
    public function index()
    {  
        // Utilisez maintenant $this->entityManager pour accéder à Doctrine
        $clients = $this->entityManager->getRepository(Client::class)->findAll();

        // Définir une valeur par défaut pour $client si vous êtes dans la liste complète des clients
        
        return $this->render('read_client/index.html.twig', compact('clients'));
    }
    
    #[Route('/client/{ncli}', name: 'client_detail')]
    public function show($ncli)
    {
        // Récupérez le client à partir de la base de données en utilisant $ncli
        $clients = $this->entityManager->getRepository(Client::class)->findOneBy(['ncli' => $ncli]);

        if (!$clients) {
            throw $this->createNotFoundException('Client non trouvé');
        }

        // Utilisez $client dans votre vue ou votre logique de contrôleur
        return $this->render('read_client/detail.html.twig', compact('clients'));
    }
}