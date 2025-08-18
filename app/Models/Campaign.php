<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',  // 👈 Adicione esta linha
        'name',
        'message',
        'scheduled_at'
    ];
    // Relacionamento com contatos
    public function contacts()
    {
        return $this->belongsToMany(Contact::class)
            ->withPivot('status')
            ->withTimestamps();
    }
    // Relacionamento com usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
