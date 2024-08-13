<?php

namespace Sovic\Common\Model;

use Doctrine\ORM\EntityManagerInterface;
use Sovic\Common\Entity\LoggableEntityInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

abstract class AbstractEntityModel
{
    protected EntityManagerInterface $entityManager;
    protected TranslatorInterface $translator;
    protected mixed $operator;

    public mixed $entity;

    public function getEntity(): mixed
    {
        return $this->entity;
    }

    public function setEntity(mixed $entity): void
    {
        $this->entity = $entity;
    }

    public function setEntityManager(EntityManagerInterface $entityManager): void
    {
        $this->entityManager = $entityManager;
    }

    public function getEntityManager(): EntityManagerInterface
    {
        return $this->entityManager;
    }

    public function setTranslator(TranslatorInterface $translator): void
    {
        $this->translator = $translator;
    }

    public function getTranslator(): TranslatorInterface
    {
        return $this->translator;
    }


    public function getOperator(): mixed
    {
        return $this->operator;
    }

    public function setOperator(mixed $operator): void
    {
        $this->operator = $operator;
    }

    public function flush(): void
    {
        if (isset($this->operator) && $this->entity instanceof LoggableEntityInterface) {
            $this->entity->setOperator($this->operator);
        }

        $this->entityManager->persist($this->entity);
        $this->entityManager->flush();
    }

    public function remove(): void
    {
        if (isset($this->operator) && $this->entity instanceof LoggableEntityInterface) {
            $this->entity->setOperator($this->operator);
        }

        $this->entityManager->remove($this->entity);
        $this->entityManager->flush();
    }

    public function refresh(): void
    {
        $this->entityManager->refresh($this->entity);
    }
}
