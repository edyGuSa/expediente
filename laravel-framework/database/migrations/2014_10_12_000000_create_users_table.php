<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',40)->unique();
            $table->string('username',40)->unique();
            $table->string('name',40);
            $table->string('lastname',40)->nullable();
            $table->string('direccion',100)->nullable();
            $table->string('fecha_nacimiento',40)->nullable();
            $table->boolean('is_admin');
            $table->enum('genero', ['Hombre', 'Mujer']);
            $table->enum('tipo_sangre', [   'O Negativo', 
                                            'O Postivo',
                                            'A Negativo',
                                            'A Positivo',
                                            'B Negativo',
                                            'B Positivo',
                                            'AB Negativo',
                                            'AB Positivo'
                                        ]);
            $table->string('alergias',390)->nullable();
            $table->string('password',500);
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
        Schema::dropIfExists('users');
    }
}
