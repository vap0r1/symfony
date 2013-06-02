<?php

namespace CWF\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WelcomeController extends Controller
{
    public function indexAction()
    {
        /*
         * The action's view can be rendered using render() method
         * or @Template annotation as demonstrated in CoreController.
         *
         */
        return $this->render('CWFCoreBundle:Welcome:index.html.twig');
    }
}
