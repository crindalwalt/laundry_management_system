<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */

/**
 * $table->id();
 * $table->string("Job_id");
 * $table->integer("cloth");
 * $table->double("payment");
 * $table->enum("cloth_status",["pending","completed","cancelled"]);
 * $table->enum("payment_status",["pending","completed","cancelled"]);
 * $table->dateTime("picking_time");
 * $table->longText("description");
 * $table->string("customer_id");
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomClothValues = ['pending','delivered'];
        $randomPaymentValues = ['pending', 'paid'];
        $randomJobType = ["pressing", "washing", "dry_cleaning"];
        $randomDates = [Carbon::now()->toDateString(),Carbon::yesterday()->toDateString(),Carbon::today()->subDays(rand(0, 180))->toDateString()];
        return [
            'Job_id' => "JOB-" . $this->faker->randomNumber("6"),
            'cloth' => $this->faker->numberBetween(1, 10),
            'payment' => $this->faker->numberBetween(500, 5000),
            'cloth_status' => $this->faker->randomElement($randomClothValues),
            'payment_status' => $this->faker->randomElement($randomPaymentValues),
            'job_type' => $this->faker->randomElement($randomJobType),
            'picking_time' => $this->faker->dateTime(),
            'description' => $this->faker->paragraph,
            'customer_id' => $this->faker->numberBetween(1, 5),
            'created_at' => $this->faker->randomElement($randomDates),
        ];
    }
}
