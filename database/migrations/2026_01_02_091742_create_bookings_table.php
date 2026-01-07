<?php




use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;




return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->default('Ariena Sofea'); //PLACEHOLDER
            $table->string('matric_number');
            $table->string('sport_type'); 
            $table->integer('court_number'); 
            $table->date('booking_date');
            $table->string('time_slot'); 
            $table->string('status')->default('Confirmed');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
