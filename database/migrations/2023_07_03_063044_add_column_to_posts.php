<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void {
		Schema::table( 'posts', function (Blueprint $table) {
			$table->after( 'content', function (Blueprint $table) {
				$table->timestamp( 'deleted_at' )->nullable();
			} );
		} );
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void {
		Schema::table( 'posts', function (Blueprint $table) {
			//
		} );
	}
};