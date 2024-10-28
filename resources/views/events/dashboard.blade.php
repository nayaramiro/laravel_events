@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')

    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>My Events :</h1>
    </div>

    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if (is_countable($events) && count($events) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name :</th>
                        <th scope="col">Participants :</th>
                        <th scope="col">Actions :</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                        <tr>
                            <th scope="row">{{$loop->index + 1}}</th>
                            <td><a href="/events/{{$event->id}}">{{$event->title}}</a></td>
                            <td>{{count($event->users)}}</td>
                            <td class="d-flex">
                                <a href="/events/edit/{{$event->id}}" class="btn btn-success edit-btn d-flex align-items-center">
                                    <ion-icon class="icon" name="create-outline"></ion-icon>
                                    Edit
                                </a>
                                <form action="/events/{{$event->id}}" method="POST" class="p-0 ml-2">
                                    @csrf
                                    @method('DELETE')
                                        <button class="btn btn-danger d-flex align-items-center delete-btn"><ion-icon name="trash-outline"></ion-icon>Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>If you don't have any events you can create just here</p>
            <a href="/create">Create your Event</a>
        @endif
    </div>

    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Events I participate in :</h1>
    </div>

    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if(count((array)$eventsasparticipant) == 0) 
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name :</th>
                        <th scope="col">Participants :</th>
                        <th scope="col">Actions :</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($eventsasparticipant as $event)
                        <tr>
                            <th scope="row">{{$loop->index + 1}}</th>
                            <td><a href="/events/{{$event->id}}">{{$event->title}}</a></td>
                            <td>{{count($event->users)}}</td>
                            <td class="d-flex">
                                <a href="">End of the event</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>You don't have any event</p>
        @endif
    </div>

@endsection