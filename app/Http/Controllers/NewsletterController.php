<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use App\Models\Subscriber;

class NewsletterController extends Controller
{
    public function store(SubscribeRequest $request)
    {
        Subscriber::firstOrCreate(
            ['email' => $request->validated('email')],
            ['subscribed_at' => now()]
        );

        return back()->with('newsletter_status', 'Terima kasih! Kamu sudah berlangganan.');
    }
}
