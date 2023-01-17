<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\StudentType;
use App\Repository\StudentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StudentController extends AbstractController
{
    #[Route('/student', name: 'student_form')]
    public function form(Request $request, EntityManagerInterface $entityManager, int $id = null, StudentRepository $studentRepository): Response
    {

        $entity = $id ? $studentRepository->find($id) : new Student();
        $type = StudentType::class; //renvoi le namespace de la class


        $form = $this->createForm($type, $entity);
        $form->handleRequest($request);

        /*
         *Verifier si formulair est valide
         *  isValid: formulaire valide
         *  isSubmitted : formulaire soumis 
         */
        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager->persist($entity);
            $entityManager->flush();

            return $this->redirectToRoute('student_form');
        }

        return $this->render('student/add_student.html.twig', [
            'form' => $form

        ]);
    }
}
