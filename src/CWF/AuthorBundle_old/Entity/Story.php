<?php
// src/CWF/StoryBundle/Entity/Story.php

namespace CWF\StoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
// ...
/**
 * @ORM\Entity
 * @ORM\Table(name="cwf_stories")
 */
class Story
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
	/**
     * @ORM\Column(type="string", length=100)
     */
	protected $title;
	
	/**
     * @ORM\Column(type="integer", length=6)
     */
	protected $author_id;
	
	/**
     * @ORM\Column(type="integer", length=1)
     */
	protected $age_rating;
	
	/**
     * @ORM\Column(type="integer", length=1)
     */
	protected $genre;
		
	/**
     * @ORM\ManyToMany(targetEntity="Genres")
     * @ORM\JoinTable(name="cwf_story_genres",
     *      joinColumns={@ORM\JoinColumn(name="story_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="genre_id", referencedColumnName="id")}
     *      )
     */
	protected $subgenres;
   	/**
     * @ORM\ManyToMany(targetEntity="Code")
     * @ORM\JoinTable(name="cwf_story_codes",
     *      joinColumns={@ORM\JoinColumn(name="story_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="code_id", referencedColumnName="id")}
     *      )
     */
	protected $codes;
        
    /**
     * @ORM\Column(type="text")
     */
	protected $content;
        
     /**
     * @ORM\Column(type="boolean")
     */
	protected $approved;

	   

    public function __construct()
    {
        
        // your own logic
    }
	
	
	public function addGenre(Genres $genre)
    {
        $genre->addStory($this); // synchronously updating inverse side
        $this->subgenres[] = $genre;
    }
	

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Story
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set author_id
     *
     * @param integer $authorId
     * @return Story
     */
    public function setAuthorId($authorId)
    {
        $this->author_id = $authorId;
    
        return $this;
    }

    /**
     * Get author_id
     *
     * @return integer 
     */
    public function getAuthorId()
    {
        return $this->author_id;
    }

    /**
     * Set age_rating
     *
     * @param integer $ageRating
     * @return Story
     */
    public function setAgeRating($ageRating)
    {
        $this->age_rating = $ageRating;
    
        return $this;
    }

    /**
     * Get age_rating
     *
     * @return integer 
     */
    public function getAgeRating()
    {
        return $this->age_rating;
    }

    /**
     * Set approved
     *
     * @param boolean $approved
     * @return Story
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;
    
        return $this;
    }

    /**
     * Get approved
     *
     * @return boolean 
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * Add subgenres
     *
     * @param \CWF\StoryBundle\Entity\Genres $subgenres
     * @return Story
     */
    public function addSubgenre(\CWF\StoryBundle\Entity\Genres $subgenres)
    {
        $this->subgenres[] = $subgenres;
    
        return $this;
    }

    /**
     * Remove subgenres
     *
     * @param \CWF\StoryBundle\Entity\Genres $subgenres
     */
    public function removeSubgenre(\CWF\StoryBundle\Entity\Genres $subgenres)
    {
        $this->subgenres->removeElement($subgenres);
    }

    /**
     * Get subgenres
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubgenres()
    {
        return $this->subgenres;
    }
	

    /**
     * Set genre
     *
     * @param integer $genre
     * @return Story
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    
        return $this;
    }

    /**
     * Get genre
     *
     * @return integer 
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Story
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Add codes
     *
     * @param \CWF\StoryBundle\Entity\Code $codes
     * @return Story
     */
    public function addCode(\CWF\StoryBundle\Entity\Code $codes)
    {
        $this->codes[] = $codes;
    
        return $this;
    }

    /**
     * Remove codes
     *
     * @param \CWF\StoryBundle\Entity\Code $codes
     */
    public function removeCode(\CWF\StoryBundle\Entity\Code $codes)
    {
        $this->codes->removeElement($codes);
    }

    /**
     * Get codes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCodes()
    {
        return $this->codes;
    }
}