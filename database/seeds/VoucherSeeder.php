<?php

use Illuminate\Database\Seeder;
use App\Models\Voucher;
class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prefix = "ABC";
        $faker = Faker\Factory::create();
        Voucher::create([
            'voucher_id' => $prefix . $faker->randomNumber($nbDigits = 4, $strict = false),
            'name' => "Voucher 1",
            'type' => "amount",
            'deduction_amount' => "15000",
            'start_from' => now()->subDays(1),
            'end_at' => now()->addDays(10),
            'is_enable' => TRUE,
            'released_voucher' => 100,
            'used_voucher' => 5
        ]);

        Voucher::create([
            'voucher_id' => $prefix . $faker->randomNumber($nbDigits = 4, $strict = false),
            'name' => "Voucher 2",
            'type' => "percentage",
            'deduction_amount' => "50",
            'start_from' => now()->subDays(1),
            'end_at' => now()->addDays(10),
            'is_enable' => TRUE,
            'released_voucher' => 20,
            'used_voucher' => 5
        ]);
        Voucher::create([
            'voucher_id' => $prefix . $faker->randomNumber($nbDigits = 4, $strict = false),
            'name' => "Voucher 3",
            'type' => "amount",
            'deduction_amount' => "30000",
            'start_from' => now()->subDays(1),
            'end_at' => now()->addDays(10),
            'is_enable' => TRUE,
            'released_voucher' => 10,
            'used_voucher' => 0
        ]);
    }
}
