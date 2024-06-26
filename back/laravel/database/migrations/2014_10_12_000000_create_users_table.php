<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('type')->default(2);
            $table->rememberToken();
        });

        DB::table('users')->insert([
            'first_name'=> 'Julie',
            'last_name'=> 'Villegas',
            'phone_number'=> '123456789',
            'email'=> 'julievillegas77@gmail.com',
            'password'=> bcrypt('julie')
        ]);

        DB::table('users')->insert([
            'first_name'=> 'Pol',
            'last_name'=> 'Prats',
            'phone_number'=> '987654321',
            'email'=> 'polprats@gmail.com',
            'password'=> bcrypt('pol'),
            'type' => 1,
        ]);
    } 


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
