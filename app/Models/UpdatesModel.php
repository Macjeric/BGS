<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UpdatesModel extends Model
{
   protected $table = 'updates';

  protected $primaryKey = 'updates_id';

  protected $fillable =[
    	'budget_id', 
    	'user_id',
        'comment', 
    ];
}
