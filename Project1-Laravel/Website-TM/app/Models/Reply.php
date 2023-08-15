<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = ['message', 'publishing_date'];

    //Take the Contact Request associated with the Reply, so we can track to what contact request it belongs.
    public function contact_request(): BelongsTo {
        return $this->belongsTo(ContactRequest::class);
    }
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
