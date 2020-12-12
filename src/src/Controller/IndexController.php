<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Offer;

use Omines\DataTablesBundle\Column\TextColumn;
use Omines\DataTablesBundle\DataTableFactory;
use Omines\DataTablesBundle\Adapter\Doctrine\ORMAdapter;


class IndexController extends AbstractController
{
	/**
	* @Route("/")
	*/
	public function index(Request $request, DataTableFactory $dataTableFactory)
	    {
	        $table = $dataTableFactory->create()
				    ->add('image_url', TextColumn::class, ['label' => '', 'orderable'=>false])
				    ->add('id', TextColumn::class, ['label' => 'Id'])
				    ->add('name', TextColumn::class, ['label' => 'Name'])
				    ->add('cash_back', TextColumn::class, ['label' => 'Cash Back'])
				    ->createAdapter(ORMAdapter::class, [
				        'entity' => Offer::class,
				    ])->handleRequest($request);

				   if ($table->isCallback()) {
				       return $table->getResponse();
				   }

	        return $this->render('offers.html.twig', ['datatable' => $table]);
	    }


}