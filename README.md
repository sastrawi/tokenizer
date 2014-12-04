Sastrawi Tokenizer
==========================

[![Build Status](https://travis-ci.org/sastrawi/tokenizer.svg?branch=master)](https://travis-ci.org/sastrawi/tokenizer) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/sastrawi/tokenizer/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/sastrawi/tokenizer/?branch=master) [![Code Coverage](https://scrutinizer-ci.com/g/sastrawi/tokenizer/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/sastrawi/tokenizer/?branch=master)


Sastrawi Tokenizer adalah library PHP untuk melakukan tokenization.


Tokenization
-----------------

    Saya sedang belajar NLP Bahasa Indonesia.

Text di atas dapat di-tokenize menjadi:

```json
["Saya", "sedang", "belajar", "NLP", "Bahasa", "Indonesia", "."]
```

Sastrawi Tokenizer
--------------------------

- _Library PHP_ untuk melakukan _tokenization_ pada Bahasa Indonesia.
- Mudah diintegrasikan dengan _framework_ / _package_ lainnya.
- Mempunyai _API_ yang sederhana dan mudah digunakan.

Demo
----
[http://sastrawi.github.io/tokenizer.html](http://sastrawi.github.io/tokenizer.html)


Cara Install
-------------

Sastrawi Tokenizer dapat diinstall dengan [Composer](https://getcomposer.org).

1. Buka terminal (command line) dan arahkan ke directory project Anda.
2. [Download Composer](https://getcomposer.org/download/) sehingga file `composer.phar` berada di directory tersebut.
3. Tambahkan Sastrawi Sentence Detector ke file `composer.json` Anda :

```bash
php composer.phar require sastrawi/tokenizer:dev-master
```

Jika Anda masih belum memahami bagaimana cara menggunakan Composer, silahkan baca [Getting Started with Composer](https://getcomposer.org/doc/00-intro.md).


Penggunaan
-----------

Copy kode berikut di directory project anda. Lalu jalankan file tersebut.

```php
<?php

// demo.php

// include composer autoloader
require_once __DIR__ . '/vendor/autoload.php';


```

Lisensi
--------

Sastrawi Tokenizer dirilis di bawah lisensi MIT License (MIT).
Library ini memuat daftar singkatan Bahasa Indonesia dengan lisensi [Creative Common BY SA](https://creativecommons.org/licenses/by-sa/3.0/deed.id) yang bersumber dari [http://id.wiktionary.org/wiki/Wiktionary:Daftar_singkatan_dan_akronim_bahasa_Indonesia](http://id.wiktionary.org/wiki/Wiktionary:Daftar_singkatan_dan_akronim_bahasa_Indonesia).


Informasi Lebih Lanjut
----------------------

- [FAQ](https://github.com/sastrawi/tokenizer/wiki/FAQ)
- [Wiki](https://github.com/sastrawi/tokenizer/wiki)
- [Roadmap](https://github.com/sastrawi/tokenizer/issues/milestones)
- [Bug Report, Questions, Ideas](https://github.com/sastrawi/tokenizer/issues)
