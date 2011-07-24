<?php
namespace Gzaas\Api;

/**
 * Gzaas.com service API client
 *
 * THIS PROGRAM COMES WITH ABSOLUTELY NO WARANTIES !
 * USE IT AT YOUR OWN RISKS !
 *
 * @author Gonzalo Ayuso <http://gonzalo123.wordpress.com>
 * @copyright under GPL 2 licence
 */

abstract class Network
{
    const GET  = 'GET';
    const POST = 'POST';

    const HTTP_OK      = 200;
    const HTTP_CREATED = 201;
    
    protected function curl($type, $url, $queryString = array())
    {
        $s = curl_init();
        switch (strtoupper($type)) {
            case self::POST:
                curl_setopt($s, CURLOPT_URL, $url);
                curl_setopt($s, CURLOPT_POST, true);
                curl_setopt($s, CURLOPT_POSTFIELDS, $queryString);
                break;
            case self::GET:
                curl_setopt($s, CURLOPT_URL, $url . '?' . http_build_query($queryString));
                break;
        }

        curl_setopt($s, CURLOPT_RETURNTRANSFER, true);
        $_out = curl_exec($s);
        $status = curl_getinfo($s, CURLINFO_HTTP_CODE);
        curl_close($s);
        switch ($status) {
            case self::HTTP_OK:
            case self::HTTP_CREATED:
                $out = $_out;
                break;
            default:
                throw new \Exception("http error: {$status}", $status);
        }
        return $out;
    }
}