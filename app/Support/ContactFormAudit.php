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
            'page_url' => self::truncate((string) $request->input('page_url'), 255),
            'landing_url' => self::truncate((string) $request->input('landing_url'), 255),
            'submit_delay_sec' => self::submitDelay($request->input('form_opened_at')),
            'utm_source' => self::truncate((string) $request->input('utm_source'), 100),
            'utm_medium' => self::truncate((string) $request->input('utm_medium'), 100),
            'utm_campaign' => self::truncate((string) $request->input('utm_campaign'), 150),
            'utm_content' => self::truncate((string) $request->input('utm_content'), 150),
            'utm_term' => self::truncate((string) $request->input('utm_term'), 150),
            'yclid' => self::truncate((string) $request->input('yclid'), 100),
            'gclid' => self::truncate((string) $request->input('gclid'), 100),
            'fbclid' => self::truncate((string) $request->input('fbclid'), 100),
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

    private static function submitDelay(mixed $formOpenedAt): ?int
    {
        if (! is_numeric($formOpenedAt)) {
            return null;
        }

        $openedAt = (int) $formOpenedAt;
        $now = (int) round(microtime(true) * 1000);
        $delayMs = $now - $openedAt;

        if ($openedAt <= 0 || $delayMs < 0) {
            return null;
        }

        return (int) floor($delayMs / 1000);
    }
}
