<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Number;

class Session extends Resource
{
    public static $group = 'Acl';

    public static $model = \App\Models\Session::class;

    public static $title = 'id';

    public static $search = [
        'id',
        'user_id',
    ];

    public static $searchRelations = [
        'user' => ['name'],
    ];

    final public function fields(Request $request): array
    {
        return [
            ID::make(__('Id'), 'id', function () {
                return $this->model()->getAttributes()['id'];
            })->sortable()
            ,
            BelongsTo::make('User', 'user', User::class)
                ->searchable()
                ->sortable()
            ,
            Text::make(__('Ip Address'), 'ip_address')
                ->sortable()
            ,
            Text::make(__('User Agent'), 'user_agent')
                ->onlyOnDetail()
                ->sortable()
            ,
            Text::make(__('Payload'), 'payload')
                ->sortable()
                ->onlyOnDetail()
            ,
            Number::make(__('Last Activity'), 'last_activity')
                ->sortable()
            ,
        ];
    }

    final public static function label(): string
    {
        return __('Sessions');
    }

    final public static function singularLabel(): string
    {
        return __('Session');
    }
}
