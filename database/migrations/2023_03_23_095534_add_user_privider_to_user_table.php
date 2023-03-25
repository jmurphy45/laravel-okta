<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaimsSearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ClaimSearch', function (Blueprint $table) {
            $table->unsignedBigInteger('ClaimID')->nullable();
            $table->unsignedBigInteger('DealershipID')->nullable();
            $table->unsignedBigInteger('DealerCorpID')->nullable();
            $table->unsignedBigInteger('CertificateID')->nullable();
            $table->string('PolicyNumber')->nullable();
            $table->string('SerialNumber')->nullable();
            $table->unsignedBigInteger('CoverageID')->nullable();
            $table->string('Company')->nullable();
            $table->string('SubmittingDealer')->nullable();
            $table->string('WorkOrderNumber')->nullable();
            $table->string('WebClaimNum')->nullable();
            $table->boolean('USA')->nullable();
            $table->boolean('Australia')->nullable();
            $table->boolean('New Zealand')->nullable();
            $table->boolean('ShowIt')->nullable();
            $table->string('Status')->nullable();
            $table->dateTime('SubDate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ClaimSearch');
    }
}
