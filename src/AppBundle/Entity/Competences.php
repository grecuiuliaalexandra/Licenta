<?php
/**
 * Created by PhpStorm.
 * User: Iulia Alexandra
 * Date: 3/13/2016
 * Time: 3:18 PM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CompetencesRepository")
 * @ORM\Table(name="competences")
 */


class Competences
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
    protected $question;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $formName;


    /**
     * @ORM\ManyToOne(targetEntity="CompetencesGroup", inversedBy="competences")
     * @ORM\JoinColumn(name="id_form", referencedColumnName="id")
     **/
    protected $competenceGroup;



    /**
     * @ORM\OneToOne(targetEntity="Results", mappedBy="idCompetence")
     */
    protected $result;



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
     * Set form name
     *
     * @param string $formName
     *
     * @return Competences
     */
    public function setFormName($formName)
    {
        $this->formName = $formName;

        return $this;
    }

    /**
     * Get form name
     *
     * @return string
     */
    public function getFormName()
    {
        return $this->formName;
    }

    /**
     * Set competenceGroup
     *
     * @param \AppBundle\Entity\CompetencesGroup $competenceGroup
     *
     * @return Competences
     */
    public function setCompetenceGroup(\AppBundle\Entity\CompetencesGroup $competenceGroup = null)
    {
        $this->competenceGroup = $competenceGroup;

        return $this;
    }

    /**
     * Get competenceGroup
     *
     * @return \AppBundle\Entity\CompetencesGroup
     */
    public function getCompetenceGroup()
    {
        return $this->competenceGroup;
    }

    /**
     * Set result
     *
     * @param \AppBundle\Entity\Results $result
     *
     * @return Competences
     */
    public function setResult(\AppBundle\Entity\Results $result = null)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * Get result
     *
     * @return \AppBundle\Entity\Results
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Set question
     *
     * @param string $question
     *
     * @return Competences
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        if (empty($this->formName)) {
            $this->formName = strtolower(str_replace(' ', '-', $this->question));
        }

        return $this;
    }

    /**
     * Get question
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->question;
    }
}
