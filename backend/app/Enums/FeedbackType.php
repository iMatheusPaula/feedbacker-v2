<?php

declare(strict_types=1);

namespace App\Enums;

enum FeedbackType: string
{
    case ISSUE = 'ISSUE';
    case IDEA = 'IDEA';
    case OTHER = 'OTHER';
}
