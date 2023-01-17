<?php

namespace App\Controller;

use App\Entity\SchoolClass;
use App\Repository\SchoolClassRepository;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;


class SchoolClassController extends AbstractController
{
    private $logger;

    #[Route('/class/test', name: 'app_school_class')]
    public function index(SchoolClassRepository $schoolClassRepository, EntityManagerInterface $em): Response
    {
        $schoolClass = $schoolClassRepository->findAll();




        return $this->render('school_class/index.html.twig', [
            'schoolClass' => $schoolClass,
        ]);
    }


    #[Route('/class/{id}', name: 'class_detail')]
    public function details(int $id, SchoolClassRepository $schoolClassRepository): Response
    {
        $classDetails = $schoolClassRepository->find($id);

        // var_dump($classDetails);
        return $this->render('school_class/details.html.twig', ['classDetails' => $classDetails]);
    }
}
