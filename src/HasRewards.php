<?php



declare(strict_types=1);



namespace BrianFaust\Rewardable;

trait HasRewards
{
    use Badges\HasBadges;
    use Credits\HasCredits;
    use Ranks\HasRanks;
    use Transactions\HasTransactions;
}
