<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Rating;
use App\Http\Controllers\Controller;
use App\Http\Controllers\view;
use App\Kostum;
use App\User;
use App\Paket;
use App\Event;
use App\Gedung;
use App\Video;
use Calendar;
use Auth;

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


    // function youtube_title($id) {
    //     // $id = 'YOUTUBE_ID';
    //     // returns a single line of JSON that contains the video title. Not a giant request.
    //     $videoTitle = file_get_contents("https://www.googleapis.com/youtube/v3/videos?id=".$id."&key=YOUR_API_KEY&fields=items(id,snippet(title),statistics)&part=snippet,statistics");
    //     // despite @ suppress, it will be false if it fails
    //     if ($videoTitle) {
    //     $json = json_decode($videoTitle, true);

    //     return $json['items'][0]['snippet']['title'];
    //     } else {
    //     return false;
    //     }
    //     }

    public function index()
    {


        if (Auth::guest()|| Auth::user()->jenis=='klien') {
            $event = Event::where('status', 'complete')->get();
            $yutub = Video::where([['is_top', '1'], ['is_show', '1'], ['is_deleted', '0']])->first();
            $allyutub = Video::where([['is_top', '0'], ['is_show', '1'], ['is_deleted', '0']])->get();
        //return $event;
            $events = [];
            foreach ($event as $key => $value) {
                $events[] = Calendar::event(
                    strtoupper('booked'),
                    false,
                    new \DateTime($value->startevent . ''),
                    new \DateTime($value->endevent . ''),
                    $value->id,
                //optional event ID
                    [
                        'url' => '' . $value->id,
                //any other full-calendar supported parameters
                    ]
                );
            }
            $avgStar = Rating::avg('rate');
            $calendar = Calendar::addEvents($events);
            $rate = Rating::where('is_show','1')->get();
            // dd($rate);
            return view('index', compact('event', 'calendar', 'yutub', 'allyutub', 'avgStar','rate'));
        } elseif (Auth::user()->jenis === 'klien') {
            $history = Event::whereUserId(Auth::user()->id)->orderBy('created_at', 'ASC')->get();
            // return $history;
            return view('customer.profile', compact('history'));
        } elseif (Auth::user()->jenis === 'admin') {
            return redirect('admin');
        }
    }
    public function event()
    {
        $events = Event::paginate(10);
        return view('event.index', compact('events'));
    }

    public function tambahevent()
    {
        //$events = Event::all();
        $kostum = Kostum::all();
        $paket = Paket::all();
        $gedung = Gedung::all();
        return view('tambahevent', compact('kostum', 'paket', 'gedung'));
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
        $paket = Paket::all();
        return view('paket.index', compact('paket'));
    }

    public function updateevent()
    {
        $kostum = Kostum::all();
        $paket = Paket::all();
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
