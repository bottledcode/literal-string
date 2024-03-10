<?php

class LiteralString implements Stringable {
    private static array $valueMap;

    private function __construct(private readonly string $value) {}

    public function __destruct() {
        unset(self::$valueMap[$this->value]);
    }

    /**
     * @param literal-string $value
     * @return LiteralString
     */
    public static function from(string $value): LiteralString {
        $realValue = (self::$valueMap[$value] ?? null)?->get() ?? new self($value);
        self::$valueMap[$value] ??= WeakReference::create($realValue);

        return $realValue;
    }

    public function __toString(): string {
        return $this->value;
    }
}
