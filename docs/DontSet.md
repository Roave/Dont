# DontSet

Prevent setting of undefined properties.

```php
use Dont\DontSet;

class MyClass
{
    use DontSet;
}
$object = new MyClass;
$object->undefinedProperty = 1; // will throw NonSettableObject exception
```
