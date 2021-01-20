<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class accountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([
            'platform'  => 'WEBEX MEETINGS',
            'host'     => 'networking@ighgroup.com',
            'project'  => 'MINSUR - UM SAN RAFAEL',
        ]);
    }
}
