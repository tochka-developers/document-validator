<?php

namespace Tochka\Validators;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\ServiceProvider;

class DocumentValidatorServiceProvider extends ServiceProvider
{
    /**
     * @throws BindingResolutionException
     */
    public function boot(): void
    {
        $validator = $this->app->make('validator');

        $validator->extend('inn', function ($attribute, $value, $parameters) {
            $type = $parameters[0] ?? null;

            switch ($type) {
                case 'ip':
                    return DocumentValidator::isInnIp($value);
                case 'jur':
                    return DocumentValidator::isInnJur($value);
                default:
                    return DocumentValidator::isInn($value);
            }

        });

        $validator->extend('fms_code', function ($attribute, $value) {
            return DocumentValidator::isFmsCode($value);
        });
        $validator->extend('passport_code', function ($attribute, $value) {
            return DocumentValidator::isRussianPassportCode($value);
        });

        $validator->extend('passport_serial', function ($attribute, $value) {
            return DocumentValidator::isRussianPassportSerial($value);
        });

        $validator->extend('foreign_passport_serial', function ($attribute, $value) {
            return DocumentValidator::isRussianForeignPassportSerial($value);
        });

        $validator->extend('foreign_passport_code', function ($attribute, $value) {
            return DocumentValidator::isRussianForeignPassportCode($value);
        });

        $validator->extend('residence_permit_serial', function ($attribute, $value) {
            return DocumentValidator::isRussianResidencePermitSerial($value);
        });

        $validator->extend('residence_permit_code', function ($attribute, $value) {
            return DocumentValidator::isRussianResidencePermitCode($value);
        });

        $validator->extend('snils', function ($attribute, $value) {
            return DocumentValidator::isSnils($value);
        });

        $validator->extend('inn_or_snils', function ($attribute, $value) {
            return DocumentValidator::isInnOrSnils($value);
        });

    }
}
