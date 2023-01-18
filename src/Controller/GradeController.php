<?php

namespace App\Controller;

use App\Entity\Grade;
use App\Form\GradeType;
use Doctrine\ORM\EntityManager;
use App\Repository\GradeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GradeController extends AbstractController
{
    #[Route('/grade/add', name: 'add_grade')]
    public function add_grade(Request $request, EntityManagerInterface $entityManagerInterface, int $id = null, GradeRepository $gradeRepository): Response
    {
        $entity = $id ? $gradeRepository->find($id) : new Grade();
        $type = GradeType::class;

        $form = $this->createForm($type, $entity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManagerInterface->persist($entity);
            $entityManagerInterface->flush();

            return $this->redirectToRoute('add_grade');
        }



        return $this->render('grade/add_grade.html.twig', [
            'form' => $form,
        ]);
    }
}
