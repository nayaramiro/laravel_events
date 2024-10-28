@extends('layouts.main')
@section('title', 'Editing {{$event->title}}')
@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3 py-5">
    <h1>Editing {{$event->title}}</h1>


    {{--  enctype : to send some files ex:pictures --}}
    <form action="/events/update/{{$event->id}}" method="POST" enctype="multipart/form-data">
    {{-- to send event POST/GET etc --}}
    @csrf
    @method('PUT')
        <div class="form-group">
            <label for="title">Event : </label>
            <input type="text" class="form-control" name="title" id="title" placeholder="{{$event->title}}">
        </div>

        <div class="form-group">
            <label for="date">Date :</label>
            <input type="date" class="form-control" name="date" id="date">
        </div>

        <div class="form-group">
            <label for="image">Image : :</label>
            <input type="file" class="form-control-file" id="image" name="image">
            <img class="img-preview" src="/img/events/{{$event->image}}" alt="{{$event->title}}">
        </div>

        <div class="form-group">
            <label for="description">Description :</label>
            <textarea type="text" class="form-control" name="description" id="description" placeholder="{{$event->description}}"></textarea>
        </div>

        <div class="form-group">
            <label for="City">City :</label>
            <input type="text" class="form-control" name="city" id="city" placeholder="{{$event->city}}">
        </div>

        <div class="form-group row">
            <label for="Options" class="col-12">Do you have some infrastructure ? </label>
            <div class="form-group px-2">
                <input type="checkbox" name="items[]"  id="chair" value="chair">Chair</input>
            </div>

            <div class="form-group px-2">
                <input type="checkbox" name="items[]" id="stage" value="stage">Stage</input>
            </div>

            <div class="form-group px-2">
                <input type="checkbox" name="items[]" id="open-food" value="open-food">Open Food</input>
            </div>

            <div class="form-group px-2">
                <input type="checkbox" name="items[]" id="microphone" value="microphone">Microphone</input>
            </div>

            <div class="form-group px-2">
                <input type="checkbox" name="items[]" id="lights" value="lights">Lights</input>
            </div>

            <div class="form-group px-2">
                <input type="checkbox" name="items[]" id="sound-box"  value="sound-box">Sound Box</input>
            </div>
        </div>

        <div class="form-group">
            <label for="title">This is private a Event ?</label>
            <select name="private" id="private" class="form-control">
                <option value="0">No</option>
                <option value="1" {{$event->private == 1 ? "selected = 'selected'" : ""}}>Yes</option>
            </select>
        </div>

        <input type="submit" class="btn btn-primary col-md-12" value="Create Event">

    </form>
</div>


@endsection