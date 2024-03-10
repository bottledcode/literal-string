# Literal String Polyfill

This is a draft of the `LiteralString` type to provide backwards compatability to older versions of PHP.

## Usage

Create a `LiteralString`:

```php
$string = LiteralString::from('SELECT * FROM users WHERE name = %s');

function query(LiteralString $query, array $variables) { /* code */ }
```

Literal strings retain much of their stringiness, even in strict mode:

```php
assert(LiteralString::from("a value") === LiteralString::from("a value")); // note the triple equals
assert(LiteralString::from("a value") !== LiteralString::from("a different value"));
assert(LiteralString::from("A") < LiteralString::from("B"));
assert(LiteralString::from("A") . LiteralString::from("B") === "AB"); // note that it is no longer a literal string
```
