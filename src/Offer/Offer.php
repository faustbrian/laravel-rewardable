<?php
/**
 * Created by PhpStorm.
 * User: mischaking
 * Date: 14/2/17
 * Time: 9:20 AM
 */

namespace BrianFaust\Rewardable\Offer;


use BrianFaust\Rewardable\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Laracasts\Presenter\PresentableTrait;
use BrianFaust\Rewardable\Offer\OfferRepository;

/**
 * Class Offer
 * @package BrianFaust\Rewardable\Offer
 * @property string $title
 * @property string $description
 * @property float $amount
 * @property Carbon $valid_from
 * @property Carbon $valid_to
 */
class Offer extends BaseModel
{
    use PresentableTrait;

    protected $presenter = 'OfferPresenter';

    protected $fillable = ['title', 'description', 'amount', 'valid_from', 'valid_to', 'meta', 'claimed_at'];

    protected $table = 'offers';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = ['meta' => 'array'];

    public function offer(): MorphTo
    {
        return $this->morphTo('offerable');
    }

    public function getPivot()
    {
        return (new OfferRepository($this))->getPivot();
    }

    /**
     * @return string
     */
    public function getPresenterClass(): string
    {
        return OfferPresenter::class;
    }
}