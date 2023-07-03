<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller {
	public function index() {
		$categories = DB::table( 'categories' )
			->leftJoin( 'posts', function ($join) {
				$join->on( 'categories.id', '=', 'posts.category_id' )
					->whereNull( 'posts.deleted_at' );
			} )
			->select( 'categories.*', 'posts.title', 'posts.content' )
			->orderBy( 'posts.created_at', 'desc' )
			->get();

		return view( 'categories.index', compact( 'categories' ) );
	}

}