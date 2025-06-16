<?php

namespace HeliosLive\Reseeder;

use \HeliosLive\Reseeder\Commands\ExportTableCommand;
use \Spatie\LaravelPackageTools\PackageServiceProvider;

class DumpImportExportServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('dump-import-exporter')
//            ->hasConfigFile()
//            ->hasMigration('create_package_tables')
            ->publishesServiceProvider(DumpImportExportServiceProvider::class)
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
