<?php

namespace CWF\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WelcomeController extends Controller
{
    public function indexAction()
    {
        /*
         * The action's view can be rendered using render() method
         * or @Template annotation as demonstrated in DemoController.
         */
         
//		 $user = new \CWF\UserBundle\Entity\User();
	//	$user->setUsername('test');
//$user = $container->get('');			
//		 print_r($user->getUsername());
  print_r($this->get('security.context')->getToken()->getUser()); //get the user object!
        return $this->render('CWFCoreBundle:Welcome:index.html.twig');
    }
}
