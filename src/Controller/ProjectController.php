<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;

use App\Entity\Project;
use App\Service\ProjectManager;
use App\Form\ProjectType;

class ProjectController extends AbstractController
{

    private $projectManager;
    private $serializer;

    public function __construct(ProjectManager $projectManager, SerializerInterface $serializer)
    {
        $this->projectManager = $projectManager;
        $this->serializer = $serializer;
    }

    /**
     * @Route("/projects", methods={"POST"})
     */
    public function postProject(Request $request): JsonResponse
    {
        $jsonData = json_decode($request->getContent(), true);

        $project = $this->projectManager->createProject();

        $form = $this->createForm(ProjectType::class, $project);
        $form->submit($jsonData);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $this->serializer->serialize($project, 'json');

            return new JsonResponse($data, 200, [], true);
        }

        return new JsonResponse(["error" => "An error occurred"], 400);
    }
}
