<?php

namespace App\Models;

use App\Models\Relations\HasManySyncable;
use Illuminate\Database\Eloquent\Model;

class HasManySyncableModel extends Model
{
    /**
     * Overrides the default Eloquent hasMany relationship to return a HasManySyncable.
     *
     * {@inheritDoc}
     * @return HasManySyncable
     */
    public function hasMany($related, $foreignKey = null, $localKey = null): HasManySyncable
    {
        $instance = $this->newRelatedInstance($related);

        $foreignKey = $foreignKey ?: $this->getForeignKey();

        $localKey = $localKey ?: $this->getKeyName();

        return new HasManySyncable(
            $instance->newQuery(), $this, $instance->getTable().'.'.$foreignKey, $localKey
        );
    }
}
