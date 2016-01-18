## Ranks

### Get all Ranks of a user
```php
$user->ranks();
```

### Grant a single Rank
```php
$user->grantRank(Rank::find($id));
```

### Grant multiple Ranks
```php
$user->grantRanks([
    Rank::find($id), Rank::find($id), Rank::find($id)
]);
```

### Revoke a single Rank
```php
$user->revokeRank(Rank::find($id));
```

### Revoke multiple ranks
```php
$user->revokeRanks([
    Rank::find($id), Rank::find($id), Rank::find($id)
]);
```

### Revoke all Ranks
```php
$user->revokeAllRanks();
```

### Regrant all Ranks **(Removes all ranks and assigns the new ones)**
```php
$user->reGrantRanks([
    Rank::find($id), Rank::find($id), Rank::find($id)
]);
```
