<?php

namespace App\Rules;

use App\Models\AttendeeModel;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UniqueRegistration implements Rule
{
    private $eventId;

    public function __construct($eventId)
    {
        $this->eventId = $eventId;
    }

    public function passes($attribute, $value)
    {
        return !AttendeeModel::where('email', Auth::user()->email)
            ->where('event_id', $this->eventId)
            ->exists();
    }

    public function message()
    {
        return 'You have already registered for this event.';
    }
}
