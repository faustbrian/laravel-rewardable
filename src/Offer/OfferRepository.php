<?php
/**
 * Created by PhpStorm.
 * User: mischaking
 * Date: 14/2/17
 * Time: 9:25 AM
 */

namespace BrianFaust\Rewardable\Offer;

use Illuminate\Database\Eloquent\Model;

class OfferRepository
{
    /** @var Model $model */
    protected $model;

    /**
     * OfferRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param Offer $offer
     */
    public function createOffer(Offer $offer)
    {
        return $this->model->offers()->save($offer);
    }
}