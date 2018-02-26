<?php

if (! function_exists('easelog')) {
	/**
	 * Helper function to get Easelog object.
	 * @param array $db_params
	 *
	 * @return \SachinKiranti\Easelog\Easelog
	 */
	function easelog(array $db_params = [])
	{
		$easelog = app('easelog');
		if (! is_null($easelog)) {
			return $easelog->getLogActivity($db_params);
		}
		return $easelog;
	}
}

if (! function_exists('create_easelog')) {
	/**
	 * Helper function to create Easelog.
	 * @param array $db_params
	 *
	 * @return \SachinKiranti\Easelog\Easelog
	 */
	function create_easelog(array $db_params = [])
	{
		$easelog = app('easelog');
		if (! is_null($easelog)) {
			return $easelog->createEaselog($db_params);
		}
		return $easelog;
	}
}

if (! function_exists('delete_easelog')) {
	/**
	 * Helper function to delete Easelog.
	 *
	 * @param array $ids
	 *
	 * @return \SachinKiranti\Easelog\Easelog
	 *
	 */
	function delete_easelog($ids)
	{
		$easelog = app('easelog');
		if (! is_null($easelog)) {
			return $easelog->deleteEaselog($ids);
		}
		return $easelog;
	}
}