# DontSerialise

Prevent serialization of objects.

```php
use Dont\DontSerialise;

class MyClass
{
    use DontSerialise;
}

serialize(new MyClass); // will throw NonSerialisableObject exception
```
