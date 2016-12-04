<?php

/*
 * This file is part of Laravel Rewardable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

/*
 * This file is part of Laravel Rewardable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Rewardable\Badges;

use Illuminate\Database\Eloquent\Model;
use BrianFaust\Eloquent\Presenter\PresentableTrait;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Badge extends Model implements HasMedia
{
    use HasMediaTrait;
    use PresentableTrait;

    protected $dates = ['awarded_at', 'revoked_at'];

    public function badgeable(): MorphTo
    {
        return $this->morphTo();
    }

    public function requirementType(): BelongsTo
    {
        return $this->belongsTo(CreditType::class, 'requirement_type_id');
    }

    public function getPresenterClass()
    {
        return BadgePresenter::class;
    }
}
