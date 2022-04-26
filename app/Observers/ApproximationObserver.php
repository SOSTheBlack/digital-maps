<?php

namespace App\Observers;

use App\Helpers\AuthUser;
use App\Models\Approximation;

final class ApproximationObserver
{
    use AuthUser;

    /**
     * Handle the Approximation "creating" event.
     *
     * @param  Approximation  $pointInterest
     *
     * @return void
     */
    public function creating(Approximation $pointInterest): void
    {
        if (empty($pointInterest->user_id) && isset($this->authUser?->id)) {
            $pointInterest->user_id = $this->authUser->id;
        }
    }
}
