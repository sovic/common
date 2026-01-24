<?php

namespace Sovic\Common\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Index;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\UniqueConstraint;
use Sovic\Common\Enum\SettingTypeId;
use Sovic\Common\Project\SettingGroupId;

#[Table(name: 'settings')]
#[Index(name: 'project_id', columns: ['project_id'])]
#[UniqueConstraint(name: 'project_group_key', columns: ['project_id', 'group', 'key'])]
#[Entity]
class Setting
{
    #[Id]
    #[Column(name: 'id', type: Types::INTEGER)]
    #[GeneratedValue(strategy: 'IDENTITY')]
    protected int $id;

    #[ManyToOne(targetEntity: Project::class)]
    #[JoinColumn(
        name: 'project_id',
        referencedColumnName: 'id',
        nullable: true,
        onDelete: 'CASCADE',
        options: ['default' => null]
    )]
    protected ?Project $project = null;

    #[Column(
        name: '`group`',
        type: Types::STRING,
        length: 100,
        nullable: false,
        enumType: SettingGroupId::class,
        options: ['default' => SettingGroupId::App]
    )]
    protected SettingGroupId $groupId;

    #[Column(name: '`key`', type: Types::STRING, length: 100, nullable: false)]
    protected string $key;

    #[Column(name: 'value', type: Types::TEXT, length: 65535, nullable: false)]
    protected string $value;

    #[Column(name: 'description', type: Types::TEXT, length: 65535, nullable: false)]
    protected string $description;

    #[Column(
        name: 'type',
        type: Types::STRING,
        length: 255,
        nullable: true,
        enumType: SettingTypeId::class,
        options: ['default' => null]
    )]
    protected ?SettingTypeId $type;

    #[Column(name: 'is_template_enabled', type: Types::BOOLEAN, nullable: false, options: ['default' => false])]
    protected bool $isTemplateEnabled = false;

    public function getId(): int
    {
        return $this->id;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): void
    {
        $this->project = $project;
    }

    public function getGroupId(): SettingGroupId
    {
        return $this->groupId;
    }

    public function setGroupId(SettingGroupId $groupId): void
    {
        $this->groupId = $groupId;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function setKey(string $key): void
    {
        $this->key = $key;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getType(): ?SettingTypeId
    {
        return $this->type;
    }

    public function setType(?SettingTypeId $type): void
    {
        $this->type = $type;
    }

    public function isTemplateEnabled(): bool
    {
        return $this->isTemplateEnabled;
    }

    public function setIsTemplateEnabled(bool $isTemplateEnabled): void
    {
        $this->isTemplateEnabled = $isTemplateEnabled;
    }
}
