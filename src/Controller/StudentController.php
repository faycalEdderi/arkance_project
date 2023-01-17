<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\StudentType;
use App\Repository\GradeRepository;
use App\Repository\StudentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StudentController extends AbstractController
{
    // Ajout d'un etudiant en bdd
    #[Route('/students/add', name: 'student_form')]
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

    // affiche la liste des etudiants
    #[Route('/students', name: 'student_list')]
    public function index(StudentRepository $studentRepository): Response
    {
        $student = $studentRepository->findAll();

        //var_dump($student);

        return $this->render('student/students_list.html.twig', [
            'student' => $student,
        ]);
    }

    // affiche les details d'une note d'un etudiant
    #[Route('/grade/{id}', name: 'grade_details')]
    public function grades_details(int $id, GradeRepository $gradeRepository): Response
    {
        $studentInfos = $gradeRepository->find($id);

        //var_dump($studentInfos);

        return $this->render('student/grade_details.html.twig', [
            'studentInfos' => $studentInfos,
        ]);
    }


    // Afficher toutes les note d'un etudiant
    #[Route('/student/{id}', name: 'student_grades')]
    public function grade_list(int $id, StudentRepository $studentRepository): Response
    {
        $studentInfos = $studentRepository->find($id);

        //var_dump($studentInfos);

        return $this->render('student/grade_list.html.twig', [
            'studentInfos' => $studentInfos,
        ]);
    }
}
