Библиотека Correct Brackets
============================

Тестовая библиотека 
-------------------
Возвращает **true**, если переданная строка корректна т.е. все открытые скобки корректно открыты и закрыты, или же **false** в противном случае.

#### Install via Composer:

    composer require anikin-elets/correct-brackets

#### Usage

```php
$line = '()()(    )()()';
$allowedChars = ['(', ')', '\r', '\n', '\t', '\s'];

$bracketLibrary = new \Library\Command\BracketCommand($line, $allowedChars);
try {
    $isCorrect = $bracketLibrary->execute();
} catch (\Library\Exceptions\InvalidArgumentException $e) {
    echo sprintf("ERROR: %s", $e->getMessage());
}
```
