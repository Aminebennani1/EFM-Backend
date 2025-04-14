@extends('layouts.app')

@section('title', 'jardin Details')

@section('content')

    {{-- Show Exact Data Part --}}
    <div class="card" style="width: 18rem;">
        <div class="card-header">
            {{ __('messages.jardinId') }} : {{ $exactjardin->id }}
        </div>
        <ul class="list-group list-group-flush">
        <li class="list-group-item">{{ __('messages.jardinName') }} : {{ $exactjardin->name }}</li>
        <li class="list-group-item">{{ __('messages.jardinEspace') }} : {{ $exactjardin->espace }}</li>
        <li class="list-group-item">{{ __('messages.jardinjardinier') }} : {{ $exactjardin->jardinier->name }}</li>
        </ul>
    </div>





@endsection
