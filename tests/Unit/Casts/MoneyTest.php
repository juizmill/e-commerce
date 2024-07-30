<?php

declare(strict_types=1);

namespace Tests\Casts;

use App\Casts\Money;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    public function testMethodSet()
    {
        $model = new class() extends Model {};

        $cast = new Money();
        $result = $cast->set($model, 'price', 'R$ 10,98', []);

        $this->assertTrue(is_float($result));
        $this->assertEquals(10.98, $result);
    }

    public function testMethodGet()
    {
        $model = new class() extends Model {};

        $cast = new Money();
        $result = $cast->get($model, 'price', 10.98, []);

        $this->assertInstanceOf(\Money\Money::class, $result);
        $this->assertEquals('1098', $result->getAmount());
    }
}
