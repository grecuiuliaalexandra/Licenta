<?php
/**
 * Created by PhpStorm.
 * User: Iulia Alexandra
 * Date: 3/13/2016
 * Time: 1:49 PM
 */

namespace AppBundle\Entity;
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="roles")
 */

class Roles
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
     * @ORM\OneToMany(targetEntity="CompetencesGroup", mappedBy="role")
     */

    protected $forms;


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
     * @return Roles
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
        $this->forms = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add form
     *
     * @param \AppBundle\Entity\CompetencesGroup $form
     *
     * @return Roles
     */
    public function addForm(\AppBundle\Entity\CompetencesGroup $form)
    {
        $this->forms[] = $form;

        return $this;
    }

    /**
     * Remove form
     *
     * @param \AppBundle\Entity\CompetencesGroup $form
     */
    public function removeForm(\AppBundle\Entity\CompetencesGroup $form)
    {
        $this->forms->removeElement($form);
    }

    /**
     * Get forms
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getForms()
    {
        return $this->forms;
    }
}
