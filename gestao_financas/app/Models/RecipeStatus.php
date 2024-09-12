<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeStatus extends Model
{
    use HasFactory;

    // Se você quiser especificar a tabela (opcional, mas não necessário se o nome seguir a convenção)
    protected $table = 'recipe_status';

    // Se você não deseja que os campos timestamps sejam gerenciados automaticamente pelo Eloquent
    public $timestamps = true;

    // Se você quiser definir quais campos são atribuíveis em massa
    protected $fillable = [
        'name',
        'description',
    ];
}
