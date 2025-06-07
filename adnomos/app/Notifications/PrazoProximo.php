<?php

namespace App\Notifications;

use App\Models\Caso;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PrazoProximo extends Notification
{
    use Queueable;
    protected $caso;

    /**
     * Create a new notification instance.
     */
    public function __construct(Caso $caso)
    {
        $this->caso = $caso;
    }


    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Seu prazo está proximo...')
            ->line('O processo' . $this->caso->numero_processo . 'vence amanhã')
            ->action('Verifique em:', url('http://adnomos.com/casos/detalhes/'. $this->caso->id))
            ->line('Bom Trabalho, advogado!');
    }

    public function toDatabase(object $notifiable){
        return [
            'titulo' => 'Seu prazo está proximo ',
            'conteudo' => 'Seu processo '. $this->caso->numero_processo.' vence amanhã',
            'link' => 'Acesse em: '.url('http://adnomos.com/casos/detalhes/'. $this->caso->id),
            'lida' => false,
        ];
    }


    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
