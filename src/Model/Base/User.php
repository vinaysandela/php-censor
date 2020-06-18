<?php

declare(strict_types = 1);

namespace PHPCensor\Model\Base;

use PHPCensor\Model;

class User extends Model
{
    /**
     * @var array
     */
    protected $data = [
        'id'            => null,
        'email'         => null,
        'hash'          => null,
        'is_admin'      => 0,
        'name'          => null,
        'language'      => null,
        'per_page'      => null,
        'provider_key'  => 'internal',
        'provider_data' => null,
        'remember_key'  => null,
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

    public function getEmail(): string
    {
        return $this->data['email'];
    }

    public function setEmail(string $value): bool
    {
        if ($this->data['email'] === $value) {
            return false;
        }

        $this->data['email'] = $value;

        return $this->setModified('email');
    }

    /**
     * @return string
     */
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

    public function getIsAdmin(): bool
    {
        return (bool)$this->data['is_admin'];
    }

    public function setIsAdmin(bool $value): bool
    {
        if ($this->data['is_admin'] === (int)$value) {
            return false;
        }

        $this->data['is_admin'] = (int)$value;

        return $this->setModified('is_admin');
    }

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

    public function getLanguage(): ?string
    {
        return $this->data['language'];
    }

    public function setLanguage(?string $value): bool
    {
        if ($this->data['language'] === $value) {
            return false;
        }

        $this->data['language'] = $value;

        return $this->setModified('language');
    }

    public function getPerPage(): ?int
    {
        return (int)$this->data['per_page'];
    }

    public function setPerPage(?int $value): bool
    {
        if ($this->data['per_page'] === $value) {
            return false;
        }

        $this->data['per_page'] = $value;

        return $this->setModified('per_page');
    }

    public function getProviderKey(): string
    {
        return $this->data['provider_key'];
    }

    public function setProviderKey(string $value): bool
    {
        if ($this->data['provider_key'] === $value) {
            return false;
        }

        $this->data['provider_key'] = $value;

        return $this->setModified('provider_key');
    }

    public function getProviderDataItem(string $key): ?string
    {
        $data = $this->getProviderData();
        if (!empty($data[$key])) {
            return $data[$key];
        }

        return null;
    }

    public function getProviderData(): array
    {
        return !empty($this->data['provider_data'])
            ? \json_decode($this->data['provider_data'], true)
            : [];
    }

    public function setProviderData(array $value): bool
    {
        $providerData = json_encode($value);
        if ($this->data['provider_data'] === $providerData) {
            return false;
        }

        $this->data['provider_data'] = $providerData;

        return $this->setModified('provider_data');
    }

    public function getRememberKey(): ?string
    {
        return $this->data['remember_key'];
    }

    public function setRememberKey(?string $value): bool
    {
        if ($this->data['remember_key'] === $value) {
            return false;
        }

        $this->data['remember_key'] = $value;

        return $this->setModified('remember_key');
    }
}
