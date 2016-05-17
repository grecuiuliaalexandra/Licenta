<?php
/**
 * Created by PhpStorm.
 * User: Iulia Alexandra
 * Date: 3/13/2016
 * Time: 2:11 PM
 */

namespace AppBundle\Entity;

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="bonuses")
 */
class Bonuses
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
     * @ORM\ManyToOne(targetEntity="Evaluations", inversedBy="bonuses")
     * @ORM\JoinColumn(name="id_evaluation", referencedColumnName="id")
     **/
    protected $idEvaluation;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="bonuses")
     * @ORM\JoinColumn(name="id_employee", referencedColumnName="id")
     **/
    protected $idEmployee;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    protected $value;






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
     * @return Bonuses
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
     * Set idEmployee
     *
     * @param \AppBundle\Entity\User $idEmployee
     *
     * @return Bonuses
     */
    public function setIdEmployee(\AppBundle\Entity\User $idEmployee = null)
    {
        $this->idEmployee = $idEmployee;

        return $this;
    }

    /**
     * Get idEmployee
     *
     * @return \AppBundle\Entity\User
     */
    public function getIdEmployee()
    {
        return $this->idEmployee;
    }

    /**
     * Set value
     *
     * @param integer $value
     *
     * @return Bonuses
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return integer
     */
    public function getValue()
    {
        return $this->value;
    }
}
