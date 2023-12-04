<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AnagCliFor extends Model
{
    protected $connection = 'default';
    protected $table = 'anagclifor';

    public function agente(): BelongsTo
    {
        return $this->belongsTo(AnagCliFor::class, 'ID_AGENTE','ID_anag_clifor');
    }
}
