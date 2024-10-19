@extends('layouts.main')
@section('title', $event->title)
@section('content')

    <div id="page-show" class="col-md-10 h-100 offset-md-1 d-flex align-items-center">
        <div class="row mt-5">
            <div id="image-container" class="col-md-6">
                <img src="/img/events/{{$event->image}}" alt="{{$event->title}}" class="img-fluid rounded">
            </div>

            <div id="info-container" class="col-md-6">
                <h1>{{$event->title}}</h1>
                <p class="event-city d-flex align-items-center"><ion-icon class="pr-3 icon" name="location-outline"></ion-icon>{{$event->city}}</p>
                <p class="event-participants d-flex align-items-center"><ion-icon class="pr-3 icon" name="people-outline"></ion-icon>X participants</p>

                {{-- get the name where user_id is... --}}
                <p class="event-owner d-flex align-items-center"><ion-icon class="pr-3 icon" name="star-outline"></ion-icon>Created by : {{$eventOwner['name']}}</p>
                <p class="event-owner d-flex align-items-center"><ion-icon class="pr-3 icon" name="calendar-outline"></ion-icon>{{date('d/m/Y', strtotime($event->date))}}</p>


                <div class="col-md-12 mt-3" id="description-container">
                    <H3>About Event :</H3>
                    <p class="event-description">{{$event->description}}</p>
                </div>
                <a href="#" id="event-submit" class="btn btn-primary">confirm presence</a>
                <h3 class="pt-5">The Event Contains</h3>
                <ul id="items-list" class="row">
                    @if($event->items == !null)

                    {{-- loop --}}
                        @foreach($event->items as $item)
                            <p class="text-muted d-flex align-items-center"><ion-icon name="play-outline"></ion-icon>{{$item}}</p>
                        @endforeach
                    @else
                        <p class="text-muted">This event does not have specific infrastructure</p>
                    @endif
                    
                </ul>
            </div>
            
        </div>
    </div>


@endsection