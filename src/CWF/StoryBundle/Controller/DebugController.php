<?php

namespace CWF\StoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
class DebugController extends Controller
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
//  print_r($this->get('security.context')->getToken()->getUser()); //get the user object!
//  		print $this->Utility->Upload2Html();
		//print \CWF\StoryBundle\Utility::upload2html();
		$story = new \CWF\StoryBundle\Entity\Story();
		//$genre1 = new \CWF\StoryBundle\Entity\Genres();
		$genre = $this->getDoctrine()
        ->getRepository('CWFStoryBundle:Genres')
        ->find('1');
		$story->setTitle('test')
				->setAuthorId('0')
				->setAgeRating('1')
				->setApproved('1')
				->setGenre('1');
		$story->addSubgenre($genre);
    $em = $this->getDoctrine()->getManager();
    $em->persist($story);
    $em->flush();
	//		$genre1->id = '1';
//		$genre1->setName("test");
//    $story = $this->getDoctrine()
  //      ->getRepository('CWFStoryBundle:Story')
   //     ->find('1');
	
		print "<pre>";
		//print_r($story);
        //return $this->render('CWFCoreBundle:Welcome:index.html.twig');
		return new Response;
    }
	
	public function uploadAction()
	{
		return $this->render('CWFStoryBundle:Story:Upload.html.twig');
	}
}
