<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SpaceProject;
use App\Models\CategoryRevenuesAndExpenses;

class RevenuesAndExpenses extends Model
{
    use HasFactory;

    // Se você quiser especificar a tabela (opcional, mas não necessário se o nome seguir a convenção)
    protected $table = 'revenues_and_expenses';

    // Se você não deseja que os campos timestamps sejam gerenciados automaticamente pelo Eloquent
    public $timestamps = true;

    // Se você quiser definir quais campos são atribuíveis em massa
    protected $fillable = [
        'name',
        'description',
        'type',
        'value',
        'space_project_id',
        'category_id'

    ];

    public function spaceProjectId()
    {
       return $this->hasOne(SpaceProject::class);
    }

    public function categoryId()
    {
       return $this->hasOne(CategoryRevenuesAndExpenses::class);
    }
}
