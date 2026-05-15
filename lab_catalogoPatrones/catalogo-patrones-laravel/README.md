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

Cuando PHP y Composer esten instalados, se puede reemplazar o completar esta base con:

```bash
composer create-project laravel/laravel catalogo-patrones-laravel
```
