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
			$arg1 = (float)$form->get('arg1')->getData();
			$arg2 = (float)$form->get('arg2')->getData();
			$sign = $form->get('sign')->getData();
			
			if ($sign == '/' && $arg2 == 0) {
				$resultStr = 'Делить на ноль нельзя!';
			} 
			else{
				$result = match($sign){
					'+' => $calculator -> addition($arg1, $arg2),
					'-' => $calculator -> subtraction($arg1, $arg2),
					'*' => $calculator -> multiplication($arg1, $arg2),
					'/' => $calculator -> division($arg1, $arg2),				
				};
				$arg1 = (string)$arg1;
				$arg2 = (string)$arg2;
				
				$resultStr = $arg1.' '.$sign.' '.$arg2." = ".$result;
			}
			
			return $this->render('calculator/index.html.twig', [
				'form' => $form->createView(),
				'result' => $resultStr,
			]);
        }

		return $this->render('calculator/index.html.twig', [
			'form' => $form->createView(),
			'result' => '',
        ]);
    }
}
