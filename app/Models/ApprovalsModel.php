<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApprovalsModel extends Model
{
  protected $table = 'approvals';

  protected $fillable =[
    	'approving_user_id',
        'budget_id', 
        'category', 
        'status', 
        'comment', 
        'forward_to',
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
