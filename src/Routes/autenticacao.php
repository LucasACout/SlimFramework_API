<?php

  use App\Models\Produto; 
  use App\Models\Usuario;
  use Firebase\JWT\JWT;

  //Gerar Token
  $app->post('/api/token', function($request, $response){

    $dados = $request->getParsedBody();

    //Verificar se existe valor, senão existe vai ser = null
    $email = $dados['email'] ?? null;
    $senha = $dados['senha'] ?? null;

    $usuario = Usuario::where('email', $email)->first()->toArray();

    if(!is_null($usuario) && ( md5($senha) === $usuario['senha'] )){

      //Gerando Token com JWT (JSON Web Tokens)

      //Valor que vai ser usado na criptografia - Pode ser qualquer valor
      $secretKey = $this->get('settings')['secretKey'];

      $chaveAcesso = JWT::encode($usuario, $secretKey, 'HS256');

      return $response->withJson([
        'chave' => $chaveAcesso,
      ]);
    }

    return $response->withJson([
      'status' => 'erro'
    ]);

  });

?>