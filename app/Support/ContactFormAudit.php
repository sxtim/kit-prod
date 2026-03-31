<?php

namespace App\Support;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactFormAudit
{
    public static function log(string $event, Request $request, array $context = []): void
    {
        Log::info('contact_form_audit', array_merge([
            'event' => $event,
            'ip' => $request->ip(),
            'user_agent' => self::truncate((string) $request->userAgent(), 255),
            'referer' => self::truncate((string) $request->headers->get('referer'), 255),
            'form_entity' => $request->input('form_entity'),
            'phone_hash' => self::phoneHash((string) $request->input('phone')),
        ], $context));
    }

    public static function phoneHash(string $phone): ?string
    {
        $normalizedPhone = preg_replace('/\D+/', '', $phone);

        if ($normalizedPhone === '') {
            return null;
        }

        return hash_hmac('sha256', $normalizedPhone, (string) config('app.key'));
    }

    private static function truncate(string $value, int $limit): ?string
    {
        if ($value === '') {
            return null;
        }

        return mb_substr($value, 0, $limit);
    }
}
