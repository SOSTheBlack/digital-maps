<?php

namespace App\Observers;

use App\Helpers\AuthTrait;
use App\Models\PointInterest;

class PointInterestObserver
{
    use AuthTrait;

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
