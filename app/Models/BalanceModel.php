<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BalanceModel extends Model
{
  protected $table = 'balance';

  protected $primaryKey = 'balance_id';

  protected $fillable =[
        'budget_id', 
        'total_cost', 
        'actual_cost', 
        'resultant_balance', 
        'status',
    ];
}
