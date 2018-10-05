<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RemarksModel extends Model
{
    protected $table = 'remarks';

  protected $fillable =[
    	'budget_id',
        'actual_cost', 
        'expected_action_date', 
        'push_forward_date', 
        'remarks', 
        'final_remarks',
        'reason',
        'reviewer',
        'status',
    ];

}
