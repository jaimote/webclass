<?php

ini_set('memory_limit', 134217728);
ini_set('mysql.connect_timeout', 14400);
ini_set('default_socket_timeout', 14400);
ini_set('max_execution_time', 0);

Class Alumno{
    private static $logger;
    private static $dB;
    function __construct($logger, $dB)
    {
        SELF::$logger = $logger;
        SELF::$dB = $dB;
    }
    public function alumnosHabilitados($habilitado = -1){
        if($habilitado == '-1') return false;
        try{
            $queryStart = 0;
            $queryEnd = 0;
            $queryStart = microtime(true);
            
            $sql = "SELECT 
            alumno.id, 
            CONCAT(usuario_detalle.nombre_usuario, ' ', usuario_detalle.apellido_paterno, ' ', usuario_detalle.apellido_materno) as nombre_completo, 
            usuario_detalle.rut,
            usuario_detalle.nacimiento,
            usuario_detalle.correo,
            usuario_detalle.telefono
            FROM alumno 
            INNER JOIN usuario ON usuario.id = alumno.alumno
            INNER JOIN usuario_detalle ON usuario_detalle.idusuario = usuario.id
            WHERE alumno.habilitado = :habilitado LIMIT 10;";

            $query = SELF::$dB->prepare($sql);

            if (!$query) {
                SELF::$logger->log('ERROR: ' . SELF::$dB->errorInfo(), 1);
                throw new Exception('ERROR: ' . SELF::$dB->errorInfo());
            }
            
            $query->bindParam(':habilitado', $habilitado, PDO::PARAM_INT);

            $query->execute();
            if ($query->rowCount() > 0) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } else {
                return false;
            }
        } catch (PDOException $p) {
            SELF::$logger->log('ERROR: EN LA CONSULTA A LA BASE DE DATOS DE ORIGEN: ' . $p, 1);
            exit(1);
        } finally {
            $queryEnd = microtime(true);
            SELF::$logger->log('TERMINA QUERY :: ' . $sql);
            $queryDuration = $queryEnd - $queryStart;
            SELF::$logger->log('DURACIÓN : ' . SELF::$logger->conversorSegundosHoras($queryDuration));
        }
    }

    public function alumnosHabilitadosCurso($habilitado = -1, $curso = -1){
        if($habilitado == '-1') return false;
        if($curso == '-1') return false;
        try{
            $queryStart = 0;
            $queryEnd = 0;
            $queryStart = microtime(true);
            
            $sql = "SELECT 
            alumno.id, 
            CONCAT(usuario_detalle.nombre_usuario, ' ', usuario_detalle.apellido_paterno, ' ', usuario_detalle.apellido_materno) as nombre_completo, 
            usuario_detalle.rut,
            usuario_detalle.nacimiento,
            usuario_detalle.correo,
            usuario_detalle.telefono
            FROM alumno 
            INNER JOIN usuario ON usuario.id = alumno.alumno
            INNER JOIN usuario_detalle ON usuario_detalle.idusuario = usuario.id
            WHERE alumno.habilitado = :habilitado 
            AND alumno.curso = :curso 
            LIMIT 10;";

            $query = SELF::$dB->prepare($sql);

            if (!$query) {
                SELF::$logger->log('ERROR: ' . SELF::$dB->errorInfo(), 1);
                throw new Exception('ERROR: ' . SELF::$dB->errorInfo());
            }
            
            $query->bindParam(':habilitado', $habilitado, PDO::PARAM_INT);
            $query->bindParam(':curso', $curso, PDO::PARAM_INT);

            $query->execute();
            if ($query->rowCount() > 0) {
                $result = $query->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            } else {
                return false;
            }
        } catch (PDOException $p) {
            SELF::$logger->log('ERROR: EN LA CONSULTA A LA BASE DE DATOS DE ORIGEN: ' . $p, 1);
            exit(1);
        } finally {
            $queryEnd = microtime(true);
            SELF::$logger->log('TERMINA QUERY :: ' . $sql);
            $queryDuration = $queryEnd - $queryStart;
            SELF::$logger->log('DURACIÓN : ' . SELF::$logger->conversorSegundosHoras($queryDuration));
        }
    }
}
?>