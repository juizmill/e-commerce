<?php

declare(strict_types=1);

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use Money\Currencies\ISOCurrencies;
use Money\Formatter\DecimalMoneyFormatter;
use Money\Formatter\IntlMoneyFormatter;

class Money implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     * @return \Money\Money|null
     */
    public function get(Model $model, string $key, mixed $value, array $attributes): string
    {
        unset($model, $key, $attributes);
        $value = (int) str_replace([',', '.', ' '], '', (string) $value);

        $money = \Money\Money::BRL($value);
        $currencies = new ISOCurrencies();

        $numberFormatter = new \NumberFormatter('en_US', \NumberFormatter::CURRENCY);
        $moneyFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);

        return $moneyFormatter->format($money);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
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
