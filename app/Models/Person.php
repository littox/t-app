<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * Class Person
 * @package App\Models
 *
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $birth_date
 */
class Person extends Model
{
    use HasFactory;

    protected $table = 'persons';

    protected $dates = [
        'birth_date',
        'created_at',
        'updated_at',
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function getAgeAttribute()
    {
        $now = \Carbon\Carbon::now();
        if ($this->birth_date > $now) {
            return 0;
        }
        return $this->birth_date->diffInYears($now);
    }
}
