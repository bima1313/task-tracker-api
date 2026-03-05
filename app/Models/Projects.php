<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by',
        'name',
        'description',
        'status', // active / archived
    ];

    // Relasi: Project dimiliki/dibuat oleh satu User
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Relasi: Project memiliki banyak Task
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
}