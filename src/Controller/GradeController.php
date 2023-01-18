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

    //Ajout d'une note
    #[Route('/grade/add', name: 'add_grade')]
    #[Route('/grade/edit/{id}', name: 'edit_grade')]
    public function add_grade(Request $request, EntityManagerInterface $entityManagerInterface, int $id = null, GradeRepository $gradeRepository): Response
    {
        $entity = $id ? $gradeRepository->find($id) : new Grade();
        $type = GradeType::class;

        $form = $this->createForm($type, $entity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManagerInterface->persist($entity);
            $entityManagerInterface->flush();

            return $this->redirectToRoute('student_list');
        }



        return $this->render('grade/add_grade.html.twig', [
            'form' => $form,
        ]);
    }

    // Suppression d'un note
    #[Route('/grade/delete/{id}', name: 'delete_grade')]
    public function delete(int $id, GradeRepository $gradeRepository, EntityManagerInterface $entityManager): Response
    {

        $entity = $gradeRepository->find($id);
        $entityManager->remove($entity);
        $entityManager->flush();

        return $this->redirectToRoute('student_list');
    }
}
