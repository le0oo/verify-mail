<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCisMailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cis_mails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_verify_mail_fk'); // Relación con VerifyMail
            $table->foreign('id_verify_mail_fk')->references('id')->on('verify_mails');
            $table->unsignedBigInteger('id_cis_table_fk'); // Relación con CisTable
            $table->foreign('id_cis_table_fk')->references('id')->on('cis_tables');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cis_mails');
    }
}
