<?php defined('SYSPATH') or die ('No direct script access!');

class Model_Topic extends Model
{
    public function publish (array $data)
    {
        return DB::insert('topics', array_keys($data))
            ->values(array_values($data))
            ->execute();
    }
    public function get_topics_by_id($id)
    {
        return DB::select('topics.*', 'users.*')
            ->from('topics')
            ->join('users')
            ->on('topics.author_id', '=', 'users.id')
            ->where('category_id', '=', $id)
            ->as_object()
            ->execute();
    }
}

