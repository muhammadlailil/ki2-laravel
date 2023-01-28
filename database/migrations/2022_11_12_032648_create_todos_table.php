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
        /**
         * table = todos
         * colom = title, deskrispi , tanggal , is_done
         */
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->timestamps(); // created_at sama updated_at
            $table->string('title',100);
            $table->text('deskripsi');
            $table->date('tanggal');
            $table->boolean('is_done')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos');
    }
};
