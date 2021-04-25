<?php


class Route
{
    private $_uri = [];
    private $_method = [];


    public function add($uri,$method = null)
    {
        $this->_uri[] = $uri;
        if($method != null){
            $this->_method[] = $method;
        }

    }

    public function submit()
    {
      $uri =  isset($_SERVER["REQUEST_URI"]) ? $_SERVER["REQUEST_URI"] : "/";
        $uri =   substr($uri,17);
      foreach ($this->_uri as $key => $value)
      {

           if(($value == $uri))
           {

              if(isset($this->_method[$key]))
              {
                  $useMethod = $this->_method[$key];
                  new $useMethod();
              }

           }
      }

    }
}