<?php

namespace CWF\AuthorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Genres
 */
/**
 * @ORM\Entity
 * @ORM\Table(name="cwf_genres")
 */
class Genres
{
	 private $stories;
	 
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	
	/**
     * @ORM\Column(type="boolean")
     */
    protected $type;
	
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
	
	public function addStory(Story $story)
    {
        $this->stories[] = $story;
    }


}