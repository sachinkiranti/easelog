<?php
/**
 * This config file is a part of sachinkiranti/easelog Package
 * a simple yet flexible event log activity integration system.
 *
 * @license MIT
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Enable Easelog
    |--------------------------------------------------------------------------
    |
    | Enable easelog to start monitoring your model activity
    |
    */
   'enable_easelog' => true,

    /*
    |--------------------------------------------------------------------------
    | Easelog Message
    |--------------------------------------------------------------------------
    |
    | Easelog Message required two %s for input log type and model
    |
    */
   'log_message' => '%s %s successfully.',

    /*
    |--------------------------------------------------------------------------
    | Enable the use of namespace
    |--------------------------------------------------------------------------
    |
    | If true, the package will use the given model_namespace for all your models.
    | If false, you have to give model with namespace in models.
    |
    */
   'use_namespace' => true,

   /*
    |--------------------------------------------------------------------------
    | Model Namespace for all your Models
    |--------------------------------------------------------------------------
    |
    | Models namespace
    |
    */
   'model_namespace' => '\\App\\',

   /*
    |--------------------------------------------------------------------------
    | Keeping your model's in an array
    |--------------------------------------------------------------------------
    |
    | Models to be monitored
    |
    */
   'models' => [
        'User',
   ],

];
