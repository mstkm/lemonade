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
        $status=$request->get('status');
        $start=$request->get('startkostum');
        $end=$request->get('endkostum');
        $alamat=$request->get('alamat');
        $gedung_id=$request->get('gedung_id');
        $keterangan=$request->get('keterangan');
        $paket_id=$request->get('paket_id');
        $klien_id='1';
        $kostum_id=$request->get('kostum_id');
        // $klien_id=$request->get('klien_id');
        //$name=$request->get('user_id');

        try {
            $new= new kostum(array(
                'name'=>$name,
                'status'=>$status,
                'startkostum'=>$start,
                'endkostum'=>$end,
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
        $kostum=Kostum::all();
        $paket=Paket::all();
        $kostum = kostum::whereId($id)->firstOrFail();
        return view('kostum.edit', ['kostum' => $kostum], compact('kostum'), compact('paket'));
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
            $kostum->status = $request->get('status');
            $kostum->alamat = $request->get('alamat');
            $kostum->startkostum = $request->get('startkostum');
            $kostum->endkostum = $request->get('endkostum');
            // $kostum->paket_id = $request->get('paket_id');
            // $kostum->kostum_id = $request->get('kostum_id');
            $kostum->keterangan = $request->get('keterangan');
            $kostum->save();
            return redirect('admin/kostum')->with('status', 'kostum dengan id '.$kostum->id.' telah berhasil diubah');

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
