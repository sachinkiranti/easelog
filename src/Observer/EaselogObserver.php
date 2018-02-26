<?php

namespace SachinKiranti\Easelog\Observer; 

/**
 * class EaselogObserver
 * @package SachinKiranti\Easelog\Observer
 */
class EaselogObserver
{

    public function created( $model ) 
    {
        $this->savingLog([
            'log_type'  => "created",
            'model'     => $model->getTable()
        ]);
    }

    public function updated( $model ) 
    {
	    $this->savingLog([
		    'log_type'  => "updated",
		    'model'     => $model->getTable()
	    ]);
    }

    public function deleted( $model )
    {
	    $this->savingLog([
		    'log_type' => "deleted",
		    'model'    => $model->getTable()
	    ]);
    }

    public function saved( $model )
    {
        $this->savingLog([
	        'log_type' => "saved",
	        'model'    => $model->getTable()
        ]);
    }

	/**
	 * @param array $attributes
	 *
	 * @return \Illuminate\Foundation\Application|mixed
	 */
    public function savingLog( array $attributes )
    {
	    $easelog = app('easelog');

	    if (! is_null($easelog)) {
		    return $easelog->createEaselog($attributes);
	    }
	    return $easelog;
    }

}
