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

    // affichage de detail d'une note
    // TODO : ajout un commentaire par note
    #[Route('/class/{id}', name: 'class_detail')]
    public function details(int $id, SchoolClassRepository $schoolClassRepository): Response
    {
        $classDetails = $schoolClassRepository->find($id);

        // var_dump($classDetails);
        return $this->render('school_class/details.html.twig', ['classDetails' => $classDetails]);
    }
}
