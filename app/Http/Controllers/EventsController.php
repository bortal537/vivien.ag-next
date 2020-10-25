<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class EventsController extends Controller
{
    final public function index(int $routeId): View
    {
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return view('events.events', $this->defaultData($routeId));
    }
}
