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

        while (strlen($slug) == 0) {
            $this->warn('  the slug name is required');
            $slug = $this->ask('What is The slug in my gift app?');
        }

        $number = 400000;
        $total = 100; // Total number of steps
        $progressBar = $this->output->createProgressBar($total);

        try {
            $configArray = include(config_path("mygift-api.php"));
            $configArray['slug'] = $slug;
            $str = "<?php return " . var_export($configArray, true) . ";";
            file_put_contents(config_path("mygift-api.php"), $str);
            $progressBar->start();

            // Perform your task that you want to show progress for
            for ($i = 0; $i < $total; $i++) {
                usleep($number); // Simulate some work
                $progressBar->advance(); // Advance the progress bar
            }
            $progressBar->finish();
            $this->info("  almost done");


        } catch (\Exception $exception) {

        }
    }

}
