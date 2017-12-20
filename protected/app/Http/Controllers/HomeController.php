<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Controllers\view;
use App\Kostum;
use App\User;
use App\Paket;
use App\Event;
use App\Gedung;
use Calendar;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event=Event::all();        
        //return $event;
        $events = [];     
            foreach ($event as $key => $value) {
            $events[] = Calendar::event(
                strtoupper($value->name),
                false,
                new \DateTime($value->startevent.''),
                new \DateTime($value->endevent.''),
                $value->id, 
                //optional event ID
            [
                'url' => ''.$value->id,
                //any other full-calendar supported parameters
            ]
            );
            }
        
        $calendar = Calendar::addEvents($events); 

       

        return view('index',compact('event','calendar'));
    }
    public function event()
    {
        $events = Event::paginate(10);
        return view('event.index', compact('events'));
    }

    public function tambahevent()
    {
        //$events = Event::all();
        $kostum=Kostum::all();
        $paket=Paket::all();
        $gedung=Gedung::all();
        return view('tambahevent', compact('kostum','paket','gedung'));
    }

    public function tambahpaket()
    {
        return view('tambahpaket');
    }

    public function tambahkostum()
    {
        return view('tambahkostum');
    }

    public function tambahgedung()
    {
        return view('tambahgedung');
    }

    public function mainkostum()
    {
        $kostums = Kostum::all();
        return view('kostum.mainkostum', compact('kostums'));
        
    }

    public function indexpaket()
    {
        $paket=Paket::all();
        return view('paket.index', compact('paket'));
    }

    public function updateevent()
    {
        $kostum=Kostum::all();
        $paket=Paket::all();
        return view('event.updateevent', compact('kostum'), compact('paket'));
        
    }

    public function bookevent($id)
    {
        $event = Event::where('id', '=', $id)->first();
        $event->status = "Book";
        $event->save();

        return redirect('/event')->with('status', 'Event Telah Lunas');
    }

    public function dpevent($id)
    {
        $event = Event::where('id', '=', $id)->first();
        $event->status = "DP";
        $event->save();

        return redirect('/event')->with('status', 'Event Dalam Tahap DP');
    }

    public function hapusevent($id)
    {
        $event = Event::where('id', '=', $id)->first();
        $event->status = "nonaktif";
        $event->delete();

        return redirect('/event')->with('status', 'Event Berhasil Dihapus');
    }

    public function hapuspaket($id)
    {
        $event = Paket::where('id', '=', $id)->first();
        
        $event->delete();

        return redirect('/indexpaket')->with('status', 'Paket Berhasil Dihapus');
    }

    public function ubahevent($id)
    {
        $event = Event::where('id', '=', $id)->first();
        $event->status = "nonaktif";
        $event->delete();

        return redirect()->action('HomeController@event')->with('success', 'event berhasil dihapus');
    }
}
