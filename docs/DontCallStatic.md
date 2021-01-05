# DontCallStatic

Prevent calling of undefined static methods.

```php
use Dont\DontCallStatic;

class MyClass
{
    use DontCallStatic;
}

MyClass::undefinedMethod(); // will throw NonStaticCallableClass exception
```
