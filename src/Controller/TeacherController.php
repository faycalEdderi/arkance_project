<?php

namespace App\Controller;

use App\Repository\SubjectRepository;
use App\Repository\TeacherRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeacherController extends AbstractController
{
    // affiche les class et le prof principal
    #[Route('/class', name: 'class_list')]
    public function index(TeacherRepository $teacherRepository): Response
    {
        $teacher = $teacherRepository->findAll();

        //var_dump($teacher);

        return $this->render('teacher/index.html.twig', [
            'teacher' => $teacher,
        ]);
    }

    // affiche tout les professeurs
    #[Route('/teachers', name: 'teachers_list')]
    public function teacher_list(TeacherRepository $teacherRepository, SubjectRepository $subjectRepository): Response
    {
        $teachers = $teacherRepository->findAll();
        $subject = $subjectRepository->findAll();

        //var_dump($subject);

        return $this->render('teacher/teachers_list.html.twig', [
            'teachers' => $teachers,
            'subject' => $subject,
        ]);
    }
}
