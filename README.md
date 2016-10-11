# Don't

`roave/dont` is a small PHP package aimed at enforcing good
practices when it comes to designing
[defensive code](https://ocramius.github.io/extremely-defensive-php/).

## Installation

```sh
composer require roave/dont
```

## Usage

The package currently provides two traits:

 * `Dont\DontDeserialise` 
 * `Dont\DontSerialize` 

Usage is straightforward:

```php
use Dont\DontSerialise;

class MyClass
{
    use DontSerialise;
}

serialize(new MyClass); // will throw an exception
```

The same applies to `DontDeserialise`, but this
time with `unserialize()`.

## Further development

Further traits may be implemented in future, such as preventing
`clone` usage, or preventing read/write of dynamically defined
properties.
