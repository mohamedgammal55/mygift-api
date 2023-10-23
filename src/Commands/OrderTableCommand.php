<?php

namespace Gemy\MygiftApi\Commands;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Console\Command;

class OrderTableCommand extends Command
{
    protected $signature = 'my-gift'; // Command signature
    protected $description = 'setup my gift'; // Command description

    public function handle()
    {
        $this->info('  we are working to setup my gift');


        $table = $this->ask('What is Order Table name in db?');

        while (strlen($table) == 0) {
            $this->warn('  the table name is required');
            $table = $this->ask('What is Order Table name in db?');
        }

        while (!$this->checkIfTableExists($table)) {
            $this->error("  $table does not exist,please try again");
            $table = $this->ask('What is Order Table name in db?');
        }

        $total = 3; // Total number of steps
        $progressBar = $this->output->createProgressBar($total);

        try {
            if (Schema::hasTable($table)) {
                $this->info("");

                $tableColumns = Schema::getColumnListing($table);
//
                $myGiftCoulms = ['mygiftcode', 'mygiftid', 'mygiftdiscount'];
                $number = 700000;
                if (count(array_intersect(collect($myGiftCoulms)->toArray(), $tableColumns)) == 3) {
                    $this->warn("  my gift Already prepared");
                    $this->info("");
                    return true;
                }


                if (!in_array("mygiftid", $tableColumns)) {
                    DB::statement("ALTER TABLE {$table} ADD mygiftid INT NULL");
                }

                if (!in_array("mygiftcode", $tableColumns)) {
                    DB::statement("ALTER TABLE {$table} ADD mygiftcode VARCHAR(255) NULL");
                }
                if (!in_array("mygiftdiscount", $tableColumns)) {
                    DB::statement("ALTER TABLE {$table} ADD mygiftdiscount DOUBLE NULL DEFAULT 0");
                }

                $this->changeConfig($table);

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
                return true;
            } else {
                $this->error("  $table does not exist");
                $this->info("");

                // The table does not exist, handle accordingly.
                return true;
            }
            $this->info("  almost done");
        } catch (\Exception $exception) {

        }
    }

    private function checkIfTableExists($table)
    {
        return Schema::hasTable($table);
    }

    private function changeConfig($table)
    {
        $phpCode = "<?php return ['table'=>'$table'] ?>";
        file_put_contents(config_path('mygift-api.php'), $phpCode);
    }
}
