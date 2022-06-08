<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as ContractsAuditable;
use Spatie\Permission\Models\Role as ModelsRole;

/**
 * @method static firstOrCreate(array $array)
 */
class Role extends ModelsRole implements ContractsAuditable
{
    use HasFactory;
    use Auditable;
    use SoftDeletes;

    public function getProperNameAttribute()
    {
        return title_case(str_replace('-', ' ', $this->name));
    }

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->withTrashed()->where('name', $value)->first();
    }
}
