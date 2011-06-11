<?php
namespace Gzaas;

/**
 * Gzaas.com service API client
 *
 * THIS PROGRAM COMES WITH ABSOLUTELY NO WARANTIES !
 * USE IT AT YOUR OWN RISKS !
 *
 * @author Gonzalo Ayuso <http://gonzalo123.wordpress.com>
 * @copyright under GPL 2 licence
 */

class Api extends Api\Network
{
    const FEATURED = 1;
    const VERSION = 'v1';
    const URI     = 'http://gzaas.com/api/';
    
    private $apiKey;
    private $font;
    private $backPattern;
    private $style;
    private $color;
    private $backColor;
    private $shadows;
    private $visibility;
    private $launcher;

    public function create($message)
    {
        $params = array('message' => $message);
        
        if (isset($this->apiKey))      $params['apiKey']      = $this->apiKey;
        if (isset($this->color))       $params['color']       = $this->color;
        if (isset($this->backColor))   $params['backcolor']   = $this->backColor;
        if (isset($this->backPattern)) $params['backpattern'] = $this->backPattern;
        if (isset($this->shadows))     $params['shadows']     = $this->shadows;
        if (isset($this->style))       $params['style']       = $this->style;
        if (isset($this->visibility))  $params['visibility']  = $this->visibility;
        if (isset($this->launcher))    $params['launcher']    = $this->launcher;
        
        $url = self::URI . self::VERSION . '/write';
        $out = json_decode($this->curl(self::POST, $url, $params), true);
        
        if ($out['valid'] == 'true') {
            return $out['urlGzaas'];
        } else {
            throw new Exception($out['errorMessage']);
        }
    }
    
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
        return $this;
    }
    
    public function setFont($font)
    {
        $this->font = $font;
        return $this;
    }
    
    public function setBackPattern($backPattern)
    {
        $this->backPattern = $backPattern;
        return $this;
    }
    
    public function setStyle($style)
    {
        $this->style = $style;
        return $this;
    }
    
    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }
    
    public function setBackcolor($backColor)
    {
        $this->backColor = $backColor;
        return $this;
    }
    
    public function setShadows($shadows)
    {
        $this->shadows = $shadows;
        return $this;
    }
    
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;
        return $this;
    }
    
    public function setLauncher($launcher)
    {
        $this->launcher = $launcher;
        return $this;
    }
}
