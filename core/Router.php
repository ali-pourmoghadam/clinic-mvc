<?php


namespace App\core;


class Router{



    public  Request $request ; 
    public Array  $routes = [];



    public function __construct(Request $request)
    {
        $this->request = $request;
    }



    public function get(string $path , string|array|callable $callBack)
    {
        $this->routes['get'][$path] = $callBack; 
    }



    public function post(string $path , string|array|callable $callBack)
    {
        $this->routes['post'][$path] = $callBack; 
    }


    public function resolve()
    {
        $path     = $this->request->getPath();
        $method   = $this->request->getRequestMethod();
        $callBack = $this->routes[$method][$path] ?? false ;

        if($callBack == false) die("404 Not Found");


        if(is_string($callBack)) return $this->renderView($callBack);



        if(is_array($callBack))
        {

            Application::$App->setController(new $callBack[0]);
            $callBack[0]  = Application::$App->getController();
            Application::$App->getController()->action =  $callBack[1];

        }

        
        foreach( Application::$App->getController()->middleWares as $middleWare)
        {
            $middleWare->execute();
          
        }
        return  call_user_func($callBack , $this->request);


    }




    public function renderView($view , $params = [])
    {

        $layout  = $this->renderOnlyLayout( $params);
        $view    = $this->renderOnlyView($view , $params);

        return str_replace("{{content}}" , $view , $layout );

    }



    private function renderOnlyView($view , $params = [])
    {
        ob_start();

        require_once Application::$Addr.DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."$view.php";

        return ob_get_clean();
    }


    private function renderOnlyLayout($params = [])
    {
        $layout = Application::$App->getController()->layout;    

        ob_start();

        require_once Application::$Addr.DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."layout".DIRECTORY_SEPARATOR."$layout.php";
        
        return ob_get_clean();
    }
    

}

