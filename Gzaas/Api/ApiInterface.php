<?php
namespace Gzaas\Api;

interface ApiInterface
{
    public function getAll($nowFeatured = 1, $numResults = 0);
    public function getRawAll($nowFeatured = 1, $numResults = 0);
}
