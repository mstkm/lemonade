<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kostum;
use App\Gedung;
use App\Paket;

class KostumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $kostums = kostum::where('is_deleted','!=','1')->get();
        return view('kostum.index', compact('kostums'));
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
        return view('kostum.create', compact('gedung','paket','kostum'));
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
        $foto='-';
        $keterangan=$request->get('keterangan');
        
        // $klien_id=$request->get('klien_id');
        //$name=$request->get('user_id');

        try {
            $new= new kostum(array(
                'name'=>$name,
                'foto'=>'-',
                'keterangan'=>$keterangan,
                
                ));
            $new->save();
            return redirect('admin/kostum')->with('status', 'Data Berhasil disimpan!!');
          }
          catch (\Exception $e) {
            return back()->withInput()->with('status', $e.'');
          }
      

        // $kostum->startkostum = $request->get('startkostum');

        
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
        $event = kostum::whereId($id)->firstOrFail();
        return view('kostum.edit',  compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  kostumFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request->all();
        try{
            $kostum = kostum::whereId($id)->firstOrFail();
            $kostum->name = $request->get('name');
            $kostum->keterangan = $request->get('keterangan');
            $kostum->update();
            return redirect('admin/kostum')->with('status', 'kostum '.strtoupper($kostum->name).' telah berhasil diubah');

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
            $kostum=kostum::whereId($id)->first();
            // return $kostum;
            $kostum->is_deleted=1;
            $kostum->update();
            return back()->with('status','Sukses');

        }
        catch(Exception $e)
        {
            return back()->with('status','Gagal Hapus');
        }  

    }
}
