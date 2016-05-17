<?php
/**
 * Created by PhpStorm.
 * User: Iulia Alexandra
 * Date: 3/10/2016
 * Time: 12:22 PM
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;

use Symfony\Component\Form\Forms;
use Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationExtension;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Form\UserType;


class UserController extends Controller
{
    public function listAction()
    {
        $users=$this->getDoctrine()
            ->getRepository('AppBundle:User')
            ->findAll();
        ;

        return $this->render('user/index.html.twig', array ('users'=>$users));
    }

    public function editAction($id,Request $request)
    {

            $em = $this->getDoctrine()->getManager();
            $user = $em->getRepository('AppBundle:User')->find($id);
            $editform = $this-> createUserForm($user,$this->generateUrl('users.edit', array('id'=>$id)));
            $editform->handleRequest($request);
        if($editform->isValid()) {


            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('users.list');
        }

        return $this->render('user/edit.html.twig', array('editform' => $editform->createView()));


    }

    private function createUserForm(User $entity, $action)
    {
        $form = $this->createForm(
            UserType::class,
            $entity,
            array(
                'action' => $action,
                'method' => 'POST'
            )
        );

        $form->add('save', SubmitType::class, array('label'=>'Post'));
        return $form;

    }


}