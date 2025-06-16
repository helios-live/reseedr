<?php

namespace HeliosLive\Reseeder;

use \HeliosLive\Reseeder\Commands\ExportTableCommand;
use \Spatie\LaravelPackageTools\PackageServiceProvider;
use \Spatie\LaravelPackageTools\Package;

class ReseedrServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('reseedr')
//            ->hasConfigFile()
//            ->hasMigration('create_package_tables')
            ->publishesServiceProvider(ReseedrServiceProvider::class)
            ->hasConsoleCommand(ExportTableCommand::class);
//            ->hasInstallCommand(function(InstallCommand $command) {
//                $command
//                    ->publishConfigFile()
//                    ->publishAssets()
//                    ->publishMigrations()
//                    ->askToRunMigrations()
//                    ->copyAndRegisterServiceProviderInApp()
//                    ->askToStarRepoOnGitHub('your-vendor/your-repo-name')
//            })
        ;
    }
}
