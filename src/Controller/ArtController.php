<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Art;
use Symfony\Contracts\Translation\TranslatorInterface;

class ArtController extends AbstractController
{
	
	public function index(Request $request){
		return $this->redirectToRoute('core_homepage',array(
				'_locale' => $request->getLocale()
		));
	}
	
	
	
	public function listOil(TranslatorInterface $translator)
	{
		
		$arts = $this->getDoctrine()->getRepository(Art::class)->findBy(array(
				'medium' => 'Oil'
		));
		
		return $this->render('art/list.html.twig',array(
				"arts" => $arts,
				"title" => $translator->trans('art.medium.oil')
		));
	}
	
	public function listMix(TranslatorInterface $translator)
	{
		
		$arts = $this->getDoctrine()->getRepository(Art::class)->findBy(array(
				'medium' => 'Mix'
		));
		
		return $this->render('art/list.html.twig',array(
				"arts" => $arts,
				"title" => $translator->trans('art.medium.mix')
		));
	}
	
	public function listDrawing(TranslatorInterface $translator)
	{
		
		$arts = $this->getDoctrine()->getRepository(Art::class)->findBy(array(
				'medium' => 'Drawing'
		));
		
		return $this->render('art/list.html.twig',array(
				"arts" => $arts,
				"title" => $translator->trans('art.medium.drawing')
		));
	}
	
	public function show()
	{
		return $this->render('liip/show.html.twig');
	}
}