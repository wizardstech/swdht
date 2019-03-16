<?php

namespace App\Mail;

use App\Invoice;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewInvoice extends Mailable
{
    use Queueable, SerializesModels;

    protected $invoice;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Invoice $invoice, User $owner)
    {
        $this->invoice = $invoice;
        $this->owner = $owner;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.invoices.new')
        ->with([
            'invoice' => $this->invoice,
            'owner' => $this->owner
        ]);
    }
}
