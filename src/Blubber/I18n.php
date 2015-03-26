<?php
/**
 * Copyright (c)2015 Andrew Heebner
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 * 
 * The above copyright notice and this permission notice shall be
 * included in all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 * LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 * OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

namespace Blubber;


class I18n
{

    protected static $locale = 'en-US';

    public static function hasLocale()
    {
        return !empty(self::$locale);
    }


    public static function getLocale()
    {
        return self::$locale;
    }

    public static function setLocale($locale)
    {
        if (self::localeExists($locale)) {
            self::$locale = $locale;
        }
    }

    public static function localeExists($locale)
    {
        $locale = str_replace('-', '_', $locale);
        $class = '\Blubber\Locale\\' . $locale;

        return !!class_exists($class);
    }

    public static function get($key)
    {
        $locale = str_replace('-', '_', self::$locale);
        $class = '\Blubber\Locale\\' . $locale;

        return forward_static_call_array([$class, 'lang'], [$key]);
    }

}
