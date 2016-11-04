## Credits

### Get all Credits of a user
```php
$user->credits();
```

### Get all Credits of a user
```php
$user->getCredit();
```

### Get all Credits of a user by Credit type
```php
$user->getCreditByType($type);
```

### Get the current balance of a user
```php
$user->getBalance();
```

### Get the current balance of a user by Credit type
```php
$user->getBalanceByType($type);
```

### Get all Credits a user has spent
```php
$user->getSpendCredits();
```

### Grant a single Credit
```php
$user->grantCredit(Credit::find($id));
```

### Grant multiple Credits
```php
$user->grantCredits([
    Credit::find($id), Credit::find($id), Credit::find($id)
]);
```

### Revoke a single Credit
```php
$user->revokeCredit(Credit::find($id));
```

### Revoke multiple Credits
```php
$user->revokeCredits([
    Credit::find($id), Credit::find($id), Credit::find($id)
]);
```

### Revoke all credits
```php
$user->revokeAllCredits();
```

### Regrant all Credits **(Removes all credits and assigns the new ones)**
```php
$user->reGrantCredits([
    Credit::find($id), Credit::find($id), Credit::find($id)
]);
```

### Create a new Credit Type
```php
CreditType::create(['name' => 'Participation']);
```
