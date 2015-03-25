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

namespace Blubber\Locale;


class en_US
{

    static $lang = [
        'error_invalid_method'           => 'Method "%s" not found in class "%s"',
        'error_method_not_allowed'       => 'Requested HTTP method not allowed/implemented for this route',
        'error_invalid_user_agent'       => 'Valid user agent required for access',
        'error_invalid_namespace'        => 'Invalid namespace for requested path',
        'error_auth_bad_values'          => 'Authorization did not succeed (bad authorization values)',
        'error_auth_failed'              => 'Authorization did not succeed',
        'error_missing_auth_callback'    => 'Could not authenticate properly; Missing auth callback',
        'error_route_not_found'          => 'Requested route not found or required parameter mismatch',
        'error_missing_response_data'    => 'Missing response data for method',
        'error_invalid_data_format'      => 'Incoming content not a proper Content-Type format',
        'error_auth_scheme_not_found'    => 'Authorization scheme not found',
        'error_auth_scheme_not_allowed'  => 'Authorization scheme not allowed',
        'error_missing_required_headers' => 'Missing required headers',
        'error_unsupported_media'        => 'Missing or unsupported media; Check Content-Type header for accuracy',
        'warn_deprecated_namespace'      => 'Namespace is deprecated; please use current namespace to avoid errors',
    ];

    public static function lang($key)
    {
        if (array_key_exists($key, self::$lang)) {
            return self::$lang[$key];
        }

        return null;
    }

}
