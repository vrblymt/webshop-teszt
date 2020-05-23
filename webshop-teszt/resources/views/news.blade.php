@extends('layouts.app')

@section('content')
<div class="container-fluid">
    News
</div>
@guest
    Jelentkezz be a felhasználók listájához.
@else
    <ul class="list-group">
        @forelse ($adat as $user)
            <li class="list-group-item">{{$user->name}}</li>
        @empty
            <li class="list-group-item">Nincs felhasználó!</li>
        @endforelse
    </ul>
@endguest

@endsection
