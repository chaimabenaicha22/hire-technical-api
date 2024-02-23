<?php

namespace App\Service;

use App\Entity\Project;

class ProjectManager
{
    public function createProject(): Project
    {
        $project = new Project();
        $id = hexdec(uniqid());
        $project->setId($id);
        return $project;
    }
}