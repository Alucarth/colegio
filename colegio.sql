# Host: localhost  (Version 5.5.34)
# Date: 2017-07-29 12:27:26
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "actividad"
#

DROP TABLE IF EXISTS `actividad`;
CREATE TABLE `actividad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mes` int(11) NOT NULL DEFAULT '0',
  `dia` varchar(5) NOT NULL DEFAULT '',
  `titulo` varchar(225) NOT NULL DEFAULT '',
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "actividad"
#


#
# Structure for table "actividad_mes"
#

DROP TABLE IF EXISTS `actividad_mes`;
CREATE TABLE `actividad_mes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mes` varchar(10) NOT NULL DEFAULT '',
  `ano` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

#
# Data for table "actividad_mes"
#

INSERT INTO `actividad_mes` VALUES (1,'ENERO',2017),(2,'FEBRERO',2017),(3,'MARZO',2017),(4,'ABRIL',2017),(5,'MAYO',2017),(6,'JUNIO',2017),(7,'JULIO',2017),(8,'AGOSTO',2017),(9,'SEPTIEMBRE',2017),(10,'OCTUBRE',2017),(11,'NOVIEMBRE',2017),(12,'DICIEMBRE',2017);

#
# Structure for table "alumno_primaria"
#

DROP TABLE IF EXISTS `alumno_primaria`;
CREATE TABLE `alumno_primaria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` varchar(5) NOT NULL DEFAULT '',
  `id_nivel_user` int(11) NOT NULL DEFAULT '0',
  `id_paralelo` int(11) NOT NULL DEFAULT '0',
  `carnet` int(5) NOT NULL DEFAULT '0',
  `fecha_nacimiento` varchar(50) NOT NULL DEFAULT '',
  `foto` varchar(5) NOT NULL DEFAULT '',
  `nombre` varchar(255) NOT NULL DEFAULT '',
  `ap_paterno` varchar(255) NOT NULL DEFAULT '',
  `ap_materno` varchar(255) NOT NULL DEFAULT '',
  `edad` varchar(20) NOT NULL DEFAULT '0',
  `direccion` varchar(255) NOT NULL DEFAULT '',
  `tutor` varchar(255) NOT NULL DEFAULT '',
  `cel` varchar(30) NOT NULL DEFAULT '',
  `estado` varchar(2) NOT NULL DEFAULT 'A',
  `login` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `modificacion` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "alumno_primaria"
#

INSERT INTO `alumno_primaria` VALUES (1,'P',4,1,159456,'13/2/2000','','alejandra','farfan','ariÃ±ez','17','direccion de alejandra','marcelo farfan mosqueira','75825255','A','farfan','6af2a0b26423fa5a6ab0da77d2be195c','2017-07-29'),(2,'P',4,1,456321,'21/4/2000','','valentina','farfan','ariÃ±ez','17','direccion de valentina','eliana ariÃ±ez alba','70583835','A','farfan','5622616cf9bfca67740e38c1e56eac33','2017-07-29'),(3,'P',4,1,4564654,'5/5/2000','','arturo','farfan','ariÃ±ez','17','direccion de arturo','marcelo farfan mosqueira','785454545','A','farfan','27399db5e2937f52eb7bdb84f56b8ff2','2017-07-29'),(4,'P',4,1,123,'1/1/2000','','sd','asd','asd','17','sdasd','asd','123','A','asd','202cb962ac59075b964b07152d234b70','2017-07-29');

#
# Structure for table "alumno_secundaria"
#

DROP TABLE IF EXISTS `alumno_secundaria`;
CREATE TABLE `alumno_secundaria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` varchar(5) NOT NULL DEFAULT '',
  `id_nivel_user` int(11) NOT NULL DEFAULT '0',
  `id_paralelo` int(11) NOT NULL DEFAULT '0',
  `carnet` int(5) NOT NULL DEFAULT '0',
  `fecha_nacimiento` varchar(50) NOT NULL DEFAULT '',
  `foto` varchar(5) NOT NULL DEFAULT '',
  `nombre` varchar(255) NOT NULL DEFAULT '',
  `ap_paterno` varchar(255) NOT NULL DEFAULT '',
  `ap_materno` varchar(255) NOT NULL DEFAULT '',
  `edad` varchar(20) NOT NULL DEFAULT '0',
  `direccion` varchar(255) NOT NULL DEFAULT '',
  `tutor` varchar(255) NOT NULL DEFAULT '',
  `cel` varchar(30) NOT NULL DEFAULT '',
  `estado` varchar(2) NOT NULL DEFAULT 'A',
  `login` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `modificacion` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Data for table "alumno_secundaria"
#

INSERT INTO `alumno_secundaria` VALUES (1,'S',4,5,789845454,'4/4/2000','','enrique','choque','flores','17','direccion de enrique','mario mamani choque','78965411','A','choque','90e181128f470f96b2621b9b86774812','2017-07-29'),(2,'S',4,5,95123654,'8/11/2000','','florencia','bueno','mollinedo','17','direccion de florencia','juliana bueno quispe','70558965','A','bueno','a2eda20927fc9def1a6fb4c22258c6c8','2017-07-29'),(3,'S',4,5,2147483647,'10/10/2000','','jesus','artiaga','flores','17','direccion de jesus','juanita bueno flores','754564654','A','artiaga','2ea1c1cffebd62f2589cefd0959bc52f','2017-07-29');

#
# Structure for table "det_nivel_modulo"
#

DROP TABLE IF EXISTS `det_nivel_modulo`;
CREATE TABLE `det_nivel_modulo` (
  `id_det_nivel_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `id_nivel_user` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `estado` varchar(2) COLLATE latin1_general_ci NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_det_nivel_modulo`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

#
# Data for table "det_nivel_modulo"
#

/*!40000 ALTER TABLE `det_nivel_modulo` DISABLE KEYS */;
INSERT INTO `det_nivel_modulo` VALUES (1,1,1,'A'),(2,1,2,'A'),(3,1,3,'A'),(4,1,4,'A'),(5,1,5,'A'),(6,1,6,'A'),(7,1,7,'A'),(8,1,8,'A'),(9,1,9,'A'),(10,1,10,'A'),(11,1,11,'A');
/*!40000 ALTER TABLE `det_nivel_modulo` ENABLE KEYS */;

#
# Structure for table "docente_aula_p"
#

DROP TABLE IF EXISTS `docente_aula_p`;
CREATE TABLE `docente_aula_p` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_docente` int(11) NOT NULL DEFAULT '0',
  `id_paralelo` int(11) NOT NULL DEFAULT '0',
  `nivel` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "docente_aula_p"
#

INSERT INTO `docente_aula_p` VALUES (1,2,1,1),(2,1,1,2);

#
# Structure for table "docente_aula_s"
#

DROP TABLE IF EXISTS `docente_aula_s`;
CREATE TABLE `docente_aula_s` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_docente` int(11) NOT NULL DEFAULT '0',
  `id_paralelo` int(11) NOT NULL DEFAULT '0',
  `nivel` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "docente_aula_s"
#

INSERT INTO `docente_aula_s` VALUES (1,1,1,1),(2,2,1,2);

#
# Structure for table "docente_p"
#

DROP TABLE IF EXISTS `docente_p`;
CREATE TABLE `docente_p` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` varchar(5) NOT NULL DEFAULT '',
  `id_nivel_user` int(11) NOT NULL DEFAULT '0',
  `id_edit` int(11) NOT NULL DEFAULT '0',
  `id_paralelo` int(11) NOT NULL DEFAULT '0',
  `nombre` varchar(255) NOT NULL DEFAULT '',
  `ap_paterno` varchar(255) NOT NULL DEFAULT '',
  `ap_materno` varchar(255) NOT NULL DEFAULT '',
  `carnet` int(11) NOT NULL DEFAULT '0',
  `direccion` varchar(255) NOT NULL DEFAULT '',
  `cel` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `foto` varchar(5) NOT NULL DEFAULT '',
  `materia` varchar(255) NOT NULL DEFAULT '',
  `login` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `estado` varchar(2) NOT NULL DEFAULT 'A',
  `notas` int(11) NOT NULL DEFAULT '0',
  `nota_1` int(11) NOT NULL DEFAULT '0',
  `nota_2` int(11) NOT NULL DEFAULT '0',
  `nota_3` int(11) NOT NULL DEFAULT '0',
  `nota_4` int(11) NOT NULL DEFAULT '0',
  `modificacion` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "docente_p"
#

INSERT INTO `docente_p` VALUES (1,'P',3,0,1,'marcelo','farfan','mosqueria',5970552,'direccion de marcelo','75828324','hetahumaru@hotmail.com','','matematicas','farfan','3043f6e59e0ed56795ddc854e9516d7d','A',1,1,0,0,1,'2017-07-29'),(2,'P',3,4,1,'maria','mamani','peres',456789,'direccion de maria','785454545','','','Lenguaje','mamani','e35cf7b66449df565f93c607d5a81d09','A',1,1,1,1,1,'2017-07-29');

#
# Structure for table "docente_s"
#

DROP TABLE IF EXISTS `docente_s`;
CREATE TABLE `docente_s` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` varchar(5) NOT NULL DEFAULT '',
  `id_nivel_user` int(11) NOT NULL DEFAULT '0',
  `id_edit` int(11) DEFAULT NULL,
  `id_paralelo` int(11) NOT NULL DEFAULT '0',
  `nombre` varchar(255) NOT NULL DEFAULT '',
  `ap_paterno` varchar(255) NOT NULL DEFAULT '',
  `ap_materno` varchar(255) NOT NULL DEFAULT '',
  `carnet` int(11) NOT NULL DEFAULT '0',
  `direccion` varchar(255) NOT NULL DEFAULT '',
  `cel` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `foto` varchar(5) NOT NULL DEFAULT '',
  `materia` varchar(255) NOT NULL DEFAULT '',
  `login` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `estado` varchar(2) NOT NULL DEFAULT 'A',
  `notas` int(11) NOT NULL DEFAULT '0',
  `nota_1` int(11) NOT NULL DEFAULT '0',
  `nota_2` int(11) NOT NULL DEFAULT '0',
  `nota_3` int(11) NOT NULL DEFAULT '0',
  `nota_4` int(11) NOT NULL DEFAULT '0',
  `modificacion` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "docente_s"
#

INSERT INTO `docente_s` VALUES (1,'S',3,0,5,'Julio','Aguilar','Fernandez',789654,'direccion de julio','73555333','','','Historia','Aguilar','acc4cfc0773695795955f187d86342c3','A',1,1,0,0,0,'2017-07-29'),(2,'S',3,0,5,'Eliana','Guarachi','Morales',78965454,'direccion de eliana','784544545','','','Ciencias sociales','Guarachi','e02935c5bc018399d1d5498c86ade290','A',1,1,0,0,0,'2017-07-29');

#
# Structure for table "empresa"
#

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `id_nivel_user` int(11) NOT NULL DEFAULT '0',
  `nombre_e` varchar(100) NOT NULL DEFAULT '',
  `email_1` varchar(100) NOT NULL DEFAULT '',
  `email_2` varchar(100) NOT NULL DEFAULT '',
  `cel` varchar(100) NOT NULL DEFAULT '',
  `logo` varchar(10) NOT NULL DEFAULT '',
  `direccion` text NOT NULL,
  `modificacion` varchar(15) NOT NULL DEFAULT '00-00-0000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "empresa"
#

INSERT INTO `empresa` VALUES (1,1,1,'Nombre de Colegio','primer@email.com','segundo@hotmail.com','7585878 - 24698722 - 08080848484','png','direccion del colegio','14-06-2017');

#
# Structure for table "epoca"
#

DROP TABLE IF EXISTS `epoca`;
CREATE TABLE `epoca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `user` varchar(11) NOT NULL DEFAULT '0',
  `estado_1` varchar(11) NOT NULL DEFAULT '0',
  `estado_2` varchar(11) NOT NULL DEFAULT '0',
  `estado_3` varchar(11) NOT NULL DEFAULT '0',
  `estado_4` varchar(11) NOT NULL DEFAULT '',
  `estado_n` int(11) NOT NULL DEFAULT '0',
  `modificacion` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "epoca"
#

INSERT INTO `epoca` VALUES (1,1,'1','A','B','B','B',1,'2017-07-29');

#
# Structure for table "modulo"
#

DROP TABLE IF EXISTS `modulo`;
CREATE TABLE `modulo` (
  `id_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `re_modulo` varchar(5) DEFAULT NULL,
  `id_user` varchar(5) NOT NULL DEFAULT '0',
  `titulo` varchar(100) NOT NULL DEFAULT '',
  `menu` varchar(100) NOT NULL DEFAULT '',
  `descripcion` text NOT NULL,
  `estado` varchar(10) NOT NULL DEFAULT 'A',
  `modificacion` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

#
# Data for table "modulo"
#

INSERT INTO `modulo` VALUES (1,'CP','1','Aulas de Primaria','1','listado de alumnos a nivel primario','A','0000-00-00'),(2,'CS','1','Aulas de Secundaria','1','listado de Alumnos del nivel Secundario','A','0000-00-00'),(3,'PDS','1','Plantel Docente de Secundaria','2','Listado del plantel docente de la Unidad Educativa del Nivel Secundaria','A','0000-00-00'),(4,'AP','P','Alumnos de Primaria','3','Listado de Alumnos del nivel primario por curso de la Unidad Educativa','A','0000-00-00'),(5,'AS','S','Alumnos de secundaria','3','Listado de Alumnos del nivel secundario por curso de la Unidad Educativa','A','0000-00-00'),(6,'PA','1','Plantel Administrativo','4','Listado del plantel administrativo de la Unidad Educativa','A','0000-00-00'),(7,'AC','1','Activiades del Colegio','5','Actividades de la Unidad Educativa','A','0000-00-00'),(8,'PDP','1','Plantel Docente de Primaria','2','Listado del plantel docente de la Unidad Educativa del Nivel Primaria\n','A','0000-00-00'),(9,'NP','P','Notas del nivel primario','6','Listado de nomina de notas del nivel primario','A','0000-00-00'),(10,'NS','S','Notas del nivel secundario','6','Listado de nominas de notas del nivel secundario','A','0000-00-00');

#
# Structure for table "nivel_user"
#

DROP TABLE IF EXISTS `nivel_user`;
CREATE TABLE `nivel_user` (
  `id_nivel_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `titulo` varchar(100) NOT NULL DEFAULT '',
  `descripcion` text NOT NULL,
  `modificacion` varchar(15) NOT NULL DEFAULT '00-00-0000',
  `estado` varchar(10) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_nivel_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Data for table "nivel_user"
#

INSERT INTO `nivel_user` VALUES (1,1,'Administrador','Unico Administrador','07-04-2017','A'),(2,2,'Administrativos','Personal Administrativo de la Unidad Educativa','07-04-2017','A'),(3,3,'Docentes','Plantel docente de la Unidad Educativa','07-04-2017','A'),(4,4,'Alumnos','Alumnos y padres de Familia','07-04-2017','A');

#
# Structure for table "notas_p"
#

DROP TABLE IF EXISTS `notas_p`;
CREATE TABLE `notas_p` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) NOT NULL DEFAULT '0',
  `id_aula` int(11) NOT NULL DEFAULT '0',
  `id_docente` int(11) NOT NULL DEFAULT '0',
  `primero` int(11) NOT NULL DEFAULT '0',
  `segundo` int(11) NOT NULL DEFAULT '0',
  `tercero` int(11) NOT NULL DEFAULT '0',
  `cuarto` int(11) NOT NULL DEFAULT '0',
  `estado_n` int(11) NOT NULL DEFAULT '0',
  `modificacion` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Data for table "notas_p"
#

INSERT INTO `notas_p` VALUES (1,1,1,2,14,100,100,54,5,'2017-07-29'),(2,2,1,2,14,70,90,75,5,'2017-07-29'),(3,3,1,2,15,85,95,65,5,'2017-07-29'),(4,1,1,1,14,0,0,0,5,'2017-07-29'),(5,2,1,1,14,0,0,0,5,'2017-07-29'),(6,3,1,1,15,0,0,0,5,'2017-07-29'),(7,4,1,1,36,0,0,0,1,'2017-07-29'),(8,4,1,2,14,0,0,0,5,'2017-07-29');

#
# Structure for table "notas_s"
#

DROP TABLE IF EXISTS `notas_s`;
CREATE TABLE `notas_s` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) NOT NULL DEFAULT '0',
  `id_aula` int(11) NOT NULL DEFAULT '0',
  `id_docente` int(11) NOT NULL DEFAULT '0',
  `primero` int(11) NOT NULL DEFAULT '0',
  `segundo` int(11) NOT NULL DEFAULT '0',
  `tercero` int(11) NOT NULL DEFAULT '0',
  `cuarto` int(11) NOT NULL DEFAULT '0',
  `estado_n` int(11) NOT NULL DEFAULT '0',
  `modificacion` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

#
# Data for table "notas_s"
#

INSERT INTO `notas_s` VALUES (1,1,5,1,62,0,0,0,5,'2017-07-29'),(2,2,5,1,61,0,0,0,5,'2017-07-29'),(3,1,5,2,72,0,0,0,5,'2017-07-29'),(4,2,5,2,71,0,0,0,5,'2017-07-29');

#
# Structure for table "primaria"
#

DROP TABLE IF EXISTS `primaria`;
CREATE TABLE `primaria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` int(11) NOT NULL DEFAULT '0',
  `ciclo` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Data for table "primaria"
#

INSERT INTO `primaria` VALUES (1,1,'Primer ciclo'),(2,2,'Primer ciclo'),(3,3,'Primer ciclo'),(4,4,'Segundo ciclo'),(5,5,'Segundo ciclo'),(6,6,'Segundo ciclo');

#
# Structure for table "primaria_aulas"
#

DROP TABLE IF EXISTS `primaria_aulas`;
CREATE TABLE `primaria_aulas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_primaria` int(11) NOT NULL DEFAULT '0',
  `id_docente` int(11) NOT NULL DEFAULT '0',
  `paralelo` varchar(100) NOT NULL DEFAULT '',
  `cantidad` int(11) NOT NULL DEFAULT '0',
  `fecha_mod` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "primaria_aulas"
#

INSERT INTO `primaria_aulas` VALUES (1,1,2,'paralelo A',15,'2017-07-29');

#
# Structure for table "secundaria"
#

DROP TABLE IF EXISTS `secundaria`;
CREATE TABLE `secundaria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` int(11) NOT NULL DEFAULT '0',
  `ciclo` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Data for table "secundaria"
#

INSERT INTO `secundaria` VALUES (1,1,'Ciclo de aprendizajes tecnologicos'),(2,2,'Ciclo de aprendizajes tecnologicos'),(3,3,'Ciclo de aprendizajes tecnologicos'),(4,4,'Ciclo de aprendizajes tecnologicos'),(5,5,'Ciclo de aprendizajes tecnologicos'),(6,6,'Ciclo de aprendizajes tecnologicos');

#
# Structure for table "secundaria_aulas"
#

DROP TABLE IF EXISTS `secundaria_aulas`;
CREATE TABLE `secundaria_aulas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_secundaria` int(11) NOT NULL DEFAULT '0',
  `paralelo` varchar(100) NOT NULL DEFAULT '',
  `id_docente` int(11) NOT NULL DEFAULT '0',
  `cantidad` int(11) NOT NULL DEFAULT '0',
  `fecha_mod` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

#
# Data for table "secundaria_aulas"
#

INSERT INTO `secundaria_aulas` VALUES (1,5,'secundaria A',2,14,'2017-07-29');

#
# Structure for table "usuario"
#

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT '0',
  `id_nivel_user` int(11) NOT NULL DEFAULT '0',
  `carnet` varchar(100) NOT NULL DEFAULT '',
  `nombre` varchar(100) NOT NULL DEFAULT '',
  `ap_paterno` varchar(100) NOT NULL DEFAULT '',
  `ap_materno` varchar(100) NOT NULL DEFAULT '',
  `direccion` varchar(100) NOT NULL DEFAULT '',
  `cel` varchar(100) NOT NULL DEFAULT '',
  `foto` varchar(10) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `cargo` varchar(100) NOT NULL DEFAULT '',
  `login` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `estado` char(2) NOT NULL DEFAULT 'A',
  `modificacion` varchar(10) NOT NULL DEFAULT '00-00-0000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "usuario"
#

INSERT INTO `usuario` VALUES (1,1,1,'59705552','marcelo','farfan','mosqueira','direccion de marcelo','75828324','','hetahumaru@hotmail.com','1','natura','3903161801c977c562bcc9a87628201a','A','28-07-2017');
