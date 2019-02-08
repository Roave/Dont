# Don't

`roave/dont` is a small PHP package aimed at enforcing good
practices when it comes to designing
[defensive code](https://ocramius.github.io/extremely-defensive-php/).

[![Build Status](https://travis-ci.org/Roave/Dont.svg)](https://travis-ci.org/Roave/Dont)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Roave/Dont/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Roave/Dont/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/Roave/Dont/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/Roave/Dont/?branch=master)
[![Packagist](https://img.shields.io/packagist/v/roave/dont.svg)](https://packagist.org/packages/roave/dont)
[![Packagist](https://img.shields.io/packagist/vpre/roave/dont.svg)](https://packagist.org/packages/roave/dont)

## Installation

```sh
composer require roave/dont
```

## Usage

The package currently provides six traits:

 * `Dont\DontDeserialise`
 * `Dont\DontSerialize`
 * `Dont\DontClone`
 * `Dont\DontGet`
 * `Dont\DontSet`
 * `Dont\DontCall`

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
