<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\HelloService;

#[Route('/api', name: 'api_')]
class HelloController extends AbstractController
{
    public function __construct(private HelloService $helloService)
    {
    }

    #[Route('/hello/{name}', name: 'hello', methods: ['GET'])]
    public function hello(string $name): Response
    {
        return new Response('Hello, ' . $name . '!');
    }

    #[Route('/prime/{number}', name: 'prime', methods: ['GET'])]
    public function isPrime(int $number): Response
    {
        if ($this->helloService->isPrime($number)) {
            return new Response('Число является простым');
        } else {
            return new Response('Число является составным');
        }
    }
}