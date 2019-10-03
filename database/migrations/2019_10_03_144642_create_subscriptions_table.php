<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table = 'subscriptions';

        Schema::create($table, function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned()->comment('User ID');
            $table->bigInteger('subscription_id')->unsigned()->comment('Subscription ID');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE {$table} comment 'Subscriptions'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
