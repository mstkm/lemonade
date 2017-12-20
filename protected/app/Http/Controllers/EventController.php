<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Paket;
use App\Kostum;
use App\gedung;
use Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::where('is_deleted','!=','1')->get();
        return view('event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gedung=Gedung::all();
        $paket=Paket::all();
        $kostum=Kostum::all();
        // return $gedung;
        return view('event.create', compact('gedung','paket','kostum'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       
        
        //return $request->all();
        $name=$request->get('name');
        $status=$request->get('status');
        $start=$request->get('startevent');
        $end=$request->get('endevent');
        $alamat=$request->get('alamat');
        $gedung_id=$request->get('gedung_id');
        $keterangan=$request->get('keterangan');
        $paket_id=$request->get('paket_id');
        $klien_id='1';
        $kostum_id=$request->get('kostum_id');
        // $klien_id=$request->get('klien_id');
        //$name=$request->get('user_id');

        try {
            $new= new Event(array(
                'name'=>$name,
                'status'=>$status,
                'startevent'=>$start,
                'endevent'=>$end,
                'alamat'=>$alamat,
                'gedung'=>"dyandra",
                'gedung_id'=>$gedung_id,
                'keterangan'=>$keterangan,
                'paket_id'=>$paket_id,
                'kostum_id'=>$kostum_id,
                'klien_id'=>$klien_id,
                'user_id'=>Auth::user()->id,
                ));
            $new->save();
            return redirect('admin/event')->with('status', 'Data Berhasil disimpan!!');
          }
          catch (\Exception $e) {
            return back()->withInput()->with('status', $e.'');
          }
      

        // $event->startevent = $request->get('startevent');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kostum=Kostum::all();
        $paket=Paket::all();
        $event = Event::whereId($id)->firstOrFail();
        return view('event.edit', ['event' => $event], compact('kostum'), compact('paket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EventFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request->all();
        try{
            $event = Event::whereId($id)->firstOrFail();
            $event->name = $request->get('name');
            $event->status = $request->get('status');
            $event->alamat = $request->get('alamat');
            $event->startevent = $request->get('startevent');
            $event->endevent = $request->get('endevent');
            // $event->paket_id = $request->get('paket_id');
            // $event->kostum_id = $request->get('kostum_id');
            $event->keterangan = $request->get('keterangan');
            $event->save();
            return redirect('admin/event')->with('status', 'Event dengan id '.$event->id.' telah berhasil diubah');

        }
        catch(Exception $e )
        {
            
                return back()->withInput()->with('status', $e.'');
              
        }
        

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $event=Event::whereId($id)->first();
            // return $event;
            $event->is_deleted=1;
            $event->update();
            return back()->with('status','Sukses');

        }
        catch(Exception $e)
        {
            return back()->with('status','Gagal Hapus');
        }  

    }
}
