<?php
  if (PHP_SAPI != 'cli') {
    //Só pode rodar via linha de comando
    exit('Rodar via CLI - Linha de comando CMD');
  }

  require __DIR__ . '/vendor/autoload.php';

  $settings = require __DIR__ . '/src/settings.php';
  $app = new \Slim\App($settings);

  // Set up dependencies
  require __DIR__ . '/src/dependencies.php';

  $db = $container->get('db');

  $schema = $db->schema();
  
  $tabela = 'produtos';

  $schema->dropIfExists($tabela);

  //Criando tabela
  $schema->create($tabela, function($table){

    $table->increments('id');
    $table->string('titulo', 100);
    $table->text('descricao');
    $table->decimal('preco', 11,2);
    $table->string('fabricante', 60);
    $table->timestamps();

  });

  $db->table($tabela)->insert([
    'titulo' => 'Motorola Moto G6 32GB',
    'descricao' => 'Android Oreo - 8.0 Tela 5.7',
    'preco' => 899.00,
    'fabricante' => 'Motorola',
    'created_at' => '2020-10-22',
    'updated_at' => '2020-10-22'
  ]);

  
  $db->table($tabela)->insert([
    'titulo' => 'Iphone X 64GB',
    'descricao' => 'IOS - Tela 5.8',
    'preco' => 1600.00,
    'fabricante' => 'Apple',
    'created_at' => '2020-10-22',
    'updated_at' => '2020-10-22'
  ]);

?>