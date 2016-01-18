## Badges

### Get all Badges of a user
```php
$user->badges();
```

### Grant a single Badge
```php
$user->grantBadge(Badge::find($id));
```

### Grand multiple Badges
```php
$user->grantBadges([
    Badge::find($id), Badge::find($id), Badge::find($id)
]);
```

### Revoke a single badge
```php
$user->revokeBadge(Badge::find($id));
```

### Revoke multiple Badges
```php
$user->revokeBadges([
    Badge::find($id), Badge::find($id), Badge::find($id)
]);
```

### Revoke all Badges
```php
$user->revokeAllBadges();
```

### Regrant all Badges **(Removes all badges and assigns the new ones)**
```php
$user->reGrantBadges([
    Badge::find($id), Badge::find($id), Badge::find($id)
]);
```
