<?php

namespace App\Nova;

use Drobee\NovaSluggable\Slug;
use Drobee\NovaSluggable\SluggableText;
use Epartment\NovaDependencyContainer\HasDependencies;
use Epartment\NovaDependencyContainer\NovaDependencyContainer;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Code;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Boolean;

class StaticAttribute extends Resource
{
    use HasDependencies;

    protected static array $orderBy = ['name' => 'asc'];

    public static $group = 'Contents';

    public static $model = \App\StaticAttribute::class;

    public static $title = 'name';

    public static $search = [
        'id',
        'name',
        'slug',
        'value',
        'data'
    ];

    final public function fields(Request $request): array
    {
        $table = $this->model()->getTable();

        return [
            ID::make()->hideFromIndex()
            ,
            SluggableText::make(__('Name'), 'name')
                ->rules('required')
                ->creationRules("unique:$table,name")
                ->updateRules("unique:$table,name,{{resourceId}}")
                ->sortable()
            ,
            Slug::make(__('Slug'), 'slug')
                ->withMeta(['readonly' => 'true'])
                ->creationRules("unique:$table,slug")
                ->updateRules("unique:$table,slug,{{resourceId}}")
                ->sortable()
            ,
            Select::make('Type', 'type')->options([
                0 => 'Simple (Text)',
                1 => 'Complex (JSON)',
            ])->displayUsingLabels()
                ->sortable()
            ,
            NovaDependencyContainer::make([
                Text::make(__('Value'), 'value')
                    ->sortable()
                ,
            ])->dependsOn('type', 0)
            ,
            NovaDependencyContainer::make([
                Code::make(__('Data'), 'data')
                    ->json()
                    ->height('auto')
                    ->rules('json')
                    ->hideFromIndex()
                ,
            ])->dependsOn('type', 1)
            ,
            Boolean::make(__('Locked'), 'locked')
                ->sortable()
                ->trueValue('1')
                ->falseValue('0')
            ,
        ];
    }

    final public static function label(): string
    {
        return 'Attributes';
    }
}
