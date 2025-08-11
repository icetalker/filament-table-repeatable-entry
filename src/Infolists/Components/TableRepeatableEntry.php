<?php

namespace Icetalker\FilamentTableRepeatableEntry\Infolists\Components;

use Filament\Infolists\Components\RepeatableEntry;
use Closure;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;
use Illuminate\Contracts\Support\Htmlable;

class TableRepeatableEntry extends RepeatableEntry
{
    protected string $view = 'filament-table-repeatable-entry::table-repeatable-entry';

    protected array|null $columnLabels = [];

    protected bool $striped = false;

    protected bool $showIndex = false;

    protected function setUp(): void
    {
        parent::setUp();

        $this->columnSpanFull();
    }

    public function getColumnLabels(): array|null
    {
        $this->setColumnLabels();

        return $this->columnLabels;
    }

    public function setColumnLabels(): void
    {
        $components = $this->getChildComponents();

        foreach ($components as $component) {
            $this->columnLabels[] = [
                'component' =>  method_exists($component, 'getName') ? $component->getName(): null,
                'name' => $component->getLabel(),
                'alignment' => method_exists($component, 'getAlignment') ? $component->getAlignment(): null
            ];
        }
    }

    public function childComponents(array | Schema | Component | Action | ActionGroup | string | Htmlable | Closure | null $components, string $key = 'default'): static
    {
        foreach ($components as $component) {
            $component->hiddenLabel(); //Disable Label, only show Entries inside table
            $this->childComponents[$key][] = $component;
        }

        return $this;
    }

    public function striped(bool $striped = true): static
    {
        $this->striped = $striped;

        return $this;
    }

    public function getStriped(): bool{
        return $this->striped;
    }

    public function showIndex(bool $showIndex = true): static
    {
        $this-> showIndex = $showIndex;
        return $this;
    }

    public function getShowIndex(): bool
    {
        return $this->showIndex;
    }
}
