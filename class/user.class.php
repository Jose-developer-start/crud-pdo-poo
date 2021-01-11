<?php
    class USER{
        public $con;
        public function __construct()
        {
            $this->con = new CONEXION();
            $this->con = $this->con->connect();

        }

        public function insert_update_delete_data($sql = '', $parametros = array()){
            try{
                if(strlen($sql) > 0 && $sql != ""){
                    $sentencia = $this->con->prepare($sql);
                    $sentencia->execute($parametros);
                    return $sentencia;
                }
            }catch(PDOException $error){
                die("Error en ".$error->getMessage());
            }
        }
        public function get_data($sql = '', $parametros = array()){
            try{
                if(strlen($sql) > 0 && $sql != ""){
                    $sentencia = $this->con->prepare($sql);
                    $sentencia->execute($parametros);
                    $result = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                    return $result;

                }
            }catch(PDOException $error){
                die("Error en ".$error->getMessage());
            }
        }
    }

    $user1 = new USER();

    $btnOpcion = isset($_POST['btnOpcion']) ? $_POST['btnOpcion'] : '';

    $id = isset($_POST['id']) ? trim($_POST['id']) : '';
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $pass = isset($_POST['pass']) ? trim($_POST['pass']) : '';

    switch($btnOpcion){
        case "Guardar":
            $result = $user1->insert_update_delete_data("INSERT INTO users SET name=?,email=?,clave=?",[$name,$email,$pass]);
            if($result){
                echo "<script>alert('Insertado')</script>";
                echo "<script>window.location='index.php'</script>";
            }else{
                echo "<script>alert('Error al insertar')</script>";
            }
        break;

        case "Eliminar":
            //Eliminar datos
            $user1->insert_update_delete_data("DELETE FROM users WHERE id=?",[$id]);
            echo "<script>window.location='index.php'</script>";
        break;

        case "Actualizar":
            $user1->insert_update_delete_data("UPDATE users SET name=?,email=?,clave=? WHERE id=?",[$name,$email,$pass,$id]);
            echo "<script>window.location='index.php'</script>";
        break;
    }


    //Rellenar datos en la tabla
    $data = $user1->get_data("SELECT * FROM users");

?>