<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class File
 *
 * @property $id
 * @property $file
 * @property $fileName
 * @property $fileType
 * @property $downloads
 * @property $storage_id
 * @property $category_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Category $category
 * @property Storage $storage
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class File extends Model
{

    static $rules = [
        'category_id' => 'required',
        'file' => 'required',
        'fileName' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['file', 'fileName', 'fileType', 'fileSize', 'downloads', 'storage_id', 'category_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function storage()
    {
        return $this->hasOne('App\Models\Storage', 'id', 'storage_id');
    }
}
