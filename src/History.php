<?php

namespace Dalmolin\Historiable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class History extends Model
{
    /**
     * Table
     */
    protected $table = 'history';

    /**
     * Fillable fields
     */
    protected $fillable = [
        'model',
        'model_id',
        'data',
    ];

    /**
     * Appends
     */
    protected $casts = [
        'data' => 'array',
    ];

    /**
     * The historiable object for getting the data
     *
     * @var Illuminate\Database\Eloquent\Model
     */
    protected $historiableModel;

    public function historiable()
    {
        return $this->morphTo('historiable', 'model', 'model_id');
    }

    public function model()
    {
        return $this->morphTo('model');
    }

    public function getObjectAttribute()
    {
        if (! $this->historiableModel) {
            $this->historiableModel = new $this->model;
            $this->historiableModel->forceFill($this->data);
        }

        return $this->historiableModel;
    }
}
