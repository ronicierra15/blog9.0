<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class SiembraPost extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 3; $i++) {
            DB::table('post')->insert([
                'post-titulo' => Str::random(255),
                'post-public' => Str::random(1000),
                'usuario-id' => $i,
                'created_at' => null,
                'updated_at' => null,
            ]);
        }
    }
}
