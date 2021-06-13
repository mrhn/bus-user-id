<?php

namespace App\Providers;

use Illuminate\Bus\BatchFactory;
use Illuminate\Bus\BatchRepository;
use Illuminate\Database\Connection;
use App\Repostories\BatchRepository as CustomBatchRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->extend(BatchRepository::class, function () {
            return new CustomBatchRepository(resolve(BatchFactory::class), resolve(Connection::class), 'job_batches');
        });

        $this->app->extend(CustomBatchRepository::class, function () {
            return new CustomBatchRepository(resolve(BatchFactory::class), resolve(Connection::class), 'job_batches');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
