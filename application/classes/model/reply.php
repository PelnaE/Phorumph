<?php defined('SYSPATH') or die ('No direct script access');

class Model_Reply extends Model
{
    public function send($topic_id, $user_id, $content)
    {
        return DB::insert('replies', array('topic_id', 'user_id', 'content'))
            ->values(array($topic_id, $user_id, $content))
            ->execute();
    }
}

