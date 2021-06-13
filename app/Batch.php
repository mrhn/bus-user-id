<?php

namespace App;

use Illuminate\Bus\BatchRepository;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $table = 'job_batches';

    public function toBatch()
    {
        return resolve(BatchRepository::class)->toBatch($this);
    }
}
