<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table = 'tags';

        Schema::create($table, function (Blueprint $table) {
            $table->bigInteger('link_id')->unsigned()->comment('Link ID');
            $table->string('name')->comment('Name');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE {$table} comment 'Tags'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}
