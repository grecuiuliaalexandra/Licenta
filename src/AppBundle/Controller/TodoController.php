<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Todo;
use Symfony\Component\Form\Forms;
use Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationExtension;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Form\TodoType;
use \DateTime;


class TodoController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function listAction()
    {
        $todos=$this->getDoctrine()
            ->getRepository('AppBundle:Todo')
            ->findAll();
        ;

        return $this->render('todo/index.html.twig', array ('todos'=>$todos));
    }
    public function createAction(Request $request)
    {
        $todo= new Todo;
        $form = $this-> createAddTodoForm($todo, $this->generateUrl('todos.create'));


        $form->handleRequest($request);
        if( $form->isValid())
        {
            $user = $this->get('security.token_storage')->getToken()->getUser();
            $em=$this->getDoctrine()->getManager();

            $fdate = $form['finishdate']->getData();
            $finishDate=new DateTime($fdate.' 00:00');
            $todo->setAuthor($user);
            $todo->setFinishDate( $finishDate);
            $todo->setStartDate(new DateTime('now'));


            $em->persist($todo);
            $em->flush();
            return $this->redirectToRoute('todos.index');

        }

        return $this->render('todo/create.html.twig', array('form'=>$form->createView()));
    }
    public function editAction($id,Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $todo = $em->getRepository('AppBundle:Todo')->find($id);

        $editform = $this-> createAddTodoForm($todo,$this->generateUrl('todos.edit', array('id'=>$id)) );
        $editform->handleRequest($request);

        if( $editform->isValid()) {

            $name = $editform['name']->getData();
            $todo->setName($name);

            $em->persist($todo);
            $em->flush();
            return $this->redirectToRoute('todos.index');
        }

        return $this->render('todo/edit.html.twig', array('editform'=>$editform->createView()));

    }
    public function detailsAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $todo = $em->getRepository('AppBundle:Todo')->find($id);
        return $this->render('todo/details.html.twig', array('description'=>$todo->getDescription(), 'author'=>$todo->getAuthor(), 'finishDate'=>  date_format($todo->getFinishDate(),"Y/m/d H:i")));
    }
    public function deleteAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $todo=$em->getRepository('AppBundle:Todo')->find($id);
        $em->remove($todo);
        $em->flush();
        $this->addFlash('notice','Todo removed');
        return $this->redirectToRoute('todos.index');
    }

    private function createAddTodoForm(Todo $entity, $action){
        $form=$this->createForm(
           TodoType::class,
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
