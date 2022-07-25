<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodoTagsTable extends Migration
{

    public function up()
    {
        Schema::create('todo_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('todo_id');
            $table->string('tag');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('todo_tags');
    }
}
