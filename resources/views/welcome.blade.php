@extends('layouts.default')

@section('content')

    <x-card>

        <div class="text-gray-500">

            {!! content('65110c3b-0373-4996-b875-ac1b763a311c', true, [

                '<p>' => '<p class="mb-4">',

            ])->body !!}

        </div>

    </x-card>

@endsection

@section('sidebar')

    @if($events->count())

        @include('events.events-sidebar')

    @else

        <div class="bg-opacity-90 bg-white border border-gray-100 margin mx-auto padding relative rounded-lg self-stretch shadow-md w-full whitespace-pre-line">

        {!! content('350b70ef-87fd-4d3a-b108-d6f84d6e77f0', true)->body !!}

        </div>

    @endif

@endsection
