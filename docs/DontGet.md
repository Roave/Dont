# DontGet

Prevent getting of undefined properties.

```php
use Dont\DontGet;

class MyClass
{
    use DontGet;
}

(new MyClass)->undefinedProperty; // will throw NonGettableObject exception
```
