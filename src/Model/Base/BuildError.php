<?php

declare(strict_types = 1);

namespace PHPCensor\Model\Base;

use PHPCensor\Model;

class BuildError extends Model
{
    const SEVERITY_CRITICAL = 0;
    const SEVERITY_HIGH     = 1;
    const SEVERITY_NORMAL   = 2;
    const SEVERITY_LOW      = 3;

    /**
     * @var array
     */
    protected $data = [
        'id'          => null,
        'build_id'    => null,
        'plugin'      => null,
        'file'        => null,
        'line_start'  => null,
        'line_end'    => null,
        'severity'    => null,
        'message'     => null,
        'create_date' => null,
        'hash'        => '',
        'is_new'      => 0,
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
            return false;
        }

        $this->data['build_id'] = $value;

        return $this->setModified('build_id');
    }

    public function getPlugin(): string
    {
        return $this->data['plugin'];
    }

    public function setPlugin(string $value): bool
    {
        if ($this->data['plugin'] === $value) {
            return false;
        }

        $this->data['plugin'] = $value;

        return $this->setModified('plugin');
    }

    public function getFile(): ?string
    {
        return $this->data['file'];
    }

    /**
     * @param string|null $value
     *
     * @return bool
     */
    public function setFile(?string $value): bool
    {
        if ($this->data['file'] === $value) {
            return false;
        }

        $this->data['file'] = $value;

        return $this->setModified('file');
    }

    public function getLineStart(): ?int
    {
        return (int)$this->data['line_start'];
    }

    public function setLineStart(?int $value): bool
    {
        if ($this->data['line_start'] === $value) {
            return false;
        }

        $this->data['line_start'] = $value;

        return $this->setModified('line_start');
    }

    public function getLineEnd(): ?int
    {
        return (int)$this->data['line_end'];
    }

    public function setLineEnd(?int $value): bool
    {
        if ($this->data['line_end'] === $value) {
            return false;
        }

        $this->data['line_end'] = $value;

        return $this->setModified('line_end');
    }

    public function getSeverity(): int
    {
        return (int)$this->data['severity'];
    }

    public function setSeverity(int $value): bool
    {
        if ($this->data['severity'] === $value) {
            return false;
        }

        $this->data['severity'] = $value;

        return $this->setModified('severity');
    }

    public function getMessage(): string
    {
        return $this->data['message'];
    }

    public function setMessage(string $value): bool
    {
        if ($this->data['message'] === $value) {
            return false;
        }

        $this->data['message'] = $value;

        return $this->setModified('message');
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

    public function getHash(): string
    {
        return $this->data['hash'];
    }

    public function setHash(string $value): bool
    {
        if ($this->data['hash'] === $value) {
            return false;
        }

        $this->data['hash'] = $value;

        return $this->setModified('hash');
    }

    public function getIsNew(): bool
    {
        return (bool)$this->data['is_new'];
    }

    public function setIsNew(bool $value): bool
    {
        if ($this->data['is_new'] === (int)$value) {
            return false;
        }

        $this->data['is_new'] = (int)$value;

        return $this->setModified('is_new');
    }
}
