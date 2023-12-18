<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php
    require_once './constants/constantes.php';
    require_once './DB/coneccion.php';
    include_once './class/class.consultas.php';
    include_once './class/class.especialidad.php';
    include_once './class/class.medicamento.php';
    include_once './class/class.medicos.php';
    include_once './class/class.paciente.php';
    include_once './class/class.receta.php';
    include_once './class/class.rol.php';
    include_once './class/class.usuario.php';
    $conexion = coneccion();
    $consultas = new Consulta($conexion);
    $especialidad = new Especialidad($conexion);
    $medicamento = new Medicamento($conexion);
    $medicos = new Medico($conexion);
    $paciente = new Paciente($conexion);
    $receta = new Receta($conexion);
    $rol = new Rol($conexion);
    $usuario = new Usuario($conexion);
    $navADM = '<nav class="navbar navbar-expand-lg navbar-light bg-dark mb-5">
    <a class="navbar-brand text-white font-weight-bold" href="#">Veris</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                    <a class="nav-link text-white" href="./dashboard.php?list=paciente">Paciente</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link text-white" href="./dashboard.php?list=consultas">Consultas</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link text-white" href="./dashboard.php?list=especialidad">Especialidad</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link text-white" href="./dashboard.php?list=medicamento">Medicamento</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link text-white" href="./dashboard.php?list=medicos">Medicos</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link text-white" href="./dashboard.php?list=receta">Receta</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link text-white" href="./dashboard.php?list=rol">Rol</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link text-white" href="./dashboard.php?list=usuario">Usuario</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-danger text-white" href="./authentication/logout.php">Cerrar Sesión</a>
            </li>
        </ul>
    </div>
    </nav>';
    $navMED = '<nav class="navbar navbar-expand-lg navbar-light bg-dark mb-5">
    <a class="navbar-brand text-white font-weight-bold" href="#">Veris</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                    <a class="nav-link text-white" href="./dashboard.php?list=pacienteMedico">Paciente</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link text-white" href="./dashboard.php?list=consultasMedico">Consultas</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link text-white" href="./dashboard.php?list=especialidadMedico">Especialidad</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link text-white" href="./dashboard.php?list=medicamentoMedico">Medicamento</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link text-white" href="./dashboard.php?list=medicosMedico">Medicos</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link text-white" href="./dashboard.php?list=recetaMedico">Receta</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link text-white" href="./dashboard.php?list=rolMedico">Rol</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link text-white" href="./dashboard.php?list=usuarioMedico">Usuario</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-danger text-white" href="./authentication/logout.php">Cerrar Sesión</a>
            </li>
        </ul>
    </div>
    </nav>';
    $navPAC = '<nav class="navbar navbar-expand-lg navbar-light bg-dark mb-5">
    <a class="navbar-brand text-white font-weight-bold" href="#">Veris</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                    <a class="nav-link text-white" href="./dashboard.php?list=pacientePaciente">Paciente</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link text-white" href="./dashboard.php?list=consultasPaciente">Consultas</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link text-white" href="./dashboard.php?list=especialidadPaciente">Especialidad</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link text-white" href="./dashboard.php?list=medicamentoPaciente">Medicamento</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link text-white" href="./dashboard.php?list=medicosPaciente">Medicos</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link text-white" href="./dashboard.php?list=recetaPaciente">Receta</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link text-white" href="./dashboard.php?list=rolPaciente">Rol</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link text-white" href="./dashboard.php?list=usuarioPaciente">Usuario</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-danger text-white" href="./authentication/logout.php">Cerrar Sesión</a>
            </li>
        </ul>
    </div>
    </nav>';
    if (isset($_GET['d'])) {
        $dato = base64_decode($_GET['d']);
        $tmp = explode("/", $dato);
        $op = $tmp[0];
        $id = $tmp[1];
        switch ($op) {
            case 'del':
                echo $consultas->delete_consultas($id);
                break;
            case 'det':
                echo $consultas->get_detail_consultas($id);
                break;
            case 'new':
                echo $consultas->get_form();
                break;
            case 'act':
                echo $consultas->get_form($id);
                break;
            case 'delespecialidad':
                echo $especialidad->delete_especialidad($id);
                break;
            case 'detespecialidad':
                echo $especialidad->get_detail_especialidad($id);
                break;
            case 'newespecialidad':
                echo $especialidad->get_form();
                break;
            case 'actespecialidad':
                echo $especialidad->get_form($id);
                break;
            case 'delmedicamento':
                echo $medicamento->delete_medicamento($id);
                break;
            case 'detmedicamento':
                echo $medicamento->get_detail_medicamento($id);
                break;
            case 'newmedicamento':
                echo $medicamento->get_form();
                break;
            case 'actmedicamento':
                echo $medicamento->get_form($id);
                break;
            case 'delmedico':
                echo $medicos->delete_medico($id);
                break;
            case 'detmedico':
                echo $medicos->get_detail_medico($id);
                break;
            case 'newmedico':
                echo $medicos->get_form();
                break;
            case 'actmedico':
                echo $medicos->get_form($id);
                break;
            case 'delpaciente':
                echo $paciente->delete_paciente($id);
                break;
            case 'detpaciente':
                echo $paciente->get_detail_paciente($id);
                break;
            case 'newpaciente':
                echo $paciente->get_form();
                break;
            case 'actpaciente':
                echo $paciente->get_form($id);
                break;
            case 'delreceta':
                echo $receta->delete_receta($id);
                break;
            case 'detreceta':
                echo $receta->get_detail_receta($id);
                break;
            case 'newreceta':
                echo $receta->get_form();
                break;
            case 'actreceta':
                echo $receta->get_form($id);
                break;
            case 'delrol':
                echo $rol->delete_rol($id);
                break;
            case 'detrol':
                echo $rol->get_detail_rol($id);
                break;
            case 'newrol':
                echo $rol->get_form();
                break;
            case 'actrol':
                echo $rol->get_form($id);
                break;
            case 'delusuario':
                echo $usuario->delete_usuario($id);
                break;
            case 'detusuario':
                echo $usuario->get_detail_usuario($id);
                break;
            case 'newusuario':
                echo $usuario->get_form();
                break;
            case 'actusuario':
                echo $usuario->get_form($id);
                break;
        }
    } else {
        if (isset($_POST['Guardar']) && $_POST['op'] == "new") {
            $consultas->save_consultas();
        } elseif (isset($_POST['Guardar']) && $_POST['op'] == "update") {
            $consultas->update_consultas();
        } elseif (isset($_POST['Guardar']) && $_POST['op'] == "newespecialidad") {
            $especialidad->save_especialidad();
        } elseif (isset($_POST['Guardar']) && $_POST['op'] == "updateespecialidad") {
            $especialidad->update_especialidad();
        } elseif (isset($_POST['Guardar']) && $_POST['op'] == "newmedicamento") {
            $medicamento->save_medicamento();
        } elseif (isset($_POST['Guardar']) && $_POST['op'] == "updatemedicamento") {
            $medicamento->update_medicamento();
        } elseif (isset($_POST['Guardar']) && $_POST['op'] == "newmedicos") {
            $medicos->save_medico();
        } elseif (isset($_POST['Guardar']) && $_POST['op'] == "updatemedicos") {
            $medicos->update_medico();
        } elseif (isset($_POST['Guardar']) && $_POST['op'] == "newpaciente") {
            $paciente->save_paciente();
        } elseif (isset($_POST['Guardar']) && $_POST['op'] == "updatepaciente") {
            $paciente->update_paciente();
        } elseif (isset($_POST['Guardar']) && $_POST['op'] == "newreceta") {
            $receta->save_receta();
        } elseif (isset($_POST['Guardar']) && $_POST['op'] == "updatereceta") {
            $receta->update_receta();
        } elseif (isset($_POST['Guardar']) && $_POST['op'] == "newrol") {
            $rol->save_rol();
        } elseif (isset($_POST['Guardar']) && $_POST['op'] == "updaterol") {
            $rol->update_rol();
        } elseif (isset($_POST['Guardar']) && $_POST['op'] == "newusuario") {
            $usuario->save_usuario();
        } elseif (isset($_POST['Guardar']) && $_POST['op'] == "updateusuario") {
            $usuario->update_usuario();
        } else {
            switch ($_SESSION['rol']) {
                case 1:
                    echo $navADM;
                    /* echo $consultas->get_list(3);
                    echo $especialidad->get_list(1);
                    echo $medicamento->get_list(1);
                    echo $medicos->get_list(1);
                    echo $paciente->get_list(1);
                    echo $receta->get_list(3);
                    echo $rol->get_list(1);
                    echo $usuario->get_list(1); */
                    break;
                case 2:
                    echo $navMED;
                    /* echo $consultas->get_list(2);
                    echo $receta->get_list(1); */
                    break;
                case 3:
                    echo $navPAC;
                    /* echo $paciente->get_list(3, $_SESSION["IdPaciente"]);
                    echo $consultas->get_list(2);
                    echo $especialidad->get_list(2);
                    echo $medicamento->get_list(2);
                    echo $medicos->get_list(2);
                    echo $receta->get_list(2);
                    echo $rol->get_list(2);
                    echo $usuario->get_list(2); */
                    break;
                default:
            }
            $listType = isset($_GET['list']) ? $_GET['list'] : 'consultas';

            switch ($listType) {
                case 'paciente':
                    echo $paciente->get_list(1);
                    break;
                case 'consultas':
                    echo $consultas->get_list(3);
                    break;
                case 'especialidad':
                    echo $especialidad->get_list(1);
                    break;
                case 'medicamento':
                    echo $medicamento->get_list(1);
                    break;
                case 'medicos':
                    echo $medicos->get_list(1);
                    break;
                case 'receta':
                    echo $receta->get_list(3);
                    break;
                case 'rol':
                    echo $rol->get_list(1);
                    break;
                case 'usuario':
                    echo $usuario->get_list(1);
                    break;
                case 'pacienteMedico':
                    echo $paciente->get_list(1);
                    break;
                case 'consultasMedico':
                    echo $consultas->get_list(2);
                    break;
                case 'especialidadMedico':
                    echo $especialidad->get_list(1);
                    break;
                case 'medicamentoMedico':
                    echo $medicamento->get_list(1);
                    break;
                case 'medicosMedico':
                    echo $medicos->get_list(1);
                    break;
                case 'recetaMedico':
                    echo $receta->get_list(1);
                    break;
                case 'rolMedico':
                    echo $rol->get_list(1);
                    break;
                case 'usuarioMedico':
                    echo $usuario->get_list(1);
                    break;
                case 'pacientePaciente':
                    echo $paciente->get_list(2,$_SESSION["IdPaciente"]);
                    break;
                case 'consultasPaciente':
                    echo $consultas->get_list(2);
                    break;
                case 'especialidadPaciente':
                    echo $especialidad->get_list(2);
                    break;
                case 'medicamentoPaciente':
                    echo $medicamento->get_list(2);
                    break;
                case 'medicosPaciente':
                    echo $medicos->get_list(2);
                    break;
                case 'recetaPaciente':
                    echo $receta->get_list(2);
                    break;
                case 'rolPaciente':
                    echo $rol->get_list(2);
                    break;
                case 'usuarioPaciente':
                    echo $usuario->get_list(2);
                    break;
            }
        }
    }
    ?>
</body>

</html>