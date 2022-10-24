<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);

//Autenticacao com JWT Authentication Middleware
$app->add(new Tuupola\Middleware\JwtAuthentication([
  //Nome do cabeçalho
  "header" => "Authorization",

  "regexp" => "/(.*)/",
  //Caminho que vai bloquear se não tiver o token
  "path" => "/api",
  //Caminho que vai ignorar
  "ignore" => ["/api/token"],

  "secret" => $container->get('settings')['secretKey']
]));

//Parte do CORS
$app->add(function ($req, $res, $next) {
  $response = $next($req, $res);
  return $response
          ->withHeader('Access-Control-Allow-Origin', '*')
          ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
          ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

?>