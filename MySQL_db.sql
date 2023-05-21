CREATE DATABASE re_db;
USE re_db;

CREATE TABLE `re_db`.`re4_objetos` (`id` INT(4) NOT NULL AUTO_INCREMENT , `nombre` VARCHAR(30) NOT NULL , `descripcion` VARCHAR(120) NOT NULL , `tipo` INT(4) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
CREATE TABLE `re_db`.`re4_tipos` (`id` INT(4) NOT NULL AUTO_INCREMENT , `nombreTipo` VARCHAR(30) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `re4_objetos` ADD CONSTRAINT `fk_types_objects` FOREIGN KEY (`tipo`) REFERENCES `re4_tipos`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;


INSERT INTO `re4_tipos` (`id`, `nombreTipo`) VALUES ('1', 'Material');
INSERT INTO `re4_tipos` (`id`, `nombreTipo`) VALUES (NULL, 'Arma');
INSERT INTO `re4_tipos` (`id`, `nombreTipo`) VALUES (NULL, 'Personaje');
INSERT INTO `re4_tipos` (`id`, `nombreTipo`) VALUES (NULL, 'Moneda');


INSERT INTO `re4_objetos` (`id`, `nombre`, `descripcion`, `tipo`) VALUES ('1', 'Pólvora', 'Material para crear balas.', '1');
INSERT INTO `re4_objetos` (`id`, `nombre`, `descripcion`, `tipo`) VALUES (NULL, 'Escopeta', 'Arma de alto impacto.', '2');
INSERT INTO `re4_objetos` (`id`, `nombre`, `descripcion`, `tipo`) VALUES (NULL, 'Ashley', 'Personaje femenino al cual Leon debe de rescatar.', '3');
INSERT INTO `re4_objetos` (`id`, `nombre`, `descripcion`, `tipo`) VALUES (NULL, 'Leon Kennedy', 'Personaje protagonista del juego.', '3');
INSERT INTO `re4_objetos` (`id`, `nombre`, `descripcion`, `tipo`) VALUES (NULL, 'Pesetas', 'Moneda del juego para comprar objetos.', '4');
INSERT INTO `re4_objetos` (`id`, `nombre`, `descripcion`, `tipo`) VALUES (NULL, 'Ada Wong', 'Personaje femenino que se encarga de recordarle a Leon porque su vida es una constante catástrofe.', '3');


--/* ---------- THIS IF FOR THE FORUM  ----------------- */


--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `post` text NOT NULL,
  `date` datetime NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `comments` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `post`, `date`, `parent_id`, `comments`) VALUES
(1, 1, 'What is this forum about?', '2023-02-06 16:30:16', 0, 5),
(2, 1, 'This is about Resident Evil!', '2023-02-10 20:59:06', 1, 0),
(3, 2, 'You can ask questions about games', '2023-02-10 21:11:26', 1, 0),
(4, 3, 'Or rather start threads of chat', '2023-02-10 21:11:48', 1, 0),
(5, 4, 'But PLEASE be respectful', '2023-02-10 21:13:08', 1, 0),
(6, 3, 'Or you can get banned!', '2023-02-10 21:14:25', 1, 0),
(7, 1, 'Ashley is best character. Change my mind!!', '2023-04-30 13:20:30', 0, 3),
(8, 4, 'Yes she is !!!', '2023-04-30 23:25:30', 7, 0),
(9, 2, 'Absoltuely', '2023-04-30 23:59:30', 7, 0),
(10, 3, 'Totaly agreed', '2023-04-30 23:59:42', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `fb` varchar(100) DEFAULT NULL,
  `tw` varchar(100) DEFAULT NULL,
  `yt` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `users` ADD `banned` VARCHAR(10) NOT NULL DEFAULT 'false' AFTER `yt`;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `date`, `image`, `bio`, `fb`, `tw`, `yt`) VALUES
(1, 'Jesus', 'jesus.santos364@gmail.com', '$2y$10$Qm7rTJLrn24qALQoogbRMeHdEtzcHMIKHXrwtiYx5GXXquykeyI6i', '2023-04-30', 'uploads/__son_goku_vegeta_and_broly_dragon_ball_and_3_more_drawn_by_hk_chaaan__sample-a464c69d0747bfada10ef96942ae59d9.jpg', 'Just Chillin','','',''),
(2, 'Edi', 'ediandgow@gmail.com', '$2y$10$WDruPDkxVdIAObtOXY/kPumiJ5CGi.zsRbDMjqtuOnhRbJDhQ5E2O', '2023-04-30', 'uploads/minecraftponys.jpg', 'Desperao','','',''),
(3, 'Ignacio', 'i.esquivel@gmail.com', '$2y$10$4ifnMx12Tb7flJJu1XrOA.tjygVwNxrDhY7SZzAmM.dG.hKfm.UQW', '2023-04-30', 'uploads/ignacio.jpg', "Did you think we'd be fine? Still got scars on my back from your knife So don't think it's in the past These kind of wounds they last",'','',''),
(4, 'Marii', 'marii.goddess@gmail.com', '$2y$10$ba2VykJCZmTxx20RZNTh2.bMIOy5EudrjA6TIHdNkWWKz1D5Cuu26', '2023-04-30', 'uploads/mysterious_eyes.jpeg', "Just keep breathing dear",'','','');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `comments` (`comments`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

ALTER TABLE `users` ADD `admin` int NOT NULL DEFAULT '0' AFTER `banned`;

UPDATE `users` SET `admin` = '1' WHERE `users`.`id` = 1;
UPDATE `users` SET `admin` = '1' WHERE `users`.`id` = 2;
UPDATE `users` SET `admin` = '1' WHERE `users`.`id` = 3;
UPDATE `users` SET `admin` = '1' WHERE `users`.`id` = 4;


