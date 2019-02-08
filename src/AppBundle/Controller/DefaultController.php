<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Profesor;
use AppBundle\Form\ProfesorType;
use AppBundle\Entity\Asignatura;
use AppBundle\Form\AsignaturaType;

class DefaultController extends Controller
{
    /**
     * @Route("/{estado}/{prof}", name="homepage")
     */
    public function indexAction(Request $request,$estado=null,$prof=null)
    {
        if($estado==null){
          return $this->profesorAction($request,$prof);
        }elseif ($estado=='asignaturas') {
          return $this->asignaturasAction($request);
        }else{
          return $this->redirectToRoute('homepage');
        }

    }
    private function profesorAction($request,$prof){
        $profe = new Profesor();
        $form = $this->createForm(ProfesorType::class,$profe,);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

          $entityManager = $this->getDoctrine()->getManager();
          $entityManager->persist($profe);
          $entityManager->flush();

          return $this->redirectToRoute('homepage',array('estado'=>'asignaturas'));
        }
        return $this->render('default/index.html.twig',array('form'=>$form->createView()));
    }
    private function asignaturasAction($request){
      $asig = new Asignatura();
      $form = $this->createForm(AsignaturaType::class,$asig);
      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($asig);
        $entityManager->flush();

        return $this->redirectToRoute('homepage');
      }
      return $this->render('default/indexAsignaturas.html.twig',array('form'=>$form->createView()));
    }
}
