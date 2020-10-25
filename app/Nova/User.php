<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Gravatar;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphToMany;
use Laravel\Nova\Fields\Password;
use Laravel\Nova\Fields\Text;
use Vyuldashev\NovaPermission as Acl;

class User extends Resource
{
    public static $model = \App\Models\User::class;

    public static $title = 'name';

    public static $search = [
        'id',
        'name',
        'email',
    ];

    public static function group(): string
    {
        return \request()->user()->isAdministrator()
            ? __('Acl')
            : __('System');
    }

    final public function fields(Request $request): array
    {
        return collect([
            ID::make()->sortable()
            ,
            Gravatar::make()->maxWidth(50)
            ,
            Text::make(__('Name'), 'name')
                ->sortable()
                ->rules('required', 'max:255')
            ,
            Text::make(__('Email'), 'email')
                ->sortable()
                ->rules('required', 'email', 'max:254')
                ->creationRules('unique:users,email')
                ->updateRules('unique:users,email,{{resourceId}}')
            ,
            Password::make(__('Password'), 'password')
                ->onlyOnForms()
                ->creationRules('required', 'string', 'min:8')
                ->updateRules('nullable', 'string', 'min:8')
            ,
            HasMany::make(__('Sessions'), 'sessions', Session::class)
            ,
            MorphToMany::make('Roles', 'roles', Acl\Role::class)
            ,
            MorphToMany::make('Permissions', 'permissions', Acl\Permission::class)
            ,
        ])->pipe(function ($collection) use ($request) {
            return $request->user()->can('impersonate')
                ? $collection->add(\KABBOUCHI\NovaImpersonate\Impersonate::make($this))
                : $collection;
        })->toArray();
    }

    final public static function label(): string
    {
        return __('Users');
    }

    final public static function singularLabel(): string
    {
        return __('User');
    }
}
