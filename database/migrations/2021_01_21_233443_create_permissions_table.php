<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('key')->unique();
            $table->timestamps();
        });
        DB::table('permissions')->insert(['name'=>'Просмотр админ панели', 'key'=>'view_admin']);
        DB::table('permissions')->insert(['name'=>'Создание статей', 'key'=>'create_articles']);
        DB::table('permissions')->insert(['name'=>'Просмотр отзывов', 'key'=>'view_feedback']);
        DB::table('permissions')->insert(['name'=>'Редактирование настроек', 'key'=>'edit_settings']);
        DB::table('permissions')->insert(['name'=>'Комментирование', 'key'=>'create_comments']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
