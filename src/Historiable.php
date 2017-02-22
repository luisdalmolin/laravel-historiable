<?php

namespace Dalmolin\Historiable;

trait Historiable
{

    /**
     * Boot the medias trait for a model.
     *
     * @return void
     */
    public static function bootMedias()
    {
        static::saving(function($model) {
            // do it
        });

        static::deleting(function($model) {
            // do it
        });
    }
}
