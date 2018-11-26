<?php

namespace App;

use Reliese\Database\Eloquent\Model;

class Medium extends Model
{
    protected $casts = [
        'model_id' => 'int',
        'size' => 'int',
        'manipulations' => 'json',
        'custom_properties' => 'json',
        'responsive_images' => 'json',
        'order_column' => 'int'
    ];

    protected $fillable = [
        'model_type',
        'model_id',
        'collection_name',
        'name',
        'file_name',
        'mime_type',
        'disk',
        'size',
        'manipulations',
        'custom_properties',
        'responsive_images',
        'order_column'
    ];

    public function registerMediaCollections()
    {

      $this->addMediaCollection('user')->singleFile();
      $this->addMediaCollection('invoice');

    }

}
