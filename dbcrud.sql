-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2018 a las 20:58:15
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbcrud`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteUser` (`id` INT)  BEGIN
DELETE FROM users WHERE users.Id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetUsers` ()  BEGIN
SELECT * FROM users ORDER BY users.Name ASC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertUser` (`name` VARCHAR(100), `username` VARCHAR(30), `passwordd` VARCHAR(30))  BEGIN
INSERT INTO users(users.Name,users.Username,users.Password) VALUES (name,username,passwordd);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Login` (`username` VARCHAR(30), `passwordd` VARCHAR(30))  BEGIN

SELECT * FROM users WHERE  users.Username = username AND users.Password = passwordd;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SearchByUsername` (`filter` TEXT)  BEGIN
SELECT * FROM users WHERE users.Name LIKE CONCAT('%',filter,'%') OR
users.Username LIKE CONCAT('%',filter,'%') OR users.Password LIKE CONCAT('%',filter,'%');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectUserById` (`id` INT)  BEGIN
SELECT * FROM users WHERE users.Id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateUser` (`id` INT, `name` VARCHAR(100), `username` VARCHAR(30), `passwordd` VARCHAR(30))  BEGIN
UPDATE users SET users.Name = name,users.Username= username, users.Password= passwordd WHERE users.Id = id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) COLLATE armscii8_bin NOT NULL,
  `Username` varchar(30) COLLATE armscii8_bin NOT NULL,
  `Password` varchar(30) COLLATE armscii8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`Id`, `Name`, `Username`, `Password`) VALUES
(1, 'Daniel Ramirez Martinez', 'dany', '123'),
(3, 'Jose', 'jose', '123456'),
(4, 'Edgar', 'thiiko', '22333'),
(5, 'alicia', 'aly', '8899'),
(6, 'silvia', 'silvia', '23334'),
(7, 'ramses', 'ram', '89990'),
(8, 'coco', 'cc', '87655');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
