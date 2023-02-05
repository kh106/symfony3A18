<?php

namespace src\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StudentController extends AbstractController
{
    public function index()
    {
        return $this->json(['message' => 'Bonjour mes etudiants']);
    }
}
