-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.37-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para transparencia_uimqroo
CREATE DATABASE IF NOT EXISTS `transparencia_uimqroo` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci */;
USE `transparencia_uimqroo`;

-- Volcando estructura para tabla transparencia_uimqroo.anualidad
CREATE TABLE IF NOT EXISTS `anualidad` (
  `id_anual` int(11) NOT NULL AUTO_INCREMENT,
  `anualidad` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id_anual`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- Volcando datos para la tabla transparencia_uimqroo.anualidad: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `anualidad` DISABLE KEYS */;
REPLACE INTO `anualidad` (`id_anual`, `anualidad`) VALUES
	(1, '2015'),
	(2, '2016'),
	(3, '2017'),
	(4, '2018'),
	(5, '2019');
/*!40000 ALTER TABLE `anualidad` ENABLE KEYS */;

-- Volcando estructura para tabla transparencia_uimqroo.archivo_transparencia
CREATE TABLE IF NOT EXISTS `archivo_transparencia` (
  `id_transparencia` int(11) NOT NULL AUTO_INCREMENT,
  `nom_transpa` varchar(50) COLLATE utf8_spanish2_ci,
  `descrip_transpa` text COLLATE utf8_spanish2_ci,
  `fecha_transpa` int(11) DEFAULT NULL,
  `periodo_id` int(11) DEFAULT NULL,
  `id_tipoInfo` int(11) DEFAULT NULL,
  `link_archivo` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id_transparencia`),
  KEY `FK_archivo_transparancia_periodo` (`periodo_id`),
  KEY `FK_archivo_transparancia_tipo_info_publica` (`id_tipoInfo`),
  KEY `FK_archivo_transparancia_anualidad` (`fecha_transpa`),
  CONSTRAINT `FK_archivo_transparancia_anualidad` FOREIGN KEY (`fecha_transpa`) REFERENCES `anualidad` (`id_anual`),
  CONSTRAINT `FK_archivo_transparancia_periodo` FOREIGN KEY (`periodo_id`) REFERENCES `periodo` (`id_periodo`),
  CONSTRAINT `FK_archivo_transparancia_tipo_info_publica` FOREIGN KEY (`id_tipoInfo`) REFERENCES `tipo_info_publica` (`id_tipoInfoPublica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Se va almacenar los archivos en esta tabla';

-- Volcando datos para la tabla transparencia_uimqroo.archivo_transparencia: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `archivo_transparencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `archivo_transparencia` ENABLE KEYS */;

-- Volcando estructura para tabla transparencia_uimqroo.periodo
CREATE TABLE IF NOT EXISTS `periodo` (
  `id_periodo` int(11) NOT NULL AUTO_INCREMENT,
  `periodo_transpa` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `periodo_romano` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id_periodo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='En esta tabla va estar la lista de periodos\r\n';

-- Volcando datos para la tabla transparencia_uimqroo.periodo: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `periodo` DISABLE KEYS */;
REPLACE INTO `periodo` (`id_periodo`, `periodo_transpa`, `periodo_romano`) VALUES
	(1, 'I Trimestre', 'I'),
	(2, 'II Trimestre', 'II'),
	(3, 'III Trimestre', 'III'),
	(4, 'IV Trimestre', 'IV'),
	(5, 'V Trimestre', 'V');
/*!40000 ALTER TABLE `periodo` ENABLE KEYS */;

-- Volcando estructura para tabla transparencia_uimqroo.tipo_info_publica
CREATE TABLE IF NOT EXISTS `tipo_info_publica` (
  `id_tipoInfoPublica` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_publica` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcion_publica` text COLLATE utf8_spanish2_ci,
  `tipoInfo_romano` varchar(11) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`id_tipoInfoPublica`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='La lista de toda la información publica';

-- Volcando datos para la tabla transparencia_uimqroo.tipo_info_publica: ~50 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_info_publica` DISABLE KEYS */;
REPLACE INTO `tipo_info_publica` (`id_tipoInfoPublica`, `titulo_publica`, `descripcion_publica`, `tipoInfo_romano`) VALUES
	(1, 'I. Marco Normativo', 'I. El marco normativo aplicable al sujeto obligado, en el que deberá incluirse leyes, códigos, reglamentos, decretos de creación, manuales administrativos, reglas de operación, criterios, políticas, entre otros.', 'I'),
	(2, 'II. Estructura Orgánica', 'II. Su estructura orgánica completa, en un formato que permita vincular cada parte de la estructura, las atribuciones y responsabilidades que le corresponden a cada Servidor Público, prestador de servicios profesionales o miembro de los sujetos obligados, de conformidad con las disposiciones aplicables', 'II'),
	(3, 'III. Facultades de cada área', 'III. Las facultades de cada área', 'III'),
	(4, 'IV. Metas y objetivos de programas relevantes', 'IV. Las metas y objetivos de las áreas de conformidad con sus programas operativos', 'IV'),
	(5, 'V. Indicadores de interés público', 'V. Los indicadores relacionados con temas de interés público o trascendencia social que conforme a sus funciones, deban establecer', 'V'),
	(6, 'VI. Indicadores objetivos y resultados', 'VI. Los indicadores de objetivos, resultados, así como de impacto y evaluación de los proyectos, procesos y toda otra atribución de funciones', 'VI'),
	(7, 'VII. Directorio', 'VII. El directorio de todos los servidores públicos, a partir del nivel de jefe de departamento o su equivalente, o de menor nivel, cuando se brinde atención al público; manejen o apliquen recursos públicos; realicen actos de autoridad, o presten servicios profesionales bajo el régimen de confianza u honorarios y personal de base. El directorio deberá incluir al menos el nombre, cargo o nombramiento asignado, nivel del puesto en la estructura orgánica, fecha de alta en el cargo, número telefónico, domicilio para recibir correspondencia y dirección de correo electrónico oficiales', 'VII'),
	(8, 'VIII. Remuneraciones', 'VIII. La remuneración bruta y neta de todos los Servidores Públicos de base o de confianza, de todas las percepciones, incluyendo sueldos, prestaciones, gratificaciones, primas, comisiones, dietas, bonos, estímulos, ingresos y sistemas de compensación, señalando la periodicidad de dicha remuneración', 'VIII'),
	(9, 'IX. Los gastos de representación y viáticos', 'IX. Los gastos de representación y viáticos, así como el objeto e informe de comisión correspondiente', 'IX'),
	(10, 'X. Número total de plazas y personal', 'X. El número total de las plazas y del personal de base y confianza, especificando el total de las vacantes, por nivel de puesto, para cada unidad administrativa', 'X'),
	(11, 'XI. Contrato de servicios profesionales', 'XI. Las contrataciones de servicios profesionales por honorarios, señalando los nombres de los prestadores de servicios, los servicios contratados, el monto de los honorarios y el periodo de contratación', 'XI'),
	(12, 'XII. Declaraciones patrimoniales', 'XII. La información en Versión Pública de las declaraciones patrimoniales, de los Servidores Públicos que así lo determinen, en los sistemas habilitados para ello de acuerdo a la normatividad aplicable', 'XII'),
	(13, 'XIII. Domicilio de la unidad', 'XIII. El domicilio de la Unidad de Transparencia, además de la dirección electrónica donde podrán recibirse las solicitudes para obtener la información', 'XIII'),
	(14, 'XIV. Convocatorias a concursos públicos', 'XIV. Las convocatorias a concursos para ocupar cargos públicos y los resultados de los mismos', 'XIV'),
	(15, 'XV. Programas de subsidios, estímulos y apoyos', 'XV. La información de los programas de subsidios, estímulos y apoyos, en el que se deberá informar respecto de los programas de transferencia, de servicios, de infraestructura social y de subsidio, en los que se deberá contener lo siguiente', 'XV'),
	(16, 'XVI. Contratos o convenios laborales', 'XVI. Las condiciones generales de trabajo, contratos o convenios que regulen las relaciones laborales del personal de base o de confianza, así como los recursos públicos económicos, en especie o donativos, que sean entregados a los sindicatos y ejerzan como recursos públicos', 'XVI'),
	(17, 'XVII. Currículum de los servidores públicos', 'XVII. La información curricular desde el nivel de jefe de departamento o equivalente hasta el titular del sujeto obligado, así como, en su caso, las sanciones administrativas de que haya sido objeto', 'XVII'),
	(18, 'XVIII. Listado de sanciones de servidores', 'XVIII. El listado de servidores públicos con sanciones administrativas definitivas, especificando la causa de sanción y la disposición', 'XVIII'),
	(19, 'XIX. Servicios y requisitos', 'XIX. Los servicios que ofrecen señalando los requisitos para acceder a ellos', 'XIX'),
	(20, 'XX. Trámites, requisitos y formatos', 'XX. Los trámites, requisitos y formatos que ofrecen', 'XX'),
	(21, 'XXI. Presupuesto asignado', 'XXI. La información financiera sobre el presupuesto asignado, así como los informes del ejercicio trimestral del gasto, en términos de la Ley General de Contabilidad Gubernamental y demás normatividad aplicable', 'XXI'),
	(22, 'XXII. Deuda pública', 'XXII. La información relativa a la deuda pública, en términos de la normatividad aplicable', 'XXII'),
	(23, 'XXIII. Montos destinados a la comunicación y publicidad', 'XXIII. Los montos destinados a gastos relativos a comunicación social y publicidad oficial desglosada por tipo de medio, proveedores, número de contrato y concepto o campaña', 'XXIII'),
	(24, 'XXIV. Auditorías', 'XXIV. Los informes de resultados de las auditorías al ejercicio presupuestal de cada sujeto obligado que se realicen, y, en su caso, las aclaraciones que correspondan', 'XXIV'),
	(25, 'XXV. Estados financieros', 'XXV. El resultado de la dictaminación de los estados financieros', 'XXV'),
	(26, 'XXVI. Montos, criterios, convocatorias y listado de personas físicas o morales que usan recursos públicos', 'XXVI. Los montos, criterios, convocatorias y listado de personas físicas o morales a quienes, por cualquier motivo, se les asigne o permita usar recursos públicos o en los términos de las disposiciones aplicables, realicen actos de autoridad. Asimismo, los informes que dichas personas les entreguen sobre el uso y destino de dichos recursos', 'XXVI'),
	(27, 'XXVII. Concesiones, contratos, convenios, permisos y licencias', 'XXVII. Las concesiones, contratos, convenios, permisos, licencias o autorizaciones otorgados, especificando los titulares de aquéllos, debiendo publicarse su objeto, nombre o razón social del titular, vigencia, tipo, términos, condiciones, monto y modificaciones, así como si el procedimiento involucra el aprovechamiento de bienes, servicios y/o recursos públicos', 'XXVII'),
	(28, 'XXVIII. Procedimientos de adjudicación directa, invitación restringida y licitaciones "A"', 'XXVIII. La información sobre los resultados sobre procedimientos de adjudicación directa, invitación restringida y licitación de cualquier naturaleza, incluyendo la Versión Pública del Expediente respectivo y de los contratos celebrados, que deberá contener por lo menos lo siguiente', 'XXVIII'),
	(29, 'XXIX. Informes', 'XXIX. Los informes que por disposición legal generen los sujetos obligados', 'XXIX'),
	(30, 'XXX. Estadísticas', 'XXX. Las estadísticas que generen en cumplimiento de sus facultades, competencias o funciones con la mayor desagregación posible', 'XXX'),
	(31, 'XXXI. Informes presupuestales', 'XXXI. Informe de avances programáticos o presupuestales, balances generales y su estado financiero', 'XXXI'),
	(32, 'XXXII. Padrón de proveedores y contratistas', 'XXXII. Padrón de proveedores y contratistas', 'XXXII'),
	(33, 'XXXIII. Convenios con el sector social y privado', 'XXXIII. Los convenios de coordinación de concertación con los sectores social y privado', 'XXXIII'),
	(34, 'XXXIV. Inventario de bienes muebles', 'XXXIV. El inventario de bienes muebles e inmuebles en posesión y propiedad', 'XXXIV'),
	(35, 'XXXV. Recomendaciones', 'XXXV. Las recomendaciones emitidas por los órganos públicos del Estado Mexicano u organismos internacionales garantes de los derechos humanos, así como las acciones que han llevado a cabo para su atención', 'XXXV'),
	(36, 'XXXVI. Resoluciones y laudos', 'XXXVI. Las resoluciones y laudos que se emitan en procesos o procedimientos seguidos en forma de juicio', 'XXXVI'),
	(37, 'XXXVII. Mecanismos de participación ciudadana', 'XXXVII. Los mecanismos de participación ciudadana', 'XXXVII'),
	(38, 'XXXVIII Programas que se ofrecen', 'XXVIII. El listado de servidores públicos con sanciones administrativas definitivas, especificando la causa de sanción y la disposición', 'XVIII'),
	(39, 'XXXIX. Actas y resoluciones del comité', 'XXXIX. Las actas y resoluciones del Comité de Transparencia de los sujetos obligados', 'XXXIX'),
	(40, 'XL. Evaluaciones y encuestas', 'XL. Todas las evaluaciones, y encuestas que hagan los sujetos obligados a programas financiados con recursos públicos', 'XL'),
	(41, 'VLI. Estudios financiados con recursos públicos', 'XLI. Los estudios financiados con recursos públicos', 'XLI'),
	(42, 'XLII. Listado de jubilados y pensionados', 'XLII. El listado de jubilados y pensionados y el monto que reciben', 'XLII'),
	(43, 'XLIII. Ingresos por cualquier concepto', 'XLIII. Los ingresos recibidos por cualquier concepto señalando el nombre de los responsables de recibirlos, administrarlos y ejercerlos, así como su destino, indicando el destino de cada uno de ellos', 'XLIII'),
	(44, 'XLIV. Donaciones hechas por terceros en dinero o especie', 'XLIV. Donaciones hechas a terceros en dinero o en especie', 'XLIV'),
	(45, 'XLV. Catálogo de disposición y guía de archivo', 'XLV. El catálogo de disposición y guía de archivo documental', 'XLV'),
	(46, 'XLVI. Actas de cabildo', 'XLVI. Las actas de sesiones ordinarias y extraordinarias, así como las opiniones y recomendaciones que emitan, en su caso, los consejos consultivos', 'XLVI'),
	(47, 'XLVII. Listado de solicitudes a las empresas concesionarias de telecomunicaciones y proveedores de servicios o aplicaciones de Internet', 'XLVII. Para efectos estadísticos, el listado de solicitudes a las empresas concesionarias de telecomunicaciones y proveedores de servicios o aplicaciones de Internet para la intervención de comunicaciones privadas, el acceso al registro de comunicaciones y la localización geográfica en tiempo real de equipos de comunicación, que contenga exclusivamente el objeto, el alcance temporal y los fundamentos legales del requerimiento, así como, en su caso, la mención de que cuenta con la autorización judicial correspondiente', 'XLVII'),
	(48, 'XLVIII. Padrón de inspectores, visitadores o supervisores', 'XLVIII. Padrón de inspectores, visitadores o supervisores', 'XLVIII'),
	(49, 'XLIX. Mecanismos de presentación directa de peticiones, opiniones, quejas, denuncias o sugerencias', 'XLIX. Mecanismos de presentación directa de peticiones, opiniones, quejas, denuncias o sugerencias', 'XLIX'),
	(50, 'L. Cualquier otra información', 'L. Cualquier otra información que sea de utilidad o se considere relevante, además de la que, con base en la información estadística, responda a las preguntas hechas con más frecuencia por el público', 'L');
/*!40000 ALTER TABLE `tipo_info_publica` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
