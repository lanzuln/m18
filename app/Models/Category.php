<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
	protected $table = 'categories';


	protected $primaryKey = 'id';


	protected $fillable = [ 'name' ];


	protected $dates = [ 'created_at', 'updated_at' ];


	public function post() {
		return $this->hasMany( Post::class);
	}


	public function getLatestPost() {
		return $this->posts()->latest()->first();
	}
}