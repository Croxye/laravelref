<?php

namespace App\Providers;

use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Bind Newsletter interface to a callback function
        app()->bind(Newsletter::class, function () {
            // Create a new instance of ApiClient
            $client = new ApiClient();

            // Set configuration for the client
            $client->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us14',
            ]);

            // Return a new MailchimpNewsletter instance with the configured ApiClient
            return new MailchimpNewsletter($client);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
