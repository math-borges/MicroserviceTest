<?php
namespace App\Controller;

use App\Entity\Customer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TestmicroserviceController extends AbstractController
{
    #[Route('/testmicroservice/{id}', name: 'app_testmicroservice')]
    public function index(Customer $customer): JsonResponse
    {
        return $this->json($customer, 200, []);
        
    }
}
