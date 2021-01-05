# DontDeserialise

Prevent deserialization of objects.

```php
use Dont\DontDeserialise;

class MyClass
{
    use DontDeserialise;
}

deserialize('O:7:"MyClass":0:{}'); // will throw NonDeserialisableObject exception
```
