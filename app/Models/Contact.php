<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'name', 'phone'];

    // Relacionamento com usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relacionamento com campanhas
    public function campaigns()
    {
        return $this->belongsToMany(Campaign::class)
            ->withPivot('status')
            ->withTimestamps();
    }
}
