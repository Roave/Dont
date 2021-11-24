# DontInstantiate

Prevent object instantiation.

```php
use Dont\DontInstantiate;

class MyClass
{
    use DontInstantiate;
}

new MyClass(); // will throw Error
```
