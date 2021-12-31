CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `dcc`@`%` 
    SQL SECURITY DEFINER
VIEW `seguimiento_empresas`.`solicitudes_varios_estatus` AS
    SELECT 
        `solicitud_0`.`idsolicitud` AS `idsolicitud`,
        `empresa_0`.`idempresa` AS `idempresa`,
        `empresa_0`.`razon_social` AS `razon_social`,
        `empresa_0`.`nombre` AS `nombre_empresa`,
        `empresa_0`.`giro_comercial` AS `giro_comercial`,
        `giro_comercial_0`.`nombre` AS `nombre_giro`,
        `empresa_0`.`tamanio` AS `tamanio`,
        `empresa_0`.`direccion` AS `direccion`,
        `empresa_0`.`telefono` AS `telefono`,
        `empresa_0`.`pagina_web` AS `pagina_web`,
        `tipo_sector_0`.`idsector` AS `idsector`,
        `tipo_sector_0`.`nombre` AS `nombre_sector`,
        `departamento_0`.`iddepartamento` AS `iddepartamento`,
        `solicitud_0`.`departamento_usuario_idusuario` AS `idusuario`,
        `usuario_0`.`nombre` AS `nombre_responsable`,
        `usuario_0`.`ap_paterno` AS `ap_paterno`,
        `usuario_0`.`ap_materno` AS `ap_materno`,
        `departamento_0`.`nombre_departamento` AS `departamento_responsable`,
        `usuario_0`.`puesto` AS `cargo_responsable`,
        `usuario_0`.`telefono` AS `telefono_responsable`,
        `usuario_0`.`correo` AS `email_responsable`,
        `tipo_solicitud_0`.`idtipo_solicitud` AS `idtipo_solicitud`,
        `tipo_solicitud_0`.`nombre` AS `nombre_tipo_solicitud`,
        `tipo_solicitud_0`.`descripcion` AS `descripcion_idtipo_solicitud`,
        `carrera_0`.`idcarrera` AS `iddivision`,
        `carrera_0`.`nombre` AS `nombre_division`,
        `carrera_0`.`clave_carrera` AS `descripcion_division`,
        `especialidad_0`.`idespecialidad` AS `idespecialidad`,
        `especialidad_0`.`nombre` AS `nombre_especialidad`,
        `especialidad_0`.`descripcion` AS `descripcion_especialidad`,
        `solicitud_0`.`idusuario` AS `responsable_sol`,
        `status_solicitud_0`.`idstatus_solicitud` AS `idstatus`,
        `status_solicitud_0`.`descripcion` AS `status`,
        `solicitud_0`.`genero` AS `genero`,
        `solicitud_0`.`no_alumnos` AS `no_alumnos`,
        `solicitud_0`.`horario_inicio` AS `horario_inicio`,
        `solicitud_0`.`horario_fin` AS `horario_fin`,
        `solicitud_0`.`dias` AS `dias`,
        `solicitud_0`.`promedio` AS `promedio`,
        `solicitud_0`.`beca` AS `beca`,
        `solicitud_0`.`observaciones` AS `observaciones`,
        `solicitud_0`.`semestre` AS `semestre`,
        `solicitud_0`.`nivel_ingles` AS `nivel_ingles`,
        `solicitud_0`.`fecha_inicio` AS `fecha_inicio`,
        `solicitud_0`.`fecha_max` AS `fecha_max`
    FROM
        ((((((((((`seguimiento_empresas`.`carrera` `carrera_0`
        JOIN `seguimiento_empresas`.`departamento` `departamento_0`)
        JOIN `seguimiento_empresas`.`empresa` `empresa_0`)
        JOIN `seguimiento_empresas`.`especialidad` `especialidad_0`)
        JOIN `seguimiento_empresas`.`giro_comercial` `giro_comercial_0`)
        JOIN `seguimiento_empresas`.`solicitud` `solicitud_0`)
        JOIN `seguimiento_empresas`.`status_solicitud` `status_solicitud_0`)
        JOIN `seguimiento_empresas`.`tipo_sector` `tipo_sector_0`)
        JOIN `seguimiento_empresas`.`tipo_solicitud` `tipo_solicitud_0`)
        JOIN `seguimiento_empresas`.`tipo_usuario` `tipo_usuario_0`)
        JOIN `seguimiento_empresas`.`usuario` `usuario_0`)
    WHERE
        ((`tipo_usuario_0`.`idtipo` = `usuario_0`.`tipo_usuario_idtipo`)
            AND (`departamento_0`.`empresa_idempresa` = `empresa_0`.`idempresa`)
            AND (`departamento_0`.`usuario_idusuario` = `usuario_0`.`idusuario`)
            AND (`giro_comercial_0`.`idgiro` = `empresa_0`.`giro_comercial`)
            AND (`departamento_0`.`iddepartamento` = `solicitud_0`.`departamento_iddepartamento`)
            AND (`solicitud_0`.`carrera_idcarrera` = `carrera_0`.`idcarrera`)
            AND (`tipo_sector_0`.`idsector` = `giro_comercial_0`.`tipo_sector_idsector`)
            AND (`solicitud_0`.`tipo_solicitud_idtipo_solicitud` = `tipo_solicitud_0`.`idtipo_solicitud`)
            AND (`carrera_0`.`especialidad_idespecialidad` = `especialidad_0`.`idespecialidad`)
            AND (`solicitud_0`.`status_solicitud_idstatus_solicitud` = `status_solicitud_0`.`idstatus_solicitud`))