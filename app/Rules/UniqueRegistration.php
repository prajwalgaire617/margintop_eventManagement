<?php

namespace App\Rules;

use App\Models\AttendeeModel;
use Illuminate\Contracts\Validation\ValidationRule;
use Auth;
use Closure;

class UniqueRegistration implements ValidationRule
{
    private $event_id;

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function __construct($event_id)
    {
        $this->event_id = $event_id;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        $exists = AttendeeModel::where('email', Auth::user()->email)
            ->where('event_id', $this->event_id)
            ->exists();

        if ($exists) {
            // If exists, call the $fail closure with an error message
            $fail('You have already registered for this event.');  // Custom error message
        }
    }
}
