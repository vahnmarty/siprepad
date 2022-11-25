<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecommendationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recommendations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Profile_ID');
            $table->foreign('Profile_ID')->references('id')->on('profiles')->onDelete('cascade');
            $table->string('Rec_Name')->nullable();
            $table->string('Rec_Email')->nullable();
            $table->string('Rec_Student')->nullable();
            $table->string('Rec_Message')->nullable();
            $table->string('Rec_Request_Send_Date')->nullable();
            $table->string('Rec_Relationship_to_Student')->nullable();
            $table->string('Rec_Years_Known_Student')->nullable();
            $table->string('Rec_Recommendation')->nullable();
            $table->string('Rec_Send_Date')->nullable();
            $table->tinyInteger('Status')->comment('0:Pending,1:Compleate')->default(0);
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
        Schema::dropIfExists('recommendations');
    }
}
