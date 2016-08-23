<?php

namespace Batis\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Batis\CrowdsourcingBundle\Entity\Project;
use Batis\CrowdsourcingBundle\Form\ProjectType;
use Symfony\Component\HttpFoundation\Request;

class CoreController extends Controller
{
    public function indexAction()
    {
        return $this->render('BatisCoreBundle:Core:index.html.twig');
    }

    public function addProjectAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();

    	$projet = new Project();

    	$form = $this->createForm(ProjectType::class, $projet);

    	if($request->isMethod('POST'))
    	{
    		$form->handleRequest($request);

    		if($form->isValid())
    		{
    			
    			$em->persist($projet);

    			return $this->redirectToRoute('batis_crowdsourcing_homepage');
    		}
    	}
    	return $this->render('BatisCoreBundle:Core:addProject.html.twig', array('form' => $form->createView() ));

    }
}
