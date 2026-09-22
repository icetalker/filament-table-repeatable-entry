@php
    use Filament\Support\Enums\Alignment;

    $isContained = $isContained();
    $striped = $getStriped();
    $showIndex = $getShowIndex();
@endphp

<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    <div
        
        {{
            $attributes
                ->merge([
                    'id' => $getId(),
                ], escape: false)
                ->merge($getExtraAttributes(), escape: false)
                ->class(['it-table-repeatable'])
        }}
    >
        <div>
            <table>
                <thead>
                    <tr class="py-2">
                        @if($showIndex)<th class="it-table-repeatable-index"></th>@endif
                        @foreach($getColumnLabels() as $label)
                            @php
                                $alignment = $label['alignment'];
                                if (! $alignment instanceof Alignment) {
                                    $alignment = filled($alignment) ? (Alignment::tryFrom($alignment) ?? $alignment) : null;
                                }
                            @endphp
                            <th
                                @class([
                                    'it-table-repeatable-header-cell',
                                    match ($alignment) {
                                        Alignment::Start => 'text-start',
                                        Alignment::Center => 'text-center',
                                        Alignment::End => 'text-end',
                                        Alignment::Left => 'text-left',
                                        Alignment::Right => 'text-right',
                                        Alignment::Justify, Alignment::Between => 'text-justify',
                                        default => $alignment,
                                    },
                                    match ($alignment) {
                                        Alignment::Start, Alignment::Left => 'justify-start',
                                        Alignment::Center => 'justify-center',
                                        Alignment::End, Alignment::Right => 'justify-end',
                                        Alignment::Between, Alignment::Justify => 'justify-between',
                                        default => null,
                                    }
                                ])
                            >{{ $label['name'] }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getChildComponentContainers() as $item)
                    <tr class="{{ $striped ? ($loop->index%2 == 0 ? '.it-table-repeatable-striped-row' : '') : ''}}">
                        @if($showIndex)<td>{{ $loop->index + 1 }}</td>@endif

                        @foreach($item->getComponents() as $component)
                        <td>
                            {{ $component }}
                        </td>
                        @endforeach

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-dynamic-component>