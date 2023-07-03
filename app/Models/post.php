<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model {

	protected $fillable = [ 'title', 'content' ];

	public function category() {
		return $this->belongsTo( Category::class);
	}

	public static function getCategoryPostCount( $categoryId ) {
		return static::where( 'category_id', $categoryId )->count();
	}

	public function getSoftDeletedPosts() {
		return $this->onlyTrashed()->get();
	}
}