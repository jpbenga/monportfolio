<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function show_project(ProjectRepository $projectRepository): Response
    {
        $projects = $projectRepository->latestProject();
        return $this->render('home/index.html.twig', [
            'projects' => $projects,
        ]);
    }
}
