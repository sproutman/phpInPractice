<?php
class InvalidPersonNameFormatException extends LogicException {}


class PersonUtils
{
    public static function parsePersonName($format, $val)
    {
        if (! $format) {
            throw new InvalidPersonNameFormatException("Invalid PersonName format.");
        }

        if ((! isset($val)) || strlen($val) == 0) {
            throw new InvalidArgumentException("Must supply a non-null value to parse.");
        }


    }
}
?>