<?php

declare(strict_types = 1);

namespace PHPCensor\Model\Base;

use PHPCensor\Model;

class BuildMeta extends Model
{
    /**
     * @var array
     */
    protected $data = [
        'id'         => null,
        'build_id'   => null,
        'meta_key'   => null,
        'meta_value' => null,
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

    public function getBuildId(): int
    {
        return (int)$this->data['build_id'];
    }

    public function setBuildId(int $value): bool
    {
        if ($this->data['build_id'] === $value) {
            return false ;
        }

        $this->data['build_id'] = $value;

        return $this->setModified('build_id');
    }

    public function getMetaKey(): string
    {
        return $this->data['meta_key'];
    }

    public function setMetaKey(string $value): bool
    {
        if ($this->data['meta_key'] === $value) {
            return false;
        }

        $this->data['meta_key'] = $value;

        return $this->setModified('meta_key');
    }

    public function getMetaValue(): string
    {
        return $this->data['meta_value'];
    }

    public function setMetaValue(string $value): bool
    {
        if ($this->data['meta_value'] === $value) {
            return false;
        }

        $this->data['meta_value'] = $value;

        return $this->setModified('meta_value');
    }
}
