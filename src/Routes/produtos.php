<?php

  //Rotas

use App\Models\Produto;

  $app->group('/api/v1', function(){

    $this->get('/produtos', function($request, $response){

      $produtos = Produto::get();
      return $response->withJson($produtos);

    });

    //Add
    $this->post('/produtos/adiciona', function($request, $response){

      $dados =  $request->getParsedBody();

      //Validar dados...

      $produto = Produto::create($dados);

      return $response->withJson($produto);

    });

    //Buscar por ID
    $this->get('/produtos/lista/{id}', function($request, $response, $args){

      //Buscar produto
      $produto = Produto::findOrFail($args['id']);

      return $response->withJson($produto);

    });

    //Atualizar
    $this->put('/produtos/atualiza/{id}', function($request, $response, $args){

      $dados =  $request->getParsedBody();
      $produto = Produto::findOrFail( $args['id'] );

      //Atualizar dados
      $produto->update( $dados );

      return $response->withJson($produto);

    });

    //Remove
    $this->delete('/produtos/remove/{id}', function($request, $response, $args){

      //Buscar produto
      $produto = Produto::findOrFail($args['id']);
      $produto->delete();

      return $response->withJson($produto);

    });

    

  });

?>