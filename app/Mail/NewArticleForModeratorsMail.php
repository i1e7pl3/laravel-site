<?php

namespace App\Mail;

use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewArticleForModeratorsMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Article $article
    ) {
    }

    public function build(): self
    {
        $smtpUser = (string) config('mail.mailers.smtp.username');
        $fromName = (string) (config('mail.from.name') ?: config('app.name'));

        // Mail.ru: поле From должно совпадать с ящиком SMTP, иначе 550 not local sender.
        $mailable = $this
            ->from($smtpUser, $fromName)
            ->subject('Новая новость на сайте: '.$this->article->title)
            ->view('emails.new_article');

        $replyAddress = config('mail.reply_to.address');
        if (! is_string($replyAddress) || $replyAddress === '') {
            $configuredFrom = config('mail.from.address');
            if (is_string($configuredFrom) && $configuredFrom !== '' && strcasecmp($configuredFrom, $smtpUser) !== 0) {
                $replyAddress = $configuredFrom;
            }
        }

        if (is_string($replyAddress) && $replyAddress !== '' && strcasecmp($replyAddress, $smtpUser) !== 0) {
            $replyName = (string) (config('mail.reply_to.name') ?: $fromName);
            $mailable->replyTo($replyAddress, $replyName);
        }

        return $mailable;
    }
}
