<?php
/**
 * Created by PhpStorm.
 * User: Iulia Alexandra
 * Date: 4/5/2016
 * Time: 10:55 AM
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Evaluations;
use Symfony\Component\Form\Forms;
use Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationExtension;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Form\EvaluationType;
use \DateTime;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class EvaluationController extends Controller
{
    public function createAction(Request $request)
    {
        $evaluation = new Evaluations();

        $form = $this->createAddForm($evaluation, $this->generateUrl('evaluation.create'));

        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $name = $form['name']->getData();

            $evaluation->setName($name);

            $sDate = $form['startDate']->getData();
          //  $startDate = new DateTime($sdate . ' 00:00');
            $evaluation->setStartDate($sDate);


            $fDate = $form['finishDate']->getData();
           // $finishDate = new DateTime($fdate . ' 00:00');
            $evaluation->setFinishDate($fDate);


            $em->persist($evaluation);
            $em->flush();
            return $this->redirectToRoute('form.list',array('id' =>$evaluation->getId() ));

        }
        return $this->render('evaluation/create.html.twig', array('form'=>$form->createView()));
    }

        private function createAddForm(Evaluations $entity, $action){
        $form=$this->createForm(
            EvaluationType::class,
            $entity,
            array (
                'action'=>$action,
                'method'=>'POST'
            )
        );

        $form->add('save', SubmitType::class, array('label'=>'Post'));
        return $form;
    }

}