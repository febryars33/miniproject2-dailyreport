<?php

use App\Models\Employee;
use App\Models\Jobdesk;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeJobdesksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_jobdesks', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Employee::class, 'employee_id');
            $table->foreignIdFor(Jobdesk::class, 'jobdesk_id');
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
        Schema::dropIfExists('employee_jobdesks');
    }
}
