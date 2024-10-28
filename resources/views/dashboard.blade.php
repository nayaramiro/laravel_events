@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>My Events :</h1>
    </div>
    
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        
        @if(count($events) > 0)
            
        @else
            <p>If you don't have any events you can create just here</p>
            <a href="/create">Create your Event</a>
        @endif
        
    </div>

@endsection