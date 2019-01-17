<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class CoreController extends AbstractController
{
	public function number()
	{
		$number = random_int(0, 100);
		
		return $this->render('lucky/number.html.twig', [
				'number' => $number,
		]);
	}
	
	public function liip()
	{
		return $this->render('liip/liip.html.twig');
	}
}