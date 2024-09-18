<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RecipeStatus;
use App\Models\RevenuesAndExpenses;

class SpaceProject extends Model
{
    use HasFactory;

    // Se você quiser especificar a tabela (opcional, mas não necessário se o nome seguir a convenção)
    protected $table = 'space_projects';

    // Se você não deseja que os campos timestamps sejam gerenciados automaticamente pelo Eloquent
    public $timestamps = true;

    // Se você quiser definir quais campos são atribuíveis em massa
    protected $fillable = [
        'name',
        'description',
        'responsible_user',
        'recipe_status_id'
    ];

    public function responsibleUser()
    {
       return $this->hasOne(User::class);
    }

    public function recipeStatusId()
    {
       return $this->hasOne(RecipeStatus::class);
    }

    public function revenuesAndExpensesId()
    {
        return $this->belongsTo(RevenuesAndExpenses::class);
    }
}
