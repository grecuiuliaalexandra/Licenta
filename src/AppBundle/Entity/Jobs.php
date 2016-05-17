<?php
/**
 * Created by PhpStorm.
 * User: Iulia Alexandra
 * Date: 3/13/2016
 * Time: 1:36 PM
 */

namespace AppBundle\Entity;

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="jobs")
 */

class Jobs
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
     * @ORM\ManyToOne(targetEntity="Departments", inversedBy="jobs")
     * @ORM\JoinColumn(name="id_department", referencedColumnName="id")
     **/
    protected $idDepartament;


    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $name;





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
     * @return Job
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
     * Set idDepartament
     *
     * @param \AppBundle\Entity\Department $idDepartament
     *
     * @return Job
     */
    public function setIdDepartament(\AppBundle\Entity\Department $idDepartament = null)
    {
        $this->idDepartament = $idDepartament;

        return $this;
    }

    /**
     * Get idDepartament
     *
     * @return \AppBundle\Entity\Department
     */
    public function getIdDepartament()
    {
        return $this->idDepartament;
    }
}
