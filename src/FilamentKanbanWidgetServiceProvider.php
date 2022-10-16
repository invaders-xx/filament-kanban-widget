<?php

namespace InvadersXX\FilamentKanbanWidget;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentKanbanWidgetServiceProvider extends PluginServiceProvider
{
    public static string $name = 'filament-kanban-widget';

    protected array $resources = [
        // CustomResource::class,
    ];

    protected array $pages = [
        // CustomPage::class,
    ];

    protected array $widgets = [
        // CustomWidget::class,
    ];

    /*protected array $styles = [
        'plugin-filament-kanban-widget' => __DIR__ . '/../resources/dist/filament-kanban-widget.css',
    ];

    protected array $scripts = [
        'plugin-filament-kanban-widget' => __DIR__ . '/../resources/dist/filament-kanban-widget.js',
    ];*/

    // protected array $beforeCoreScripts = [
    //     'plugin-filament-kanban-widget' => __DIR__ . '/../resources/dist/filament-kanban-widget.js',
    // ];

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasConfigFile()
            ->hasViews();
    }
}
