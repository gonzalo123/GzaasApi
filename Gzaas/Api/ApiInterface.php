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

interface ApiInterface
{
    public function getAll($nowFeatured = 1, $numResults = 0);
    public function getRawAll($nowFeatured = 1, $numResults = 0);
}
