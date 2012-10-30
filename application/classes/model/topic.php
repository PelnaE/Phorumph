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
    public function get_topic_by_id($id)
    {
        return DB::select('topics.*', 'users.*')
            ->from('topics')
            ->join('users')
            ->on('topics.author_id', '=', 'users.id')
            ->where('topics.topic_id', '=', $id)
            ->as_object()
            ->execute();
    }
    public function update (array $data, $topic_id)
    {
        return DB::update('topics')
            ->set($data)
            ->where('topic_id', '=', $topic_id)
            ->execute();
    }
    public function get_topics_by_user_id($user_id)
    {
        return DB::select()
            ->from('topics')
            ->where('author_id', '=', $user_id)
            ->order_by('topic_id', 'DESC')
            ->limit(5)
            ->as_object()
            ->execute();
    }
}

