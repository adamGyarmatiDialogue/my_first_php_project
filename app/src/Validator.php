<?php

namespace App\Src;

final class Validator
{
    private static array $errorMessages = [];

    /**
     * Validate the given data by the given rules
     * @param mixed $data - The data to be valdiated
     * @param array $rules - The validation rules
     * @return bool - True if the given data are valid
     */
    public static function validate(mixed $data, array $rules): bool
    {
        if (sizeof($data) !== 0 && sizeof($rules) !== 0) {
            foreach ($rules as $key => $value) {
                $currentData = $data[$key];

                foreach ($value as $rule) {
                    // The data have to be
                    if ($rule === "required") {
                        if (self::requiredFailed($currentData)) {
                            array_push(self::$errorMessages, $key . ";" . "required");
                        }
                    }

                    // Check the min length of the data
                    if (strpos($rule, "min") !== false) {
                        if (self::checkMinLength($currentData, $rule)) {
                            array_push(self::$errorMessages, $key . ";" . "min");
                        }
                    }

                    // Check the max length of the data
                    if (strpos($rule, "max") !== false) {
                        if (self::checkMaxLength($currentData, $rule)) {
                            array_push(self::$errorMessages, $key . ";" . "max");
                        }
                    }

                    // Check the form of the email
                    if ($rule === "email") {
                        if (self::checkEmailFail($currentData)) {
                            array_push(self::$errorMessages, $key . ";" . "email");
                        }
                    }

                    // Check by regex
                    if (strpos($rule, "regexp") !== false) {
                        if (self::checkRegexpFailed($currentData, $rule)) {
                            array_push(self::$errorMessages, $key . ";" . "regexp");
                        }
                    }

                    // Check the same data
                    if (strpos($rule, "sameAs") !== false) {
                        if (self::sameAs($currentData, $rule)) {
                            array_push(self::$errorMessages, $key . ";" . "sameAs");
                        }
                    }
                }
            }
        }

        return sizeof(self::$errorMessages) === 0;
    }

    /**
     * Check the same data
     * @param mixed $data - The data
     * @param string $rule - The validation rule
     * @return bool - True if the data is not same
     */
    private static function sameAs(mixed $data, string $rule)
    {
        $ruleParts = explode(":", $rule);
        if (sizeof($ruleParts) === 2) {
            $dataToCheck = (string) $ruleParts[1];
            if ($data !== $dataToCheck) {
                return true;
            }
        }
        return false;
    }

    /**
     * Check the form with regex
     * @param mixed $data - The data
     * @param string $rule - The validation rule
     * @return bool - True if the data is not valid
     */
    private static function checkRegexpFailed(mixed $data, string $rule): bool
    {
        $ruleParts = explode(":", $rule);
        if (sizeof($ruleParts) === 2) {
            $pattern = (string) $ruleParts[1];
            if (preg_match($pattern, $data) !== 1) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check the form of the given rmail address
     * @param mixed $data - The data to be checked
     * @return bool - True if the data is not valid email address
     */
    private static function checkEmailFail(mixed $data): bool
    {
        if (!filter_var($data, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    /**
     * Check the legth of the given string
     * @param mixed $data - The data to be checked
     * @param string $rule - The valdiation rule
     * @return bool - True if the validation fail
     */
    private static function checkMinLength(mixed $data, string $rule): bool
    {
        if (!self::requiredFailed($data)) {
            $ruleParts = explode(":", $rule);
            if (sizeof($ruleParts) == 2) {
                $length = (int) $ruleParts[1];
                if (strlen(trim($data)) < $length) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * Check the legth of the given string
     * @param mixed $data - The data to be checked
     * @param string $rule - The valdiation rule
     * @return bool - True if the validation fail
     */
    private static function checkMaxLength(mixed $data, string $rule): bool
    {
        $ruleParts = explode(":", $rule);

        if (sizeof($ruleParts) == 2) {
            $length = (int) $ruleParts[1];
            if (strlen(trim($data)) > $length) {
                return true;
            }
        }
        return false;
    }

    /**
     * Get the first error message
     * @return string The first error message
     */
    public static function first(): string
    {
        return self::$errorMessages[0] ?? "";
    }

    /**
     * The data have to be
     * @param mixed $data The data to be checked
     * @return bool if the data does not exist
     */
    private static function requiredFailed(mixed $data): bool
    {
        if (!isset($data)) {
            return true;
        }

        if ($data === null) {
            return true;
        }

        if (gettype($data) === "string") {
            if (strlen(trim($data)) === 0) {
                return true;
            }
        }

        return false;
    }
}
