<?php
/**
 * Created by PhpStorm.
 * User: Iulia Alexandra
 * Date: 3/13/2016
 * Time: 3:49 PM
 */

namespace AppBundle\Entity;


namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="results")
 */

class Results
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
     * @ORM\ManyToOne(targetEntity="AssignedForms", inversedBy="results")
     * @ORM\JoinColumn(name="id_assigned_form", referencedColumnName="id")
     **/
    protected $isAssignedForm;



    /**
     * @ORM\OneToOne(targetEntity="Competences")
     * @ORM\JoinColumn(name="id_competence", referencedColumnName="id")
     */
    protected $idCompetence;

    /**
     * @var int
     *
     * @ORM\Column(type="integer", length=10, nullable=true)
     */

    protected $grade;



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
     * Set isAssignedForm
     *
     * @param \AppBundle\Entity\AssignedForms $isAssignedForm
     *
     * @return Results
     */
    public function setIsAssignedForm(\AppBundle\Entity\AssignedForms $isAssignedForm = null)
    {
        $this->isAssignedForm = $isAssignedForm;

        return $this;
    }

    /**
     * Get isAssignedForm
     *
     * @return \AppBundle\Entity\AssignedForms
     */
    public function getIsAssignedForm()
    {
        return $this->isAssignedForm;
    }

    /**
     * Set idCompetence
     *
     * @param \AppBundle\Entity\Competences $idCompetence
     *
     * @return Results
     */
    public function setIdCompetence(\AppBundle\Entity\Competences $idCompetence = null)
    {
        $this->idCompetence = $idCompetence;

        return $this;
    }

    /**
     * Get idCompetence
     *
     * @return \AppBundle\Entity\Competences
     */
    public function getIdCompetence()
    {
        return $this->idCompetence;
    }

    /**
     * Set grade
     *
     * @param integer $grade
     *
     * @return Results
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * Get grade
     *
     * @return integer
     */
    public function getGrade()
    {
        return $this->grade;
    }
}
