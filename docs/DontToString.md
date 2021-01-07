# DontToString

Prevent converting an object as a string.

```php
use Dont\DontToString;

class MyClass
{
    use DontToString;
}
(new MyClass)->__toString(); // will throw NonStringableObject exception
```
