<?php
/**
 * Created by PhpStorm.
 * User: Iulia Alexandra
 * Date: 3/15/2016
 * Time: 11:33 AM
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\CompetencesGroup;
use AppBundle\Entity\Competences;
use AppBundle\Entity\Results;
use Symfony\Component\Form\Forms;
use Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationExtension;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Form\CompetencesGroupType;
use \DateTime;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class CompetencesGroupController extends Controller
{
    public function listAction()
    {
        $competencesGroups=$this->getDoctrine()
            ->getRepository('AppBundle:CompetencesGroup')
            ->findAll();
        ;
        $id=$_GET['id'];
        return $this->render('form/list.html.twig', array ('competencesGroups'=>$competencesGroups, 'id'=>$id));
    }




    public function createAction(Request $request)
    {
        $competencesGroup= new CompetencesGroup();
        $competence1=new Competences();
        $competence2=new Competences();
        $competencesGroup->getCompetences()->add($competence1);
        $competencesGroup->getCompetences()->add($competence2);
        $form = $this-> createAddForm($competencesGroup, $this->generateUrl('form.create'));


        $form->handleRequest($request);
        if( $form->isValid())
        {

            $em=$this->getDoctrine()->getManager();

            $name = $form['name']->getData();
            
            $competencesGroup->setName($name);

            $em->persist($competencesGroup);



            $competence1->setCompetenceGroup($competencesGroup);
            $competence2->setCompetenceGroup($competencesGroup);

            $em->persist($competence1);
            $em->persist($competence2);



            $em->flush();
            $competencesGroupId=$competencesGroup->getId();

            return $this->redirectToRoute('competences.create',array('id' =>  $competencesGroupId ));

        }

        return $this->render('form/create.html.twig', array('form'=>$form->createView()));
    }

    private function createAddForm(CompetencesGroup $entity, $action){
        $form=$this->createForm(
            CompetencesGroupType::class,
            $entity,
            array (
                'action'=>$action,
                'method'=>'POST'
            )
        );

        $form->add('save', SubmitType::class, array('label'=>'Post'));
        return $form;
    }

    public function completeFormAction(Request $request)
    {
        $entityManager = $this->container->get('doctrine.orm.entity_manager');
        $competencesGroupRepo = $entityManager->getRepository('AppBundle:CompetencesGroup');
        $competenceGroup = $competencesGroupRepo->findOneBy(array('name' => 'falala1'));
        $form = $this->createFormBuilder();

        foreach ($competenceGroup->getCompetences() as $competence) {

            $form->add($competence->getFormName(), ChoiceType::class, array(
                'label' => $competence->getQuestion(),
                'choices' => array(1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10),
                'expanded' => true,
                'multiple' => false,
            ));
        }

        $form = $form->getForm();

        $form->handleRequest($request);
        if ($form->isValid()) {
            $data = $form->getData();
            foreach ($data as $key=>$value)
            {
                $competenceRepo = $entityManager->getRepository('AppBundle:Competences');
                $assignedFormsRepo = $entityManager->getRepository('AppBundle:AssignedForms');
                $result= new Results();
                $competence = $competenceRepo->findOneBy(array('question' => $key));
                $assignedForm = $assignedFormsRepo->findOneBy(array('id' => 1));
        //        dump($key);
                $result->setIdCompetence($competence);
                $result->setIsAssignedForm($assignedForm);
                $result->setGrade($data[$key]);
                $entityManager->persist($result);
                $entityManager->flush();


                dump($assignedForm);
                dump($competence);

            }
     //       dump( $data["falalala3"]);
            die;

        }
       // dump( $data);
       // dump($request);
      //  dump($form->isValid());
      //  dump($form->getData());



        return $this->render('form/complete.html.twig', array('form' => $form->createView()));
    }

    public function assignAction()
    {
        $entityManager = $this->container->get('doctrine.orm.entity_manager');
        $departmentsRepo = $entityManager->getRepository('AppBundle:Departments');
        $departments =  $departmentsRepo->findAll();

        $arrayCollection = array();


        $departmentNameList=array();

        foreach ($departments as $dept)
        {
            $departmentNameList[]=array(
                'id' => $dept->getId(),
                'name' => $dept->getName(),
            );

        }
        $response = new JsonResponse();


        $response->setData(array(
            'data' => $departmentNameList
        ));
        return $response;

//
//        $departmentNameList = $this->get('serializer')->serialize($departmentNameList, 'json');
////        $x='falala';
////        $x = $this->get('serializer')->serialize($x, 'json');
//
//        $response = new Response($departmentNameList);
////        $response = new Response($x);
//
//        $response->headers->set('Content-Type', 'application/json');
//        return $response;


    }

}