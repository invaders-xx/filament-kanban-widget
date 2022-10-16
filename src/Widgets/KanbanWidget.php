<?php

namespace InvadersXX\FilamentKanbanWidget\Widgets;

use Closure;
use Filament\Support\Concerns\Configurable;
use Filament\Support\Concerns\EvaluatesClosures;
use Filament\Support\Concerns\HasExtraAlpineAttributes;
use Filament\Support\Concerns\HasExtraAttributes;
use Filament\Widgets\Widget;
use Illuminate\Contracts\Support\Htmlable;

abstract class KanbanWidget extends Widget
{
    use HasExtraAttributes;
    use HasExtraAlpineAttributes;
    use EvaluatesClosures;
    use Configurable;

    protected static string $view = 'filament-kanban-widget::kanban';

    protected string|Htmlable|null $heading = null;

    protected string|Htmlable|null $footer = null;

    protected array|Closure|null $blocks = [];

    protected bool $hasBorder = true;

    protected bool $rounded = true;

    protected string|Closure $sortableView = 'filament-kanban-widget::sortable';

    protected string|Closure|null $beforeKanbanView = null;

    protected string|Closure|null $afterKanbanView = null;

    public function boot()
    {
        $this->configure();
    }

    public function heading(string|Htmlable|null $heading): self
    {
        $this->heading = $heading;

        return $this;
    }

    public function getHeading(): string|Htmlable|null
    {
        return $this->heading;
    }

    public function footer(string|Htmlable|null $footer): self
    {
        $this->footer = $footer;

        return $this;
    }

    public function getFooter(): string|Htmlable|null
    {
        return $this->footer;
    }

    public function hasBorder(bool $noBorder = true): self
    {
        $this->hasBorder = $noBorder;

        return $this;
    }

    public function getHasBorder(): bool
    {
        return $this->hasBorder;
    }

    public function rounded(bool $rounded = true): self
    {
        $this->rounded = $rounded;

        return $this;
    }

    public function getRounded(): bool
    {
        return $this->rounded;
    }

    public function blocks(array|Closure $blocks = []): self
    {
        $this->blocks = $blocks;

        return $this;
    }

    public function getBlocks(): array
    {
        $return = $this->evaluate($this->blocks);

        return $return;
    }

    public function beforeKanbanView(string|Closure $view): self
    {
        $this->beforeKanbanView = $view;

        return $this;
    }

    public function getBeforeKanbanView(): ?string
    {
        return $this->evaluate($this->beforeKanbanView);
    }

    public function afterKanbanView(string|Closure $view): self
    {
        $this->afterKanbanView = $view;

        return $this;
    }

    public function getAfterKanbanView(): ?string
    {
        return $this->evaluate($this->afterKanbanView);
    }

    public function getStyles(): array
    {
        return [
            'wrapper' => 'w-full h-full flex space-x-4 overflow-x-auto',
            'kanbanWrapper' => 'h-full flex-1',
            'kanban' => 'bg-primary-200 rounded px-2 flex flex-col h-full',
            'kanbanHeader' => 'p-2 text-sm text-gray-900',
            'kanbanFooter' => '',
            'kanbanRecords' => 'space-y-2 p-2 flex-1 overflow-y-auto',
            'record' => 'shadow bg-white dark:bg-gray-800 p-2 rounded border',
            'recordContent' => 'w-full',
        ];
    }
}
