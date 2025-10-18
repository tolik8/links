<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $table_name = 'groups'; 
        
        Schema::create($table_name, function (Blueprint $table) {
            $table->bigIncrements('id')->comment('ID');
            $table->string('name')->comment('Name');
            $table->bigInteger('parent_id')->unsigned()->comment('Parent ID');
            $table->bigInteger('user_id')->unsigned()->comment('User ID');
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('access_id')->unsigned()->comment('Access ID');
            $table->foreign('access_id')->references('id')->on('type_access');
            $table->timestamps();
        });
        
        DB::statement("ALTER TABLE {$table_name} comment 'Groups of links'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
