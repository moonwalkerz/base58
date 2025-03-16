# Base58 Encoding and Decoding in PHP

This repository provides a simple PHP class for encoding and decoding data using the Base58 algorithm. Base58 is a binary-to-text encoding scheme commonly used in cryptocurrencies like Bitcoin.

## Installation

Find the package on [Packagist](https://packagist.org/packages/moonwalkerz/base58).

```bash
composer require moonwalkerz/base58
```

# Usage

## Encoding a String
To encode a string using Base58, use the encode method:

```php
include 'vendor/autoload.php';
use Moonwalkerz\Base58\Base58;

$encoded = Base58::encode('Hello, World!');
echo "Encoded: $encoded\n"; // Output: Encoded: JxF12TrwUP45BMd
```

## Decoding a Base58 String
To decode a Base58 string back to the original string, use the decode method:

```php
include 'vendor/autoload.php';
use Moonwalkerz\Base58\Base58;

$decoded = Base58::decode('JxF12TrwUP45BMd');
echo "Decoded: $decoded\n"; // Output: Decoded: Hello, World!
```

# Requirements
* PHP 7.4 or higher
* bcmath extension enabled

# Contributing
Contributions are welcome! If you find any issues or have suggestions for improvements, please open an issue or submit a pull request.

# License
This project is licensed under the MIT License. See the LICENSE file for details.

# Acknowledgments
Base58 encoding/decoding algorithm inspired by Bitcoin's implementation.

## 🤑 Support Us 🤑

These codes make your life easier and you avoid wasting time?\
Give us some RedBull!

BUSD(BEP20)\
0x367B9207ACBC30022F9A7262320E36661D7Ffeb5

## ✉️ Contact Us: ✉️

Mail: webmaster@moonwalkerz.dev\
Telegram: @MoonWalkerzDev