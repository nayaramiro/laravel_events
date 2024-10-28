<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\User;


class EventController extends Controller
{
    public function index(){

        //cause our name's input in welcome page is 'search
        $search = request('search');

        if($search){
            $events = Events::where([
                //search for our request or similar = like or have the request before or after som word
                ['title', 'like', '%' .$search. '%']
            ])->get();
        }else{
            $events = Events::all();

        }

        return view('welcome' , [
            'events' => $events,
            'search' => $search
        ]);
    }

    public function create(){
        return view('events.create');
    }

    public function store(Request $request){

    $event = new Events;
    $event->date = $request->date;
    $event->title = $request->title;
    $event->city = $request->city;
    $event->private = $request->private;
    $event->description = $request->description;
    $event->items = $request->items;

    if($request->hasFile('image') && $request->file('image')->isValid()){

        //get Image
        $requestImage = $request->image;

        //get Extension
        $extension = $requestImage->getClientOriginalExtension();

        //all images call 'md5' but have a particular 'time' + extension
        $imageName = md5($requestImage->getclientOriginalName() . strtotime("now")) . "." .$extension;
        

        //get image from formulaire and put to file 'image' and create another file called (events) and save all this with the name of image
        $request->image->move(public_path('img/events'), $imageName);

        //save in db with imageName
        $event->image = $imageName;
        
    }

    $user = auth()->user();
    $event->user_id = $user->id;
    $event->save();
    

    //pass massage to welcome page
    return redirect('/')->with('msg', 'event created successfully');
    }




    public function show($id){
        $event = Events::findOrFail($id);

        //get the user where Id is $id
        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('events.show', ["event" => $event, "eventOwner" => $eventOwner]);
    }
    
    public function dashboard(){

        //check if is connected and get the user connected
        $user = auth()->user();

        //table event for a specific event -> get the user_id and put into variable named $user->id
        $events = $user->events;

        $eventsAsParticipant = $user->eventAsparticipant;

        return view('events.dashboard', 
        [
            'events' => $events,
            'eventsasparticipant' => $eventsAsParticipant
        ]
    );
    }


    public function destroy($id){

        //check if event exist and then delete
        Events::findOrFail($id)->delete();
        return redirect('/')->with('msg', 'event deleted successfully');
    }

    public function edit($id){

        //check if event with this id exist
        $event = Events::findOrFail($id);


        return view('events.edit', ['event' => $event]);
    }



    public function update(Request $request){


        $data = $request->all();

       
        //table event for a specific event -> get the user_id and put into variable named $user->id
        


        if($request->hasFile('image') && $request->file('image')->isValid()){

            //get Image
            $requestImage = $request->image;
    
            //get Extension
            $extension = $requestImage->getClientOriginalExtension();
    
            //all images call 'md5' but have a particular 'time' + extension
            $imageName = md5($requestImage->getclientOriginalName() . strtotime("now")) . "." .$extension;
            
    
            //get image from formulaire and put to file 'image' and create another file called (events) and save all this with the name of image
            $requestImage->move(public_path('img/events'), $imageName);
    
            //save in db with imageName
            $data['image'] = $imageName;
            
        }

         //check if this event existe get the If from the resuest passed, and update all
         Events::findOrFail($request->id)->update($data);
         return redirect('/dashboard')->with('msg', 'The event was successfully edited!');



    }


    //we get the id from event
    public function joinEvent($id){


        $user = auth()->user();

        //will insert the id from event and id from user to table event_user
        $user->eventsAsParticipant()->attach($id);

        //will search from id event
        $event = Events::findOrFail($id);

        return redirect('/dashboard')->with('msg', 'Your presence has been confirmed for this event'. $event->title);
    }

}
