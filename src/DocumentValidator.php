<?php

namespace Tochka\Validators;


class DocumentValidator
{
    /**
     * Проверка ИНН
     *
     * @param $value
     *
     * @return bool
     */
    public static function isInn($value): bool
    {
        if (!is_numeric($value)) {
            return false;
        }
        $len = \strlen($value);
        switch ($len) {
            case 12:
                return self::isInnIp($value);
            case 10:
                return self::isInnJur($value);
            default:
                return false;
        }
    }

    /**
     * Проверка ИНН ИП
     *
     * @param      $value
     *
     * @param bool $easy
     *
     * @return bool
     */
    public static function isInnIp($value, $easy = false): bool
    {
        if (!$easy) {
            if (\strlen($value) != 12 || !is_numeric($value)) {
                return false;
            }
        }

        $s = (7 * $value{0} +
                2 * $value{1} +
                4 * $value{2} +
                10 * $value{3} +
                3 * $value{4} +
                5 * $value{5} +
                9 * $value{6} +
                4 * $value{7} +
                6 * $value{8} +
                8 * $value{9}) % 11;
        if ($s == 10) {
            $s = 0;
        }
        $s2 = (3 * $value{0} +
                7 * $value{1} +
                2 * $value{2} +
                4 * $value{3} +
                10 * $value{4} +
                3 * $value{5} +
                5 * $value{6} +
                9 * $value{7} +
                4 * $value{8} +
                6 * $value{9} +
                8 * $value{10}) % 11;
        if ($s2 == 10) {
            $s2 = 0;
        }
        if ($s != $value{10} || $s2 != $value{11}) {
            return false;
        }

        return true;
    }

    /**
     * Проверка ИНН юр. лица
     *
     * @param      $value
     * @param bool $easy
     *
     * @return bool
     */
    public static function isInnJur($value, $easy = false): bool
    {
        if (!$easy) {
            if (\strlen($value) != 10 || !is_numeric($value)) {
                return false;
            }
        }

        $s = (2 * $value{0} +
                4 * $value{1} +
                10 * $value{2} +
                3 * $value{3} +
                5 * $value{4} +
                9 * $value{5} +
                4 * $value{6} +
                6 * $value{7} +
                8 * $value{8}) % 11;
        if ($s == 10) {
            $s = 0;
        }
        if ($s != $value{9}) {
            return false;
        }

        return true;
    }

    /**
     * Проверка Снилс
     *
     * @param $value
     * @param $easy
     *
     * @return bool
     */
    public static function isSnils($value, $easy = false): bool
    {
        if(!$easy) {
            if (\strlen($value) !== 11 || !is_numeric($value)) {
                return false;
            }
        }

        $s = 9 * $value{0} +
            8 * $value{1} +
            7 * $value{2} +
            6 * $value{3} +
            5 * $value{4} +
            4 * $value{5} +
            3 * $value{6} +
            2 * $value{7} +
            $value{8};
        if ($s >= 101) {
            $s = $s % 101;
        }
        if ($s == 100 || $s == 0) {
            $s = '00';
        }

        return $s == substr($value, -2);
    }

    /**
     * Проверяет код ФНС
     *
     * @param $value
     *
     * @return false|int
     */
    public static function isFmsCode($value): bool
    {
        return preg_match('/^\d{3}\-\d{3}$/', $value);
    }

    /**
     * Проверяем серию паспорта РФ
     *
     * @param $value
     *
     * @return bool
     */
    public static function isRussianPassportSerial($value): bool
    {
        return is_numeric($value) && \strlen($value) === 4;
    }

    /**
     * Проверяем код паспорта РФ
     *
     * @param $value
     *
     * @return bool
     */
    public static function isRussianPassportCode($value): bool
    {
        return is_numeric($value) && \strlen($value) === 6;
    }

    /**
     * Проверяем серию загранпаспорта РФ
     *
     * @param $value
     *
     * @return bool
     */
    public static function isRussianForeignPassportSerial($value): bool
    {
        return is_numeric($value) && \strlen($value) === 2;
    }

    /**
     * Проверяем код загранпаспорта РФ
     *
     * @param $value
     *
     * @return bool
     */
    public static function isRussianForeignPassportCode($value): bool
    {
        return is_numeric($value) && \strlen($value) === 7;
    }

    /**
     * Проверяем серия вида на жительства
     *
     * @param $value
     *
     * @return bool
     */
    public static function isRussianResidencePermitSerial($value): bool
    {
        return is_numeric($value) && \strlen($value) === 2;
    }

    /**
     * Проверяем код вида на жительства
     *
     * @param $value
     *
     * @return bool
     */
    public static function isRussianResidencePermitCode($value): bool
    {
        return is_numeric($value) && \strlen($value) === 7;
    }

    public static function isInnOrSnils($value): bool
    {
        if (!is_numeric($value)) {
            return false;
        }

        $length = \strlen($value);
        switch ($length) {
            case 10:
                return self::isInnJur($value, true);
                break;
            case 12:
                return self::isInnIp($value, true);
                break;
            case 11:
                return self::isSnils($value);
                break;
            default:
                return false;

        }
    }
}