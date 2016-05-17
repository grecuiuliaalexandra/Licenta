<?php
/**
 * Created by PhpStorm.
 * User: Iulia Alexandra
 * Date: 3/13/2016
 * Time: 1:32 PM
 */

namespace AppBundle\Entity;

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="departments")
 */
class Departments
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $name;




    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Jobs", mappedBy="id_department")
     */

    protected $jobs;




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
     * Set name
     *
     * @param string $name
     *
     * @return Department
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->jobs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add job
     *
     * @param \AppBundle\Entity\Jobs $job
     *
     * @return Department
     */
    public function addJob(\AppBundle\Entity\Jobs $job)
    {
        $this->jobs[] = $job;

        return $this;
    }

    /**
     * Remove job
     *
     * @param \AppBundle\Entity\Jobs $job
     */
    public function removeJob(\AppBundle\Entity\Jobs $job)
    {
        $this->jobs->removeElement($job);
    }

    /**
     * Get jobs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJobs()
    {
        return $this->jobs;
    }
}
