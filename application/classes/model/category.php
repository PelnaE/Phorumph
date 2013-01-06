<?php defined('SYSPATH') or die ('No direct script access');

class Model_Category extends Model
{
	public function get_all_categories()
	{
		return DB::select()
		->from('categories')
		->as_object()
		->execute();
	}
    public function get_name($id)
    {
        return DB::select('name')
            ->from('categories')
            ->where('id', '=', $id)
            ->execute()
            ->get('name');
    }
    public function create_category(array $data)
    {
        return DB::insert('categories', array_keys($data))
        ->values(array_values($data))
        ->execute();
    }
}
