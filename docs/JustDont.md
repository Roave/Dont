# JustDont

This trait combines many, but not all, traits from Dont. As of December 2021, DontInstantiate is not part of the JustDont trait. Future versions may add / block more behavior than the current version. Such behavior may be added in a minor release (f.e. 1.3 to 1.4). If you use this trait, you code may break when upgrading Dont.

 - If you are an application developer and you are in full control of your dependency versions, we can recommend that you use this trait. You can be mindful when upgrading your dependencies.
 - If you write libraries which you publish for others to use, you are not in control of the exact version of Dont that is installed. We therefore recommend that you DO NOT use this trait. Using this may cause your library to break when we release a new minor version of Dont. We recommend creating your own trait that combines the individual rule traits of Dont. This makes your library resilient against us adding new rules to Dont.

```php
use Dont\JustDont;

class MyClass
{
    use JustDont;
}

$my_class = new MyClass;

// These operations will throw Dont's exceptions
serialize($my_class);
unserialize("...Serialized MyClass...");
clone $my_class;
$my_class->notDeclared;
$my_class->notDeclared = 1;
$my_class->missingMethod();
MyClass::missingMethod();
(string) $my_class;
```
