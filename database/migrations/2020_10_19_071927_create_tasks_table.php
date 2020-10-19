<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
        Schema::create('tag_task',function(Blueprint $table){
           $table->unsignedBigInteger('tag_id');
           $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
           $table->unsignedBigInteger('task_id');
           $table->foreign('task_id')->references('id')->on('tasks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tag_task');
        Schema::dropIfExists('tasks');
    }
}
