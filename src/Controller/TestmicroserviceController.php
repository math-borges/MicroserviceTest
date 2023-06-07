<?php
namespace App\Controller;

use App\Entity\Customer;
use App\Repository\CustomerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TestmicroserviceController extends AbstractController
{
    
    #[Route('/testmicroservice/customers', name: 'app_testmicroservice_customers')]
    public function getGustomers(CustomerRepository $customerRepository): JsonResponse
    {
        $customers = $customerRepository->findAll();
        return $this->json($customers, 200, []);
        
    }
    #[Route('/testmicroservice/customers/customer/{id}', name: 'app_testmicroservice_customers_customer')]
    public function getCustomer(Customer $customer): JsonResponse
    {
        return $this->json($customer, 200, []);
        
    }    
}
