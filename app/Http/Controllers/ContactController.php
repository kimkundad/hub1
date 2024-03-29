<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\contact;
use App\Http\Requests;
use Mail;
use Swift_Transport;
use Swift_Message;
use Swift_Mailer;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        return view('contact.index');
    }


    public function contact_m()
    {
        return view('mobile.contact_m');
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
    public function store(Request $request)
    {
      $this->validate($request, [
           'name' => 'required',
           'email' => 'required',
           'detail' => 'required',
           'g-recaptcha-response' => 'required'
       ]);
       $token = $request->input('g-recaptcha-response');

       if ($token) {
         $obj = new contact();
         $obj->name = $request['name'];
         $obj->email = $request['email'];
         $obj->phone = $request['phone'];
         $obj->detail = $request['detail'];
         $obj->save();



         // send email
           $data_toview = array();
         //  $data_toview['pathToImage'] = "assets/image/email-head.jpg";
           date_default_timezone_set("Asia/Bangkok");
           $data_toview['name'] = $request['name'];
           $data_toview['email'] = $request['email'];
           $data_toview['phone'] = $request['phone'];
           $data_toview['detail'] = $request['detail'];
           $data_toview['datatime'] = date("d-m-Y H:i:s");

           $email_sender   = 'learnsbuy@gmail.com';
           $email_pass     = 'Homeayumu4549';

       /*    $email_sender   = 'info@acmeinvestor.com';
           $email_pass     = 'Iaminfoacmeinvestor';  */
           $email_to       =  $request['email'];
           //echo $admins[$idx]['email'];
           // Backup your default mailer

           
           $backup = \Mail::getSwiftMailer();

           try{

                       //https://accounts.google.com/DisplayUnlockCaptcha
                       // Setup your gmail mailer
                       $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'SSL');
                       $transport->setUsername($email_sender);
                       $transport->setPassword($email_pass);

                       // Any other mailer configuration stuff needed...
                       $gmail = new Swift_Mailer($transport);

                       // Set the mailer as gmail
                       \Mail::setSwiftMailer($gmail);

                       $data['emailto'] = $email_sender;
                       $data['sender'] = $email_to;
                       //Sender dan Reply harus sama

                       Mail::send('mails.contact', $data_toview, function($message) use ($data)
                       {
                           $message->from($data['sender'], 'มีข้อความจาก learnsabuy');
                           $message->to($data['emailto'])
                           ->replyTo($data['emailto'], 'มีข้อความจาก learnsabuy.')
                           ->subject('มีข้อความจาก learnsabuy.com เข้าสู่ะบบ');

                           //echo 'Confirmation email after registration is completed.';
                       });



           }catch(\Swift_TransportException $e){
               $response = $e->getMessage() ;
               echo $response;

           }


           // Restore your original mailer
           Mail::setSwiftMailer($backup);
           // send email




         return redirect(url('contact_success'));
     	} else {
     		echo "No";
     	}
    }





    public function contact_m_p(Request $request)
    {
      $this->validate($request, [
           'name' => 'required',
           'email' => 'required',
           'detail' => 'required',
           'g-recaptcha-response' => 'required'
       ]);
       $token = $request->input('g-recaptcha-response');

       if ($token) {
         $obj = new contact();
         $obj->name = $request['name'];
         $obj->email = $request['email'];
         $obj->phone = $request['phone'];
         $obj->detail = $request['detail'];
         $obj->save();



         // send email
           $data_toview = array();
         //  $data_toview['pathToImage'] = "assets/image/email-head.jpg";
           date_default_timezone_set("Asia/Bangkok");
           $data_toview['name'] = $request['name'];
           $data_toview['email'] = $request['email'];
           $data_toview['phone'] = $request['phone'];
           $data_toview['detail'] = $request['detail'];
           $data_toview['datatime'] = date("d-m-Y H:i:s");

           $email_sender   = 'learnsbuy@gmail.com';
           $email_pass     = 'Homeayumu4549';

       /*    $email_sender   = 'info@acmeinvestor.com';
           $email_pass     = 'Iaminfoacmeinvestor';  */
           $email_to       =  $request['email'];
           //echo $admins[$idx]['email'];
           // Backup your default mailer
           $backup = \Mail::getSwiftMailer();

           try{

                       //https://accounts.google.com/DisplayUnlockCaptcha
                       // Setup your gmail mailer
                       $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'SSL');
                       $transport->setUsername($email_sender);
                       $transport->setPassword($email_pass);

                       // Any other mailer configuration stuff needed...
                       $gmail = new Swift_Mailer($transport);

                       // Set the mailer as gmail
                       \Mail::setSwiftMailer($gmail);

                       $data['emailto'] = $email_sender;
                       $data['sender'] = $email_to;
                       //Sender dan Reply harus sama

                       Mail::send('mails.contact', $data_toview, function($message) use ($data)
                       {
                           $message->from($data['sender'], 'มีข้อความจาก learnsabuy');
                           $message->to($data['emailto'])
                           ->replyTo($data['emailto'], 'มีข้อความจาก learnsabuy.')
                           ->subject('มีข้อความจาก learnsabuy.com เข้าสู่ะบบ');

                           //echo 'Confirmation email after registration is completed.';
                       });



           }catch(\Swift_TransportException $e){
               $response = $e->getMessage() ;
               echo $response;

           }


           // Restore your original mailer
           Mail::setSwiftMailer($backup);
           // send email




         return redirect(url('contact_success_m'));
     	} else {
     		echo "No";
     	}
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
