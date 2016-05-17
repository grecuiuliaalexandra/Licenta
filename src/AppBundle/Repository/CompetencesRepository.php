<?php
/**
 * Created by PhpStorm.
 * User: Iulia Alexandra
 * Date: 3/14/2016
 * Time: 10:45 AM
 */

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;


class CompetencesRepository extends EntityRepository
{
    public function findByCustom()
    {
        $competences=$this->findByIdForm(2);
       $competencesData=array();

        foreach ($competences as $competence)
       {
           array_push($competencesData,array('id' => $competence->getId(),'name' =>$competence->getName()) );
       }

        return $competencesData;
    }
}