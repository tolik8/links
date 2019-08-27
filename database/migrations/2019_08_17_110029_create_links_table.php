<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table = 'links';

        Schema::create($table, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->comment('Name');
            $table->string('description')->comment('Description');
            $table->string('link')->comment('Link');
            $table->string('image')->comment('Image');
            $table->bigInteger('group_id')->unsigned()->comment('Group ID');
            $table->foreign('group_id')->references('id')->on('groups');
            $table->bigInteger('user_id')->unsigned()->comment('User ID');
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('access_id')->unsigned()->comment('Access ID');
            $table->foreign('access_id')->references('id')->on('type_access');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE {$table} comment 'Links'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('links', function (Blueprint $table) {
            $table->dropForeign('links_access_id_foreign');
            $table->dropForeign('links_user_id_foreign');
            $table->dropForeign('links_group_id_foreign');
        });

        Schema::dropIfExists('links');
    }
}
