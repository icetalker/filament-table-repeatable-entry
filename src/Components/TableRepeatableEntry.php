<?php

namespace Icetalker\FilamentTableRepeatableEntry\Infolists\Components;

use Filament\Infolists\Components\RepeatableEntry;

class TableRepeatableEntry extends RepeatableEntry
{
    protected string $view = 'filament-table-repeatable-entry::table-repeatable-entry';

    protected array|null $columnLabels = [];

    protected bool $striped = false;

    protected bool $showIndex = false;

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
                'component' => $component->getName(),
                'name' => $component->getLabel(),
            ];
        }
    }

    public function childComponents(array | \Closure $components): static
    {
        foreach ($components as $component) {
            $component->hiddenLabel(); //Disable Label, only show Entries inside table
            $this->childComponents[] = $component;
        }

        return $this;
    }

    public function striped(bool | \Closure $striped = true): static
    {
        $this->striped = $striped;

        return $this;
    }

    public function getStriped(): bool{
        return $this->striped;
    }

    public function showIndex(bool | \Closure $showIndex = true): static
    {
        $this-> showIndex = $showIndex;
        return $this;
    }

    public function getShowIndex(): bool
    {
        return $this->showIndex;
    }
}
