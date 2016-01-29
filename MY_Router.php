<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
    Extended the core Router class to allow for sub-sub-folders in the controllers directory.
*/
function map_resources(){
    static $routes = array();
    $arg_num = func_num_args();
    if(0 == $arg_num)
    {
        return $routes;
    }
    elseif(1 == $arg_num)
    {
        // map_resources($controller_name)   --> return all routes
        $controller = func_get_arg(0);

        // Generate RESTful url match patterns
        $routes['GET']["{$controller}"]             = "{$controller}/index";
        $routes['GET']["{$controller}/new"]         = "{$controller}/new_form";
        $routes['GET']["{$controller}/(:id)"]       = "{$controller}/show/$1";
        $routes['GET']["{$controller}/(:id)/edit"]  = "{$controller}/edit/$1";
        $routes['POST']["{$controller}"]            = "{$controller}/create";
        $routes['PUT' ]["{$controller}/(:id)"]      = "{$controller}/update/$1";
        $routes['DELETE']["{$controller}/(:id)"]    = "{$controller}/delete/$1";
    }
    elseif(2 == $arg_num)
    {
        // Custom url routing
        $args    = func_get_args();
        $pattern = $args[0];
        $replace = $args[1];
        $routes['GET'][$pattern]    = $replace;
        $routes['POST'][$pattern]   = $replace;
        $routes['PUT'][$pattern]    = $replace;
        $routes['POST'][$pattern]   = $replace;
    }
    elseif(3 == $arg_num)
    {
        // Custom url routing
        $args    = func_get_args();
        $method  = $args[0];
        $pattern = $args[1];
        $replace = $args[2];
        $routes[$method][$pattern] = $replace;
    }
}

class MY_Router extends CI_Router{

    function MY_Route(){
        // HACK: support overridding REQUEST_METHOD by posting a _method parameter
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['_method'])) {
            $_SERVER['REQUEST_METHOD'] = strtoupper($_POST['_method']);
        }
        elseif(isset($_SERVER['HTTP_X_HTTP_METHOD_OVERRIDE'])) {
            $_SERVER['REQUEST_METHOD'] = strtoupper($_SERVER['HTTP_X_HTTP_METHOD_OVERRIDE']);
        }

        parent::CI_Router();
    }
    // Overrides CI_Router::_parse_routes.
    // RESTful style url matching
    function _parse_routes()
    {
        $rest_routes = map_resources();
        // we do this for performence
        if (empty($rest_routes) && count($this->routes) == 1)
        {
            $this->_set_request($this->uri->segments);
            return;
        }
        // also this...
        $uri = implode('/', $this->uri->segments);
        if (isset($this->routes[$uri]))
        {
            $this->_set_request(explode('/', $this->routes[$uri]));
            return;
        }
        // RESTful url matching...
        $request_method = $_SERVER['REQUEST_METHOD'];
        $routes = (isset($rest_routes[$request_method]) && $rest_routes[$request_method]) ? $rest_routes[$request_method] : array();
        foreach($routes as $pattern => $replace)
        {
            $pattern = str_replace(':id',   '[^/]+',  $pattern); // use this to match non-numeric id field
            $pattern = str_replace(':any',  '.+',     $pattern);
            $pattern = str_replace(':num',  '[0-9]+', $pattern);
            $pattern = str_replace(':uuid', '[a-zA-Z0-9]{8}(-[a-zA-Z0-9]{4}){3}-[a-zA-Z0-9]{12}', $pattern);
            // Does the RegEx match?
            if (preg_match("#^{$pattern}$#", $uri))
            {
                // Do we have a back-reference?
                if (strpos($replace, '$') !== FALSE && strpos($pattern, '(') !== FALSE)
                {
                    $replace = preg_replace("#^{$pattern}$#", $replace, $uri);
                }
                // we are done
                $this->_set_request(explode('/', $replace));
                return;
            }
        }
        // if non of the rules match, then go on...
        parent::_parse_routes();
    }
}
/* End of file MY_Router.php */
/* Location: ./application/core/VS_Router.php */