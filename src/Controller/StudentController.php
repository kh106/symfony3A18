<?php

namespace App\Controller;
use App\Entity\Student;
use App\Repository\StudentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class StudentController extends AbstractController
{
   // #[Route('/student', name: 'app_student')]
   // public function index(StudentRepository $repo): Response
   // {
       // $students = $repo->findAll();

       // return $this->render('student/index.html.twig', [
         //   'controller_name' => 'StudentController','students'=>$students
        //]);
    //}
    #[Route('/student', name: 'app_student')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repo = $doctrine->getRepository(Student::class);
        $students=$repo->findAll();

        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController','students'=>$students
        ]);
    }
    #[Route('/deleteStudent/{id}', name: 'delete_student')]
    public function deleteStudent($id,ManagerRegistry $doctrine){
        $student=$doctrine->getRepository(Student::class)->find($id);
        $em=$doctrine->getManager();
        $em->remove($student);
        $em->flush();
        return $this->redirectToRoute('app_student');
    }
    # [Route('/addStudent/{$id}',name:'add_student')]
    #public function addStudent($id, ManagerRegistry $doctrine)
      #{
        #$student=newStudent();
        #$student->setUsername('test persist');
        #$student->setEmail('persist@test.com');
       # $em=$doctrine->getManager();
        #$em->persist($student);
       # $em->flush()
        #return $this->redirectToRoute('app_student');
    #}
     # [Route('/updateStudent/{$id}',name:'update_student')]
    #  public function updateStudent($id,ManagerRegistry $doctrine)
    #  {
        #  $student=$doctrine->getRepository(Student::class)->find($id);
         # $student->setUsername('test update');
        #  $em=$doctrine->getManager();
       
         # $em->flush()
        #      #return $this->redirectToRoute('app_student');
    #  }
    
}
