<?php

namespace Dalmolin\Historiable;

trait Historiable
{
    /**
     * Boot the medias trait for a model.
     *
     * @return void
     */
    public static function bootHistoriable()
    {
        static::updating(function($model) {
            $model->history()->create([
                'data' => $model->toHistoriableArray()
            ]);
        });
    }

    public function history()
    {
        return $this->morphMany(History::class, 'history', 'model', 'model_id')
                    ->orderBy('created_at', 'desc');
    }

    /**
     * Get the historiable data array for the model.
     *
     * @return array
     */
    public function toHistoriableArray()
    {
        return $this->toArray();
    }
}
