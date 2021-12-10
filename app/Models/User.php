<?php

namespace App\Models;

use App\Elastic\ElasticSerialization;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    use ElasticSerialization;

    public array $elasticExcludes = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'is_admin' => 'boolean'
    ];

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getIsAdmin(): bool
    {
        return $this->is_admin;
    }
}
