<?php
/**
 * Created by PhpStorm.
 * User: Iulia Alexandra
 * Date: 3/23/2016
 * Time: 8:29 PM
 */

namespace AppBundle\Controller;



//use Doctrine\DBAL\Types\TextType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;

class CiornaController extends Controller
{

    public function listAction(Request $request)
    {
        $entityManager = $this->container->get('doctrine.orm.entity_manager');
        $competencesGroupRepo = $entityManager->getRepository('AppBundle:CompetencesGroup');
        $competenceGroup = $competencesGroupRepo->findOneBy(array('name' => 'falalala'));
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
            // data is an array with "name", "email", and "message" keys
            $data = $form->getData();

            dump($data);
        }

        // ... render the form

        return $this->render('ciorna/index.html.twig', array('form' => $form->createView()));
    }
}