<?php
class Router {
    private $routes = [];
    private $notFoundCallback;

    public function addRoute($method, $path, $callback) {
        $this->routes[$method][$path] = $callback;
    }

    public function setNotFound($callback) {
        $this->notFoundCallback = $callback;
    }

    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        // Vérifier les routes exactes d'abord
        if (isset($this->routes[$method][$uri])) {
            $callback = $this->routes[$method][$uri];
            return $this->executeCallback($callback);
        }
        
        // Vérifier les routes avec paramètres
        foreach ($this->routes[$method] as $route => $callback) {
            // Convertir la route en une expression régulière
            $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<$1>[a-zA-Z0-9_-]+)', $route);
            $pattern = "@^" . $pattern . "$@D";
            
            if (preg_match($pattern, $uri, $matches)) {
                // Filtrer pour ne garder que les paramètres nommés
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                return $this->executeCallback($callback, $params);
            }
        }
        
        // Aucune route trouvée
        if ($this->notFoundCallback) {
            return $this->executeCallback($this->notFoundCallback);
        }
        
        header("HTTP/1.0 404 Not Found");
        echo "404 Not Found";
    }

    private function executeCallback($callback, $params = []) {
        if (is_callable($callback)) {
            return call_user_func_array($callback, $params);
        } elseif (is_string($callback) && strpos($callback, '@') !== false) {
            list($controller, $method) = explode('@', $callback);
            $controllerClass = $controller . 'Controller';
            
            require_once "app/controllers/{$controllerClass}.php";
            
            if (class_exists($controllerClass)) {
                $controllerInstance = new $controllerClass();
                
                if (method_exists($controllerInstance, $method)) {
                    return call_user_func_array([$controllerInstance, $method], $params);
                }
            }
        }
        
        throw new Exception("Callback invalide");
    }
}