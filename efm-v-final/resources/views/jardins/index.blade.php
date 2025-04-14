@extends('layouts.app')

@section('title', 'All jardin')

@section('content')

<a href="{{route('jardins.create')}}"><button type="button" class="btn btn-primary">create</button></a>

<form action="{{route('jardins.index')}}" method="GET" class="d-flex">
    @csrf
    <select name="jardinier_id" >
@foreach ($alljardiniers as $jardinier )
    <option value="{{$jardinier->id}}">{{$jardinier->name}}</option>
@endforeach
    </select>
<button type="submit">filterByCategory</button>
</form>

<table class="table">
    <thead>
        <tr>
            <th scope="col"> {{ __('messages.jardinName')}}</th>
            <th scope="col"> {{ __('messages.jardinEspace')}}</th>
            <th scope="col"> {{ __('messages.jardinjardinier')}}</th>
            <th scope="col"> {{ __('messages.actions')}}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($alljardins as $jardin )
        <tr>
            <th scope="row">{{$jardin->name}}
            <td>{{$jardin->espace}}</td>
            <td>{{$jardin->jardinier->name}}</td>
            <td class="d-flex justify-content-around">
                <a class="btn btn-secondary"  href="{{route('jardins.show', $jardin->id)}}">show</a>
                <a class="btn btn-primary" href="{{route('jardins.edit', $jardin->id)}}">edit</a>
                <form action="{{route('jardins.destroy', $jardin->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit"><i>DELETE</i></button>
                </form>
            </td>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>
<div>
{{ $alljardins->links('pagination::bootstrap-5')}}

</div>

@endsection