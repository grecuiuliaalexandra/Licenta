<?php
/**
 * Created by PhpStorm.
 * User: Iulia Alexandra
 * Date: 3/13/2016
 * Time: 2:31 PM
 */

namespace AppBundle\Entity;


namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="competences_group")
 */

class CompetencesGroup
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
     * @ORM\ManyToOne(targetEntity="Roles", inversedBy="forms")
     * @ORM\JoinColumn(name="id_role", referencedColumnName="id")
     **/
    protected $role;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Competences", mappedBy="competenceGroup")
     */
    protected $competences;




    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="AssignedForms", mappedBy="competenceGroup")
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
     * @return CompetencesGroup
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
     * Set role
     *
     * @param \AppBundle\Entity\Roles $role
     *
     * @return CompetencesGroup
     */
    public function setRole(\AppBundle\Entity\Roles $role = null)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return \AppBundle\Entity\Roles
     */
    public function getRole()
    {
        return $this->role;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->competences = new ArrayCollection();
    }

    /**
     * Add competence
     *
     * @param \AppBundle\Entity\Competences $competence
     *
     * @return CompetencesGroup
     */
    public function addCompetence(\AppBundle\Entity\Competences $competence)
    {
        $this->competences[] = $competence;
        return $this;
    }

    /**
     * Remove competence
     *
     * @param \AppBundle\Entity\Competences $competence
     */
    public function removeCompetence(\AppBundle\Entity\Competences $competence)
    {
        $this->competences->removeElement($competence);
    }

    /**
     * Get competences
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCompetences()
    {
        return $this->competences;
    }

    /**
     * Add assignedForm
     *
     * @param \AppBundle\Entity\AssignedForms $assignedForm
     *
     * @return CompetencesGroup
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
