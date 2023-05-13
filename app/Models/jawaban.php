<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jawaban extends Model
{
    use HasFactory;

    protected $table = 'jawabans';
    protected $primaryKey = 'id_jawaban';
    protected $fillabel = [
        'id_pertanyaan',
        'id_user',
        'isi'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class);
    }
}
