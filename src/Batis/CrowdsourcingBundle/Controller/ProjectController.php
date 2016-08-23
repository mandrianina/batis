<?php

namespace Batis\CrowdsourcingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Batis\CrowdsourcingBundle\Entity\Project;
use Batis\CrowdsourcingBundle\Entity\Works;

use Batis\CrowdsourcingBundle\Form\ProjectType;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class ProjectController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	$projects = $em->getRepository('BatisCrowdsourcingBundle:Project')->findAll();
    	
        return $this->render('BatisCrowdsourcingBundle:Crowdsourcing:index.html.twig', array('projects' => $projects));
    }


    public function addAction(Request $request){
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
    	return $this->render('BatisCrowdsourcingBundle:Crowdsourcing:add.html.twig', array('form' => $form->createView() ));
    }



    public function viewAction($id){

    	$em = $this->getDoctrine()->getManager();

    	$projet = $em->getRepository("BatisCrowdsourcingBundle:Project")->find($id);

    	if (null === $projet)
    	{
    		throw new NotFoundHttpException("Le projet d'id : " .$id. " n'existe pas");
    		
    	}

    	return $this->render("BatisCrowdsourcingBundle:Crowdsourcing:view.html.twig", array('projet' => $projet ));

    }

    public function editAction($id){
        $em = $this->getDoctrine()->getManager();
        $projet = $em->getRepository("BatisCrowdsourcingBundle:Project")->find($id);
        if (null === $projet)
        {
            throw new NotFoundHttpException("Le projet d'id : " .$id. " n'existe pas");
            
        }
        $form = $this->createForm(ProjectType::class, $projet);

        return $this->render('BatisCrowdsourcingBundle:Crowdsourcing:edit.html.twig', array('form' => $form->createView() ));

    }
}
