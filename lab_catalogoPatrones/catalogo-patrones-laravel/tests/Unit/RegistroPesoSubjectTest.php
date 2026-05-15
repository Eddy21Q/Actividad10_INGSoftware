<?php

namespace Tests\Unit;

use App\Models\RegistroPeso;
use App\Observers\ActualizadorDashboard;
use App\Observers\AlertaSMS;
use App\Observers\NotificadorPropietario;
use App\Observers\RecalculadorICC;
use App\Observers\RegistroPesoSubject;
use App\Observers\WebhookSenasa;
use PHPUnit\Framework\TestCase;

class RegistroPesoSubjectTest extends TestCase
{
    public function test_notificar_avisa_a_todos_los_observadores_suscritos(): void
    {
        $subject = new RegistroPesoSubject();
        $notificador = new NotificadorPropietario();
        $dashboard = new ActualizadorDashboard();
        $icc = new RecalculadorICC();
        $senasa = new WebhookSenasa();
        $sms = new AlertaSMS();

        $subject->suscribir($notificador);
        $subject->suscribir($dashboard);
        $subject->suscribir($icc);
        $subject->suscribir($senasa);
        $subject->suscribir($sms);

        $registro = new RegistroPeso([
            'animal_id' => 7,
            'peso' => 452.5,
            'metodo' => 'bascula',
            'icc' => 4.2,
        ]);

        $subject->notificar($registro);

        $this->assertCount(1, $notificador->notificaciones);
        $this->assertCount(1, $dashboard->eventos);
        $this->assertCount(1, $icc->registrosProcesados);
        $this->assertCount(1, $senasa->payloads);
        $this->assertCount(1, $sms->mensajes);
    }

    public function test_desuscribir_evita_que_un_observador_reciba_notificaciones(): void
    {
        $subject = new RegistroPesoSubject();
        $notificador = new NotificadorPropietario();
        $dashboard = new ActualizadorDashboard();

        $subject->suscribir($notificador);
        $subject->suscribir($dashboard);
        $subject->desuscribir($dashboard);

        $subject->notificar(new RegistroPeso([
            'animal_id' => 3,
            'peso' => 390,
            'metodo' => 'estimacion',
        ]));

        $this->assertCount(1, $notificador->notificaciones);
        $this->assertCount(0, $dashboard->eventos);
    }
}
