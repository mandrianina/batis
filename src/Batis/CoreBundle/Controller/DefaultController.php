<?php

namespace Batis\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BatisCoreBundle:Default:index.html.twig');
    }
}
