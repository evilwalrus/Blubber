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

namespace Blubber\Core;

class I18n
{

    private static $fallback = 'en';
    private static $lang = null;

    private static $langDir = '';
    private static $langData = [];

    public static function init()
    {
        self::$langDir = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Lang' . DIRECTORY_SEPARATOR;

        // find the acceptable lang and load it up
        $langs = self::_getUserLangs();
        foreach ($langs as $k => $l) {
            if (self::_langExists($l)) {
                self::$lang = $l;
                self::$langData = json_decode(file_get_contents(self::$langDir . self::_langFileName($l)), true);
                break;
            }
        }

        // make sure we have a lang, or else we can fallback
        if (is_null(self::$lang)) {
            self::$lang = self::$fallback;
        }
    }

    public static function get($key)
    {
        return isset(self::$langData[$key]) ? self::$langData[$key]: null;
    }

    public static function getLang()
    {
        return is_null(self::$lang) ? self::$fallback : self::$lang;
    }

    private static function _langFileName($lang)
    {
        return 'lang_' . strtolower($lang) . '.json';
    }

    private static function _langExists($lang)
    {
        if (file_exists(self::$langDir . self::_langFileName($lang))) {
            return true;
        }

        return false;
    }

    private static function _getUserLangs()
    {
        $langs = Request::getAcceptLanguage();
        $userLangs = [];

        foreach ($langs as $lang => $preference) {
            $userLangs[] = $lang;
        }

        return $userLangs;
    }

}