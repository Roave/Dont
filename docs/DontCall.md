# DontCall

Prevent calling of undefined methods.

```php
use Dont\DontCall;

class MyClass
{
    use DontCall;
}

(new MyClass)->undefinedMethod(); // will throw NonCallableObject exception
```
