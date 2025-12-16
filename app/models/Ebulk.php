<?php

class Ebulk
{
    private $username;
    private $apikey;

    private $smsEndpoint  = "https://api.ebulksms.com/sendsms.json";
    private $waEndpoint   = "https://api.ebulksms.com/sendwhatsapp.json";

    public function __construct($username = 'nnelivictor1@gmail.com', $apikey = 'b25b2db8338a7eb0e9b20b72ee3218a2598a1f1971a71fb0f78abd7dc20d672b')
    {
        $this->username = $username;
        $this->apikey   = $apikey;
    }

    /**
     * Normalize phone number to international format (234…)
     */
    private function formatNumber($number)
    {
        $number = trim($number);

        if (substr($number, 0, 1) === "0") {
            return "234" . substr($number, 1);
        }

        if (substr($number, 0, 1) === "+") {
            return substr($number, 1);
        }

        return $number;
    }

    /**
     * Send SMS via EbulkSMS API (JSON style)
     */
    public function sendSMS($sender, $message, $recipients, $flash = 0, $dndsender = 1)
    {
        if (!is_array($recipients)) {
            $recipients = [$recipients];
        }

        $gsm = ["gsm" => []];

        foreach ($recipients as $num) {
            $formatted = $this->formatNumber($num);
            $uniqueID  = substr(uniqid("msg_", true), 0, 30);

            $gsm["gsm"][] = [
                "msidn" => $formatted,
                "msgid" => $uniqueID
            ];
        }

        $payload = [
            "SMS" => [
                "auth" => [
                    "username" => $this->username,
                    "apikey"   => $this->apikey
                ],
                "message" => [
                    "sender"      => $sender,
                    "messagetext" => $message,
                    "flash"       => $flash
                ],
                "recipients" => $gsm,
                "dndsender"  => $dndsender
            ]
        ];

        return $this->postJSON($this->smsEndpoint, $payload);
    }

    /**
     * Send WhatsApp Message
     */
    public function sendWhatsApp($subject, $message, $recipients)
    {
        if (!is_array($recipients)) {
            $recipients = [$recipients];
        }

        $formattedRecipients = array_map([$this, "formatNumber"], $recipients);

        $payload = [
            "WA" => [
                "auth" => [
                    "username" => $this->username,
                    "apikey"   => $this->apikey
                ],
                "message" => [
                    "subject"     => $subject,
                    "messagetext" => $message
                ],
                "recipients" => $formattedRecipients
            ]
        ];

        return $this->postJSON($this->waEndpoint, $payload);
    }

    /**
     * Internal helper for performing JSON POST requests
     */
    private function postJSON($url, $data)
    {
        $jsonData = json_encode($data);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json"
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return [
            "http_code" => $httpCode,
            "raw"       => $response,
            "decoded"   => json_decode($response, true)
        ];
    }
}
