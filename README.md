# Don't

`roave/dont` is a small PHP package aimed at enforcing good
practices when it comes to designing
[defensive code](https://ocramius.github.io/extremely-defensive-php/).

[![Infection MSI](https://badge.stryker-mutator.io/github.com/Roave/Dont/1.2.x)](https://infection.github.io)
[![Packagist](https://img.shields.io/packagist/v/roave/dont.svg)](https://packagist.org/packages/roave/dont)
[![Packagist](https://img.shields.io/packagist/vpre/roave/dont.svg)](https://packagist.org/packages/roave/dont)

## Installation

```sh
composer require roave/dont
```

## Usage

The package currently provides the following traits:

 * [`Dont\DontDeserialise`](docs/DontDeserialise.md)
 * [`Dont\DontSerialise`](docs/DontSerialise.md)
 * [`Dont\DontClone`](docs/DontClone.md)
 * [`Dont\DontGet`](docs/DontGet.md)
 * [`Dont\DontSet`](docs/DontSet.md)
 * [`Dont\DontCall`](docs/DontCall.md)
 * [`Dont\DontCallStatic`](docs/DontCallStatic.md)
 * [`Dont\JustDont`](docs/JustDont.md)

Usage is straightforward:

```php
use Dont\DontSerialise;

class MyClass
{
    use DontSerialise;
}

serialize(new MyClass); // will throw an exception
```
