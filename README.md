# Валидатор докуметов
### Доступные проверки

| код | проверка |
| --- | --- |
| inn | инн |
| inn:jur | инн юр. лица |
| inn:ip | инн физ. лиза |
| fms_code | код подразделения фмс (000-000) |
| passport_code | код паспорта РФ |
| passport_serial | серия паспорта РФ |
| foreign_passport_serial | серия загранпаспорта РФ |
| foreign_passport_code | код загранпаспорта РФ |
| residence_permit_serial | вид на жительство РФ серия |
| residence_permit_code | вид на жительство РФ код |
| snils | СНИЛС |
| inn_or_snils | ИНН или СНИЛС |

## Установка
### lumen
bootstrap
```php
$app->register(Tochka\Validators\DocumentValidatorServiceProvider::class);
```
### Laravel >=6.0
Провайдер регистрируется автоматически

## tests
```php
phpunit vendor/tochka-developers/document-validator/tests/DocumentValidatorTest.php
```

