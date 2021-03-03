<?php

namespace Tests\Unit;

use App\Models\Person;
use Tests\TestCase;

class PersonTest extends TestCase
{

    public function testAgeAttribute()
    {
        $p = Person::factory()->make([
            'birth_date' => '2004-02-29'
        ]);

        $this->assertEquals(17, $p->age);
    }

    public function testAgeWithBirthdateMoreThanNow()
    {
        $p = Person::factory()->make([
            'birth_date' => '2026-01-29'
        ]);

        $this->assertEquals(0, $p->age);
    }
}
