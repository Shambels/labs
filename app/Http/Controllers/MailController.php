<?php

namespace App\Http\Controllers;

use App\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MailRequest $request)
    {
        $mail = new Mail;
        if (!$request->name) {
          $mail->name = 'Unknown';
        } else {
          $mail->name = $request->name;
        }
        if (!$request->subject) {
          $mail->subject = 'No Subject';
        } else {
          $mail->subject = $request->subject;
        }
        $mail->from = $request->email;
        $mail->message = $request->message;
        $mail->save();

        new MailSent($mail->name, $mail->from, $mail->subject, $mail->message);

        $request->session()->flash('success', 'Mail Successfully Sent ! ');
        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function show(Mail $mail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function edit(Mail $mail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mail $mail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mail $mail)
    {
        //
    }
}
