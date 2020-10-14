<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\Log;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use SoftDeletes;
    //
    protected $fillable = ['uuid', 'filename', 'file'];

    public function logs()
    {
        return $this->hasMany(Log::class);
    }
}
