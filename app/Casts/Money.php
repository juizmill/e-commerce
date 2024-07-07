<?php

declare(strict_types=1);

namespace App\Casts;

use Money\Currencies\ISOCurrencies;
use Money\Formatter\DecimalMoneyFormatter;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class Money implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param Model $model
     * @param string $key
     * @param mixed $value
     * @param array<string, mixed> $attributes
     * @return \Money\Money|null
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): ?\Money\Money
    {
        unset($model, $key, $attributes);
        $value = (string) str_replace([',', '.', ' '], '', (string) $value);

        return \Money\Money::BRL($value);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param Model $model
     * @param string $key
     * @param mixed $value
     * @param array<string, mixed> $attributes
     * @return float
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): float
    {
        unset($model, $key, $attributes);
        $value = str_replace(['R$ ', ',', '.', ' '], '', $value);
        $money = \Money\Money::BRL($value);
        $currencies = new ISOCurrencies();
        $moneyFormat = new DecimalMoneyFormatter($currencies);

        return (float) $moneyFormat->format($money);
    }
}
