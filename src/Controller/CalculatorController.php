<?php

namespace App\Controller;

use App\Entity\Calculator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Form\CalcType;
use Symfony\Component\Routing\Annotation\Route;

class CalculatorController extends AbstractController
{
    
    #[Route('/', name: 'app_index')]
    public function index(Request $request): Response
    {
        $calculator = new Calculator();
		$form = $this->createForm(CalcType::class, $calculator);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $calculator = $form->getData();
        }

		return $this->render('calculator/index.html.twig', [
			'form' => $form->createView(),
        ]);
    }
	
	#[Route('/calculator', name: 'app_calculator')]
    public function calculator(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/CalculatorController.php',
        ]);
    }
}
