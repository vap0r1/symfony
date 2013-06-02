<?php

namespace CWF\StoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Code
 */
/**
 * @ORM\Entity
 * @ORM\Table(name="cwf_codes")
 */
class Code
{
	 private $stories;
	 
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	
	/**
     * @ORM\Column(type="string", length=5)
     */
    protected $shortName;
	
    /**
     * @ORM\Column(type="string", length=10)
     */
    protected $name;

   /**
     * @ORM\Column(type="text")
     */
    protected $description;

	
	public function __construct()
    {
        
        // your own logic
    }
	


}