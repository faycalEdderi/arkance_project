<?php

namespace App\Controller;

use App\Repository\TeacherRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeacherController extends AbstractController
{
    #[Route('/teacher', name: 'app_teacher')]
    public function index(TeacherRepository $teacherRepository): Response
    {
        $teacher = $teacherRepository->findAll();

        //var_dump($teacher);

        return $this->render('teacher/index.html.twig', [
            'teacher' => $teacher,
        ]);
    }
}
