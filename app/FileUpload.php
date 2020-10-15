<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\Log;
use Illuminate\Database\Eloquent\SoftDeletes;

class FileUpload extends Model
{
    use SoftDeletes;
    //
    protected $fillable = ['uuid', 'filename', 'file', 'size'];

    protected $table ='files';

    public function logs()
    {
        return $this->hasMany(Log::class);
    }
}
