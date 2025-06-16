<?php

namespace HeliosLive\Reseeder\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ExportTableCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reseedr:export-table {table}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $table = $this->argument('table');
        $q = DB::table($table);
        $data = $q->get();
        $data = $data->map(function ($item) {
            return (array) $item;
        })->toArray();

        $data = "<?php \n return " . var_export($data, true) . ";";

        $dir = database_path('dumps/');
        if(!file_exists($dir)) {
            mkdir($dir);
        }

        file_put_contents($dir . $table . '.php', $data);
    }
}
