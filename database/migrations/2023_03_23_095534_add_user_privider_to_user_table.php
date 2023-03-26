<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserProviderToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ClaimSearch', function (Blueprint $table) {
            $table->string(config('laravel-okta.auth.okta_provider_id_column'),100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->okta_provider_id(config('laravel-okta.auth.okta_provider_id_column'));
        });
    }
}
