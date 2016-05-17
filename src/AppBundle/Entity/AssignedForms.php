<?php
/**
 * Created by PhpStorm.
 * User: Iulia Alexandra
 * Date: 3/13/2016
 * Time: 3:29 PM
 */

namespace AppBundle\Entity;

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="assigned_forms")
 */

class AssignedForms
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
     * @ORM\ManyToOne(targetEntity="Evaluations", inversedBy="assignedForms")
     * @ORM\JoinColumn(name="id_evaluation", referencedColumnName="id")
     **/
    protected $idEvaluation;

    /**
     * @ORM\ManyToOne(targetEntity="CompetencesGroup", inversedBy="assignedForms")
     * @ORM\JoinColumn(name="id_form", referencedColumnName="id")
     **/
    protected $idForm;


    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="evaluatees")
     * @ORM\JoinColumn(name="id_evaluatee", referencedColumnName="id")
     **/
    protected $idEvaluatee;


    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="evaluators")
     * @ORM\JoinColumn(name="id_evaluator", referencedColumnName="id")
     **/
    protected $idEvaluator;


    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Results", mappedBy="id_assigned_form")
     */

    protected $results;




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
     * Set idEvaluation
     *
     * @param \AppBundle\Entity\Evaluations $idEvaluation
     *
     * @return AssignedForms
     */
    public function setIdEvaluation(\AppBundle\Entity\Evaluations $idEvaluation = null)
    {
        $this->idEvaluation = $idEvaluation;

        return $this;
    }

    /**
     * Get idEvaluation
     *
     * @return \AppBundle\Entity\Evaluations
     */
    public function getIdEvaluation()
    {
        return $this->idEvaluation;
    }

    /**
     * Set idForm
     *
     * @param \AppBundle\Entity\CompetencesGroup $idForm
     *
     * @return AssignedForms
     */
    public function setIdForm(\AppBundle\Entity\CompetencesGroup $idForm = null)
    {
        $this->idForm = $idForm;

        return $this;
    }

    /**
     * Get idForm
     *
     * @return \AppBundle\Entity\CompetencesGroup
     */
    public function getIdForm()
    {
        return $this->idForm;
    }

    /**
     * Set idEvaluatee
     *
     * @param \AppBundle\Entity\User $idEvaluatee
     *
     * @return AssignedForms
     */
    public function setIdEvaluatee(\AppBundle\Entity\User $idEvaluatee = null)
    {
        $this->idEvaluatee = $idEvaluatee;

        return $this;
    }

    /**
     * Get idEvaluatee
     *
     * @return \AppBundle\Entity\User
     */
    public function getIdEvaluatee()
    {
        return $this->idEvaluatee;
    }

    /**
     * Set idEvaluator
     *
     * @param \AppBundle\Entity\User $idEvaluator
     *
     * @return AssignedForms
     */
    public function setIdEvaluator(\AppBundle\Entity\User $idEvaluator = null)
    {
        $this->idEvaluator = $idEvaluator;

        return $this;
    }

    /**
     * Get idEvaluator
     *
     * @return \AppBundle\Entity\User
     */
    public function getIdEvaluator()
    {
        return $this->idEvaluator;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->results = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add result
     *
     * @param \AppBundle\Entity\Results $result
     *
     * @return AssignedForms
     */
    public function addResult(\AppBundle\Entity\Results $result)
    {
        $this->results[] = $result;

        return $this;
    }

    /**
     * Remove result
     *
     * @param \AppBundle\Entity\Results $result
     */
    public function removeResult(\AppBundle\Entity\Results $result)
    {
        $this->results->removeElement($result);
    }

    /**
     * Get results
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getResults()
    {
        return $this->results;
    }
}
