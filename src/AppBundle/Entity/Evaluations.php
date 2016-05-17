<?php
/**
 * Created by PhpStorm.
 * User: Iulia Alexandra
 * Date: 3/13/2016
 * Time: 1:58 PM
 */

namespace AppBundle\Entity;

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="evaluations")
 */

class Evaluations
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
     *
     * @ORM\Column(type="date",nullable=false)
     */
    protected $startDate;

    /**
     *
     * @ORM\Column(type="date",nullable=false)
     */
    protected $finishDate;


    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Bonuses", mappedBy="id_evaluation")
     */

    protected $bonuses;



    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="AssignedForms", mappedBy="id_evaluation")
     */

    protected $assignedForms;


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
     * @return Evaluations
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
     * Set startDate
     *
     * @param \Date $startDate
     *
     * @return Evaluations
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \Date
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set finishDate
     *
     * @param \Date $finishDate
     *
     * @return Evaluations
     */
    public function setFinishDate($finishDate)
    {
        $this->finishDate = $finishDate;

        return $this;
    }

    /**
     * Get finishDate
     *
     * @return \Date
     */
    public function getFinishDate()
    {
        return $this->finishDate;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->bonuses = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add bonus
     *
     * @param \AppBundle\Entity\Bonuses $bonus
     *
     * @return Evaluations
     */
    public function addBonus(\AppBundle\Entity\Bonuses $bonus)
    {
        $this->bonuses[] = $bonus;

        return $this;
    }

    /**
     * Remove bonus
     *
     * @param \AppBundle\Entity\Bonuses $bonus
     */
    public function removeBonus(\AppBundle\Entity\Bonuses $bonus)
    {
        $this->bonuses->removeElement($bonus);
    }

    /**
     * Get bonuses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBonuses()
    {
        return $this->bonuses;
    }

    /**
     * Add assignedForm
     *
     * @param \AppBundle\Entity\AssignedForms $assignedForm
     *
     * @return Evaluations
     */
    public function addAssignedForm(\AppBundle\Entity\AssignedForms $assignedForm)
    {
        $this->assignedForms[] = $assignedForm;

        return $this;
    }

    /**
     * Remove assignedForm
     *
     * @param \AppBundle\Entity\AssignedForms $assignedForm
     */
    public function removeAssignedForm(\AppBundle\Entity\AssignedForms $assignedForm)
    {
        $this->assignedForms->removeElement($assignedForm);
    }

    /**
     * Get assignedForms
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAssignedForms()
    {
        return $this->assignedForms;
    }
}
