<?php

namespace Batis\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CoreController extends Controller
{
    public function indexAction()
    {
        return $this->render('BatisCoreBundle:Core:index.html.twig');
    }
}
