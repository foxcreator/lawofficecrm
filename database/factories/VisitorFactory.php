<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visitor>
 */
class VisitorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $visitorStatus = $this->faker->randomElement([0, 1]); // 0 - Гость, 1 - Клиент

        $visitorData = [
            'email' => $this->faker->unique()->safeEmail,
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'father_name' => $this->faker->lastName,
            'birthdate' => $this->faker->date,
            'phone' => $this->faker->e164PhoneNumber,
            'visitor_status' => $visitorStatus,
        ];

        if ($visitorStatus === 1) {
            // Дополнительные поля для клиентов
            $visitorData['tin_code'] = $this->faker->numberBetween(1111111111, 9999999999);
            $visitorData['passport_number'] = $this->faker->unique()->bothify('??????????');
            $visitorData['passport_issued_by'] = $this->faker->company;
            $visitorData['passport_when_issued'] = $this->faker->date;
            $visitorData['address'] = $this->faker->address;
        }

        return $visitorData;
    }

}
