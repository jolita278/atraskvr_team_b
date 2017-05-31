<?php

use App\Models\VRMenus;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = [
            ["id" => "apie", "new_window" => 0, "parent" => ""],
            ["id" => "pradinis", "new_window" => 0, "parent" => ""],
            ["id" => "virtualus_kambariai", "new_window" => 0, "parent" => ""],

            ["id" => "the_lab", "new_window" => 0, "parent" => "virtualus_kambariai"],
            ["id" => "fruit_ninja", "new_window" => 0, "parent" => "virtualus_kambariai"],
            ["id" => "space_pirate_trainer", "new_window" => 0, "parent" => "virtualus_kambariai"],
            ["id" => "tilt_brush", "new_window" => 0, "parent" => "virtualus_kambariai"],
            ["id" => "merry_snowballs", "new_window" => 0, "parent" => "virtualus_kambariai"],
            ["id" => "samsung_irklavimas", "new_window" => 0, "parent" => "virtualus_kambariai"],
            ["id" => "ktu_parasparnis", "new_window" => 0, "parent" => "virtualus_kambariai"],
            ["id" => "hurl", "new_window" => 0, "parent" => "virtualus_kambariai"],
            ["id" => "final_goalie_football_simulator", "new_window" => 0, "parent" => "virtualus_kambariai"],
            ["id" => "project_cars", "new_window" => 0, "parent" => "virtualus_kambariai"],

            ["id" => "vieta_laikas", "new_window" => 0, "parent" => ""],
            ["id" => "bilietai", "new_window" => 0, "parent" => ""],
            ["id" => "remejai", "new_window" => 0, "parent" => ""],
            ];

        DB::beginTransaction ();
        try {
            foreach ($menu as $menuData) {
                $menu = VRMenus::where ('id', $menuData['id'])->first ();
                if (!$menu)
                    VRMenus::create ($menuData);
            }
        } catch (\Exception $e) {
            DB::rollback ();
            throw new Exception($e->getMessage ());
        }
        DB::commit ();
    }
}
