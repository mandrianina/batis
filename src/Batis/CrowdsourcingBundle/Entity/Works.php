<?php

namespace Batis\CrowdsourcingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Works
 *
 * @ORM\Table(name="works")
 * @ORM\Entity(repositoryClass="Batis\CrowdsourcingBundle\Repository\WorksRepository")
 */
class Works
{

    public function __construct()
    {
        $this->projects = new ArrayCollection();
    }
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="projects", type="string", length=255)
     */
    private $projects;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set projects
     *
     * @param string $projects
     *
     * @return Works
     */
    public function setProjects($projects)
    {
        $this->projects = $projects;

        return $this;
    }

    /**
     * Get projects
     *
     * @return string
     */
    public function getProjects()
    {
        return $this->projects;
    }
}

