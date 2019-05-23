<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $sub;
    public $name;
    public $mes;
    public $phone;
    public $email;

    public function __construct($subject,$name, $message,$phone,$email)
    {
        $this->sub = $subject;
        $this->name = $name;
        $this->mes = $message;
        $this->phone = $phone;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $e_sub = $this->sub;
        $e_name = $this->name;
        $e_message = $this->mes;
        $e_phone = $this->phone;
        $e_email = $this->email;
        return $this->view('mail.blanks',compact('e_message','e_phone','e_email','e_name'))->subject($e_sub);
    }
}
