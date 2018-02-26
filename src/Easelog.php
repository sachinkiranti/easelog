<?php

namespace SachinKiranti\Easelog;

use SachinKiranti\Easelog\Exceptions\InvalidArgumentException;

class Easelog
{

	/**
	 * Creating log activity
	 * @param array $params
	 *
	 * @return mixed
	 */
	public function createEaselog( array $params = [] )
	{
		$attributes = [
			'log_type'    => $params['log_type'],
			'log_message' => sprintf($this->getConfig('log_message'), $params['model'], $params['log_type']),
			'user_id'     => auth()->id(),
			'created_at'  => date('Y-m-d H:i:s', time())
		];

		return \DB::table("ease_log")
			->insert([
				'log_type'    => $attributes['log_type'],
				'log_message' => $attributes['log_message'],
				'user_id'     => $attributes['user_id'],
				'created_at'  => $attributes['created_at']
			]);
	}

	/**
	 * @param string $ids
	 *
	 * @return mixed
	 * @throws InvalidArgumentException
	 */
	public function deleteEaselog( $ids )
	{
		if (!is_array($ids)) {
			throw new InvalidArgumentException(__FUNCTION__);
		}
		return \DB::table("ease_log")->whereIn('id', $ids)->delete();
	}

	/**
	 * getLogActivity getting log activities
	 *
	 * @param array $db_params
	 *
	 * @return array
	 */
    public function getLogActivity( array $db_params = [] )
    {
	    $data = array_replace_recursive([
		    'order'   => "DESC",
		    'orderby' => "id",
		    'limit'   => 10,
	    ], $db_params);

        return \DB::table("ease_log")
            ->orderBy($data['orderby'], $data['order'])
            ->take($data['limit'])
            ->get();
    }

	/**
	 * @param $key
	 *
	 * @return \Illuminate\Config\Repository|mixed
	 */
    public function getConfig($key)
    {
	    return config("easelog.{$key}");
    }

}