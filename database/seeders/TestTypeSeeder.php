<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TestType;

class TestTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define test types data
        $testTypes = [
            [
                'name' => 'CTA Button Type',
                'alias' => 'cta-button-type',
                'description' => 'This changes the color of the register button',
            ],
            [
                'name' => 'Show Social Logins',
                'alias' => 'show-social-logins',
                'description' => 'This is to show or hide the option to login with social apps like Facebook, etc',
            ],
            [
                'name' => 'Brand Text',
                'alias' => 'brand-text',
                'description' => 'This is to change the text of the brand slogan',
            ],
        ];

        // Insert test types into database
        foreach ($testTypes as $testType) {
            TestType::create($testType);
        }
    }
}
