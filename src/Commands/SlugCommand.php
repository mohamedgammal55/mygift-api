<?php

namespace Commands;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Console\Command;

class SlugCommand extends Command
{
    protected $signature = 'my-gift:slug'; // Command signature
    protected $description = 'setup my gift slug'; // Command description

    public function handle()
    {
        $this->info('  we are working to setup my gift');

        if (!config('mygift-api.table')) {
            $this->error('  you must run this command "php artisan my-gift:setup" first');
            return true;
        }

        $slug = $this->ask('What is The slug in my gift app?');

        $table = config('mygift-api.table');


        while (strlen($slug) == 0) {
            $this->warn('  the slug name is required');
            $slug = $this->ask('What is The slug in my gift app?');
        }

        $column = $this->ask("What is your total column in $table table");

        while (strlen($column) == 0) {
            $this->warn('  the column name is required');
            $column = $this->ask("What is your total column in $table table");
        }

        while (!Schema::hasColumn($table, $column)) {
            $this->warn('  the column is invalid');
            $column = $this->ask("What is your total column in $table table");
        }

        $number = 400000;
        $total = 5; // Total number of steps
        $progressBar = $this->output->createProgressBar($total);

        try {
            $configArray = include(config_path("mygift-api.php"));
            $configArray['slug'] = $slug;
            $configArray['total_column'] = $column;
            $str = "<?php return " . var_export($configArray, true) . ";";
            file_put_contents(config_path("mygift-api.php"), $str);
            $progressBar->start();

            // Perform your task that you want to show progress for
            for ($i = 0; $i < $total; $i++) {
                usleep($number); // Simulate some work
                $progressBar->advance(); // Advance the progress bar
            }
            $progressBar->finish();
            $this->info("");
            $this->info("  almost done");
            $this->info("");


        } catch (\Exception $exception) {

        }
    }

}
