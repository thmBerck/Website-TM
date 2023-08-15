<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ContactRequest extends Model
{
    use HasFactory;
    protected $fillable = ['subject', 'message', 'publishing_date'];

    //Take the User associated with the ContactRequest, so we can track who made the request.
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function replies(): HasMany {
        return $this->hasMany(Reply::class);
    }
}
