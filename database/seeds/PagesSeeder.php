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
            ["category_id" => "kontaktai", "id" => "kontaktai"],
            ["category_id" => "patirciu-kambariai", "id" => "the_lab_lt"],
            ["category_id" => "patirciu-kambariai", "id" => "fruit_ninja_lt"],
        ];

        DB::beginTransaction ();
        try {
            foreach ($pages as $pageData) {
                $page = VRPages::where ('category_id', $pageData['category_id'])->first ();
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
