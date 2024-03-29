<?php

namespace App\Listeners;

use App\Events\ArticleDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\ArticleDeleted as Mail;

class SendArticleDeletedMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ArticleDeleted  $event
     * @return void
     */
    public function handle(ArticleDeleted $event)
    {
        $email = config('mail.admin');
        if ($email) {
            \Mail::to($email)->send(new Mail($event->article));
        }
    }
}
