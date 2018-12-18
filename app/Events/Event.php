<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

/**
 * Class Event
 */
abstract class Event
{
    use SerializesModels;
}
