<?php

declare(strict_types=1);

namespace App\Model;

use App\Enums\FeedbackType;
use Hyperf\Database\Model\Relations\BelongsTo;
use Hyperf\DbConnection\Model\Model;

/**
 */
class Feedback extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = [
        'text',
        'fingerprint',
        'api_key',
        'type',
        'device',
        'page'
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = [
        'fingerprint' => 'integer',
        'api_key' => 'string',
        'type' => FeedbackType::class,
        'device' => 'string',
        'page' => 'string',
    ];

    /**
     * User that received the feedback.
     */
    protected function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
