@extends('layouts.app')

@section('content')
@guest
    Jelentkezz be a hírek listájához.
@else
<div>

<form method="POST" action="{{route('add')}}"> 
    @CSRF
    <label for="title">Cím: </label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"/>
    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <label for="text">Szöveg: </label>
    <textarea class="form-control" name="text"></textarea>
    <button type="submit" class="btn btn-primary">Hír hozzáadása</button>
</form>
<br>
</div>
    <ul class="list-group">
    @forelse ($adat as $news) 
    <li class="list-group-item">{{$news->title}} <br> {{$news->text}} <a class="btn btn-secondary" href="removeNew/{{$news->id}}">Törlés</a> </li> 
    <br> 
    
    @empty 
    <li class="list-group-item">Nincs hír!</li> 
    @endforelse
    </ul>
@endguest

@endsection
