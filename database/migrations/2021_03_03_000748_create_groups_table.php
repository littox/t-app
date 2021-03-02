<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index()->comment('Название группы');
            $table->string('faculty')->comment('Факультет');
            $table->unsignedInteger('course')->comment('Курс');
            $table->boolean('archive')->default(0)->comment('В архиве');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
