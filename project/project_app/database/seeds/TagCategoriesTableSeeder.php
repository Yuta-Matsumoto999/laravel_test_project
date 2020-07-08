<?php

use Illuminate\Database\Seeder;

class TagCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tag_categories')->truncate();
        DB::table('tag_categories')->insert([
            [
                'name' => 'WEAR',
            ],
            [
                'name' => 'GLOB',
            ],
            [
                'name' => 'TRAINNIG',
            ],
        ]);
    }
}