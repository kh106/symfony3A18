<?php

namespace App\Controller;
use App\Entity\Classroom;
use App\Repository\ClassroomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class ClassroomController extends AbstractController
{
    #[Route('/classroom', name: 'app_classroom')]
    public function index(): Response
    {
        return $this->render('classroom/index.html.twig', [
            'controller_name' => 'ClassroomController',
        ]);
    }
    #[Route('/afficher', name: 'afficher_classroom')]
    public function afficher(ManagerRegistry $doctrine): Response
    {
        $repo=$doctrine->getRepository(classroom::class);
        $classroom=$repo->findAll();
        
        return $this->render('classroom/index.html.twig', [
            'classroom_name' => 'ClassroomController',
            'classroom'=>$classroom
        ]);
    

    }
    public function addClassroom($id, ManagerRegistry $doctrine)
      {
        $classroom=newClassroom();
        $classroom->setName('test persist');
        
        $em=$doctrine->getManager();
        $em->persist($classroom);
       $em->flush();
        return $this->redirectToRoute('app_classroom');
    }
      [Route('/updateClassroom/{$id}',name:'update_classroom')]
     public function updateClassroom($id,ManagerRegistry $doctrine)
     {
        $classroom=$doctrine->getRepository(Classroom::class)->find($id);
          $classroom->setName('test update');
        $em=$doctrine->getManager();
       
         $em->flush();
        return $this->redirectToRoute('app_classroom');
    }
    #[Route('/deleteClassroom/{id}', name: 'delete_classroom')]
    public function deleteClassroom($id,ManagerRegistry $doctrine){
        $classroom=$doctrine->getRepository(Classroom::class)->find($id);
        $em=$doctrine->getManager();
        $em->remove($classroom);
        $em->flush();
        return $this->redirectToRoute('app_classroom');
    }

}