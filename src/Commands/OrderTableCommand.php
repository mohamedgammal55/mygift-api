<?php

namespace Gemy\MygiftApi\Commands;

use Illuminate\Console\Command;

class OrderTableCommand extends Command
{
    protected $signature = 'my-gift:command'; // Command signature
    protected $description = 'Make Model'; // Command description

    public function handle()
    {
        $this->info('my gift is running');

        $table = $this->ask('What is Order Table name in db?');

        $this->info("$table is ok");

        // Your command logic goes here


    }
}