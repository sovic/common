<?php

namespace Sovic\Common\Project;

use Sovic\Common\Entity\Project as ProjectEntity;
use Sovic\Common\Model\EntityModelFactory;
use Symfony\Component\HttpFoundation\Request;

final class ProjectFactory extends EntityModelFactory
{
    public function loadById(int $id): ?Project
    {
        return $this->loadModelBy(ProjectEntity::class, Project::class, ['id' => $id]);
    }

    public function loadBySlug(string $slug): ?Project
    {
        return $this->loadModelBy(ProjectEntity::class, Project::class, ['slug' => $slug]);
    }

    public function loadByEntity(ProjectEntity $entity): Project
    {
        return $this->loadEntityModel($entity, Project::class);
    }

    public function loadByRequest(?Request $request = null): ?Project
    {
        if (!$request) {
            $envProject = $_SERVER['PROJECT'] ?? null;
            if ($envProject) {
                return $this->loadModelBy(ProjectEntity::class, Project::class, ['slug' => $envProject]);
            }

            return null;
        }

        $envProject = $request->server->get('PROJECT');
        if ($envProject) {
            return $this->loadModelBy(ProjectEntity::class, Project::class, ['slug' => $envProject]);
        }

        $host = $request->getHost();
        $host = trim($host, '.');
        $em = $this->getEntityManager();
        $result = $em->getRepository(ProjectEntity::class)
            ->createQueryBuilder('p')
            ->where('p.domains LIKE :host')
            ->setParameter('host', '%' . $host . '%')
            ->getQuery()
            ->getResult();
        if ($result) {
            return $this->loadEntityModel($result[0], Project::class);
        }

        return null;
    }

    public function createDefault(): Project
    {
        $name = $slug = 'app';
        $domains = '';

        $project = new ProjectEntity();
        $project->setName($name);
        $project->setSlug($slug);
        $project->setDomains($domains);

        return $this->loadByEntity($project);
    }
}
