<?php

// app/Services/WhatsAppService.php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class WhatsAppService
{
    protected $baseUrl;

    public function __construct()
    {
        $this->baseUrl = env('NODE_API_URL', 'http://localhost:3000');
    }

    public function sendCampaign($name, $message, $contacts)
    {
        return Http::post("{$this->baseUrl}/api/send-campaign", [
            'campaign_name' => $name,
            'message' => $message,
            'contacts' => $contacts
        ]);
    }
}