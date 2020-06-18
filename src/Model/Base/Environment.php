<?php

declare(strict_types = 1);

namespace PHPCensor\Model\Base;

use PHPCensor\Model;

class Environment extends Model
{
    /**
     * @var array
     */
    protected $data = [
        'id'         => null,
        'project_id' => null,
        'name'       => null,
        'branches'   => null,
    ];

    public function getId(): ?int
    {
        return (int)$this->data['id'];
    }

    public function setId(int $value): bool
    {
        if ($this->data['id'] === $value) {
            return false;
        }

        $this->data['id'] = $value;

        return $this->setModified('id');
    }

    public function getProjectId(): int
    {
        return (int)$this->data['project_id'];
    }

    public function setProjectId(int $value): bool
    {
        if ($this->data['project_id'] === $value) {
            return false;
        }

        $this->data['project_id'] = $value;

        return $this->setModified('project_id');
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->data['name'];
    }

    public function setName(string $value): bool
    {
        if ($this->data['name'] === $value) {
            return false;
        }

        $this->data['name'] = $value;

        return $this->setModified('name');
    }

    public function getBranches(): array
    {
        return array_filter(
            array_map(
                'trim',
                explode("\n", $this->data['branches'])
            )
        );
    }

    public function setBranches(array $value): bool
    {
        $branches = implode("\n", $value);
        if ($this->data['branches'] === $branches) {
            return false;
        }

        $this->data['branches'] = $branches;

        return $this->setModified('branches');
    }
}
