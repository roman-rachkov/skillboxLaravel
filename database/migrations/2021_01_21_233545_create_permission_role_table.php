<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_role', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');
            $table->unique(['permission_id', 'role_id']);
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
        DB::table('permission_role')->insert(['permission_id' => 1, 'role_id'=>1]);
        DB::table('permission_role')->insert(['permission_id' => 2, 'role_id'=>3]);
        DB::table('permission_role')->insert(['permission_id' => 3, 'role_id'=>2]);
        DB::table('permission_role')->insert(['permission_id' => 4, 'role_id'=>1]);
        DB::table('permission_role')->insert(['permission_id' => 5, 'role_id'=>3]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_role');
    }
}
