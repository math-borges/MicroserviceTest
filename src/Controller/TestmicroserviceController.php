<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Repository\CustomerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class TestmicroserviceController extends AbstractController
{
    #[Route('/testmicroservice/customers/customer/create', name: 'app_testmicroservice_customers_customer_create', methods:['POST'])]
    public function createCustomer(Request $request, CustomerRepository $customerRepository): JsonResponse
    {

        // dd('coucou');
        $data = json_decode($request->getContent(), true);

        $customer = new Customer();

        $customer   ->setFirstname($data['firstname'])
                    ->setLastname($data['lastname']);

        $customerRepository->save($customer, true);

        return $this->json($customer, 200, []);
        
    }  
    
    #[Route('/testmicroservice/customers', name: 'app_testmicroservice_customers')]
    public function getCustomers(CustomerRepository $customerRepository): JsonResponse
    {
        $customers = $customerRepository->findAll();
        return $this->json($customers, 200, []);
        
    }
    
    #[Route('/testmicroservice/customers/customer/delete/{id}', name: 'app_testmicroservice_customers_customer_delete', methods:['DELETE'])]
    public function deleteCustomer(Customer $customer, CustomerRepository $customerRepository): JsonResponse
    {
        $customerRepository->remove($customer, true);

        return $this->json('Supprimé', 200, []);
    }

    #[Route('/testmicroservice/customers/customer/edit/{id}', name: 'app_testmicroservice_customers_customer_update', methods:['PUT'])]
    public function updateCustomer(Customer $customer, Request $request, CustomerRepository $customerRepository): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $customer   ->setFirstname($data['firstname'])
                    ->setLastname($data['lastname']);

        $customerRepository->save($customer, true);

        return $this->json(['message' => 'Modifié'], 200, []);
    }

    #[Route('/testmicroservice/customers/customer/{id}', name: 'app_testmicroservice_customers_customer')]
    public function getCustomer(Customer $customer): JsonResponse
    {
        return $this->json($customer, 200, []);
        
    }
}
