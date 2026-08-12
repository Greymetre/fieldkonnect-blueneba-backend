<?php

namespace App\Http\Controllers;


class SendNotifications extends Controller
{
    public static function send(array $request)
    {
        $title = (string) ($request['title'] ?? 'Blueneba');
        $message = (string) ($request['msg'] ?? $request['body'] ?? '');
        $model = (string) ($request['model'] ?? $request['type'] ?? 'general');
        $sent = SendPushNotificationToToken((string) ($request['fcm_token'] ?? ''), $message, $model, $title);

        return [
            'feedback' => $sent,
            'message' => ['title' => $title, 'body' => $message],
        ];
    }
}
