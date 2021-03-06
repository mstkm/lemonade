<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gedung;
use App\Paket;
use App\Kostum;
use Auth;


class gedungController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $gedungs = Gedung::where('is_deleted','!=','1')->get();
        return view('gedung.index', compact('gedungs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   
        return view('gedung.create');
    }


    public function getAlamat($id)
    {        
        $alamat = Gedung::whereid($id)->first();      
        return $alamat;
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
        $start=$request->get('startgedung');
        $end=$request->get('endgedung');
        $alamat=$request->get('alamat');
        $gedung_id=$request->get('gedung_id');
        $keterangan=$request->get('keterangan');
        $paket_id=$request->get('paket_id');
        $klien_id='1';
        $kostum_id=$request->get('kostum_id');
        // $klien_id=$request->get('klien_id');
        //$name=$request->get('user_id');

        try {
            $new= new gedung(array(
                'name'=>$name,
                'status'=>$status,
                'startgedung'=>$start,
                'endgedung'=>$end,
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
            return redirect('admin/gedung')->with('status', 'Data Berhasil disimpan!!');
          }
          catch (\Exception $e) {
            return back()->withInput()->with('status', $e.'');
          }
      

        // $gedung->startgedung = $request->get('startgedung');

        
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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit($id)
    {
        $gedung = gedung::whereId($id)->firstOrFail();
        return view('gedung.edit',  compact('gedung'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  gedungFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request->all();
        try{
            $gedung = gedung::whereId($id)->firstOrFail();
            $gedung->name = $request->get('name');

            $gedung->alamat = $request->get('alamat');
            $gedung->keterangan = $request->get('keterangan');
            $gedung->update();
            return redirect('admin/gedung')->with('status', 'gedung dengan id '.$gedung->id.' telah berhasil diubah');

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
            $gedung=gedung::whereId($id)->first();
            // return $gedung;
            $gedung->is_deleted=1;
            $gedung->update();
            return back()->with('status','Sukses');

        }
        catch(Exception $e)
        {
            return back()->with('status','Gagal Hapus');
        }  

    }
}
