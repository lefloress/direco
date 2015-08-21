<?php namespace Direco\Helpers;

class Rif {

    const FULL_REGEX_CEDULA_RIF = '/^([J|G|V|E])-?([0-9]{7,8})(-[0-9])?$/';
    const REGEX_NUMBER_CEDULA_RIF = '([0-9]{7,8})(-[0-9])?';
    const REGEX_NUMBER_RIF = '([0-9]{7,8})-([0-9])';

    public static function types()
    {
        return ['V' => 'V', 'E' => 'E', 'J' => 'J', 'G' => 'G'];
    }

    public static function isValid($value)
    {
        return is_array($value)
            && isset ($value['letter'])
            && isset ($value['number'])
            && in_array($value['letter'], Rif::types())
            && preg_match(static::getNumberRegex($value['letter']), $value['number']);
    }

    public static function getNumberRegex($letter)
    {
        return '/^' .
            (in_array($letter, ['J', 'G']) ?
                static::REGEX_NUMBER_RIF
                : static::REGEX_NUMBER_CEDULA_RIF)
            . '$/';
    }

    public static function toString($value)
    {
        if (is_array($value))
        {
            $value = implode('-', $value);
        }

        if (preg_match(static::FULL_REGEX_CEDULA_RIF, $value, $matches))
        {
            unset ($matches[0]);
            return str_replace('--', '-', implode('-', $matches));
        }

        throw new \Exception('Invalid CEDULA or RIF: ' . $value);
    }

    public static function letter($value)
    {
        if (is_array($value))
        {
            return isset($value['letter']) ? $value['letter'] : "";
        }

        return substr($value, 0, 1);
    }

    public static function number($value)
    {
        if (is_array($value))
        {
            return isset($value['number']) ? $value['number'] : "";
        }

        return substr($value, 1);
    }

} 