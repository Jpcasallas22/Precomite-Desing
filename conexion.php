<?php

include'adodb5/adodb.inc.php';
$mysqli = new mysqli("localhost", "root", "", "observador");

//-------------------------------------------------------
function Conexion() {
    if (mysqli_connect_errno()) {
        echo 'Conexion Fallida : ', mysqli_connect_error();
        exit();
    }
}

class conexion {

    private $con;

    public function __construct() {
        //crear el objeto de conexion con
        //el contructor ADONewconnection
        $this->con = ADONewconnection('PDO');
        //conectar a la base de datos

        $this->con->connect("mysql:host=localhost", "root", "", "observador");


        //establecer el monitoreo SQL-modo debug

        $this->con->debug = false;
        //retornar objeto de conexion
    }

    public function comboficha() {
        $n = "select id_ficha, num_ficha, nombre_programa from ficha inner join programa on ficha.programa_fk = programa.id_programa;";
        $res = $this->con->execute($n);
        return $res->getarray();
    }

    public function comborol() {
        $n = "select id_rol, nombre from rol;";
        $res = $this->con->execute($n);
        return $res->getarray();
    }

    public function comboprograma() {
        $n = "select id_programa, nombre_programa from programa;";
        $res = $this->con->execute($n);
        return $res->getarray();
    }

    public function combocategoria() {
        $n = "select id_categoria, nombrecategoria from categoria;";
        $res = $this->con->execute($n);
        return $res->getarray();
    }

    public function comboaprendiz() {
        $n = "select id_aprendiz, nombres, apellidos from aprendiz;";
        $res = $this->con->execute($n);
        return $res->getarray();
    }

    public function combofunci() {
        $n = "select id_funcionario, nombres, apellidos, nombre from funcionario inner join rol on rol_fk = id_rol;";
        $res = $this->con->execute($n);
        return $res->getarray();
    }

    public function insert_aprendiz($documento, $tipodoc, $nombres, $apellidos, $correo, $telefono, $foto, $estado) {
        $sql = "INSERT into aprendiz( documento_aprendiz , tipodocumento, nombres, apellidos, correo, telefono, foto, estado_aprendiz) values(?,?,?,?,?,?,?,?)";
        $this->con->execute($sql, array(
            $documento,
            $tipodoc,
            $nombres,
            $apellidos,
            $correo,
            (int) $telefono,
            $foto,
            $estado
                )
        );
    }

    public function insert_ficha($numero, $programa, $inicio_ficha, $final_ficha, $estado) {

        $sql = "INSERT into ficha(num_ficha, programa_fk, inicio_ficha, final_ficha, estadoficha) values(?,?,?,?,?)";
        $this->con->execute($sql, array(
            $numero,
            (int) $programa,
            $inicio_ficha,
            $final_ficha,
            $estado = 'Activo',
                )
        );
    }

    public function insert_funcionario($documento, $tipodoc, $nombres, $apellidos, $telefono, $estado, $correo, $rol) {
        $sql = "INSERT into funcionario( documento_funcionario, tipodocumento, nombres, apellidos, telefono, pass, estado, correo, rol_fk ) values(?,?,?,?,?,?,?,?,?)";
        $this->con->execute($sql, array(
            $documento,
            $tipodoc,
            $nombres,
            $apellidos,
            $telefono,
            $pass = md5($documento),
            $estado,
            $correo,
            $rol
                )
        );
    }

    public function insert_observacion($categoria, $descripcion, $adjunto, $fecha, $ficha, $aprendiz, $funcionario, $gravedad) {

        $sql = "INSERT into observacion values(?,?,?,?,?,?,?,?,?)";
        $this->con->execute($sql, array(
            (int) $id,
            (int) $categoria,
            $descripcion,
            $adjunto,
            $fecha,
            $ficha,
            (int) $aprendiz,
            (int) $funcionario,
            (int) $gravedad
                )
        );
    }

    public function consul_observacion() {
        $n = "select * from observacion";
        $res = $this->con->execute($n);
        return $res->getarray();
    }

//    public function consul_observacion2() {
////SELECT observacion.descripcion, observacion.fecha, observacion.gravedad_observacion, observacion.id_observacion, categoria.nombrecategoria, aprendiz.nombres, aprendiz.apellidos, funcionario.nombres, funcionario.apellidos, ficha.num_ficha FROM observacion inner join categoria on observacion.categoria_fk=categoria.id_categoria inner join aprendiz on observacion.id_documento_aprendiz_fk = aprendiz.id_aprendiz inner join funcionario on observacion.id_documento_funcionario_fk = funcionario.id_funcionario inner join ficha on observacion.ficha_fk = ficha.id_ficha where id_documento_aprendiz_fk = 1
//        $codigo = $_POST['codigo'];
//        $n = "select * from observacion where id_documento_aprendiz_fk = '$codigo'";
//        $res = $this->con->execute($n);
//        return $res->getarray();
//    }

    public function MostrarObservacion($documento_aprendiz) {
        $sql = "SELECT C.nombrecategoria,O.descripcion,O.adjunto,O.fecha,A.documento_aprendiz,
               F.documento_funcionario,CONCAT(F.nombres,' ',F.apellidos)  AS 
                 NombreCompleto FROM observacion O INNER JOIN aprendiz A ON O.id_documento_aprendiz_fk =A.id_aprendiz 
                 INNER JOIN categoria C ON O.categoria_fk=C.id_categoria INNER JOIN funcionario F ON O.id_documento_funcionario_fk=F.id_funcionario WHERE A.documento_aprendiz='$documento_aprendiz'";
        $respuesta = $this->con->execute($sql);
        return $respuesta->getarray();
    }

    public function ConsultarAprendiz($num_ficha) {

        $sql = "SELECT A.id_aprendiz, A.documento_aprendiz, A.tipodocumento, A.nombres, A.apellidos, A.correo, A.estado_aprendiz, F.num_ficha
                FROM ficha_aprendiz FA INNER JOIN aprendiz A ON FA.aprendiz_fk =A.id_aprendiz INNER JOIN ficha F ON FA.ficha_fk =F.id_ficha WHERE F.num_ficha='$num_ficha'";
        /* $sql ="SELECT * FROM aprendiz"; */
        $respuesta = $this->con->execute($sql);
        return $respuesta->getarray();
    }

    public function ConsultarObservacion($documento_aprendiz) {
        $sql = "SELECT COUNT(*) AS Observacion FROM  observacion O INNER JOIN aprendiz A ON O.id_documento_aprendiz_fk=A.id_aprendiz WHERE A.documento_aprendiz='$documento_aprendiz'";
        $respuesta = $this->con->execute($sql);
        return $respuesta->getarray();
    }

    public function ConsultarFicha() {
        $sql = "SELECT P.nombre_programa, F.num_ficha,f.inicio_ficha,F.final_ficha,F.estadoficha FROM ficha F INNER JOIN programa P ON F.programa_fk = P.id_programa";
        $respuesta = $this->con->execute($sql);
        return $respuesta->getarray();
    }

//    public function comboFicha() {
//
//        $sql = "select id_ficha, num_ficha from ficha ";
//        $respuesta = $this->con->execute($sql);
//        return $respuesta->getarray();
//    }

    public function consul_funcionario() {
        $codigo = $_POST['codigo'];
        $n = "select * from funcionario where documento_funcionario = '$codigo'";
        $res = $this->con->execute($n);
        return $res->getarray();
    }

    public function Validacion() {
        $correo = $_POST['correo'];
        $pass = md5($_POST['pass']);
        $n = "SELECT * FROM funcionario WHERE correo='$correo' AND pass='$pass';";
        $res = $this->con->execute($n);

        if (count($res->GetRows())) {
            return true;
        } else {
            return false;
        }
    }

}

$o = new conexion();

     