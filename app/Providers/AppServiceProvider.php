<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // store
        $this->app->bind(
            \App\DataProvider\Store\StoreRepositoryInterface::class,
            \App\DataProvider\Store\StoreRepository::class
        );

        // machine
        $this->app->bind(
            \App\DataProvider\Machine\MachineRepositoryInterface::class,
            \App\DataProvider\Machine\MachineRepository::class
        );

        // machine master
        $this->app->bind(
            \App\DataProvider\MachineMaster\MachineMasterRepositoryInterface::class,
            \App\DataProvider\MachineMaster\MachineMasterRepository::class
        );

        // slump
        $this->app->bind(
            \App\DataProvider\Slump\SlumpRepositoryInterface::class,
            \App\DataProvider\Slump\SlumpRepository::class
        );

        // image
        $this->app->bind(
            \App\DataProvider\Image\ImageRepositoryInterface::class,
            \App\DataProvider\Image\ImageRepository::class
        );

        // ranking service
        $this->app->bind(
            \App\DataProvider\Ranking\RankingRepositoryInterface::class,
            \App\DataProvider\Ranking\RankingRepository::class
        );
        $this->app->bind(
            \App\DataProvider\Ranking\RankingGetterRepositoryInterface::class,
            \App\DataProvider\Ranking\RankingGetterRepository::class
        );

        // client
        $this->app->bind(
            \App\DataProvider\Client\ClientRepositoryInterface::class,
            \App\DataProvider\Client\ClientRepository::class
        );
    }
}
