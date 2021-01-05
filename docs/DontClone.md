# DontClone

Prevent cloning of objects.

```php
use Dont\DontClone;

class MyClass
{
    use DontClone;
}

$clonedObject = clone (new MyClass); // will throw NonCloneableObject exception
```
