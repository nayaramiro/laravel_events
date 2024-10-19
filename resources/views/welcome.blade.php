@extends('layouts.main')
@section('title', 'HDC events')
@section('content')

        

        {{-- toujours mettre @if @else @endif

        @if($name == 'john')
             <p> the name is {{$name}}</p>
            <p>He's {{$age}} </p>
        @elseif($name == 'Peter' OR $age == 14)
            <p>The name is Peter</p> 
        @else
            <p>The name is not Marc {{$name}}</p> 
        @endif
        --}}



        {{-- loop --}}

        {{-- 
        @for($i = 0; $i < count($array); $i++)
        <p>{{ $array[$i]}}</p>
            @if($i == 2)
                <p>Ceci est mon numéro 2</p>
            @endif
        @endfor
         --}}

        
            
        {{-- @foreach ($names as $name)
            <p>{{$loop->index}}</p>
            <p>{{$name}}</p>
        @endforeach
        --}}



        {{-- php --}}


        

        <div id="search-container" class="col-md-12 d-flex justify-content-center align-items-center flex-column">
            <h1>Search for some events</h1>
            <form action="/" method='GET' class="col-md-6">
                <input type="text" id="search" name="search" class="form-control" placeholder="search for dome events">
            </form>
        </div>
        
        <div id="events-container" class="col-md-12">
            @if($search)
                <p class="text-muted">searching for {{$search}}</p>
            @else
                <h3>This is the next events</h3>
            @endif
            <div class="container">
                @if(count($events) == 0 && $search)
                {{-- if no event if this search --}}
                    <a class="d-flex align-items-center text-decoration-none" href="/"><ion-icon name="chevron-back-outline"></ion-icon>Go back!</a>
                    <p>There're not event with this request sorry! :(
                        </br>Try again
                    </p>
                @elseif(count($events) == 0)
                {{-- no events --}}
                    <p>There's no Event for now</p>

                @else
                {{-- print events --}}
                    <div id="cards-container" class="row g-2 g-lg-3">
                        @foreach($events as $event)
                            <div class="card col-4 p-2">
                                <img src="/img/events/{{$event->image}}" alt={{$event->title}}>
                                <div class="card-body">
                                    <p class="card-date">{{date('d/m/Y', strtotime($event->date))}} </p>
                                    <h5 class="card-title">{{$event->title}}</h5>
                                    <p class="card-participants">X participants</p>
                                    <a href="/events/{{$event->id}}" class="btn btn-primary col-md-12">Learn more</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>


        {{-- @php 
            $name = "joseph";
            echo $name;
        // @endphp
        --}}


@endsection    
