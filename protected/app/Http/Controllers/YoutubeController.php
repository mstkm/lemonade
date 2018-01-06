<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;

class YoutubeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $yutub=Video::all();
        return view('youtube.index',compact('yutub'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('youtube.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $yutubapi='AIzaSyDCTXkgvgL8VLge52xJHymQihk3pylmdKw';
        $yutuburl=$request['link'];

        $i=0;
        for($i=0;$i<sizeof($yutuburl);$i++)
        {
            //echo $yutuburl[$i].'<br>';
   
        //$url = "https://www.youtube.com/watch?v=HEuLclDVZZI&t=257s";
   parse_str( parse_url( $yutuburl[$i], PHP_URL_QUERY ), $my_array_of_vars );
   //echo '<br>'.$my_array_of_vars['v'].'<br>';  

        $videoTitle = file_get_contents("https://www.googleapis.com/youtube/v3/videos?id=".$my_array_of_vars['v']."&key=".$yutubapi."&fields=items(id,snippet(title),statistics)&part=snippet,statistics");
        // despite @ suppress, it will be false if it fails
       
        $json = json_decode($videoTitle, true);
        
        $title= $json['items'][0]['snippet']['title'];
       //  echo $json['items'][0]['snippet']['id'];
       
   
       $url='http://youtube.com/embed/'.$my_array_of_vars['v'].'?autoplay=1&amp;rel=0&amp;showinfo=0&amp;autohide=1';
     $img= 'https://img.youtube.com/vi/'.$my_array_of_vars['v'].'/0.jpg';
       

                $tambah = new Video();
                $tambah->title = $title;
                //Judul kita jadikan slug
                $tambah->url = $url;
                $tambah->image = $img;
                $tambah->description = '-';
                $tambah->is_show = '1';
                $tambah->is_top = '0';
        
                $tambah->save();

    }

    return redirect('admin/youtube');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
