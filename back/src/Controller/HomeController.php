<?php

namespace App\Controller;

use App\Entity\Pizzas;
use App\Services\SerializerServices;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\{HttpFoundation\Response, Routing\Annotation\Route};
#[Route('/', name: 'home.')]
class HomeController extends AbstractController
{
    #[Route(name: 'index')]
    public function index(SerializerServices $serializerServices): Response
    {
        $response = new Response();
        $response->headers->set('Content-Type','application/json');
        $responseObject = [
            "data" => [
                "message" => "Welcome to your new controller!",
                "path" => "src/Controller/HomeController.php"
            ],
            "status_code" => $response->getStatusCode()
        ];
        $response->setContent($serializerServices->serializedObject($responseObject));
        return $response;
    }
    #[Route('/pizzas', name: 'pizzas')]
    public function allPizzas(SerializerServices $serializerServices, ManagerRegistry $doctrine): Response
    {
        $response = new Response();
        $response->headers->set('Content-Type','application/json');
        $responseObject = [
            "data" => $doctrine->getRepository(Pizzas::class)->findAll(),
            "status_code" => $response->getStatusCode()
        ];
        $response->setContent($serializerServices->serializedObject($responseObject));
        return $response;
    }
}
