<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

class Menu extends Resource
{
    public static $group = 'Routing';

    public static $model = \App\Menu::class;

    public static $title = 'slug';

    public static $search = [
        'id',
        'slug',
    ];

    public static $with = [
        'menuItems',
        'menuItems.menu',
        'menuItems.route',
    ];

    final public function fields(Request $request): array
    {
        return [
            ID::make(__('Id'), 'id')
                ->onlyOnDetail()
            ,
            Text::make(__('Uuid'), 'uuid')
                ->onlyOnDetail()
            ,
            Text::make(__('Slug'), 'slug')
                ->rules('required')
                ->sortable()
            ,
            Boolean::make(__('Published'), 'published')
                ->rules('required')
                ->sortable()
            ,
            HasMany::make(__('Menu Items'), 'menuItems')
            ,
        ];
    }
}
