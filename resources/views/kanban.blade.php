@php
    $heading = $this->getHeading();
    $footer = $this->getFooter();
    $hasBorder = $this->getHasBorder();
    $rounded = $this->getRounded();
    $blocks = $this->getBlocks();
    $styles = $this->getStyles();
@endphp
<x-filament::widget class="filament-kanban-widget">
    <div @class([
        'bg-white rounded-xl shadow overflow-hidden',
        'p-2 space-y-2' => $hasBorder,
        'dark:border-gray-600 dark:bg-gray-800' => config('filament.dark_mode'),
    ])>
        @if ($heading)
            <div @class([
                'px-4 py-2' => $hasBorder,
                'px-6 py-4' => !$hasBorder,
            ])>
                <div class="flex flex-col gap-4 xl:flex-row xl:items-center xl:justify-between">
                    <x-filament::card.heading>
                        {{ $heading }}
                    </x-filament::card.heading>
                </div>
            </div>
            <x-filament::hr />
        @endif

        <div @class(['px-4 py-2' => $hasBorder]) wire:ignore.self>
            <div>
                @includeIf($this->getBeforeKanbanView())
            </div>

            <div class="{{ $styles['wrapper'] }}">
                @foreach($blocks as $block)
                @endforeach
            </div>
            <div>
                @includeIf($this->getAfterKanbanView())
            </div>
        </div>

        @if ($footer)
            <x-filament::hr />
                <div @class([
                'px-4 py-2' => $hasBorder,
                'px-6 py-4' => !$hasBorder,
            ])>
                    {{ $footer }}
                </div>
        @endif
    </div>
</x-filament::widget>
