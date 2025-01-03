<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Columna ID (primary key)
            $table->string('name'); // Agrega la columna `name`
            $table->string('email')->unique(); // Columna email (única)
            $table->string('password'); // Columna password
            $table->string('remember_token')->nullable(); // Token para recordar sesión
            $table->boolean('is_admin')->default(false); // Columna para identificar administradores
            $table->timestamps(); // Columnas created_at y updated_at
        });
    }
    public function down()
    {
        Schema::dropIfExists('users');
    }
}