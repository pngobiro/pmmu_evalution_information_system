<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FinancialYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fy =      [
            ['id' => '1','name' => '2018/2019','start_date' => Carbon::createFromFormat('d/m/Y H:i:s',  '01/07/2018 00:00:00'),'end_date' => Carbon::createFromFormat('d/m/Y H:i:s',  '30/06/2019 00:00:00'),'is_current_fy' => 0],
            ['id' => '2','name' => '2019/2020','start_date' => Carbon::createFromFormat('d/m/Y H:i:s',  '01/07/2019 00:00:00'),'end_date' => Carbon::createFromFormat('d/m/Y H:i:s',  '30/06/2020 00:00:00'),'is_current_fy' => 0],
            ['id' => '3','name' => '2020/2021','start_date' => Carbon::createFromFormat('d/m/Y H:i:s',  '01/07/2020 00:00:00'),'end_date' => Carbon::createFromFormat('d/m/Y H:i:s',  '30/06/2021 00:00:00'),'is_current_fy' => 0],
            ['id' => '4','name' => '2021/2022','start_date' => Carbon::createFromFormat('d/m/Y H:i:s',  '01/07/2021 00:00:00'),'end_date' => Carbon::createFromFormat('d/m/Y H:i:s',  '30/06/2022 00:00:00'),'is_current_fy' => 1],
            ['id' => '5','name' => '2022/2023','start_date' => Carbon::createFromFormat('d/m/Y H:i:s',  '01/07/2022 00:00:00'),'end_date' => Carbon::createFromFormat('d/m/Y H:i:s',  '30/06/2023 00:00:00'),'is_current_fy' => 0],
            ];
        DB::table('financial_years')->insert($fy);
    }
}
