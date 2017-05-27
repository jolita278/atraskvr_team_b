<?php

use App\Models\VRPagesTranslations;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesTranslationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $pages = [
            ["page_id" => "apie", "language_id" => "lt", "title" => "apie","description_short"=> "apie_short","description_long"=> "apie_long","slug"=> "apie_slug1",],
            ["page_id" => "about", "language_id" => "en", "title" => "about","description_short"=> "apie_short","description_long"=> "apie_long","slug"=> "apie_slug2",],
            ["page_id" => "O проекте", "language_id" => "ru", "title" => "проекте","description_short"=> "apie_short","description_long"=> "apie_long","slug"=> "apie_slug3",],
            ["page_id" => "kontaktai", "language_id" => "lt", "title" => "kontaktai","description_short"=> "apie_short","description_long"=> "apie_long","slug"=> "apie_slug4",],
            ["page_id" => "contact", "language_id" => "en", "title" => "contact","description_short"=> "apie_short","description_long"=> "apie_long","slug"=> "apie_slug5",],
            ["page_id" => "Kонтакты", "language_id" => "ru", "title" => "Kонтакты","description_short"=> "apie_short","description_long"=> "apie_long","slug"=> "apie_slug6",],
            ["page_id" => "the_lab_lt", "language_id" => "lt", "title" => "the_lab_lt","description_short"=> "apie_short","description_long"=> "apie_long","slug"=> "apie_slug7",],
            ["page_id" => "the_lab_en", "language_id" => "en", "title" => "the_lab_en","description_short"=> "apie_short","description_long"=> "apie_long","slug"=> "apie_slug8",],
            ["page_id" => "the_lab_ru", "language_id" => "ru", "title" => "the_lab_ru","description_short"=> "apie_short","description_long"=> "apie_long","slug"=> "apie_slug9",],
            ["page_id" => "fruit_ninja_lt", "language_id" => "lt", "title" => "fruit_ninja_lt","description_short"=> "apie_short","description_long"=> "apie_long","slug"=> "apie_slug10",],
            ["page_id" => "fruit_ninja_en", "language_id" => "en", "title" => "fruit_ninja_en","description_short"=> "apie_short","description_long"=> "apie_long","slug"=> "apie_slug11",],
            ["page_id" => "fruit_ninja_ru", "language_id" => "ru", "title" => "fruit_ninja_ru","description_short"=> "apie_short","description_long"=> "apie_long","slug"=> "apie_slug12",],
            ["page_id" => "space_pirate_trainer_lt", "language_id" => "lt","title" => "space_pirate_trainer_lt","description_short"=> "apie_short","description_long"=> "apie_long","slug"=> "apie_slug13",],
            ["page_id" => "space_pirate_trainer_en", "language_id" => "en", "title" => "space_pirate_trainer_en","description_short"=> "apie_short","description_long"=> "apie_long","slug"=> "apie_slug14",],
            ["page_id" => "space_pirate_trainer_ru", "language_id" => "ru", "title" => "space_pirate_trainer_ru","description_short"=> "apie_short","description_long"=> "apie_long","slug"=> "apie_slug15",],
            ["page_id" => "tilt_brush_lt", "language_id" => "lt", "title" => "tilt_brush_lt","description_short"=> "apie_short","description_long"=> "apie_long","slug"=> "apie_slug16",],
            ["page_id" => "tilt_brush_en", "language_id" => "en", "title" => "tilt_brush_en","description_short"=> "apie_short","description_long"=> "apie_long","slug"=> "apie_slug17",],
            ["page_id" => "tilt_brush_ru", "language_id" => "ru", "title" => "tilt_brush_ru","description_short"=> "apie_short","description_long"=> "apie_long","slug"=> "apie_slug18",],
            ["page_id" => "merry_snowballs_lt", "language_id" => "lt", "title" => "merry_snowballs_lt","description_short"=> "apie_short","description_long"=> "apie_long","slug"=> "apie_slug19",],
            ["page_id" => "merry_snowballs_en", "language_id" => "en", "title" => "merry_snowballs_en","description_short"=> "apie_short","description_long"=> "apie_long","slug"=> "apie_slug20",],
            ["page_id" => "merry_snowballs_ru", "language_id" => "ru", "title" => "merry_snowballs_ru","description_short"=> "apie_short","description_long"=> "apie_long","slug"=> "apie_slug21",],
            ["page_id" => "samsung_irklavimas_lt", "language_id" => "lt", "title" => "samsung_irklavimas_lt","description_short"=> "apie_short","description_long"=> "apie_long","slug"=> "apie_slug22",],
            ["page_id" => "samsung_irklavimas_en", "language_id" => "en", "title" => "samsung_irklavimas_en","description_short"=> "apie_short","description_long"=> "apie_long","slug"=> "apie_slug23",],
            ["page_id" => "samsung_irklavimas_ru", "language_id" => "ru", "title" => "samsung_irklavimas_ru","description_short"=> "apie_short","description_long"=>  "apie_long", "slug" =>"apie_slug24",]
        ];

            DB::beginTransaction();
        try {
            foreach ($pages as $roleData) {
                $role = VRPagesTranslations::where('id', $roleData['page_id'])->first();
                if (!$role)
                    VRPagesTranslations::create($roleData);
            }
        } catch (\Exception $e) {
            DB::rollback();
            throw new Exception($e->getMessage());
        }
        DB::commit();
    }

}
