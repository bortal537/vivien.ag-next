<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use OptimistDigital\NovaSortable\Traits\HasSortableRows;

class ImageCoords extends Resource
{
    use HasSortableRows;

    public static $group = 'System';

    public static $model = \App\ImageCoords::class;

    public static $title = 'id';

    public static $search = [
        'id',
        'uuid',
        'coords',
    ];

    public static $searchRelations = [
        'image' => ['name'],
    ];

    final public function fields(Request $request): array
    {
        return [
            ID::make(__('Id'), 'id')
                ->hideFromIndex()
            ,
            Text::make(__('Uuid'), 'uuid')
                ->onlyOnDetail()
            ,
            BelongsTo::make(__('Image'), 'image')
            ,
            Code::make(__('Coords'), 'coords')
                ->showOnIndex()
                ->default('{}')
                ->json()
                ->height('auto')
            ,
        ];
    }
}
