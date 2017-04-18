<?php

use Illuminate\Database\Seeder;

class BannerSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Banner::class,40)->create();
    }
}
