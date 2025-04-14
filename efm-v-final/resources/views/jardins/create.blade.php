@extends('layouts.app')

@section('title', 'Create new jardin')

@section('content')

<form action="{{ route('jardins.store')}}" method="POST">
@csrf
<h2>{{ __('messages.createBtn')}}</h2>
<br><div>
    <label for="inputAddress">{{ __('messages.jardinName')}}</label>
    <input type="text" name="name" required>
</div>
<br><div>
<label for="inputAddress">{{ __('messages.jardinEspace')}}</label>
<input type="number" name="espace" required>
<br>
<label for="inputAddress">{{ __('messages.jardinjardinier')}}</label>
<select name="jardinier_id" id="">
    @foreach ($alljardiniers as $jardinier )
    <option value="{{$jardinier->id}}">{{ $jardinier->name}}</option>
    @endforeach
</select>
<br><button type="submit">{{ __('messages.createBtn')}}</button>

</div>
</form>