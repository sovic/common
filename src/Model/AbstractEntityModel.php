<?php

namespace Sovic\Common\Model;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

abstract class AbstractEntityModel
{
    protected EntityManagerInterface $entityManager;
    protected TranslatorInterface $translator;

    public mixed $entity;

    public function setEntityManager(EntityManagerInterface $entityManager): void
    {
        $this->entityManager = $entityManager;
    }

    protected function getEntityManager(): EntityManagerInterface
    {
        return $this->entityManager;
    }

    public function setTranslator(TranslatorInterface $translator): void
    {
        $this->translator = $translator;
    }

    public function flush(): void
    {
        $this->entityManager->persist($this->entity);
        $this->entityManager->flush();
    }

    public function remove(): void
    {
        $this->entityManager->remove($this->entity);
        $this->entityManager->flush();
    }

    public function refresh(): void
    {
        $this->entityManager->refresh($this->entity);
    }
}
