<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function subscribe(string $email, string $list = null)
    {
        $mailList = $list ?? config('services.mailchimp.lists.subscribers');

        return ($this->client())->lists->addListMember($mailList, [
                'email_address' => $email,
                'status' => 'subscribed'
            ]);
    }

    protected function client()
    {
        return (new ApiClient())->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => config('services.mailchimp.prefix'),
        ]);
    }
}