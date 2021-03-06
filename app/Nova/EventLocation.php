<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class EventLocation extends Resource
{
    protected static array $orderBy = ['name' => 'asc'];

    public static $model = \App\Models\EventLocation::class;

    public static $title = 'name';

    public static $search = [
        'id',
        'name',
        'description',
        'address',
        'url',
    ];

    public static function group(): string
    {
        return __('Events');
    }

    final public function fields(Request $request): array
    {
        return [
            ID::make()->hideFromIndex()
            ,
            Text::make(__('Uuid'), 'uuid')
                ->onlyOnDetail()
            ,
            Text::make(__('Name'), 'name')
                ->rules('required')
                ->sortable()
            ,
            Text::make(__('Address'), 'address')
                ->sortable()
                ->help('Postal address.')
            ,
            Textarea::make(__('Description'), 'description')
                ->rows(2)
                ->hideFromIndex()
            ,
            Text::make(__('Url'), 'url')
                ->rules('nullable', 'url')
                ->sortable()
                ->help('<strong>Location website</strong> or <strong>Google Maps Url</strong>.')
            ,
            HasMany::make(__('Events'), 'events', Event::class)
            ,
        ];
    }

    final public static function label(): string
    {
        return __('Locations');
    }

    final public static function singularLabel(): string
    {
        return __('Location');
    }
}
