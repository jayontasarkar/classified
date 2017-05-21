<?php

namespace App\Mail;

use App\{Listing, User};
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ListingContactCreated extends Mailable
{
    public $listing;
    public $sender;
    public $body;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Listing $listing, User $user, $body)
    {
        $this->listing = $listing;
        $this->sender    = $user;
        $this->body = $body;
    }

    /**
     * Build the body.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.listing.contact.message')
            ->subject("{$this->sender->name} sent you a message about {$this->listing->title}")
            ->from('hello@classified.dev')
            ->replyTo($this->sender->email);
    }
}
