<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderSuccessMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $name;
    public $email;
    public $orderId;

    public function __construct($name,$email,$orderId)
    {
        $this->name = $name;
        $this->email = $email;
        $this->orderId = $orderId;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $e_name = $this->name;
        $e_email = $this->email;
        $e_orderId = $this->orderId;

        return $this->view('mail.successOrder',compact('e_name','e_email','e_orderId'))->subject('TBook - đặt hàng thành công');
    }
}
