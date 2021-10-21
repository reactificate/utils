<?php

namespace Reactificate\Utils;

class ArrayHelper
{
    public static function has(array $data, string $key): bool
    {
        if (str_contains($key, '.')) {
            $expKeys = explode('.', $key);
            $value = $data[$expKeys[0]];

            for ($i = 1; $i < count($expKeys); $i++) {
                $value = $value[$expKeys[$i]] ?? null;

                // If we get null at first round we stop there, there's no point in continuing
                if (null == $value) return false;
            }

            return null != $value;
        }

        return array_key_exists($key, $data);
    }

    /**
     * @param array $data
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get(array $data, string $key, $default = null)
    {
        if (false !== strpos($key, '.')) {
            $expKeys = explode('.', $key);
            $value = $data[$expKeys[0]];

            for ($i = 1; $i < count($expKeys); $i++) {
                $value = $value[$expKeys[$i]] ?? null;

                // If we get null at first round we stop there, there's no point in continuing
                if (null == $value) return $default;
            }

            return $value;
        }

        return $data[$key] ?? $default;
    }

}