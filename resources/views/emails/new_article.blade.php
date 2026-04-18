<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Новая новость</title>
</head>
<body style="margin:0;padding:0;font-family:Arial,Helvetica,sans-serif;background:#f4f4f5;color:#111827;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#f4f4f5;padding:24px 12px;">
        <tr>
            <td align="center">
                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width:560px;background:#ffffff;border-radius:12px;overflow:hidden;box-shadow:0 4px 24px rgba(0,0,0,0.06);">
                    <tr>
                        <td style="padding:24px 28px;background:#1f2937;color:#f9fafb;">
                            <h1 style="margin:0;font-size:20px;line-height:1.3;">Новая новость опубликована</h1>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:24px 28px;">
                            <p style="margin:0 0 12px;font-size:14px;color:#6b7280;">Заголовок</p>
                            <p style="margin:0 0 20px;font-size:18px;font-weight:bold;color:#111827;">{{ $article->title }}</p>

                            <p style="margin:0 0 12px;font-size:14px;color:#6b7280;">Фрагмент текста</p>
                            <p style="margin:0 0 24px;font-size:15px;line-height:1.6;color:#374151;">{{ \Illuminate\Support\Str::limit(strip_tags($article->content), 280) }}</p>

                            <p style="margin:0 0 12px;font-size:14px;color:#6b7280;">Дата</p>
                            <p style="margin:0 0 24px;font-size:14px;">{{ $article->created_at->format('d.m.Y H:i') }}</p>

                            <a href="{{ route('articles.show', $article, true) }}" style="display:inline-block;padding:12px 20px;background:#2563eb;color:#ffffff;text-decoration:none;border-radius:8px;font-size:15px;font-weight:600;">Открыть новость</a>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:16px 28px;border-top:1px solid #e5e7eb;font-size:12px;color:#9ca3af;">
                            Письмо отправлено автоматически приложением {{ config('app.name') }}.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
