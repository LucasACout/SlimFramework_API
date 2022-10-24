<?php

    //CORS
    $app->options('/{routes:.+}', function ($request, $response, $args) {
        return $response;
    });

    //Autenticação
    require __DIR__ . '/Routes/autenticacao.php';

    // Routes - Foi adicionado a pasta Routes para separar em grupos e organizar
    require __DIR__ . '/Routes/produtos.php';

    $app->map(['GET', 'POST', 'PUT', 'DELETE', 'PATCH'], '/{routes:.+}', function($req, $res) {
        $handler = $this->notFoundHandler; // handle using the default Slim page not found handler
        return $handler($req, $res);
    });
    

?>
