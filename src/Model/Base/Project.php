<?php

declare(strict_types = 1);

namespace PHPCensor\Model\Base;

use PHPCensor\Exception\InvalidArgumentException;
use PHPCensor\Model;

class Project extends Model
{
    const TYPE_LOCAL            = 'local';
    const TYPE_GIT              = 'git';
    const TYPE_GITHUB           = 'github';
    const TYPE_BITBUCKET        = 'bitbucket';
    const TYPE_GITLAB           = 'gitlab';
    const TYPE_GOGS             = 'gogs';
    const TYPE_HG               = 'hg';
    const TYPE_BITBUCKET_HG     = 'bitbucket-hg';
    const TYPE_BITBUCKET_SERVER = 'bitbucket-server';
    const TYPE_SVN              = 'svn';

    const MIN_BUILD_PRIORITY             = 1;
    const MAX_BUILD_PRIORITY             = 2000;
    const DEFAULT_BUILD_PRIORITY         = 1000;
    const OFFSET_BETWEEN_BUILD_AND_QUEUE = 24;

    /**
     * @var array
     */
    protected $data = [
        'id'                     => null,
        'title'                  => null,
        'reference'              => null,
        'default_branch'         => null,
        'default_branch_only'    => 0,
        'ssh_private_key'        => null,
        'ssh_public_key'         => null,
        'type'                   => null,
        'access_information'     => null,
        'build_config'           => null,
        'overwrite_build_config' => 1,
        'allow_public_status'    => 0,
        'archived'               => 0,
        'group_id'               => 1,
        'create_date'            => null,
        'user_id'                => null,
    ];

    /**
     * @var array
     */
    public static $allowedTypes = [
        self::TYPE_LOCAL,
        self::TYPE_GIT,
        self::TYPE_GITHUB,
        self::TYPE_BITBUCKET,
        self::TYPE_GITLAB,
        self::TYPE_GOGS,
        self::TYPE_HG,
        self::TYPE_BITBUCKET_HG,
        self::TYPE_SVN,
        self::TYPE_BITBUCKET_SERVER
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

    public function getReference(): string
    {
        return $this->data['reference'];
    }

    public function setReference(string $value): bool
    {
        if ($this->data['reference'] === $value) {
            return false;
        }

        $this->data['reference'] = $value;

        return $this->setModified('reference');
    }

    public function getDefaultBranch(): string
    {
        return $this->data['default_branch'];
    }

    public function setDefaultBranch(string $value): bool
    {
        if ($this->data['default_branch'] === $value) {
            return false;
        }

        $this->data['default_branch'] = $value;

        return $this->setModified('default_branch');
    }

    public function getDefaultBranchOnly(): bool
    {
        return (bool)$this->data['default_branch_only'];
    }

    public function setDefaultBranchOnly(bool $value): bool
    {
        if ($this->data['default_branch_only'] === (int)$value) {
            return false;
        }

        $this->data['default_branch_only'] = (int)$value;

        return $this->setModified('default_branch_only');
    }

    public function getSshPrivateKey(): ?string
    {
        return $this->data['ssh_private_key'];
    }

    public function setSshPrivateKey(?string $value): bool
    {
        if ($this->data['ssh_private_key'] === $value) {
            return false;
        }

        $this->data['ssh_private_key'] = $value;

        return $this->setModified('ssh_private_key');
    }

    public function getSshPublicKey(): ?string
    {
        return $this->data['ssh_public_key'];
    }

    public function setSshPublicKey(?string $value): bool
    {
        if ($this->data['ssh_public_key'] === $value) {
            return false;
        }

        $this->data['ssh_public_key'] = $value;

        return $this->setModified('ssh_public_key');
    }

    public function getType(): string
    {
        return $this->data['type'];
    }

    /**
     * @throws InvalidArgumentException
     */
    public function setType(string $value): bool
    {
        if (!in_array($value, static::$allowedTypes, true)) {
            throw new InvalidArgumentException(
                'Column "type" must be one of: ' . join(', ', static::$allowedTypes) . '.'
            );
        }

        if ($this->data['type'] === $value) {
            return false;
        }

        $this->data['type'] = $value;

        return $this->setModified('type');
    }

    public function getAccessInformationItem(string $key)
    {
        $accessInformation = $this->getAccessInformation();
        if (!empty($accessInformation[$key])) {
            return $accessInformation[$key];
        }

        return null;
    }

    public function getAccessInformation(): array
    {
        return !empty($this->data['access_information'])
            ? \json_decode($this->data['access_information'], true)
            : [];
    }

    public function setAccessInformation(array $value): bool
    {
        $accessInformation = \json_encode($value);
        if ($this->data['access_information'] === $accessInformation) {
            return false;
        }

        $this->data['access_information'] = $accessInformation;

        return $this->setModified('access_information');
    }

    public function getBuildConfig(): ?string
    {
        return $this->data['build_config'];
    }

    public function setBuildConfig(?string $value): bool
    {
        if ($this->data['build_config'] === $value) {
            return false;
        }

        $this->data['build_config'] = $value;

        return $this->setModified('build_config');
    }

    public function getOverwriteBuildConfig(): bool
    {
        return (bool)$this->data['overwrite_build_config'];
    }

    public function setOverwriteBuildConfig(bool $value): bool
    {
        if ($this->data['overwrite_build_config'] === (int)$value) {
            return false;
        }

        $this->data['overwrite_build_config'] = (int)$value;

        return $this->setModified('overwrite_build_config');
    }

    public function getAllowPublicStatus(): bool
    {
        return (bool)$this->data['allow_public_status'];
    }

    public function setAllowPublicStatus(bool $value): bool
    {
        if ($this->data['allow_public_status'] === (int)$value) {
            return false;
        }

        $this->data['allow_public_status'] = (int)$value;

        return $this->setModified('allow_public_status');
    }

    public function getArchived(): bool
    {
        return (bool)$this->data['archived'];
    }

    public function setArchived(bool $value): bool
    {
        if ($this->data['archived'] === (int)$value) {
            return false;
        }

        $this->data['archived'] = (int)$value;

        return $this->setModified('archived');
    }

    public function getGroupId(): int
    {
        return $this->data['group_id'];
    }

    public function setGroupId(int $value): bool
    {
        if ($this->data['group_id'] === $value) {
            return false;
        }

        $this->data['group_id'] = $value;

        return $this->setModified('group_id');
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
