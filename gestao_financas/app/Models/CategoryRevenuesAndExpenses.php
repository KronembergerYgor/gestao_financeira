<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RevenuesAndExpenses;

class CategoryRevenuesAndExpenses extends Model
{
    use HasFactory;


     // Se você quiser especificar a tabela (opcional, mas não necessário se o nome seguir a convenção)
     protected $table = 'category_revenues_and_expenses';

     // Se você não deseja que os campos timestamps sejam gerenciados automaticamente pelo Eloquent
     public $timestamps = true;
 
     // Se você quiser definir quais campos são atribuíveis em massa
     protected $fillable = [
         'name',
         'description',
         'user_category_id'
     ];

     public function revenuesAndExpensesId()
     {
        return $this->hasOne(RevenuesAndExpenses::class);
     }



}
