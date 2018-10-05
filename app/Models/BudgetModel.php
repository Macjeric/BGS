<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BudgetModel extends Model
{
  protected $table = 'budget';

  protected $primaryKey = 'budget_id';

  protected $fillable =[
    	'user_id',
        'month',
        'place', 
        'quarter', 
        'market_cost', 
        'travelling_cost', 
        'fuel_cost', 
        'postage_cost',
        'fax_cost',
        'budget_status',
        'business_status',
        'description',
        'expected_premium',
        'carry_over_balance',
        'first_approval',

    ];

/*
    public function User(){
    return $this->belongsTo('App\User','owner_id');
    }
    public function InstitutionsModel(){
    return $this->belongsTo('App\Models\InstitutionsModel');
    }
 */
}
