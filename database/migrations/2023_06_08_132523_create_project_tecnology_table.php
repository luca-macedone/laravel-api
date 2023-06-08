<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_tecnology', function (Blueprint $table) {
            // $table->after('id', function($table){
                $table->unsignedBigInteger('project_id')->nullable();
                $table->foreign('project_id')->references('id')->on('tecnologies')->cascadeOnDelete();
            // });

            // $table->after('project_id', function($table){
                $table->unsignedBigInteger('tecnology_id')->nullable();
                $table->foreign('tecnology_id')->references('id')->on('projects')->cascadeOnDelete();
            // });
            
            $table->timestamps();

            $table->primary(['project_id', 'tecnology_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_tecnology');
    }
};
