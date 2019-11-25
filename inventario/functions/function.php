<?php 

function Add(){
    if (isset($_POST['submit'])) {
        
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $categoria = $_POST['categoria'];
        $marca = $_POST['marca'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        $descrip = $_POST['descrip'];
        $connection = mysqli_connect('localhost','root','','proyecto');

        $query_check_name = "SELECT * FROM producto WHERE produc_name = '$nombre'";
        $result_id = mysqli_query($connection, $query_check_name);
        $query_check_id = "SELECT * FROM producto WHERE id_producto = '$id'";
        $result_name = mysqli_query($connection, $query_check_id);

        if(mysqli_num_rows($result_id)>0){
            echo "this ID all ready exists";
        }
        else if(mysqli_num_rows($result_name)){
            echo "this Name all ready exists";
   
        }
        else if (!is_numeric($id)) {
            echo "The Id field can not contain Strings";
        } 
         else {


            $query = "INSERT INTO producto(id_producto,produc_name,category,marca,precio,cantidad,descripcion)";
            $query .= "VALUES($id,'$nombre','$categoria','$marca',$precio,$cantidad,'$descrip')";


            $result = mysqli_query($connection, $query);

            if (!$result) {
                echo ("Error description: " . mysqli_error($connection));
            }
        }
    }
}

function delete (){

    if(isset($_GET['delete'])){
        $delete = $_GET['delete'];

        $connection = mysqli_connect('localhost','root','','proyecto');
        $delete_query = "DELETE FROM producto WHERE id_producto = $delete";
        $delete_result = mysqli_query($connection,$delete_query);
        header('Location: index.php');



    }



}

function bring_id()
{

    $connection = mysqli_connect('localhost','root','','proyecto');
                $query = "SELECT * FROM producto";
                $bring = mysqli_query($connection, $query);
                
                while ($row = mysqli_fetch_assoc($bring)) {
                  $id = $row['id_producto'];
                  
                echo "<option>{$id}</option>";
                   
    }
}

function update(){

    if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $marca = $_POST['marca'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $descrip = $_POST['descrip'];

    if (!is_numeric($id)) {
        echo "The Id field can not contain Strings";
    } else {
        $connection = mysqli_connect('localhost','root','','proyecto');


        $query = "UPDATE producto SET
        produc_name = '$nombre',
        category= '$categoria',
        marca= '$marca',
        precio= $precio,
        cantidad= $cantidad,
        descripcion='$descrip'
        where id_producto = $id";
      


        $result = mysqli_query($connection, $query);

        if (!$result) {
            echo ("Error description: " . mysqli_error($connection));
        }
    }
}

function show_update(){
    
}

}
