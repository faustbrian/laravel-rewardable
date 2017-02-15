<?php
/**
 * Created by PhpStorm.
 * User: mischaking
 * Date: 14/2/17
 * Time: 9:26 AM
 */

namespace BrianFaust\Rewardable\Offer;

trait HasOffer
{
    /**
     * @return mixed
     */
    public function offers()
    {
        return $this->morphMany(Offer::class, 'offerable');
    }

    public function createOffer(Offer $offer)
    {
        $this->getOfferRepository()->createOffer($offer);
    }

    /**
     * @param Offer $offer
     */
    public function claimOffer(Offer $offer)
    {
        // Check if the Model has sufficient balance to claim offer
        if ($this->getBalance() < $offer->amount) {

        }
    }

    private function getOfferRepository()
    {
        return new OfferRepository($this);
    }
}