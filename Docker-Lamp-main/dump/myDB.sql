-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 08-05-2022 a las 19:08:08
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
-- Base de datos: `play-to-play`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `games`
--

CREATE TABLE `games` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `genre` bigint(20) UNSIGNED NOT NULL,
  `cover` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `video` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `text1` longtext COLLATE utf8_spanish_ci NOT NULL,
  `text2` longtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `text3` longtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `games`
--

INSERT INTO `games` (`id`, `name`, `genre`, `cover`, `video`, `text1`, `text2`, `text3`, `price`) VALUES
(1, 'Dead Cells', 1, 'http://127.0.0.1/public/images/71PCWffnThLSL1500_.jpg', 'gX4cGcwmdsY', 'Dead Cells es un videojuego híbrido entre el género de exploración de mazmorras o roguelite, y metroidvania, creando su propio género, “roguevania”, desarrollado por el estudio Motion Twin. El juego fue lanzado para PC, Mac, Linux, Playstation 4, Nintendo Switch y Xbox One, siendo lanzado en la plataforma de Steam el 6 de agosto de 2018, bajo la categoría de juego de acción e indie.En el juego asumes el papel de un cúmulo de células que se apoderan de un cuerpo en descomposición, con el cual explora un castillo que constantemente se expande y cambia, el jugador puede hacer uso de distintas armas que se encuentran repartidas a lo largo del sitio, cada una con habilidades y estadísticas diferentes, diversas habilidades permanentes desbloqueables que permiten acceder a desafíos o recompensas nuevas, así como varios jefes y zonas.', '', '', '15.00'),
(2, 'Hollow Knight', 1, 'https://static.miraheze.org/awesomegameswiki/4/46/No_voice_to_cry_suffering.jpg', 'UAO2urG23S4', 'Hollow Knight es un videojuego perteneciente al género metroidvania desarrollado y publicado por Team Cherry. El videojuego fue inicialmente lanzado para Microsoft Windows en febrero de 2017, y más tarde para macOS y Linux en abril de 2017. La adaptación para Nintendo Switch fue lanzada el 12 de junio de 2018. El desarrollo fue parcialmente financiado como un proyecto Kickstarter que obtuvo 57 000 dólares hasta finales de 2014. El juego fue lanzado en las consolas PlayStation 4 y Xbox One el 25 de septiembre de 2018. El videojuego cuenta la historia del Caballero, en su búsqueda para descubrir los secretos del largamente abandonado reino de Hallownest, cuyas profundidades atraen a los aventureros y valientes con la promesa de tesoros o la respuesta a misterios antiguos.Una secuela del videojuego titulada Hollow Knight: Silksong, se encuentra actualmente en desarrollo y su lanzamiento está programado para Microsoft Windows, Mac, Linux y Nintendo Switch, aunque Team Cherry no ha descartado lanzamientos en otras plataformas. Las personas que donaron en la campaña de Kickstarter de Hollow Knight recibirán Silksong de forma gratuita.', '[value-6]', '[value-7]', '15.00'),
(3, 'Spiritfarer', 6, 'https://uvejuegos.com/img/caratulas/62905/boxart_6251.jpg', '4pKJ-NuSjNE', '[value-5]', '[value-6]', '[value-7]', '17.95'),
(4, 'Frostpunk', 2, 'https://i.3djuegos.com/juegos/13701/frostpunk/fotos/ficha/frostpunk-4007865.jpg', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '20.00'),
(5, 'Skyrim', 3, 'https://blog.polaris64.net/post/skyrim-is-released/cover.jpg', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '39.99'),
(6, 'Horizon Chase', 5, 'https://assets.nintendo.com/image/upload/c_pad,f_auto,h_490,q_auto,w_360/ncom/es_MX/games/switch/h/horizon-chase-turbo-switch/description-image?v=2022021804', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '9.99'),
(7, 'Ori and the will of the wisps', 6, 'https://uvejuegos.com/img/caratulas/54828/ori-2.jpg', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '19.99'),
(8, 'Sifu', 1, 'https://image.api.playstation.com/vulcan/img/rnd/202201/1616/qWlFPP5MaE785CHqObz7NdMz.png', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '49.99'),
(9, 'Lost Ark', 3, 'http://127.0.0.1/public/images/26127_Lost_Ark_62698a668b9d6.jpg', '[value-4]', '[value-5]', '[value-6]', '[value-7]', '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `game_commentaries`
--

CREATE TABLE `game_commentaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_game` bigint(20) UNSIGNED NOT NULL,
  `commentary` varchar(500) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Acción'),
(2, 'Estrategia'),
(3, 'Rol'),
(4, 'Simulación'),
(5, 'Deportes'),
(6, 'Aventura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `library`
--

CREATE TABLE `library` (
  `id_game` bigint(20) UNSIGNED NOT NULL,
  `id_player` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `library`
--

INSERT INTO `library` (`id_game`, `id_player`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_07_122900_create_roles_table', 1),
(6, '2022_05_07_123600_create_role_user_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `text` longtext COLLATE utf8_spanish_ci NOT NULL,
  `image` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `link` varchar(500) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `image`, `link`) VALUES
(1, 'Starfield, cada vez más cerca', 'Los creadores de Skyrim avanzan novedades sobre este esperado juego', 'https://i0.wp.com/lavidaesunvideojuego.com/wp-content/uploads/2020/11/StarField-lavidaesunvideojuego.jpg?fit=1332%2C850&ssl=1', '/project/4'),
(2, 'Silk Song aun no tiene fecha de salida', 'No sabemos cuando podremos probar la continuación de Hollow Knight, y Team Cherry ya se lo toma a risa', 'https://imageio.forbes.com/blogs-images/davidthier/files/2019/02/Capture-19-1200x664.jpg?format=jpg&width=1200', '/project/5'),
(3, 'Lost Ark Actualizado', 'El famoso mmo action rpg recibe la actualización más ambiciosa hasta la fecha', 'https://cdn.akamai.steamstatic.com/steam/apps/1599340/ss_f86c68e6fe904392d8a08231121f860814125f62.1920x1080.jpg?t=1651157265', '/game/9'),
(4, 'Sifu aumenta su dificultad', 'Tras la última actualización podremos elegir entre nuevos niveles de dificultad, con desafiantes nuevos retos', 'https://www.pcmgames.com/wp-content/uploads/2022/02/SIFU-Live.jpg', '/game/8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('alderan133@gmail.com', '$2y$10$/64XLBMQVBRLJxBwibdG7.nsc.n1B5E4zgf11LPqYUNtnxTDWji0K', '2022-05-08 12:40:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `type` bigint(20) UNSIGNED NOT NULL,
  `role` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `plans`
--

INSERT INTO `plans` (`id`, `name`, `price`, `description`, `type`, `role`) VALUES
(1, 'Gratuito', '0.00', 'El usuario solo tiene acceso a las demos y los juegos gratuitos', 1, 1),
(2, 'Novedades', '9.99', 'El usuario puede jugar a las novedades mensuales que se activen', 1, 4),
(3, 'Catálogo', '29.99', 'El usuario tiene acceso a todo el catálogo de juegos.', 1, 5),
(4, 'Cinco', '9.99', 'El creador puede realizar hasta 5 proyectos.', 2, 2),
(5, 'Diez', '29.99', 'El creador tendrá espacio de almacenamiento para diez proyectos.', 2, 6),
(6, 'Ilimitado', '59.99', 'El usuario puede albergar todos los proyectos que realice.', 2, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portfolio`
--

CREATE TABLE `portfolio` (
  `id_project` bigint(20) UNSIGNED NOT NULL,
  `id_creator` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `genre` bigint(20) UNSIGNED NOT NULL,
  `cover` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `text1` longtext COLLATE utf8_spanish_ci NOT NULL,
  `text2` longtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `text3` longtext COLLATE utf8_spanish_ci DEFAULT NULL,
  `pledge1` decimal(10,2) NOT NULL,
  `pledge2` decimal(10,2) NOT NULL,
  `pledge3` decimal(10,2) NOT NULL,
  `image` varchar(500) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`id`, `name`, `genre`, `cover`, `text1`, `text2`, `text3`, `pledge1`, `pledge2`, `pledge3`, `image`) VALUES
(1, 'Bullet Storm', 1, 'https://cdn-products.eneba.com/resized-products/ozqurvvpmi66u3xdgzuz_350x200_1x-0.jpg', 'Bulletstorm es un videojuego de acción en primera persona de 2011 creado por People Can Fly y Epic Games y publicado por Electronic Arts (EA). El juego se distingue por su sistema de recompensa a los jugadores con \"puntos de habilidad\" para realizar eliminaciones cada vez más creativas. Bulletstorm no tiene ningún modo multijugador competitivo, prefiere incluir modos de juego cooperativo en línea y ataque de puntuación. Ambientada en el siglo xxvi la historia del juego se centra en Grayson Hunt, un pirata espacial y ex-operaciones negras que es abatido en un planeta devastado por la guerra mientras intenta vengarse del general Sarrano, su antiguo comandante que engaña a él y sus hombres para cometer crímenes de guerra y asesinar inocentes.El desarrollo del juego comenzó en junio de 2007. Adrian Chmielarz y Cliff Bleszinski fueron el director y diseñador respectivamente, mientras que Rick Remender, el autor de Fear Agent, escribió la historia del juego. Originalmente se previó que fuera una versión basada en acción en tercera persona, aunque la base de combate y la perspectiva de juego pasaron por varias revisiones. La ficción Pulp, Burnout, Duke Nukem y Firefly inspiraron el equipo durante el desarrollo del juego. El equipo experimentó con los modos multijugador competitivos y el modo multijugador cooperativo de campaña durante la producción, pero se decidió eliminarlos debido a las limitaciones tecnológicas.', '[value-5]', '[value-6]', '1.00', '20.00', '50.50', 'https://i.blogs.es/26f704/bullet01/1366_2000.jpg'),
(2, 'Runes Of Magic', 3, 'https://static.tvtropes.org/pmwiki/pub/images/runes_of_magic_box.png', 'Runes of Magic es un videojuego de rol multijugador masivo en línea (MMORPG) gratuito desarrollado por el estudio taiwanés Runewaker Entertainment y adaptado a varios mercados europeos y americanos por la empresa alemana Frogster Interactive. Después de haber pasado por una fase de beta pública, el videojuego fue lanzado oficialmente el 19 de marzo de 2009. Posteriormente, el Capítulo II - The Elven Prophecy, una importante actualización del juego, fue lanzado el 15 de septiembre de 2009, tanto por descarga directa como en tiendas especializadas,3​ y varios meses después, el 18 de mayo de 2010, se publicó oficialmente un nuevo capítulo del juego, el Capítulo III - The Elder Kingdoms, de la misma forma que el anterior.4​ El 16 de agosto de 2010, Frogster anunció que se habían registrado cuatro millones de usuarios en todo el mundo.5​ El último capítulo de la saga, el Capítulo IV - Land of Despair, fue lanzado el 16 de junio de 2010.\r\n', '[value-5]', '[value-6]', '1.99', '10.99', '20.99', 'https://www.playonmac.com/images/apps/med/1448.jpg'),
(3, 'Republique', 6, 'https://images.launchbox-app.com/2aa62af4-5efc-46b0-8d91-3a3f5380f24a.jpg', 'République es un videojuego de terror perteneciente al género de supervivencia y sigilo, desarrollado por Camouflaj LLC y Logan Games. El juego fue anunciado originalmente para los dispositivos iOS, pero desde entonces se ha ampliado para OS X, Windows y PlayStation 4. Una campaña de Kickstarter micromecenazgo se completó con éxito el 11 de mayo de 2012, recaudando más de $550.000 dólares. El primer episodio, Exordio, fue lanzado para iOS el 19 de diciembre de 2013, y para Mac OS X y Windows el 2014. El segundo episodio, Metamorfosis, fue lanzado para iOS el 30 de abril de 2014.1​ El episodio 3 \"Unos y Ceros\" fue lanzado el 20 de octubre de 2014. La versión del episodio 3 para Microsoft Windows y OS X, fue liberada junto con los dos episodios anteriores el 26 de febrero de 2015. La versión de Linux y SteamOs ha sido cancelada.', '[value-5]', '[value-6]', '1.99', '10.99', '20.99', 'https://cdn.akamai.steamstatic.com/steam/apps/317100/ss_98633c5df4116662d2cfcc1b7ac7ac9cc2fcaa77.1920x1080.jpg?t=1592319703'),
(4, 'Starfield', 3, 'https://i.3djuegos.com/juegos/15956/starfield/fotos/ficha/starfield-5462900.jpg', 'Starfield es un próximo videojuego de rol de ciencia ficción desarrollado por Bethesda Game Studios. Durante la conferencia de Microsoft + Bethesda del E3 2021, se reveló que Starfield se lanzará para Xbox Series y PC el 11 de noviembre de 2022.1​  Desarrollo Según el director Todd Howard, la premisa y concepto de Starfield estaba rondando el estudio antes de septiembre de 2013.2​ Después del lanzamiento de Fallout 4 en 2015, la desarrolladora se encontraba empezando preproducción del videojuego, y no fue hasta mediados de 2018 cuando el juego estaba en un estado considerado \"jugable\".3​  El videojuego se anunció en la conferencia de E3 2018 por el director de Bethesda, Todd Howard.4​5​ El 11 de junio de 2018 la desarrolladora publicó un teaser que informó que era la primera licencia nueva de la compañía en 25 años.6​ La empresa también anunció que el videojuego usará el motor gráfico Creation Engine, empleado por otros de sus juegos como The Elder Scrolls V: Skyrim.7​  En la conferencia de Microsoft + Bethesda de junio de 2021, Starfield fue oficialmente fijado para su lanzamiento el 11 de noviembre de 2021. El teaser tráiler presentado en la conferencia confirmó la utilización de una nueva versión del motor Creation Engine, titulada Creation Engine 2.  En una entrevista con The Washington Post, Starfield ha sido descrito como \"el simulador de Han Solo\" por el director gerente de Bethesda Ashley Cheng.8​ Howard comentó en la fecha de lanzamiento, añadiendo: \"Tenemos confianza en esta fecha. Si no, no la habríamos anunciado.\"9', '[value-5]', '[value-6]', '1.99', '10.99', '20.99', 'https://sm.ign.com/ign_es/gallery/s/starfield-/starfield-concept-art_xcvx.jpg'),
(5, 'Silk Song', 1, 'https://www.ultimagame.es/hollow-knight-silksong/imagen-i16828-pge.jpg', 'Hollow Knight: Silksong es un Metroidvania de acción y aventura en dos dimensiones y tiene lugar en un reino mordaz habitado por bichos.  Su jugabilidad es extensamente parecida a la de su predecesor. El jugador controla a Hornet, una criatura insectoide quién empuña una aguja para combatir enemigos. Durante su aventura, Hornet se encuentra con muchas criaturas hostiles.  Se espera que el juego contenga más de 165 enemigos diferentes.1​ Hornet también encontrará muchos aliados en calidad de Personaje no jugador.  Silksong contará con misiones, en donde distintos personajes le pedirán ayuda a la protagonista. Estas se pueden clasificar en cuatro categorías: de caza, de acumular, de explorar y de la gran caza. Hornet será capaz de forjar armas y herramientas a partir de materiales, los cuales pueden ser un sustituto del sistema de amuletos en Hollow Knight.  El sistema de punto de control del primer juego regresará en Silksong.  En vez de utilizar alma para curarse como lo hace el Caballero de Hollow Knight, Hornet utiliza seda. Puede curarse casi instantáneamente tres máscaras de daño, estando en movimiento, en vez de necesitar estar estático para curar una sola máscara a la vez, como en el caso del Caballero de la primera entrega, lo cual lo ponía en peligro de recibir más daño del que podía curar. Sin embargo, la desventaja que tiene Hornet es que esta acción le agota su barra entera de seda. Cuando muere, en vez de dejar una Sombra como lo hace el Caballero , Hornet deja un haz de seda.', '[value-5]', '[value-6]', '1.99', '10.99', '20.99', 'https://as01.epimg.net/meristation/imagenes/2019/12/14/noticias/1576341361_005563_1576341527_noticia_normal.jpg'),
(6, 'Loop Hero', 2, 'https://cdn1.epicgames.com/ff50f85ed609454e80ac46d9496da34d/offer/EGS_TheLichhasthrowntheworldintoatimelessloop_FourQuarters_S2-1200x1600-9ce7ff725ffafa800300b644df5936cd.jpg', 'Cada expedición comienza con el héroe siguiendo un camino pre-generado en un paisaje vacío. Babosas aparecen periódicamente a lo largo del camino que, cuando se encuentran, el héroe lucha con ellas y las mata. A medida que el héroe mata a los enemigos, el jugador recibe cartas de paisaje. Las cartas de paisaje permiten al jugador colocar varias características del terreno alrededor del camino del héroe, como montañas, prados, bosques y edificios. Cada característica del terreno resulta en un efecto diferente, como restaurar la salud del jugador al final de cada día, aumentar la velocidad del movimiento del jugador, o generar enemigos periódicamente. Colocar las características del terreno una al lado de la otra también puede modificar su efecto. Por ejemplo, si se juntan suficientes montañas, se combinan y proporcionan salud adicional, mientras que también engendran un nuevo tipo de enemigo que luchará contra el héroe.', '[value-5]', '[value-6]', '1.99', '10.99', '20.99', 'http://127.0.0.1/public/images/PORTADA_62697d5bd53e1.jpg'),
(7, 'Cris Tales', 3, 'http://127.0.0.1/public/images/871061921599550251_62698468697a1.jpg', 'Crisbell es una chica huérfana que vive en el orfanato de Narim. Mientras recogía una rosa para la madre superiora, Matias, una rana parlante, se la arrebata. Matias dirige a Crisbell a la catedral de Narim, con tal de desatar sus poderes. Tras los hechos, Matias le pide a Crisbell que lo acompañe donde su amigo Willhelm, un mago del tiempo, quien le explica más sobre sus poderes.  Posteriormente, Crisbell es encomendada en una serie de misiones ayudando a sus vecinos, hasta que se encuentra con la granja del pueblo en llamas e invadida por los duendes de la Emperatriz de las Eras, cuyo objetivo es destruir el reino de Crystallis. Para evitar un futuro desastroso, Crisbell regresa donde Willhelm a pedir ayuda, y este le habla sobre la \"Espada\". Matias se rehúsa por miedo a que los poderes de la espada sean demasiados para Crisbell; esta sin embargo, está determinada a coger la espada, pasando a ser una guerrera.  Con la espada en mano, Crisbell regresa a la granja a batallar contra los duendes. Durante la batalla, se le une Cristopher, un guerrero que estuvo luchando contra los duendes. Tras un par de batallas, se les enfrentan las hermanas Volcano, esbirras de la Emperatriz de las Eras, en el que Crisbell debe usar los poderes del cristal para debilitar su escudo en el futuro. Después de algunos turnos, las hermanas se retiran.  Crisbell es entonces acusada de provocar los ataques y debe exiliarse con tal de entrenar y luchar contra los verdaderos enemigos.', '[value-5]', '[value-6]', '1.99', '10.99', '20.99', 'http://127.0.0.1/public/images/00_xxl_6269846863c2d.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_commentaries`
--

CREATE TABLE `project_commentaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_project` bigint(20) UNSIGNED NOT NULL,
  `commentary` varchar(500) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'user', 'Usuario básico', NULL, NULL),
(2, 'creator', 'Creador de contenido', NULL, NULL),
(3, 'administrator', 'Administrador de las bases de datos', NULL, NULL),
(4, 'user-mid', 'Usuario con acceso a novedades', NULL, NULL),
(5, 'user-all', 'Usuario con acceso completo', NULL, NULL),
(6, 'creator-mid', 'Creador medio', NULL, NULL),
(7, 'creator-all', 'Creador con acceso completo', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 1, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Andrés', 'alderan133@gmail.com', NULL, '$2y$10$VqNPwrx00h0ArYjOeg0R4uR0Vhb4JMPtGSXK1iQAFK.YliAEI9SxK', NULL, '2022-05-08 07:39:19', '2022-05-08 07:39:19'),
(2, 'Rosa', 'inventada@inventada.com', NULL, '$2y$10$abfBcU6eg2Y9n0IV62Vnpuu.CCoJ4AqqB7FDkXvDgBYsuWqh3tn6O', NULL, '2022-05-08 14:19:55', '2022-05-08 14:19:55'),
(3, 'Alicia', 'invento@invento.com', NULL, '$2y$10$x/UzMnK0jYY9inI8jK8OUev7atdpAe1e5vVjyKI3h82hZ7qAUnrda', NULL, '2022-05-08 14:20:12', '2022-05-08 14:20:12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre` (`genre`);

--
-- Indices de la tabla `game_commentaries`
--
ALTER TABLE `game_commentaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_game` (`id_game`);

--
-- Indices de la tabla `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id_game`,`id_player`),
  ADD KEY `id_player` (`id_player`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

--
-- Indices de la tabla `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id_project`,`id_creator`),
  ADD KEY `id_creator` (`id_creator`);

--
-- Indices de la tabla `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre` (`genre`);

--
-- Indices de la tabla `project_commentaries`
--
ALTER TABLE `project_commentaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_project` (`id_project`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `games`
--
ALTER TABLE `games`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`genre`) REFERENCES `genres` (`id`);

--
-- Filtros para la tabla `game_commentaries`
--
ALTER TABLE `game_commentaries`
  ADD CONSTRAINT `game_commentaries_ibfk_1` FOREIGN KEY (`id_game`) REFERENCES `games` (`id`);

--
-- Filtros para la tabla `library`
--
ALTER TABLE `library`
  ADD CONSTRAINT `library_ibfk_1` FOREIGN KEY (`id_game`) REFERENCES `games` (`id`),
  ADD CONSTRAINT `library_ibfk_2` FOREIGN KEY (`id_player`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `plans`
--
ALTER TABLE `plans`
  ADD CONSTRAINT `plans_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `portfolio_ibfk_1` FOREIGN KEY (`id_creator`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `portfolio_ibfk_2` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`);

--
-- Filtros para la tabla `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`genre`) REFERENCES `genres` (`id`);

--
-- Filtros para la tabla `project_commentaries`
--
ALTER TABLE `project_commentaries`
  ADD CONSTRAINT `project_commentaries_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id`);

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
