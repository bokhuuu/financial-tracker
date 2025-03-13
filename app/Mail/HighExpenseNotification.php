<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class HighExpenseNotification extends Mailable
{
    use Queueable, SerializesModels;



    public function __construct(
        public $user,
        public $expenseAmount,
        public $savingsAmount
    ) {}


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'High Expense Notification',
        );
    }


    public function content(): Content
    {
        return new Content(
            view: 'emails.high_expense_notification',
            with: [
                'user' =>  $this->user,
                'expenseAmount' => $this->expenseAmount,
                'savings' => $this->savingsAmount
            ]
        );
    }
}
