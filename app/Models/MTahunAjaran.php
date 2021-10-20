<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MTahunAjaran extends Model
{
    use SoftDeletes;
    protected $fillable = ['tahun_ajaran'];

    public function kelas()
    {
        return $this->hasMany(MKelas::class);
    }
}
