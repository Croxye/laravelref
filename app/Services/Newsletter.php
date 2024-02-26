<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function subscribe(string $email, ?string $listId = null)
    {

        $listId = $listId ?? config('services.mailchimp.lists.subscribers');

        return $this->client()->lists->addListMember($listId, [
            'email_address' => $email,
            'status' => 'subscribed',
        ]);
    }

    protected function client()
    {
        $mailchimp = new ApiClient();

        return $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us14',
        ]);
    }
}
