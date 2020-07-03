<?php

namespace App;

use Illuminate\Support\Str;

trait HasUuid
{
    final protected function initializeHasUuid(): void
    {
        $this->attributes['uuid'] = $this->attributes['uuid'] ?? Str::uuid();
    }
}
