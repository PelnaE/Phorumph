<?php defined('SYSPATH') or die ('No direct script access!');

class Model_Topic extends Model
{
    public function publish (array $data)
    {
        return DB::insert('topics', array_keys($data))
            ->values(array_values($data))
            ->execute();
    }
}

