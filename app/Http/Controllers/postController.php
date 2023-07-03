<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class postController extends Controller {


	public function index() {


		$posts = DB::table( 'posts' )
			->join( 'categories', 'posts.category_id', '=', 'categories.id' )
			->select( 'posts.*', 'categories.name as category_name' )
			->get();

		return view( 'posts.index', compact( 'posts' ) );

	}


	public function getPostCountByCategory( $categoryId ) {
		$postCount = DB::table( 'posts' )
			->where( 'category_id', $categoryId )
			->count();

		return $postCount;
	}



	public function deletePost( $id ) {
		$deleted = DB::table( 'posts' )
			->where( 'id', $id )
			->delete();

		if ( $deleted ) {
			return response()->json( [ 'message' => 'Post deleted successfully' ] );
		} else {
			return response()->json( [ 'message' => 'Failed to delete post' ], 500 );
		}
	}



	public function getSoftDeletedPosts() {
		
        $softDeletedPosts = DB::table('posts')
            ->whereNotNull('deleted_at')
            ->get();

        return response()->json($softDeletedPosts);
	}
}