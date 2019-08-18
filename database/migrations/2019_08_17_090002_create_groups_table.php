<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table = 'groups'; 
        
        Schema::create($table, function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID');
            $table->string('name')->comment('Name');
            $table->bigInteger('parent_id')->unsigned()->comment('Parent ID');
            $table->bigInteger('user_id')->unsigned()->comment('User ID');
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('access_id')->unsigned()->comment('Access ID');
            $table->foreign('access_id')->references('id')->on('type_access');
            $table->timestamps();
        });
        
        DB::statement("ALTER TABLE {$table} comment 'Groups of links'"); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
