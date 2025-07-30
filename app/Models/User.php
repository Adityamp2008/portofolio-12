<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Kolom yang bisa diisi secara massal (mass assignable).
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'username', // ✅ WAJIB karena kamu pakai ini di migration
        'password',
    ];

    /**
     * Kolom yang disembunyikan saat model diubah ke array atau JSON.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Konversi otomatis tipe data kolom.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed', // ✅ Laravel 10+ hash otomatis
        ];
    }
}
