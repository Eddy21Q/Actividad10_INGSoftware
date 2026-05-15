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

Cuando PHP y Composer esten instalados, se puede reemplazar o completar esta base con:

```bash
composer create-project laravel/laravel catalogo-patrones-laravel
```
