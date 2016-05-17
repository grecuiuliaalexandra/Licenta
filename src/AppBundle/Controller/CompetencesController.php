<?php
/**
 * Created by PhpStorm.
 * User: Iulia Alexandra
 * Date: 3/14/2016
 * Time: 10:42 AM
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Competences;

class CompetencesController extends Controller
{

    public function addAction($id)
    {
        return $this->render('bla/index.html.twig', array('id' => $id));
    }




}