<?php

namespace Core;

class Validator
{
    public static function string($value, $min = 1, $max = INF): bool
    {
        if (!is_string($value)) return false;
        $value = trim($value);
        $length = strlen($value);

        return $length >= $min && $length <= $max;
    }

    public static function email(string $value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function phone(string $value): bool
    {
        return preg_match('/^(\+94|94|0)?7[0-9]{8}$/', $value);
    }

    public static function date(string $value): bool
    {
        // Checks if the date is in the format YYYY-MM-DD and is not a past date
        $timestamp = strtotime($value);
        if (!$timestamp) return false;

        $today = strtotime(date('Y-m-d'));
        return $timestamp >= $today;
    }

    public static function radioSelected($value, array $allowedValues): bool
    {
        return self::inArray($value, $allowedValues);
    }

    public static function digit(string $value, $min = 1, $max = 8): bool
    {
        // Check if it's a digit and within the range $min to $max
        return ctype_digit($value) && (int)$value >= $min && (int)$value <= $max;
    }

    public static function price($value): bool
    {
        // Convert to string for regex matching
        $value = (string)$value;

        // Regex: match integers or decimals with up to 2 decimal places
        if (!preg_match('/^\d+(\.\d{1,2})?$/', $value)) {
            return false;
        }

        // Ensure the numeric value is at least 1
        return floatval($value) >= 1.00;
    }

    public static function password(string $value, int $minLength = 8): bool
    {
        // At least 1 uppercase, 1 lowercase, 1 digit, and 1 special character
        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{' . $minLength . ',}$/';

        return preg_match($pattern, $value) === 1;
    }

    public static function inArray($value, array $options): bool
    {
        return in_array($value, $options, true);
    }
}
