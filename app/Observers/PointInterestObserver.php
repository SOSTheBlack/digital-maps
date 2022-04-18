<?php

namespace App\Observers;

use App\Helpers\AuthUser;
use App\Models\PointInterest;

final class PointInterestObserver
{
    use AuthUser;

    /**
     * Handle the PointInterest "creating" event.
     *
     * @param  PointInterest  $pointInterest
     *
     * @return void
     */
    public function creating(PointInterest $pointInterest): void
    {
        if (empty($pointInterest->user_id) && isset($this->authUser?->id)) {
            $pointInterest->user_id = $this->authUser->id;
        }
    }
}
