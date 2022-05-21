<?php

namespace App\Models\Relations;

use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @link https://github.com/laravel/framework/blob/5.4/src/Illuminate/Database/Eloquent/Relations/HasMany.php
 */
class HasManySyncable extends HasMany
{
    public function sync($data, $callback = null, $deleting = true): array
    {
        $changes = [
            'created' => [], 'deleted' => [], 'updated' => [],
        ];

        $relatedKeyName = $this->related->getKeyName();

        // First we need to attach any of the associated models that are not currently
        // in the child entity table. We'll spin through the given IDs, checking to see
        // if they exist in the array of current ones, and if not we will insert.
        $current = $this->newQuery()->pluck(
            $relatedKeyName
        )->all();

        // Separate the submitted data into "update" and "new"
        $updateRows = [];
        $newRows = [];
        foreach ($data as $row) {
            // We determine "updateable" rows as those whose $relatedKeyName (usually 'id') is set, not empty, and
            // match a related row in the database.
            if (isset($row[$relatedKeyName]) && !empty($row[$relatedKeyName]) && in_array($row[$relatedKeyName], $current)) {
                $id = $row[$relatedKeyName];
                $updateRows[$id] = $row;
            } else {
                $newRows[] = $row;
            }
        }

        // Next, we'll determine the rows in the database that aren't in the "update" list.
        // These rows will be scheduled for deletion.  Again, we determine based on the relatedKeyName (typically 'id').
        $updateIds = array_keys($updateRows);
        $deleteIds = [];
        foreach ($current as $currentId) {
            if (!in_array($currentId, $updateIds)) {
                $deleteIds[] = $currentId;
            }
        }

        // Delete any non-matching rows
        if ($deleting && count($deleteIds) > 0) {
            $this->getRelated()->destroy($deleteIds);
        }

        $changes['deleted'] = $this->castKeys($deleteIds);

        // Update the updatable rows
        foreach ($updateRows as $id => $row) {
            $model = $this->getRelated()->where($relatedKeyName, $id)
                ->first();
            $model->update($row);
            if (isset($callback)) {
                $callback($row, $model);
            }
        }

        $changes['updated'] = $this->castKeys($updateIds);

        // Insert the new rows
        $newIds = [];
        foreach ($newRows as $row) {
            $newModel = $this->create($row);
            $newIds[] = $newModel->$relatedKeyName;
            if (isset($callback)) {
                $callback($row, $newModel);
            }
        }

        $changes['created'] = $this->castKeys($newIds);

        return $changes;
    }


    /**
     * Cast the given keys to integers if they are numeric and string otherwise.
     *
     * @param array $keys
     * @return array
     */
    protected function castKeys(array $keys): array
    {
        return (array)array_map(function ($v) {
            return $this->castKey($v);
        }, $keys);
    }

    /**
     * Cast the given key to an integer if it is numeric.
     *
     * @param mixed $key
     * @return int|string
     */
    protected function castKey($key)
    {
        return is_numeric($key) ? (int)$key : (string)$key;
    }
}
