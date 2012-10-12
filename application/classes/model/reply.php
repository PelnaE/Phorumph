<?php defined('SYSPATH') or die ('No direct script access');

class Model_Reply extends Model
{
    public function send($topic_id, $user_id, $content, $date)
    {
        return DB::insert('replies', array('topic_id', 'user_id', 'content', 'date'))
            ->values(array($topic_id, $user_id, $content, $date))
            ->execute();
    }
    public function get($topic_id)
    {
        return DB::select('users.*', 'replies.*')
            ->from('replies')
            ->join('users')
            ->on('replies.user_id', '=', 'users.id')
            ->where('replies.topic_id', '=', $topic_id)
            ->as_object()
            ->execute();
    }
}

