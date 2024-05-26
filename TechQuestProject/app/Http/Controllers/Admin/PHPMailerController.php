<?php
  
namespace App\Http\Controllers\Admin;
  
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Http\Controllers\Controller;
  
class PHPMailerController extends Controller
{   
    public function create(Request $request)
    {
        return view('admin.send-email');
    }
  
    public function store(Request $request)
    {
        $mail = new PHPMailer(true);
   
        try {
   
            /* Email SMTP Settings */
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = env('MAIL_HOST');
            $mail->SMTPAuth = true;
            $mail->Username = env('MAIL_USERNAME');
            $mail->Password = env('MAIL_PASSWORD');
            $mail->SMTPSecure = env('MAIL_ENCRYPTION');
            $mail->Port = env('MAIL_PORT');
   
            $mail->setFrom(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
            $mail->addAddress($request->email);
   
            $mail->isHTML(true);
   
            $mail->Subject = $request->subject;
            $mail->Body    = $request->body;
   
            if( !$mail->send() ) {
                return back()->with("error", "Email not sent.")->withErrors($mail->ErrorInfo);
            }
              
            else {
                return back()->with("success", "Email has been sent.");
            }
   
        } catch (Exception $e) {
             return back()->with('error','Message could not be sent.');
        }
    }
}