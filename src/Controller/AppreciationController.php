<?php

namespace App\Controller;

use App\Entity\Subject;
use App\Repository\SubjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AppreciationController extends AbstractController
{

    #[Route('/appreciation/edit/{id}', name: 'edit_appreciation')]
    public function index(Request $request, EntityManagerInterface $entityManagerInterface, int $id = null, SubjectRepository $subjectRepository): Response
    {
        $entity = $id ? $subjectRepository->find($id) : new Subject();
        $type = Subject::class;

        $form = $this->createForm($type, $entity);
        // $form->handleRequest($request);

        // if ($form->isSubmitted() && $form->isValid()) {

        //     $entityManagerInterface->persist($entity);
        //     $entityManagerInterface->flush();

        //     return $this->redirectToRoute('student_list');
        // }

        return $this->render('appreciation/add_appreciation.html.twig', []);
    }
}
