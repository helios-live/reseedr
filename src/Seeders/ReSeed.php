<?php

namespace HeliosLive\Reseeder\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($tables = []): void
    {
        $dir = storage_path("app/private/seed-data/");
        $files = scandir($dir);
        $files = array_filter($files, function($file) {
            return pathinfo($file, PATHINFO_EXTENSION) === 'php';
        });

        if(!count($tables)) {
            $tables = array_map(function ($file) {
                return pathinfo($file, PATHINFO_FILENAME);
            }, $files);
        }

        foreach ($tables as $table) {

            $data = (function($table, $dir){
                return include($dir . $table . ".php");
            })($table, $dir);
            if(!isset($data) || !is_array($data) || !count($data)) {
                \Illuminate\Support\Facades\Log::warning("Dump: Table export for table '$table' is empty.");
                continue;
            }
            DB::table($table)->insert($data);
        }
    }
}
