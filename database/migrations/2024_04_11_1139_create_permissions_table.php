<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
   /**
    * Run the migrations.
    */
   public function up(): void
   {
      // Create the permissions table.
      Schema::create('permissions', function (Blueprint $table) {
         $table->id();
         $table->string('permission', 50);
         $table->integer('x')->default(0);
         $table->integer('y')->default(0);
         $table->timestamps();
         $table->unique(['x', 'y'], 'UK_XY');
      });

      // Populate permissions.
      $runtime = Carbon::now();
      DB::table('permissions')->insert([
         ['permission' => 'user_admin', 'x' => 0, 'y' => 0, 'created_at' => $runtime],
         ['permission' => 'membership_admin', 'x' => 0, 'y' => 1, 'created_at' => $runtime],
         ['permission' => 'event_admin', 'x' => 0, 'y' => 2, 'created_at' => $runtime],
      ]);
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('permissions');
   }
};
