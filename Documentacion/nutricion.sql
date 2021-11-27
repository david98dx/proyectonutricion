-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2021 a las 17:15:34
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nutricion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id_publicacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `img_local` varchar(500) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `img_online` varchar(2000) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `titulo` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` varchar(5000) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha_hora_regis` datetime NOT NULL,
  `fecha_regis` date NOT NULL,
  `dia_regis` int(11) NOT NULL,
  `mes_regis` int(11) NOT NULL,
  `anio_regis` int(11) NOT NULL,
  `semana_regis` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id_publicacion`, `id_usuario`, `img_local`, `img_online`, `titulo`, `descripcion`, `fecha_hora_regis`, `fecha_regis`, `dia_regis`, `mes_regis`, `anio_regis`, `semana_regis`, `estado`) VALUES
(1, 1, '', 'https://cdn.kiwilimon.com/articuloimagen/30198/28375.jpg', 'CHILES EN NOGADA', 'La receta.', '2021-11-24 22:35:52', '2021-11-24', 24, 11, 2021, 47, 0),
(2, 1, 'alps-clouds-dawn-1232594.jpg', '', 'MOLE CON ARROZ', 'LA RECETA VA AQUI', '2021-11-24 22:40:00', '2021-11-24', 24, 11, 2021, 47, 0),
(3, 1, '', 'https://i1.wp.com/cucharamia.com/wp-content/uploads/2021/03/tacos-pescado-2-scaled.jpg?resize=681%2C1024&ssl=1', 'TACOS DE PESCADO', 'Nuevamente se utilizó rockot, pero esta vez cortado en tiras y capeadas. Para el capeado se utiliza cerveza, polvo para hornear, sal, mostaza, harina y un poco de orégano y se deja reposar 15 minutos. Pasado este tiempo se cubren las tiras de pescado y se fríen en manteca de puerco. Estos tacos se acompañan con pico de gallo, cebollas curtidas, salsa roja, mayonesa con crema, col y limón al gusto.', '2021-11-24 23:41:49', '2021-11-24', 24, 11, 2021, 47, 3),
(4, 1, '', 'https://www.saboresdemihuerto.com/wp-content/uploads/2015/08/ceviche.jpg', 'CEVICHE ENSENADA', 'Para este ceviche, que también se le conoce como de carreta, utilizan pescado blanco o rockot, cualquiera de los dos es bueno. Primero se corta el pescado, se pica un poco de cebolla y la juntan con el pescado. Se agrega jugo de limón y se deja reposar media hora. En lo que el pescado se está marinando se corta jitomate en cubos, se ralla zanahoria y se pica un poquito de cilantro. Pasado el tiempo de la marinada se combinan todos los ingredientes y se salpimienta. Se prueba la sazón y se refrigera. Se sirve sobre tostadas de maíz con un poquito de mayonesa y guacamole o aguacate.', '2021-11-24 23:45:00', '2021-11-24', 24, 11, 2021, 47, 3),
(6, 1, '', 'https://www.hazteveg.com/img/recipes/full/201302/R08-47966.jpg', 'SOPA DE HONGOS', 'Esta rica sopa fue elaborada con hongos escobeta que sacudieron, desgajaron y lavaron. En una cazuela de barro con cebolla se agregaron los hongos, agua, sal y tres dientes de ajo molidos. Cuando los hongos cambiaron a color café y se tornaron suaves la sopa estuvo lista, esto fue unos 25 a 30 minutos después. Se puede servir con hojas de epazote y chile de árbol.', '2021-11-24 23:47:56', '2021-11-24', 24, 11, 2021, 47, 3),
(7, 1, '', 'https://polacocina.com/wp-content/uploads/2020/02/Caldo-tlalpe%C3%B1o.jpg', 'CALDO TLALPEÑO', 'Ingredientes\r\n• 6 muslos de pollo o 1 pechuga de un kilo,\r\naproximadamente, partida a la mitad\r\n• 3 l de agua\r\n• 4 calabazas medianas, lavadas y picadas\r\n• 4 zanahorias medianas, lavadas, peladas y\r\npicadas\r\n• 2 chayotes lavados, pelados y picados\r\n• 1 xoconostle lavado y pelado\r\n• 2 tz de arroz cocido\r\n• 1 tz de garbanzo cocido\r\n• 6 ramas de epazote desinfectado\r\n• 6 chiles chipotle adobados\r\n• ¼ de queso Oaxaca deshebrado\r\n• 3 dientes de ajo\r\n• ½ cebolla\r\n• 2 ramas de cilantro desinfectado\r\n• Cebolla y cilantro picados\r\n• Aguacate\r\n• Chile verde picado\r\n• Sal al gusto\r\n\r\nProcedimiento\r\n1. Enjuaga el pollo con agua potable y ponlo\r\nen agua con unas gotas de desinfectante\r\npara frutas y verduras.\r\n2. En una olla pon a hervir el agua con la ½\r\ncebolla, los dientes de ajo y la sal.\r\n3. Cuando el agua suelte el hervor, agrega\r\nel pollo, escurrido, espera a que se cueza\r\ny sácalo del agua.\r\n4. Agrega al agua de la cocción', '2021-11-24 23:54:54', '2021-11-24', 24, 11, 2021, 47, 3),
(8, 1, '', 'https://juegoscocinarpasteleria.org/wp-content/uploads/2020/02/1580778003_202_Muslos-de-pollo-a-la-sarten.jpg', 'POLLO A LA SARTÉN', 'Preparación\r\n1. Precalienta el horno a 250º C.\r\n2. Coloca el pollo entero con la pechuga hacia abajo.\r\n3. Con las tijeras de cocina corta ambos lados de la espalda del pollo para retirar\r\nel hueso por completo.\r\n4. Abre el pollo y límpialo perfectamente.\r\n5. Con ayuda de un cuchillo o con las mismas tijeras, retira (desde el interior) el\r\nhueso que está entre las pechugas, ten cuidado de no perforar la piel.\r\n6. Fractura el esternón del pollo para aplanarlo.\r\n7. Salpimenta el pollo por dentro.\r\n8. Calienta el sartén.\r\n9. Agrega dos cucharadas de aceite.\r\n10. Coloca el pollo entero con la piel hacia abajo, presionando para que la piel esté\r\nen contacto con el fondo del sartén.\r\n11. Tapa el pollo con papel aluminio y mete al horno a 250º C por 30 minutos.\r\nPara la guarnición\r\n1. Cocina las papas cambray en agua con sal. Escúrrelas, aplástalas un poco con\r\nel cuchillo y resérvalas.\r\n2. Al terminar de cocinar', '2021-11-25 00:06:32', '2021-11-25', 25, 11, 2021, 47, 3),
(9, 1, '', 'https://i.blogs.es/27d088/pasta-cremosa-espinacas/450_1000.jpg', 'PASTA CON ESPINACAS', 'INGREDIENTES (6 porciones) \r\n\r\n Pasta cocida al dente (tallarines, espagueti, \r\nmacarrón,etc.) (300 g) \r\n• Espinacas con tallo, lavadas y cocidas (250 g) \r\n• Hojas de albahaca fresca picadas al gusto \r\n• 1/2 cebolla picada (100 g), sal y pimienta al gusto \r\n• Queso Oaxaca deshebrado (180 g) \r\n• 5 cucharadas de mantequilla (50 g) \r\n• 1 taza de media crema (240 g) \r\n• 1/3 de taza de leche evaporada descremada (80 ml) \r\n• Agua de cocimiento de las espinacas.\r\nPREPARACIÓN \r\n1 En una sartén caliente la mantequilla y acitrone la cebolla; \r\nagregue las hojitas de albahaca. Reserve. \r\n2 En 3/4 de taza del agua de cocción, licue las espinacas con \r\ntallo junto con la leche y la crema. \r\n3 Vierta la salsa anterior en la sartén y sazone con sal \r\ny pimienta. Caliente a fuego medio moviendo constantemente hasta que la salsa espese un poco. Retire del fuego. \r\n4 Cubra un refractario con mantequilla. Vierta en él la pas', '2021-11-25 00:10:26', '2021-11-25', 25, 11, 2021, 47, 3),
(10, 1, '', 'https://www.lalaplenia.com.mx/storage/app/media/_0016_CHAYOTES%20RELLENOS%20AL%20HORNO_3.jpg', 'CHAYOTES RELLENOS', 'INGREDIENTES (6 raciones)\r\n• 6 chayotes grandes, enteros y cocidos\r\n• Jamón (200 g) picado en cuadritos pequeños\r\n• Queso manchego (200 g) picado en cuadritos pequeños\r\n• 6 porciones de arroz cocido al vapor (180 g)\r\n• 1 taza de media crema (250 ml)\r\n• Sal y pimienta al gusto\r\nPREPARACIÓN\r\n1 Corte por la mitad (a lo largo) los chayotes cocidos y con la\r\nayuda de una cuchara retire parte de su pulpa para ahuecarlos.\r\n2 Mezcle la pulpa del chayote con el jamón, el queso\r\ny la crema. Salpimente al gusto.\r\n3 Rellene los chayotes y acomódelos en un molde para hornear.\r\n4 Caliente previamente el horno a 180°C y hornee los chayotes\r\ndurante 15 minutos aproximadamente hasta que el queso se\r\ngratine ligeramente.\r\n5 Sirva los chayotes rellenos acompañados del arroz.\r\n', '2021-11-25 00:28:26', '2021-11-25', 25, 11, 2021, 47, 3),
(11, 3, '', 'https://www.cilantroandcitronella.com/wp-content/uploads/2017/09/vegan-lasagna-photo.jpg', 'LASAÑA VEGETARIANA', 'Aporte nutrimental por ración:\r\nKilocalorías: 530 · Proteínas: 27 g · Grasa: 28 g · Colesterol: 59 mg · Fibra dietética: 4 g', '2021-11-25 00:46:34', '2021-11-25', 25, 11, 2021, 47, 1),
(12, 3, '', 'https://www.mexicoenmicocina.com/wp-content/uploads/2017/06/1-27.jpg', 'GUISADO DE NOPAL', 'Aporte nutrimental por ración:\r\n575 kcal * Proteínas 27 g * Grasa 24 g * Fibra dietética 11 g * Colesterol 57 mg', '2021-11-25 00:53:11', '2021-11-25', 25, 11, 2021, 47, 1),
(13, 3, '', 'https://chefdemo.com.mx/wp-content/uploads/2021/09/Discada-Nortena-2-scaled.jpg', 'DISCADA NORTEÑA', 'La discada es nuestra\r\npropuesta de este mes\r\npara festejar a papá en\r\nsu día. Es un platillo de\r\ncarne mixta, popular en\r\nlos estados del norte de\r\nMéxico. Anteriormente\r\nse usaba un disco de\r\narado agrícola para\r\ncocinarla,de ahí su\r\nnombre. Hoy, se prepara\r\nen un sartén grande o\r\nuno tipo Wok chino.', '2021-11-25 00:54:38', '2021-11-25', 25, 11, 2021, 47, 1),
(14, 3, '', 'https://blog.pizcadesabor.com/wp-content/uploads/2020/04/Carne-de-puerco-con-calabacitas-4.jpg', 'CARNE DE CERDO CON CALABACITAS', 'APORTE NUTRIMENTAL POR RACIÓN\r\nKilocalorías 481 · Proteínas 29 g · Grasa 23 g · Fibra dietética 5 g · Colesterol 74 mg', '2021-11-25 00:55:54', '2021-11-25', 25, 11, 2021, 47, 1),
(15, 3, '', 'https://thumbs.dreamstime.com/z/estofado-de-pollo-con-verduras-y-salsa-cremosa-tradicional-cocinado-fuego-lento-champi%C3%B1ones-hierbas-en-una-olla-cuchara-madera-170190284.jpg', 'ESTOFADO CREMOSO DE POLLO', 'APORTE NUTRIMENTAL POR RACIÓN\r\nKilocalorías 442 · Proteínas 27 g · Grasa 22 g · Colesterol 95 mg · Fibra dietética 5 g', '2021-11-25 00:57:01', '2021-11-25', 25, 11, 2021, 47, 1),
(16, 1, '', 'https://www.midiariodecocina.com/wp-content/uploads/2014/02/Lentejas-con-zanahoria-y-zapallo3.jpg', 'LENTEJAS CON QUESO', 'Aporte nutrimental\r\npor ración :\r\n· Kilocalorías: 385\r\n· Proteínas: 22 g\r\n· Grasa: 15 g\r\n· Colesterol: 32mg\r\n· Fibra dietética: 7 g\r\n', '2021-11-25 01:29:42', '2021-11-25', 25, 11, 2021, 47, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE `sesiones` (
  `id_sesion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `inicio` datetime NOT NULL,
  `cierre` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `sesiones`
--

INSERT INTO `sesiones` (`id_sesion`, `id_usuario`, `inicio`, `cierre`) VALUES
(1, 1, '2021-11-24 22:32:00', '2021-11-24 22:42:59'),
(2, 1, '2021-11-24 23:04:53', '2021-11-24 23:10:28'),
(3, 1, '2021-11-24 23:36:19', '0000-00-00 00:00:00'),
(4, 1, '2021-11-24 23:36:51', '2021-11-24 23:45:20'),
(5, 1, '2021-11-24 23:45:23', '2021-11-24 23:48:09'),
(6, 1, '2021-11-24 23:53:24', '2021-11-24 23:54:57'),
(7, 1, '2021-11-25 00:01:38', '2021-11-25 00:02:20'),
(8, 3, '2021-11-25 00:03:01', '2021-11-25 00:04:26'),
(9, 1, '2021-11-25 00:05:52', '2021-11-25 00:10:43'),
(10, 1, '2021-11-25 00:25:36', '2021-11-25 00:28:28'),
(11, 3, '2021-11-25 00:44:21', '2021-11-25 01:20:44'),
(12, 3, '2021-11-25 01:22:58', '2021-11-25 01:23:15'),
(13, 1, '2021-11-25 01:23:20', '2021-11-25 01:23:44'),
(14, 3, '2021-11-25 01:23:50', '2021-11-25 01:25:46'),
(15, 1, '2021-11-25 01:28:33', '2021-11-25 01:29:44'),
(16, 1, '2021-11-25 07:35:45', '2021-11-25 10:51:30'),
(17, 1, '2021-11-25 11:52:16', '2021-11-25 11:52:19'),
(18, 1, '2021-11-25 12:26:41', '2021-11-25 12:26:54'),
(19, 3, '2021-11-25 12:27:00', '2021-11-25 12:31:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `a_paterno` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `a_materno` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `contrasena` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `f_nacimiento` date NOT NULL,
  `municipio` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `ciudad` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `pais` varchar(45) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `genero` varchar(1) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nivel_user` int(11) NOT NULL,
  `fecha_regis` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `a_paterno`, `a_materno`, `correo`, `contrasena`, `f_nacimiento`, `municipio`, `ciudad`, `pais`, `genero`, `nivel_user`, `fecha_regis`) VALUES
(1, 'DAVID', 'FERNANDEZ', 'PEREZ', 'hakerdx98@gmail.com', 'aFdmNjZQVlJPTHZTRW1YZ2cza1pvdz09', '1998-06-26', 'SOLTEPEC', 'PUEBLA', 'MEXICO', 'M', 1, '2021-11-24 23:32:22'),
(2, 'DAVID', 'FERNANDEZ', 'PEREZ', 'hakerdx98@gmail.com', 'aFdmNjZQVlJPTHZTRW1YZ2cza1pvdz09', '1998-06-26', 'SOLTEPEC', 'PUEBLA', 'MEXICO', 'M', 3, '2021-11-24 23:36:48'),
(3, 'DAVID', 'FERNANDEZ', 'VAZQUEZ', 'david.fernandezp@outlook.com', 'aFdmNjZQVlJPTHZTRW1YZ2cza1pvdz09', '1998-06-26', 'SOLTEPEC', 'PUEBLA', 'MEXICO', 'M', 3, '2021-11-25 00:02:54');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id_publicacion`),
  ADD KEY `fk_publicaciones_usuarios1_idx` (`id_usuario`);

--
-- Indices de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`id_sesion`),
  ADD KEY `fk_sesiones_usuarios_idx` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id_publicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  MODIFY `id_sesion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `fk_publicaciones_usuarios1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD CONSTRAINT `fk_sesiones_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
