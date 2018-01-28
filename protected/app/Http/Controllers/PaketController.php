<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paket;
use App\Kostum;
use App\Gedung;
use Auth;

class PaketController extends Controller
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
        $pakets = paket::where('is_deleted','!=','1')->get();
        return view('paket.index', compact('pakets'));
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
        return view('paket.create', compact('gedung','paket','kostum'));
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
        $harga=$request->get('harga');
        $keterangan=$request->get('keterangan');
       
        // $klien_id=$request->get('klien_id');
        //$name=$request->get('user_id');

        try {
            $new= new paket(array(
                'name'=>$name,
                'harga'=>$harga,
                'keterangan'=>$keterangan
                ));
            $new->save();
            return redirect('admin/paket')->with('status', 'Data Berhasil disimpan!!');
          }
          catch (\Exception $e) {
            return back()->withInput()->with('status', $e.'');
          }
      

        // $paket->startpaket = $request->get('startpaket');

        
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
        $event=Paket::whereid($id)->first();

        return view('paket.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  paketFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request->all();
        try{
            $paket = paket::whereId($id)->firstOrFail();
            $paket->name = $request->get('name');
            $paket->harga = $request->get('harga');
            $paket->keterangan = $request->get('keterangan');

            $paket->save();
            return redirect('admin/paket')->with('status', 'paket  '.strtoupper($paket->name).' telah berhasil diubah');

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
            $paket=paket::whereId($id)->first();
            // return $paket;
            $paket->is_deleted=1;
            $paket->update();
            return back()->with('status','Sukses');

        }
        catch(Exception $e)
        {
            return back()->with('status','Gagal Hapus');
        }  

    }
}
