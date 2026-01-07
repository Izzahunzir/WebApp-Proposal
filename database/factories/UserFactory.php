<?php




namespace Database\Factories;




use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



class UserFactory extends Factory
{

    protected static ?string $password;




    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   public function definition(): array
{
    // A list of common Malay name starters
    $malayPrefixes = ['Ahmad', 'Mohd', 'Siti', 'Nur', 'Muhammad', 'Abdul', 'Nor', 'Wan'];
   
    return [
        // This picks a prefix and adds a random Malaysian name after it
        'name' => fake()->randomElement($malayPrefixes) . ' ' . fake()->firstName(),
        'email' => fake()->unique()->safeEmail(),
        'matric_number' => fake()->unique()->numerify('#######'),
        'email_verified_at' => now(),
        'role' => 'student', // Default Role
        'password' => static::$password ??= Hash::make('password'),
        'remember_token' => Str::random(10),
        'profile_photo' => null,
    ];
}

// Special state for Staff
public function staff(): static
{
    return $this->state(fn (array $attributes) => [
        'role' => 'staff',
        'matric_number' => 'ST' . fake()->unique()->numerify('#####'), // e.g., ST12345
    ]);
}


    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
