# JustDont

This includes the combination of all the traits and is the recommended one to use.

```php
use Dont\JustDont;

class MyClass
{
    use JustDont;
}

serialize(new MyClass); // will throw an exception
```
