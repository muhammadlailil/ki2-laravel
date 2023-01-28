<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SumOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:sum';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command untuk menjumlah total order';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // isi coding fungsi command
        // 
        // $this->info('Command success');
        return Command::SUCCESS;
    }
}
