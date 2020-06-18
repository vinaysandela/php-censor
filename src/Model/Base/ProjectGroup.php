<?php

declare(strict_types = 1);

namespace PHPCensor\Model\Base;

use PHPCensor\Model;

class ProjectGroup extends Model
{
    /**
     * @var array
     */
    protected $data = [
        'id'          => null,
        'title'       => null,
        'create_date' => null,
        'user_id'     => null,
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

    public function getTitle(): string
    {
        return $this->data['title'];
    }

    public function setTitle(string $value): bool
    {
        if ($this->data['title'] === $value) {
            return false;
        }

        $this->data['title'] = $value;

        return $this->setModified('title');
    }

    /**
     * @throws \Exception
     */
    public function getCreateDate(): \DateTime
    {
        return new \DateTime($this->data['create_date']);
    }

    public function setCreateDate(\DateTime $value): bool
    {
        $stringValue = $value->format('Y-m-d H:i:s');

        if ($this->data['create_date'] === $stringValue) {
            return false;
        }

        $this->data['create_date'] = $stringValue;

        return $this->setModified('create_date');
    }

    public function getUserId(): ?int
    {
        return $this->data['user_id'];
    }

    public function setUserId(?int $value): bool
    {
        if ($this->data['user_id'] === $value) {
            return false;
        }

        $this->data['user_id'] = $value;

        return $this->setModified('user_id');
    }
}
