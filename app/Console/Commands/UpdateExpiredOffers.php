<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateExpiredOffers extends Command
{
    protected $signature = 'offers:update_expired';

    protected $description = 'Aggiorna le offerte scadute';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $now = Carbon::now();

        DB::table('offer_property')
            ->where('finished_at', '<', $now)
            ->update(['expired' => true]);

        $this->info('Aggiornamento completato!');
    }
}
