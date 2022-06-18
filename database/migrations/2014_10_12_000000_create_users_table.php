<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
            $table->id();
            $table->string('Name');
            $table->foreignId('Department_id');
            $table->foreignId('Designation_id');
            $table->string('Phone_number');
            $table->timestamp('Created_at');
            $table->foreign('Department_id')->references('id')->on('departments');
            $table->foreign('Designation_id')->references('id')->on('designations');
        });
        DB::table('users')->insert([
            ['Name' => 'Athila', 'Department_id' => 1, 'Designation_id' => 1, 'Phone_number' => '9988774455'],
            ['Name' => 'Anila', 'Department_id' => 2, 'Designation_id' => 2, 'Phone_number' => '9874563215'],
            ['Name' => 'Aleena', 'Department_id' => 1, 'Designation_id' => 3, 'Phone_number' => '9871236548'],
            ['Name' => 'Athulya', 'Department_id' => 3, 'Designation_id' => 3, 'Phone_number' => '7548963521'],
            ['Name' => 'Aswin', 'Department_id' => 2, 'Designation_id' => 4, 'Phone_number' => '9563241965'],
            ['Name' => 'Anagha', 'Department_id' => 1, 'Designation_id' => 5, 'Phone_number' => '9874559955'],
            ['Name' => 'Aman', 'Department_id' => 4, 'Designation_id' => 6, 'Phone_number' => '8548456598'],
            ['Name' => 'Arathi', 'Department_id' => 2, 'Designation_id' => 7, 'Phone_number' => '9633020734'],
        ]);
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
