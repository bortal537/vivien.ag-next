<?php

namespace App\Nova\Filters;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class EventsTimeFilter extends Filter
{
    public $component = 'select-filter';

    public $name = 'Time region';

    public function apply(Request $request, $query, $value)
    {
        if ($value === 'upcoming') {
            return $query->where('date_to', '>', Carbon::now());
        }

        if ($value === 'past') {
            return $query->where('date_to', '<', Carbon::now());
        }

        return $query;
    }

    final public function options(Request $request): array
    {
        return [
            'Upcoming' => 'upcoming',
            'Past' => 'past',
            'All' => 'all',
        ];
    }

    final public function default(): string
    {
        return 'upcoming';
    }
}
