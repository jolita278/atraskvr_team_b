<?php

use App\Models\VRPages;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            ["category_id" => "apie", "id" => "apie"],
            ["category_id" => "apie", "id" => "about"],
            ["category_id" => "apie", "id" => "O проекте"],
            ["category_id" => "kontaktai", "id" => "kontaktai"],
            ["category_id" => "kontaktai", "id" => "contact"],
            ["category_id" => "kontaktai", "id" => "Kонтакты"],
            ["category_id" => "patirciu-kambariai", "id" => "the_lab_lt"],
            ["category_id" => "patirciu-kambariai", "id" => "the_lab_en"],
            ["category_id" => "patirciu-kambariai", "id" => "the_lab_ru"],
            ["category_id" => "patirciu-kambariai", "id" => "fruit_ninja_lt"],
            ["category_id" => "patirciu-kambariai", "id" => "fruit_ninja_en"],
            ["category_id" => "patirciu-kambariai", "id" => "fruit_ninja_ru"],
            ["category_id" => "patirciu-kambariai", "id" => "space_pirate_trainer_lt"],
            ["category_id" => "patirciu-kambariai", "id" => "space_pirate_trainer_en"],
            ["category_id" => "patirciu-kambariai", "id" => "space_pirate_trainer_ru"],
            ["category_id" => "patirciu-kambariai", "id" => "tilt_brush_lt"],
            ["category_id" => "patirciu-kambariai", "id" => "tilt_brush_en"],
            ["category_id" => "patirciu-kambariai", "id" => "tilt_brush_ru"],
            ["category_id" => "patirciu-kambariai", "id" => "merry_snowballs_lt"],
            ["category_id" => "patirciu-kambariai", "id" => "merry_snowballs_en"],
            ["category_id" => "patirciu-kambariai", "id" => "merry_snowballs_ru"],
            ["category_id" => "patirciu-kambariai", "id" => "samsung_irklavimas_lt"],
            ["category_id" => "patirciu-kambariai", "id" => "samsung_irklavimas_en"],
            ["category_id" => "patirciu-kambariai", "id" => "samsung_irklavimas_ru"],
        ];

        DB::beginTransaction ();
        try {
            foreach ($pages as $pageData) {
                $page = VRPages::where ('id', $pageData['id'])->first ();
                if (!$page)
                    VRPages::create ($pageData);
            }
        } catch (\Exception $e) {
            DB::rollback ();
            throw new Exception($e->getMessage ());
        }
        DB::commit ();
    }

}
