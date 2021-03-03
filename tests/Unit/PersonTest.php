<?php

namespace Tests\Unit;

use App\Models\Person;
use Carbon\Carbon;
use Tests\TestCase;

class PersonTest extends TestCase
{

    public function testAgeAttribute()
    {
        $p = Person::factory()->make([
            'birth_date' => Carbon::now()->subYears(17)->subMonth(11)
        ]);

        $this->assertEquals(17, $p->age);
    }

    public function testAgeWithBirthdateMoreThanNow()
    {
        $p = Person::factory()->make([
            'birth_date' => Carbon::now()->addYears(11)
        ]);

        $this->assertEquals(0, $p->age);
    }

    public function testAgeWithBirthdateCurrentYear()
    {
        $p = Person::factory()->make([
            'birth_date' => Carbon::now()->subMonths(11)
        ]);

        $this->assertEquals(0, $p->age);
    }
}
