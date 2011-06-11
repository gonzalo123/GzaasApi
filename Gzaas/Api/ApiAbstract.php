<?php
namespace Gzaas\Api;

abstract class ApiAbstract extends Network
{
    const GET  = 'GET';
    const POST = 'POST';

    const HTTP_OK      = 200;
    const HTTP_CREATED = 201;
    
    /**
     * @return ApiInterface
     */
    static function factory()
    {
        $class = get_called_class();
        return new $class;
    }

    /**
     * @param int $nowFeatured
     * @param int $numResults
     * @return array
     */
    public function getAll($nowFeatured = 1, $numResults = 0)
    {
        return $this->get($this->apiUrl, $nowFeatured, $numResults);
    }
    
    public function getRawAll($nowFeatured = 1, $numResults = 0)
    {
        return json_decode($this->getRaw($this->apiUrl, $nowFeatured, $numResults), true);
    }
    
    protected function getRaw($key, $nowFeatured, $numResults)
    {
        $params = array(
            'numResults'  => $numResults,
            'nowFeatured' => $nowFeatured
        );
        $url = \Gzaas\Api::URI . \Gzaas\API::VERSION . '/' . $key;
        return json_decode($this->curl(self::GET, $url, $params), true);
    }

    protected function get($key, $nowFeatured, $numResults)
    {
        $out = array();
        $data = (array) $this->getRaw($key, $nowFeatured, $numResults);
        if (count($data) > 0) {
            foreach ($data as $reg) {
                $out[$reg['hashtag']] = $reg['description'];
            }
        }
        return $out;
    }
}
