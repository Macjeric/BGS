<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class limit extends Model
{
    // Table Name
    protected $table = 'limits';

     protected $primaryKey = 'limits_id';

  protected $fillable =[
        'user_id', 
        'market_cost', 
        'travelling_cost', 
        'fuel_cost', 
        'postage_cost',
        'fax_cost',
    ];


}
