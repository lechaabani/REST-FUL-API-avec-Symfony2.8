<?php

/**
 * This file defines the Article entity in the Bundle HCHDemoBundle for the REST API
 *
 * @category HCHDemoBundle
 * @package Entity
 * @author HCH <chaabani.hammadi@gmail.com>
 * @copyright 2016-2017 HCH
 * @version 1.0.0
 * @since File available since Release 1.0.0
 */
namespace HCH\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Article for API services
 *
 * @category HCHDemoBundle
 * @package Entity
 * @author HCH <chaabani.hammadi@gmail.com>
 * @copyright 2016-2017 HCH
 * @version 1.0.0
 * @since File available since Release 1.0.0
 *
 */
class Article
{
    
    /**
     * @var integer
     */
    private $id;

    /**
     * @Assert\NotBlank(message = "Title requis")
     * @ORM\Column(name="title", type="string")
     */
    private $title; 

    /**
     * @var string
     * @ORM\Column(name="body", type="string", nullable=true)
     */
    private $body;
    
    /**
     * @var string
     * @ORM\Column(name="lead", type="string", nullable=true)
     */
    private $lead;

    /** 
     * @ORM\Column(name="cretaed_at", type="\DateTime")
     */
    private $createdAt;

    /**
     * @var string
     * @Assert\NotBlank(message = "Slug requis")
     * @ORM\Column(name="slug", type="string")
     */
    private $slug;

    /**
     * @var string
     * @Assert\NotBlank(message = "Author requis")
     * @ORM\Column(name="created_by", type="string")
     */
    private $createdBy;

    public function __construct() {
        $this->createdAt = new \DateTime();
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
     *
     * @return Article
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
     * Set body
     *
     * @param string $body
     *
     * @return Article
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Set lead
     *
     * @param string $lead
     *
     * @return Article
     */
    public function setLead($lead)
    {
        $this->lead = $lead;

        return $this;
    }

    /**
     * Get lead
     *
     * @return string
     */
    public function getLead()
    {
        return $this->lead;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Article
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Article
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set createdBy
     *
     * @param string $createdBy
     *
     * @return Article
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }
}
