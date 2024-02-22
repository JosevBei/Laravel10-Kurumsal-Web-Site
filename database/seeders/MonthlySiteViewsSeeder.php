<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MonthlySiteViewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;

        for ($i = 1; $i <= 12; $i++) {
            DB::table('monthly_site_views')->insert([
                'year' => $currentYear,
                'month' => $i,
                'view_count' => rand(100, 1000),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
