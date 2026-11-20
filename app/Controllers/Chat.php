<?php

namespace App\Controllers;

class Chat extends BaseController
{
    public function send()
    {
        $input = $this->request->getJSON(true);
        $message = trim($input['message'] ?? '');

        if ($message === '' || strlen($message) > 4000) {
            return $this->response->setStatusCode(422)->setJSON([
                'success' => false,
                'message' => 'Pesan wajib diisi dan maksimal 4000 karakter.'
            ]);
        }

        // Demo mode: no paid API request
        if (filter_var(env('ULTRAAI_DEMO_MODE', false), FILTER_VALIDATE_BOOLEAN)) {
            return $this->response->setJSON([
                'success' => true,
                'mode' => 'demo',
                'reply' => $this->demoReply($message)
            ]);
        }

        // Live OpenAI mode
        $apiKey = env('OPENAI_API_KEY');
        $model  = env('OPENAI_MODEL', 'gpt-4.1-mini');

        if (empty($apiKey)) {
            return $this->response->setStatusCode(500)->setJSON([
                'success' => false,
                'message' => 'OpenAI API key belum dikonfigurasi.'
            ]);
        }

        $payload = [
            'model' => $model,
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'Anda adalah UltraAI Support, asisten customer service yang ramah, profesional, dan menjawab dalam bahasa Indonesia.'
                ],
                [
                    'role' => 'user',
                    'content' => $message
                ]
            ],
            'max_completion_tokens' => 500
        ];

        $ch = curl_init('https://api.openai.com/v1/chat/completions');

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $apiKey
            ],
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_TIMEOUT => 40,
            CURLOPT_CONNECTTIMEOUT => 10
        ]);

        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);

        curl_close($ch);

        if ($result === false || $httpCode < 200 || $httpCode >= 300) {
            log_message('error', 'UltraAI OpenAI request failed. HTTP: {code}; Error: {error}', [
                'code' => $httpCode,
                'error' => $curlError
            ]);

            return $this->response->setStatusCode(502)->setJSON([
                'success' => false,
                'message' => 'AI belum dapat merespons. Silakan coba kembali.'
            ]);
        }

        $data = json_decode($result, true);
        $reply = $data['choices'][0]['message']['content'] ?? null;

        if (!$reply) {
            return $this->response->setStatusCode(502)->setJSON([
                'success' => false,
                'message' => 'Respons AI tidak dapat dibaca.'
            ]);
        }

        return $this->response->setJSON([
            'success' => true,
            'mode' => 'live',
            'reply' => $reply
        ]);
    }

    private function demoReply(string $message): string
    {
        $text = strtolower($message);

        if (str_contains($text, 'halo') || str_contains($text, 'hai')) {
            return 'Halo! Saya UltraAI Support. Saya siap membantu menjawab pertanyaan Anda. Silakan ceritakan apa yang ingin Anda ketahui.';
        }

        if (str_contains($text, 'layanan')) {
            return 'UltraAI Support merupakan platform customer service yang dirancang untuk membantu bisnis menangani pertanyaan pelanggan melalui chatbot, REST API, dan knowledge base.';
        }

        if (str_contains($text, 'harga') || str_contains($text, 'biaya')) {
            return 'Untuk informasi harga, silakan sebutkan layanan atau produk yang ingin Anda ketahui. Tim customer support dapat membantu memberikan informasi lebih lanjut.';
        }

        if (str_contains($text, 'fitur')) {
            return 'Fitur UltraAI meliputi AI Conversations, Knowledge Base, Chat History, REST API, dan Admin Dashboard.';
        }

        return 'Terima kasih telah menghubungi UltraAI Support. Saya menerima pesan Anda: "' .
            $message .
            '". Ini adalah respons simulasi Demo Mode. Pada mode Live, jawaban akan diproses menggunakan model AI OpenAI.';
    }
}
