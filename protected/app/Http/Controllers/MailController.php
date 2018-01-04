<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\bookEventMail;
use Mail;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mail::sho
        $mail = [
            'title'=> 'Itsolutionstuff.com mail', 
            'body'=> 'The body of your message.',
            'button' => 'Click Here'
            ];
        return view('mails.bookEvent',compact('mail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendBook(Request $request)
    {
        // return $request->all();

        // return new App\Mail\bookEventMail;

        try{
            $content = [
                'title'=> 'Itsolutionstuff.com mail', 
                'body'=> 'The body of your message.',
                'button' => 'Click Here'
                ];
    
            Mail::send('mails.bookEvent',$content,function($messsage) use ($content)
            {
                $messsage->from('mstkmproject@gmail.com','MSTKM');
                $messsage->to('mustakimixii@gmail.com');
                $messsage->subject('MSTKM');
                $messsage->subject($content['body']);

            });
            //return back()->with('alert-success','Berhasil Kirim Email');
            return redirect('/');
        }
        catch (Exception $e){
            return response (['status' => false,'errors' => $e->getMessage()]);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
