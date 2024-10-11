<?php

namespace App\Services\Resend;

use Resend;

final class ResendEmailService
{
    /**
     * @param array $data
     */
    public static function send(array $data)
    {
        $resend = Resend::client(env('RESEND_API_KEY'));

        $resend->emails->send([
            'from' => 'Improveet Task App <improveet@stocklog.xyz>',
            'to' => $data['to'],
            'subject' => $data['subject'],
            'html' => $data['body'],
        ]);
    }
}
