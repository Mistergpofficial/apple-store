<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\CustomerReviews;
use App\Models\Extra;
use App\Models\FeaturedApps;
use App\Models\FreeApps;
use App\Models\IndividualApps;
use App\Models\LatestApps;
use App\Models\PaidApps;
use App\Models\Search;
use App\Models\TopAppsGross;
use App\Models\TopFreeApps;
use App\Models\TopGrossApp;
use App\Models\TopPaidApps;
use Illuminate\Console\Command;

class DeleteRecords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DeleteRecords:deleterecords';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all records in eloquent once every week';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        TopGrossApp::truncate();
        TopAppsGross::truncate();
        TopPaidApps::truncate();
        TopFreeApps::truncate();
        Search::truncate();
        PaidApps::truncate();
        LatestApps::truncate();
        IndividualApps::truncate();
        FreeApps::truncate();
        FeaturedApps::truncate();
        Extra::truncate();
        CustomerReviews::truncate();
        Category::truncate();

        return $this->info('Successful');
    }
}
