<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class MailchimpNewsletter implements NewsletterInterface
{
    protected $client;

    public function __construct(ApiClient $client)
    {
        $this->client = $client;
    }

    public function subscribe(string $email, string $list = null)
    {
        $mailList = $list ?? config('services.mailchimp.lists.subscribers');

        return $this->client->lists->addListMember($mailList, [
                'email_address' => $email,
                'status' => 'subscribed'
            ]);
    }
}