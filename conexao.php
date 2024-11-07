<?php
define('SERVER','127.0.0.1');
define('USER', 'root');
define('PASSWORD','');
define('DATA', 'uniasselvi');

$conexao = mysqli_connect(SERVER, USER, PASSWORD, DATA) or die ('Não foi possivel conectar');