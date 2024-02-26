<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string("Job_id");
            $table->integer("cloth");
            $table->integer("payment");
            $table->enum("cloth_status",["pending",'delivered']);
            $table->enum("payment_status",["pending","paid"]);
            $table->enum("job_type",["pressing","washing","dry_cleaning"]);
            $table->dateTime("picking_time")->nullable();
            $table->longText("description")->nullable();
            $table->string("customer_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
