<?php

/**
 * BISKOT - Micro PHP Framework
 *
 * @author     Toast Games
 * @copyright  2016 Toast Games <http://toast-games.com>
 * @version    Biskot 0.3
 */

class Request
{
    public $url_elements;
    public $verb;
    public $parameters;
    public $headers;
    public $uri;
    public $is_ajax;

    public function __construct()
    {
        $this->verb = $_SERVER['REQUEST_METHOD'];
        $this->headers = $this->getallheaders();
        $this->is_ajax = (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest');

        $path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';

        // parse the request for query params and request-content
        $this->parseIncomingParams();
        $this->uri = '/';

        if (isset($_GET['url']))
        {
            $this->uri .= $_GET['url']; // DANS LE HTACCESS
            $this->url_elements = explode('/', $_GET['url']);
        }
    }

    // get URL element at a specific position
    public function getUrlElement($index, $retval = NULL)
    {
        $index = (int)$index;

        if (isset($this->url_elements[$index]))
            $retval = $this->url_elements[$index];

        return $retval;
    }

    public function getParameter($param, $retval = NULL)
    {
        if (isset($this->parameters[$param]))
            $retval = $this->parameters[$param];

        return $retval;
    }

    public function getHeader($header, $retval = NULL)
    {
        if (isset($this->headers[$header]))
            $retval = $this->headers[$header];

        return $retval;
    }

    // parses the request for query params and request content body
    public function parseIncomingParams()
    {
        if (isset($_SERVER['QUERY_STRING']))
            parse_str($_SERVER['QUERY_STRING'], $this->parameters);

        // parse request body
        $body = file_get_contents('php://input');
        $content_type = false;

        if(isset($_SERVER['CONTENT_TYPE']))
          $content_type = $_SERVER['CONTENT_TYPE'];

        $this->request_body = $body;
    }

    public function getallheaders()
    {
       $headers = '';

       foreach ($_SERVER as $name => $value)
           if (substr($name, 0, 5) == 'HTTP_')
               $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;

       return $headers;
    }

    public static function login()
    {
        if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']))
        {
            $hash = hash(_USER_CRYPT_, _API_PASSWORD_._API_SALT_._APP_SALT_);

            if ($_SERVER['PHP_AUTH_PW'] == $hash && $_SERVER['PHP_AUTH_USER'] == _API_USER_)
                return true;
        }

        return false;
    }
}
