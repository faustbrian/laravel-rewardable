## Transactions

### Get all Transactions of a user
```php
$user->transactions();
```

### Charge a user the given amount of points
```php
$user->chargeCredits(Credit::find($id)->amount, CreditType::find($id)->id);
```
