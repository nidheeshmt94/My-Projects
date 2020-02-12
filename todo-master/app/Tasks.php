<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
	public $timestamps = false;
	protected  $primaryKey = 'task_id';
    protected $fillable = [
		'task_id',
		'task',
		'description',
		'end_date',
		'start_date',
		'status',
		'assigned_to',
		'created_on',
		'created_by',
	  ];
}
