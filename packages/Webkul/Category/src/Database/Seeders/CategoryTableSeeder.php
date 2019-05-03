<?php

namespace Webkul\Category\Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        $categoriesSeeds = [
            'men' => ['shirt', 'shoes' ,'glasses'],
            'women' => ['shirt', 'shoes', 'glasses'],
            'shirts',
            'shoes',
            'glasses',
            'promotions'
        ];
        $i = 2;
        //DB::table('categories')->delete();

        $now = Carbon::now();

        // DB::table('categories')->insert([
        //     ['id' => '1','position' => '1','image' => NULL,'status' => '1','_lft' => '1','_rgt' => '14','parent_id' => NULL, 'created_at' => $now, 'updated_at' => $now]
        // ]);

        // DB::table('category_translations')->insert([
        //     ['id' => '1','name' => 'Root','slug' => 'root','description' => 'Root','meta_title' => '','meta_description' => '','meta_keywords' => '','category_id' => '1','locale' => 'en']
        // ]);
        foreach($categoriesSeeds as $index => $cotegorySeed) {


        DB::table('categories')->insert([
            ['id' => $i,'position' => $i,'image' => NULL,'status' => '1','_lft' => '1','_rgt' => '14','parent_id' => NULL, 'created_at' => $now, 'updated_at' => $now]
        ]);

        DB::table('category_translations')->insert([
            ['id' => $i,'name' => $index,'slug' => $index,'description' => 'aqui una descripcion de la categoria'.$index,'meta_title' => $index.'meta_title','meta_description' => $index.'_meta_description','meta_keywords' => $index,'category_id' => $i,'locale' => 'en']
        ]);
        if(is_array($categoriesSeed)) {
            $j = 1;
            foreach($categoriesSeed as $value) {
                DB::table('categories')->insert([
                    ['id' => $i+$j,'position' => $j,'image' => NULL,'status' => '1','_lft' => '1','_rgt' => '14','parent_id' => $i, 'created_at' => $now, 'updated_at' => $now]
                ]);

                DB::table('category_translations')->insert([
                    ['id' => $i+$j,'name' => $value,'slug' => $value,'description' => 'aqui una descripcion de la categoria'.$value,'meta_title' => $value.'meta_title','meta_description' => $value.'_meta_description','meta_keywords' => $index,'category_id' => $i,'locale' => 'en']
                ]);
            }
        }
        $i ++;
        }
    }
}
