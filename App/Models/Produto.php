<?php

  namespace App\Models;
  use Illuminate\Database\Eloquent\Model;

  /* 
  
  Para seguir o padrão reconhecido pelo ORM
  É preciso criar a classe no singular e com letra maior no começo

  Ex: 

  Se no banco de dados a tabela estiver com esses nomes é precisa ficar assim nas classes

  usuarios = Usuario
  posts = Post
  carrinho_compra = CarinhoCompra

  */

  class Produto extends Model{

    //Fillable é usado para permitir que esses campos podem ser alterados
    protected $fillable = [
      'titulo', 'descricao', 'preco', 'fabricante', 'created_at', 'updated_at'
    ];

  }
  

?>