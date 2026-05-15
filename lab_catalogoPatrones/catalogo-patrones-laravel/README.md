# Catalogo de Patrones - Laravel PHP

Estructura base para desarrollar un catalogo de patrones usando Laravel y PHP.

## Estructura principal

```text
app/
  Factories/
    Contracts/
  Http/
    Controllers/
  Models/
  Observers/
  Repositories/
    Contracts/
  Services/
  Strategies/
    Peso/
  Providers/
bootstrap/
config/
database/
  factories/
  migrations/
  seeders/
public/
resources/
  css/
  js/
  views/
routes/
storage/
tests/
```

## Patrones del laboratorio

La estructura se organizo segun los dolores mostrados en la tabla del laboratorio:

- `Factory`: evita repetir `new Brahman()` y `new Nelore()` en varios controladores.
- `Repository`: concentra el acceso a datos de `Animal` y separa la logica de negocio del ORM.
- `Observer`: mueve los efectos secundarios de `RegistroPeso` fuera del controlador.
- `Strategy`: reemplaza condicionales por algoritmos intercambiables de estimacion de peso.

### Factory Method: RazaFactory

Participantes implementados:

- `Creator`: `App\Factories\Contracts\IRazaFactory`
- `ConcreteCreator`: `App\Factories\RazaFactory`
- `Product`: `App\Models\Razas\Raza`
- `ConcreteProduct`: `Brahman`, `Nelore`, `Angus`

La factory usa un mapa asociativo definido en `config/razas.php`, por lo que no depende de `switch` ni `match`.
Se registro en el Service Container como singleton en `AppServiceProvider`.
Los controladores `AnimalController` y `RazaController` muestran dos puntos de creacion usando inyeccion de dependencias.

### Repository: AnimalRepository

Participantes implementados:

- `Repository Interface`: `App\Repositories\Contracts\IAnimalRepository`
- `Concrete Repository`: `App\Repositories\EloquentAnimalRepository`
- `In-Memory Repository`: `App\Repositories\InMemoryAnimalRepository`

Metodos de dominio:

- `findByArete(string $arete): ?Animal`
- `findAllByRancho(int $ranchoId): Collection`
- `save(Animal $animal): void`

`ReporteService` recibe `IAnimalRepository` por constructor, por lo que no llama a `Animal::where(...)` directamente.
El binding principal esta en `AppServiceProvider`:

```php
$this->app->bind(IAnimalRepository::class, EloquentAnimalRepository::class);
```

### Observer: RegistroPesoSubject

Participantes implementados:

- `Subject`: `App\Observers\RegistroPesoSubject`
- `Observer`: `App\Observers\Contracts\IRegistroPesoObserver`
- `ConcreteObservers`: `NotificadorPropietario`, `ActualizadorDashboard`, `RecalculadorICC`, `WebhookSenasa`
- Observador adicional sin modificar el subject: `AlertaSMS`

`RegistroPesoObserver` es el observer de Eloquent que escucha el evento `saved` del modelo `RegistroPeso`. Cuando Laravel detecta un registro de peso guardado, delega en `RegistroPesoSubject`, y el subject notifica a todos los observadores GoF suscritos.

La prueba `tests/Unit/RegistroPesoSubjectTest.php` demuestra que todos los observadores reciben la llamada a `onPesoRegistrado(...)` y que se puede agregar `AlertaSMS` sin cambiar `RegistroPesoSubject` ni los observadores existentes.

### Strategy: Algoritmos de Estimacion de Peso

Participantes implementados:

- `Strategy`: `App\Strategies\Peso\IAlgoritmoEstimacion`
- `ConcreteStrategies`: `AlgoritmoYolov8`, `AlgoritmoRegresionLineal`, `AlgoritmoTablaReferencia`
- `Context`: `App\Services\EstimadorPesoService`
- `Value Object`: `App\Strategies\Peso\ResultadoEstimacion`

`EstimadorPesoService` recibe un `IAlgoritmoEstimacion` por constructor y su metodo `estimar(...)` solo delega en `ejecutar(...)`, por lo que no contiene bloques `if-else` para seleccionar algoritmos.

`ResultadoEstimacion` es un value object readonly con `pesoKg`, `confianzaPorcentaje` y `metodoUsado`.

La prueba `tests/Unit/EstimadorPesoServiceTest.php` muestra que el contexto puede cambiar de algoritmo en tiempo de ejecucion. Cuando no hay conexion con YOLOv8, se inyecta `AlgoritmoTablaReferencia` como fallback sin modificar `EstimadorPesoService`.

Cuando PHP y Composer esten instalados, se puede reemplazar o completar esta base con:

```bash
composer create-project laravel/laravel catalogo-patrones-laravel
```
