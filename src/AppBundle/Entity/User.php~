<?php
/**
 * Created by PhpStorm.
 * User: Iulia Alexandra
 * Date: 3/9/2016
 * Time: 3:30 PM
 */

namespace AppBundle\Entity;


namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    protected $password;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="User", mappedBy="manager")
     */
    private $subordinates;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="subordinates")
     * @ORM\JoinColumn(name="manager_id", referencedColumnName="id", nullable=true)
     */
    protected $manager;



    /**
     * @ORM\OneToOne(targetEntity="EmployeeInfo", mappedBy="idUser")
     */
    protected $info;


    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Todo", mappedBy="author")
     */

    protected $todos;


    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Bonuses", mappedBy="id_evaluation")
     */

    protected $bonuses;


    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="AssignedForms", mappedBy="id_evaluatee")
     */

    protected $evaluatees;


    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="AssignedForms", mappedBy="id_evaluator")
     */

    protected $evaluators;




    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getManagerId()
    {
        return $this->managerId;
    }

    /**
     * @param mixed $managerId
     */
    public function setManagerId($managerId)
    {
        $this->managerId = $managerId;
    }






    /**
     * Add subordinate
     *
     * @param \AppBundle\Entity\User $subordinate
     *
     * @return User
     */
    public function addSubordinate(\AppBundle\Entity\User $subordinate)
    {
        $this->subordinates[] = $subordinate;

        return $this;
    }

    /**
     * Remove subordinate
     *
     * @param \AppBundle\Entity\User $subordinate
     */
    public function removeSubordinate(\AppBundle\Entity\User $subordinate)
    {
        $this->subordinates->removeElement($subordinate);
    }

    /**
     * Get subordinates
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubordinates()
    {
        return $this->subordinates;
    }

    /**
     * Set manager
     *
     * @param \AppBundle\Entity\User $manager
     *
     * @return User
     */
    public function setManager(\AppBundle\Entity\User $manager = null)
    {
        $this->manager = $manager;

        return $this;
    }

    /**
     * Get manager
     *
     * @return \AppBundle\Entity\User
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * Add todo
     *
     * @param \AppBundle\Entity\Todo $todo
     *
     * @return User
     */
    public function addTodo(\AppBundle\Entity\Todo $todo)
    {
        $this->todos[] = $todo;

        return $this;
    }

    /**
     * Remove todo
     *
     * @param \AppBundle\Entity\Todo $todo
     */
    public function removeTodo(\AppBundle\Entity\Todo $todo)
    {
        $this->todos->removeElement($todo);
    }

    /**
     * Get todos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTodos()
    {
        return $this->todos;
    }

    /**
     * Add bonus
     *
     * @param \AppBundle\Entity\Bonuses $bonus
     *
     * @return User
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
     * Add evaluatee
     *
     * @param \AppBundle\Entity\AssignedForms $evaluatee
     *
     * @return User
     */
    public function addEvaluatee(\AppBundle\Entity\AssignedForms $evaluatee)
    {
        $this->evaluatees[] = $evaluatee;

        return $this;
    }

    /**
     * Remove evaluatee
     *
     * @param \AppBundle\Entity\AssignedForms $evaluatee
     */
    public function removeEvaluatee(\AppBundle\Entity\AssignedForms $evaluatee)
    {
        $this->evaluatees->removeElement($evaluatee);
    }

    /**
     * Get evaluatees
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEvaluatees()
    {
        return $this->evaluatees;
    }

    /**
     * Add evaluator
     *
     * @param \AppBundle\Entity\AssignedForms $evaluator
     *
     * @return User
     */
    public function addEvaluator(\AppBundle\Entity\AssignedForms $evaluator)
    {
        $this->evaluators[] = $evaluator;

        return $this;
    }

    /**
     * Remove evaluator
     *
     * @param \AppBundle\Entity\AssignedForms $evaluator
     */
    public function removeEvaluator(\AppBundle\Entity\AssignedForms $evaluator)
    {
        $this->evaluators->removeElement($evaluator);
    }

    /**
     * Get evaluators
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEvaluators()
    {
        return $this->evaluators;
    }

    /**
     * Set info
     *
     * @param \AppBundle\Entity\EmployeeInfo $info
     *
     * @return User
     */
    public function setInfo(\AppBundle\Entity\EmployeeInfo $info = null)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info
     *
     * @return \AppBundle\Entity\EmployeeInfo
     */
    public function getInfo()
    {
        return $this->info;
    }
}
