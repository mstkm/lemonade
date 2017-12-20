<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paket;


class PaketController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $status=$request->get('status');
        $start=$request->get('startpaket');
        $end=$request->get('endpaket');
        $alamat=$request->get('alamat');
        $gedung_id=$request->get('gedung_id');
        $keterangan=$request->get('keterangan');
        $paket_id=$request->get('paket_id');
        $klien_id='1';
        $kostum_id=$request->get('kostum_id');
        // $klien_id=$request->get('klien_id');
        //$name=$request->get('user_id');

        try {
            $new= new paket(array(
                'name'=>$name,
                'status'=>$status,
                'startpaket'=>$start,
                'endpaket'=>$end,
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
        $kostum=Kostum::all();
        $paket=Paket::all();
        $paket = paket::whereId($id)->firstOrFail();
        return view('paket.edit', ['paket' => $paket], compact('kostum'), compact('paket'));
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
            $paket->status = $request->get('status');
            $paket->alamat = $request->get('alamat');
            $paket->startpaket = $request->get('startpaket');
            $paket->endpaket = $request->get('endpaket');
            // $paket->paket_id = $request->get('paket_id');
            // $paket->kostum_id = $request->get('kostum_id');
            $paket->keterangan = $request->get('keterangan');
            $paket->save();
            return redirect('admin/paket')->with('status', 'paket dengan id '.$paket->id.' telah berhasil diubah');

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
