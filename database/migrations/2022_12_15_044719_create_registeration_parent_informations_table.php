<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterationParentInformationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registeration_parent_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id');
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');
            
            $table->text('relation_to_applicant')->nullable();
            $table->text('parent_first_name')->nullable();
            $table->text('parent_middle_name')->nullable();
            $table->text('parent_last_name')->nullable();
            $table->text('parent_cell_phone')->nullable();
            $table->text('parent_email')->nullable();
            $table->text('parent_employer')->nullable();
            $table->text('parent_position')->nullable();
            $table->text('parent_work_phone')->nullable();
            $table->text('parent_school')->nullable();
            
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
        Schema::dropIfExists('registeration_parent_informations');
    }
}
