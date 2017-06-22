-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 31-05-2017 a las 21:54:27
-- Versión del servidor: 5.6.33-0ubuntu0.14.04.1
-- Versión de PHP: 7.0.19-1+deb.sury.org~trusty+2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `daw1705`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ANNOUNCEMENTS`
--
CREATE DATABASE shmarket;
use shmarket;

CREATE TABLE `ANNOUNCEMENTS` (
  `announceId` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `uploadDate` datetime NOT NULL,
  `price` int(11) DEFAULT NULL,
  `operation` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `direction` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `userId` int(11) NOT NULL,
  `valorationId` int(11) DEFAULT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ANNOUNCEMENTS`
--

INSERT INTO `ANNOUNCEMENTS` (`announceId`, `title`, `description`, `uploadDate`, `price`, `operation`, `direction`, `userId`, `valorationId`, `categoryId`) VALUES
(2, 'Vendo S5 seminuevo!', 'Apenas abierto de su caja, muy barato con auriculares incluidos', '2017-03-22 14:24:20', 324, 'ON SALE', 'Madrid', 1, 2, 1),
(3, 'A la venta Portátil ASUS 12 GB RAM seminuevo!', 'Apenas un año de uso con un total de 3,2 GHZ extremadament rápido, incluye tarjeta gráfica lo cambio por un PS4 SEMINUEVA', '2017-03-15 09:25:25', 954, 'ON SALE', 'Bilbao', 2, 6, 3),
(4, 'CAMBIOS VIDEOJUEGOS VARIOS', 'tengo demasiado juegos y he decidido cambiar unos cuantos por ejemplo un call of duty modern Warfare 2 por un singstart o un fifa por un little big pl', '2017-03-10 11:28:20', NULL, 'EXCHANGE', 'Barcelona', 4, 3, 6),
(5, 'Pc 3,6 GHz window10 + NVDIA GeFORCE gtx 760', 'pues eso', '2017-02-17 10:27:56', 1234, 'ON SALE', 'Valencia', 5, 5, 5),
(6, 'Intercambio de netbook toshibas', 'busco cambiar mi nuevo toshiba nb 200 por el nb 250 si alguien lo quiere hablar por privado o por skype o denme su numero', '2017-03-30 10:26:28', NULL, 'EXCHANGE', 'Valladolid', 6, 1, 4),
(7, 'PS2 ANTIGUA!!', 'Para los amantes de esta consola, o quienes la buscan en su colección, vendo la play 2 SLIM. GARANTIZADO QUE FUNCIONA y todos sus componentes.', '2017-03-07 07:19:00', 150, 'ON SALE', 'Lugo', 7, 8, 6),
(8, 'Huawei Mediapad T1', 'El último modelo del mercado de la marca Huawei, barato.', '2017-03-15 09:24:53', 146, 'ON SALE', 'Almería', 8, 14, 2),
(9, 'VENDO Portátil ASUS F541UA-XX329T ', 'magnífico portátil que correrá sin ningún problema cualquier programa. Es quizá el mejor portátil de gama media que exista en el mercado sin olvidar q', '2017-03-02 10:24:52', 499, 'ON SALE', 'Sevilla', 9, 9, 3),
(10, 'VENDO PC Gaming HP OMEN 870-107ns', ' Este ordenador de sobremesa OMEN combina un diseño de vanguardia y el hardware más reciente del sector para ofrecer un rendimiento increíble, listo p', '2017-03-09 12:11:08', 845, 'ON SALE', 'Levante', 19, 15, 5),
(11, 'Intercambio Neetbook Convertible 2 en 1 Medion E2215T ', 'Pues eso intercambio este portatil con otro muy parecido , con características muy similares porque me siento incómodo con esta marca', '2017-03-22 07:21:24', NULL, 'EXCHANGE', 'Granada', 14, 13, 4),
(12, 'Intercambio sony Xperia M1 por S3', 'Viendo que tienen prácticamente las mismas características, quisiera cambiarme mi M2 por un S4 porque me gusta más el modelo de Samsung', '2017-03-23 11:22:14', NULL, 'EXCHANGE', 'Salamanca', 16, 12, 1),
(13, 'Vendo SAMSUNS GALAXY S7 casi NI USADO', 'Acabo de comprar el nuevo S7, pero no me acaba de comvencer, apenas lo he usado. Incluyo todos los complementos, auriculares también con caja y todo', '2017-03-13 16:36:28', 580, 'ON SALE', 'Burgos', 15, 11, 1),
(14, 'Netbook Prixton PC14W ', 'Pienso cambiarme de portátil este verano, pero he pensado este que me ha servido de muchísimo, un portátil más que capaz si lo que se desea es navegar', '2017-03-16 09:28:00', 155, 'ON SALE', 'Huelva', 18, 10, 4),
(15, 'VENDO CANON G1 MARK II color negro', 'Apenas usado. Vendo esta preciosidad para comprarme una mejor. La mejor elección para los novatos y para los usuarios más experimentados.', '2017-03-01 11:30:29', 600, 'ON SALE', 'Badajoz', 12, 7, 7),
(16, 'Vendo S8 CASI REGALADO', 'Un S8 casi regalado ya que mi daddy me compro uno super cute.', '2017-05-08 09:19:18', NULL, 'SELL', 'Salamanca', 18, 16, 1),
(17, 'S7 SEMINUEVO!', 'No me gusto esta tontería.', '2017-05-08 07:20:21', 500, 'SELL', 'Barcelona', 20, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ANNOUNCES_DETAILS`
--

CREATE TABLE `ANNOUNCES_DETAILS` (
  `announcesDetailsId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `sold` int(4) NOT NULL,
  `totalAnnounces` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ANNOUNCES_DETAILS`
--

INSERT INTO `ANNOUNCES_DETAILS` (`announcesDetailsId`, `userId`, `sold`, `totalAnnounces`) VALUES
(1, 1, 0, 1),
(2, 17, 0, 1),
(3, 10, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CATEGORIES`
--

CREATE TABLE `CATEGORIES` (
  `categoryId` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `CATEGORIES`
--

INSERT INTO `CATEGORIES` (`categoryId`, `name`) VALUES
(1, 'Smarthpones'),
(2, 'Tablets'),
(3, 'Portátiles'),
(4, 'Netbooks'),
(5, 'Ordenadores'),
(6, 'Consolas/Gaming'),
(7, 'Audio/Foto/Vídeo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CITIES`
--

CREATE TABLE `CITIES` (
  `cityId` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `PROVINCES_provinceId` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `CITIES`
--

INSERT INTO `CITIES` (`cityId`, `name`, `PROVINCES_provinceId`) VALUES
('ALI', 'Alicante', 'VAL'),
('AYA', 'Ayamonte', 'HUE'),
('BAD', 'Badalona', 'BCN'),
('BIL', 'Bilbao', 'VIZ'),
('CAL', 'Calatayud', 'ZAR'),
('CAR', 'Carmona', 'SEV'),
('CON', 'Consuegra', 'TOL'),
('DUE', 'Dueñas', 'PAL'),
('GET', 'Getafe', 'MAD'),
('JOV', 'Jove', 'LUG'),
('LED', 'Ledesma', 'SAL'),
('MAR', 'Marbella', 'MAL'),
('MER', 'Mérida', 'BAD'),
('MOR', 'Mora', 'TOL'),
('OVI', 'Oviedo', 'AST'),
('PAM', 'Pamplona', 'NAV'),
('REU', 'Reus', 'TAR'),
('SAB', 'Sabadell', 'BCN'),
('SAN', 'Santander', 'CAN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CONVERSATIONS`
--

CREATE TABLE `CONVERSATIONS` (
  `conversationId` int(11) NOT NULL,
  `text` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fromUser` int(11) NOT NULL,
  `toUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `CONVERSATIONS`
--

INSERT INTO `CONVERSATIONS` (`conversationId`, `text`, `time`, `fromUser`, `toUser`) VALUES
(1, '¿Que pasa tio, que haces oye que al final te ', '2017-04-02 07:22:33', 4, 2),
(2, 'Quiero mucho a mi SIngstar le tengo bastante ', '2017-03-10 11:29:00', 1, 4),
(3, 'no dispongo de este portatil pero si gustas a', '2017-03-30 09:25:00', 4, 1),
(4, 'lo he estado pensando y si al final te compro', '2017-04-02 07:50:39', 5, 15),
(5, 'Tienes el mismo modelo de PS2 que yo tenia an', '2017-04-01 13:38:40', 18, 7),
(6, 'Lástima que no sea el de 32GB. Igual estoy di', '2017-04-02 05:19:25', 12, 8),
(7, 'Crees que pueda jugar el Tetris en ese PC?', '2017-03-20 04:17:17', 8, 5),
(8, 'Justo lo que buscaba estaba harto de mi smart', '2017-04-25 05:24:28', 9, 16),
(9, 'Acabo de ver en una tienda dónde ese mismo mo', '2017-04-27 08:27:29', 10, 19),
(10, 'justo el modelo que andaba buscando una pena ', '2017-04-02 07:24:27', 13, 18),
(11, 'Siempre he dicho que los ASUS son los mejores', '2017-03-27 04:20:25', 12, 9),
(12, 'GRAX man el portátil va de maravilla ', '2017-03-19 05:17:23', 14, 9),
(13, 'es un nettook bastante simple pero que sin du', '2017-04-02 09:28:28', 8, 18),
(14, 'Me sigue sin funcionar pero tu mismo. Espero ', '2017-03-22 06:22:27', 16, 15),
(15, 'gracias', '2017-03-27 07:22:24', 4, 2),
(16, 'Bonita cámara. Mi daddy me compró igual cuand', '2017-03-22 07:22:26', 17, 12),
(17, 'No lo tienes en blanco tio? Es que no me fío ', '2017-03-26 07:21:22', 6, 15),
(18, 'Me encanta ese ordenador tiene todo lo que pi', '2017-04-02 09:22:29', 15, 5),
(19, 'no tengo tanto dinero man rebajálo', '2017-03-21 07:23:29', 16, 19),
(20, 'me funciona enhorabuena', '2017-04-01 22:00:00', 19, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `FAVOURITES`
--

CREATE TABLE `FAVOURITES` (
  `favId` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `FAVOURITES`
--

INSERT INTO `FAVOURITES` (`favId`, `userId`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `FAVOURITES_has_ANNOUNCEMENTS`
--

CREATE TABLE `FAVOURITES_has_ANNOUNCEMENTS` (
  `FAVOURITES_favId` int(11) NOT NULL,
  `announceId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `FAVOURITES_has_ANNOUNCEMENTS`
--

INSERT INTO `FAVOURITES_has_ANNOUNCEMENTS` (`FAVOURITES_favId`, `announceId`) VALUES
(4, 3),
(5, 4),
(2, 5),
(3, 5),
(6, 5),
(1, 6),
(7, 6),
(8, 7),
(9, 8),
(10, 9),
(11, 10),
(12, 11),
(13, 12),
(14, 13),
(15, 14),
(16, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PHOTOS`
--

CREATE TABLE `PHOTOS` (
  `photoId` int(11) NOT NULL,
  `url` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `announceId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `PHOTOS`
--

INSERT INTO `PHOTOS` (`photoId`, `url`, `announceId`) VALUES
(1, 's5.jpg', 2),
(2, 's52.png', 2),
(3, 's53.png', 2),
(4, 's54.jpeg', 2),
(5, 'asus.png', 3),
(6, 'callofduty.jpg', 4),
(7, 'pc.JPG', 5),
(8, 'toshiba.jpg', 6),
(9, 'ps2.jpg', 7),
(10, 'huawei.jpg', 8),
(11, 'portatil.jpg', 9),
(12, 'pc2.jpg', 10),
(13, 'medion.jpg', 11),
(14, 'medion2.jpg', 11),
(15, 'medion3.jpg', 11),
(16, 'sony.jpg', 12),
(17, 's7.jpg', 13),
(18, 's72.jpg', 13),
(19, 'neetbook.jpg', 14),
(20, 'camara.jpg', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PROVINCES`
--

CREATE TABLE `PROVINCES` (
  `provinceId` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `PROVINCES`
--

INSERT INTO `PROVINCES` (`provinceId`, `name`) VALUES
('AST', 'Asturias'),
('BAD', 'Badajoz'),
('BCN', 'Barcelona'),
('CAN', 'Cantabria'),
('COR', 'La coruña'),
('HUE', 'Huesca'),
('HUL', 'Huelva'),
('LUG', 'Lugo'),
('MAD', 'Madrid'),
('MAL', 'Malaga'),
('NAV', 'Navarra'),
('PAL', 'Palencia'),
('SAL', 'Salamanca'),
('SEV', 'Sevilla'),
('TAR', 'Tarragona'),
('TOL', 'Toledo'),
('VAL', 'Valencia'),
('VIZ', 'Vizcaya'),
('ZAR', 'Zaragoza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `REPORTS`
--

CREATE TABLE `REPORTS` (
  `reportId` int(11) NOT NULL,
  `comlpain` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `sendDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userId` int(11) NOT NULL,
  `announceId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `REPORTS`
--

INSERT INTO `REPORTS` (`reportId`, `comlpain`, `sendDate`, `userId`, `announceId`) VALUES
(1, 'Ha sido reportado por diversos usuarios por subir contenido que se puede considerar inapropiado u ofensivo. Por favor retire su contenido inmediatamen', '2017-04-02 07:25:27', 3, 2),
(2, 'Ha sido reportado por faltar el respeto a otros usuarios. Por favor absténgase de hacerlo de nuevo.', '2017-04-03 08:20:00', 3, 2),
(3, 'Ha sido reportado por diversos usuarios por subir contenido que se puede considerar inapropiado u ofensivo. Por favor retire su contenido inmediatamen', '2017-04-02 02:18:21', 8, 8),
(4, 'Ha sido reportado por faltar el respeto a otros usuarios. Por favor absténgase de hacerlo de nuevo.', '2017-04-03 05:17:19', 16, 3),
(5, 'Ha sido reportado por diversos usuarios por subir contenido que se puede considerar inapropiado u ofensivo. Por favor retire su contenido inmediatamen', '2017-04-02 10:25:22', 12, 12),
(34, 'Ha sido reportado por diversos usuarios por subir contenido que se puede considerar inapropiado u ofensivo. Por favor retire su contenido inmediatamen', '2017-04-01 18:47:40', 13, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USERS`
--

CREATE TABLE `USERS` (
  `userId` int(11) NOT NULL,
  `fullName` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `registryDate` datetime NOT NULL,
  `photo` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `USERS`
--

INSERT INTO `USERS` (`userId`, `fullName`, `email`, `password`, `telephone`, `role`, `registryDate`, `photo`) VALUES
(1, 'Javier Bueno', 'javi95@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', '695325487', 'user', '2017-03-05 08:30:29', 'javi.jpg'),
(2, 'Aleix Velasco', 'aleixvelasco@gmail.com', 'cb73077693b6ceace228146d266867fd', '659872365', 'user', '2017-03-06 04:12:13', 'aleix.jpg'),
(3, 'Jean Andrade', 'jean12pocoyo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '695874256', 'user', '2017-03-05 07:22:19', 'jean.jpg'),
(4, 'Jaume Berbel', 'jacobo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '699875325', 'user', '2017-03-05 11:26:28', 'jaume.jpg'),
(5, 'Marcelo Bielsa', 'marcelo13@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '632154987', 'user', '2017-03-06 06:17:21', 'marcelo.jpg'),
(6, 'Gabriel Hernández', 'ernesto@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '699326115', 'user', '2017-03-07 08:20:20', 'gabriel.jpg'),
(7, 'Mónica Carvajal', 'monica@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '699326116', 'user', '2017-03-07 06:17:16', 'monica.jpg'),
(8, 'Gabriel Montoro', 'giovanniMendez@gmailcom', 'e10adc3949ba59abbe56e057f20f883e', '689326117', 'user', '2017-03-06 06:17:16', 'montoro.jpg'),
(9, 'Ándres Alcalá', 'andresito_tupapi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '699326118', 'user', '2017-03-08 06:17:19', 'andres.jpg'),
(10, 'Juan Andrade', 'ju4an97@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '699326119', 'user', '2017-03-07 07:17:18', 'juan.jpg'),
(11, 'Maria Orellana', 'Maria-L0ve7@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '699326120', 'user', '2017-03-06 11:25:24', 'maria.jpg'),
(12, 'Dulce María', 'dulceL0veRBD@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '699326121', 'user', '2017-03-07 05:12:12', 'dulce.jpg'),
(13, 'Roberta Pardo Rey', 'robertapardorey@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '609326122', 'user', '2017-03-07 10:23:28', 'roberta.jpg'),
(14, 'Lupita Fernández', 'lupelunanueva@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '699326123', 'user', '2017-03-09 07:15:14', 'lupita.jpg'),
(15, 'Victoria Paz', 'victori4@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '699326124', 'user', '2017-03-06 07:18:18', 'vico.jpg'),
(16, 'Miguel Arango', 'miguel-monterrey@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '609326125', 'user', '2017-03-05 08:19:32', 'miguel.jpg'),
(17, 'Mía Colucci', 'miaMoon@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '699326126', 'user', '2017-03-06 02:23:17', 'mia.jpeg'),
(18, 'Diego Bustamante', 'diego@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '679326127', 'user', '2017-03-07 06:17:23', 'diego.jpg'),
(19, 'Giovanni Mendez', 'giovanni745@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '649326128', 'user', '2017-03-06 15:23:31', 'giovanni.jpg'),
(20, 'Luis Suárez', 'luisito@gmail.com', '202cb962ac59075b964b07152d234b70', '689326129', 'user', '2017-03-06 14:40:42', 'luis.jpg'),
(21, 'Rubén', 'admin@gmail.com', '79490526cce59a26cbbecd8e601ad25e', '654321987', 'admin', '2017-02-03 12:32:34', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `VALORATIONS`
--

CREATE TABLE `VALORATIONS` (
  `valorationId` int(11) NOT NULL,
  `text` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `VALORATIONS`
--

INSERT INTO `VALORATIONS` (`valorationId`, `text`, `userId`) VALUES
(1, 'Muy buen producto, enhorabuena te felicito el producto va fenomenal', 1),
(2, 'El producto ha sido una mierda ojala te mueras imbecil', 2),
(3, 'Espero que la próxima incluya el Singstar 2 xDD', 3),
(5, 'No confien en el es un estafador de mierda, a mi tio Manuel le estafo hasta 5 veces en una semana, es un desgraciado', 6),
(6, 'Buenísimo como siempre, grax man', 4),
(7, 'Preciosa cámara, siempre quise tener una así, grax man me salvaste la buscaba pero no la encontraba.', 14),
(8, 'Ostias que recuerdo tengo de la PS2, pues nada a hora a estrenarla con mi GTA SA.', 20),
(9, 'Los ASUS los mejores como siempre. Aunque te has excedido un poco de precio. Si buscan en Ebay o Amazon te sale por un poco menos.', 7),
(10, 'Gracias y barato!! se lo regalaré a mi madre para su cumpleaños seguro que le hará ilusión.', 8),
(11, 'JO JO JO aquí se encuentran cosas más baratas mil gracias hamijo', 9),
(12, 'Regalo de urgencia para mi hermano pequeño, espero que le guste. Buen aporte man', 10),
(13, 'El producto no me tira y se me dificulta poder conectarme a internet. Espero que se arregle porque de la paliza que te voy a dar no te va a reconocer ', 16),
(14, 'Se me ha petado el jodido móbil. Debe ser culpa de los chinos y por eso lo tuviste que vender. No es tu culpa men voy a de denunciar a la compañía.', 15),
(15, 'GRAX ME funca todo perfecto.', 11),
(16, 'Gracias!', 20),
(17, 'Me funca perfecto grax luisito!', 2),
(18, 'una caraja', 21);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ANNOUNCEMENTS`
--
ALTER TABLE `ANNOUNCEMENTS`
  ADD PRIMARY KEY (`announceId`),
  ADD KEY `fk_ANNOUNCEMENTS_USERS1_idx` (`userId`),
  ADD KEY `fk_ANNOUNCEMENTS_VALORATIONS1_idx` (`valorationId`),
  ADD KEY `fk_ANNOUNCEMENTS_CATEGORIES1_idx` (`categoryId`);

--
-- Indices de la tabla `ANNOUNCES_DETAILS`
--
ALTER TABLE `ANNOUNCES_DETAILS`
  ADD PRIMARY KEY (`announcesDetailsId`),
  ADD KEY `userId` (`userId`);

--
-- Indices de la tabla `CATEGORIES`
--
ALTER TABLE `CATEGORIES`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indices de la tabla `CITIES`
--
ALTER TABLE `CITIES`
  ADD PRIMARY KEY (`cityId`),
  ADD KEY `fk_CITIES_PROVINCES1_idx` (`PROVINCES_provinceId`);

--
-- Indices de la tabla `CONVERSATIONS`
--
ALTER TABLE `CONVERSATIONS`
  ADD PRIMARY KEY (`conversationId`),
  ADD KEY `formUser_idx` (`fromUser`),
  ADD KEY `toUser_idx` (`toUser`);

--
-- Indices de la tabla `FAVOURITES`
--
ALTER TABLE `FAVOURITES`
  ADD PRIMARY KEY (`favId`),
  ADD KEY `fk_FAVOURITES_USERS1_idx` (`userId`);

--
-- Indices de la tabla `FAVOURITES_has_ANNOUNCEMENTS`
--
ALTER TABLE `FAVOURITES_has_ANNOUNCEMENTS`
  ADD PRIMARY KEY (`FAVOURITES_favId`,`announceId`),
  ADD KEY `fk_FAVOURITES_has_ANNOUNCEMENTS_ANNOUNCEMENTS1_idx` (`announceId`),
  ADD KEY `fk_FAVOURITES_has_ANNOUNCEMENTS_FAVOURITES1_idx` (`FAVOURITES_favId`);

--
-- Indices de la tabla `PHOTOS`
--
ALTER TABLE `PHOTOS`
  ADD PRIMARY KEY (`photoId`),
  ADD KEY `fk_PHOTOS_ANNOUNCEMENTS1_idx` (`announceId`);

--
-- Indices de la tabla `PROVINCES`
--
ALTER TABLE `PROVINCES`
  ADD PRIMARY KEY (`provinceId`);

--
-- Indices de la tabla `REPORTS`
--
ALTER TABLE `REPORTS`
  ADD PRIMARY KEY (`reportId`),
  ADD KEY `fk_Reports_USERS1_idx` (`userId`),
  ADD KEY `fk_Reports_ANNOUNCEMENTS1_idx` (`announceId`);

--
-- Indices de la tabla `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indices de la tabla `VALORATIONS`
--
ALTER TABLE `VALORATIONS`
  ADD PRIMARY KEY (`valorationId`),
  ADD KEY `fk_VALORATIONS_USERS1_idx` (`userId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ANNOUNCEMENTS`
--
ALTER TABLE `ANNOUNCEMENTS`
  MODIFY `announceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `ANNOUNCES_DETAILS`
--
ALTER TABLE `ANNOUNCES_DETAILS`
  MODIFY `announcesDetailsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `CATEGORIES`
--
ALTER TABLE `CATEGORIES`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `CONVERSATIONS`
--
ALTER TABLE `CONVERSATIONS`
  MODIFY `conversationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `FAVOURITES`
--
ALTER TABLE `FAVOURITES`
  MODIFY `favId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `PHOTOS`
--
ALTER TABLE `PHOTOS`
  MODIFY `photoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `REPORTS`
--
ALTER TABLE `REPORTS`
  MODIFY `reportId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `USERS`
--
ALTER TABLE `USERS`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `VALORATIONS`
--
ALTER TABLE `VALORATIONS`
  MODIFY `valorationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ANNOUNCEMENTS`
--
ALTER TABLE `ANNOUNCEMENTS`
  ADD CONSTRAINT `fk_ANNOUNCEMENTS_CATEGORIES1` FOREIGN KEY (`categoryId`) REFERENCES `CATEGORIES` (`categoryId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ANNOUNCEMENTS_USERS1` FOREIGN KEY (`userId`) REFERENCES `USERS` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ANNOUNCEMENTS_VALORATIONS1` FOREIGN KEY (`valorationId`) REFERENCES `VALORATIONS` (`valorationId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ANNOUNCES_DETAILS`
--
ALTER TABLE `ANNOUNCES_DETAILS`
  ADD CONSTRAINT `ANNOUNCES_DETAILS_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `USERS` (`userId`);

--
-- Filtros para la tabla `CITIES`
--
ALTER TABLE `CITIES`
  ADD CONSTRAINT `fk_CITIES_PROVINCES1` FOREIGN KEY (`PROVINCES_provinceId`) REFERENCES `PROVINCES` (`provinceId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `CONVERSATIONS`
--
ALTER TABLE `CONVERSATIONS`
  ADD CONSTRAINT `formUser` FOREIGN KEY (`fromUser`) REFERENCES `USERS` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `toUser` FOREIGN KEY (`toUser`) REFERENCES `USERS` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `FAVOURITES`
--
ALTER TABLE `FAVOURITES`
  ADD CONSTRAINT `fk_FAVOURITES_USERS1` FOREIGN KEY (`userId`) REFERENCES `USERS` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `FAVOURITES_has_ANNOUNCEMENTS`
--
ALTER TABLE `FAVOURITES_has_ANNOUNCEMENTS`
  ADD CONSTRAINT `fk_FAVOURITES_has_ANNOUNCEMENTS_ANNOUNCEMENTS1` FOREIGN KEY (`announceId`) REFERENCES `ANNOUNCEMENTS` (`announceId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_FAVOURITES_has_ANNOUNCEMENTS_FAVOURITES1` FOREIGN KEY (`FAVOURITES_favId`) REFERENCES `FAVOURITES` (`favId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `PHOTOS`
--
ALTER TABLE `PHOTOS`
  ADD CONSTRAINT `fk_PHOTOS_ANNOUNCEMENTS1` FOREIGN KEY (`announceId`) REFERENCES `ANNOUNCEMENTS` (`announceId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `VALORATIONS`
--
ALTER TABLE `VALORATIONS`
  ADD CONSTRAINT `fk_VALORATIONS_USERS1` FOREIGN KEY (`userId`) REFERENCES `USERS` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
