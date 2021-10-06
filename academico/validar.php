<?php
$usuario=$_POST['usuario'];
$password=$_POST['password'];
session_start();
$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect("localhost","root","123456","mibaseolivares");

$consulta="SELECT*FROM usuario where usuario='$usuario' and password='$password'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas){
  
    include("estudiante.php");
    print_r("Hola"." ".$filas["usuario"]);
    $consulta2="SELECT sigla, nota1, nota2, nota3, nota_fin
    FROM notas ne, usuario ue
    WHERE ue.ci_user = {$filas["ci_user"]}"
    $resultado2=mysqli_query($conexion,$consulta2);
    print_r($resultado2);
    ?>
    <table>
        
    </table>
    <?php
}
else{
    ?>
    <?php
    include("login.php");
    ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
