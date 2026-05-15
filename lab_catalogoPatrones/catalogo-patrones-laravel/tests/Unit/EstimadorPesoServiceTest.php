<?php

namespace Tests\Unit;

use App\Services\EstimadorPesoService;
use App\Strategies\Peso\AlgoritmoRegresionLineal;
use App\Strategies\Peso\AlgoritmoTablaReferencia;
use App\Strategies\Peso\AlgoritmoYolov8;
use PHPUnit\Framework\TestCase;

class EstimadorPesoServiceTest extends TestCase
{
    public function test_estimar_delega_en_el_algoritmo_inyectado(): void
    {
        $service = new EstimadorPesoService(new AlgoritmoRegresionLineal());

        $resultado = $service->estimar([
            'perimetro_toracico' => 180,
            'largo_corporal' => 240,
        ]);

        $this->assertSame(432.0, $resultado->pesoKg);
        $this->assertSame(82.0, $resultado->confianzaPorcentaje);
        $this->assertSame('Regresion Lineal', $resultado->metodoUsado);
    }

    public function test_puede_cambiar_de_yolov8_a_tabla_de_referencia_como_fallback(): void
    {
        $hayConexionYolov8 = false;
        $algoritmo = $hayConexionYolov8
            ? new AlgoritmoYolov8()
            : new AlgoritmoTablaReferencia();

        $service = new EstimadorPesoService($algoritmo);

        $resultado = $service->estimar([
            'peso_estimado' => 455.3,
            'confianza' => 94.0,
            'peso_tabla' => 440.0,
        ]);

        $this->assertSame(440.0, $resultado->pesoKg);
        $this->assertSame('Tabla de Referencia', $resultado->metodoUsado);
    }
}
