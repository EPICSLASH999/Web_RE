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
(1, 1, 'This is my first post', '2023-02-06 16:30:16', 0, 0),
(2, 1, 'this is my second post', '2023-02-06 16:49:15', 0, 0),
(3, 1, 'this is my third post', '2023-02-06 16:50:19', 0, 0),
(4, 1, 'this is my fourth post', '2023-02-06 17:07:56', 0, 1),
(5, 1, 'post number 5', '2023-02-06 17:17:48', 0, 0),
(6, 4, 'a post by mary and some other guy', '2023-02-10 16:31:06', 0, 0),
(10, 4, 'a comment by mary', '2023-02-10 20:59:06', 0, 0),
(11, 4, 'another post by mary', '2023-02-10 20:59:51', 0, 5),
(13, 4, 'a real comment by mary', '2023-02-10 21:11:26', 11, 0),
(14, 4, 'a second comment by mary', '2023-02-10 21:11:48', 11, 0),
(15, 4, 'a third comment', '2023-02-10 21:13:08', 11, 0),
(16, 4, 'a comment on eathornes post', '2023-02-10 21:14:25', 4, 0),
(17, 1, 'a comment by eathorne', '2023-02-10 21:18:13', 11, 0),
(18, 5, 'Hi, this is my first post as john doe', '2023-02-10 23:20:02', 0, 1),
(19, 5, 'a comment by john does on his own post', '2023-02-10 23:20:17', 18, 0),
(20, 5, 'hey there guys', '2023-02-10 23:20:30', 11, 0),
(21, 6, 'Ashley is best character. Change my mind!!', '2023-04-30 13:20:30', 0, 3),
(22, 1, 'Yes she is !!!', '2023-04-30 23:25:30', 21, 0),
(23, 4, 'Absoltuely', '2023-04-30 23:59:30', 21, 0),
(24, 5, 'Totaly agreed', '2023-04-30 23:59:42', 21, 0);

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
(1, 'Eathorne', 'email@email.com', '$2y$10$RFbYu7mI0HO9wdw9DOmUzOnJ.WQ5BXKdCQ1zBwvcn2p0jk/vuOX0W', '2023-02-06', 'uploads/pleasant-looking-serious-man-stands-profile-has-confident-expression-wears-casual-white-t-shirt_273609-16959.jpg', '', '', '', ''),
(4, 'Mary', 'mary@email.com', '$2y$10$KTT/.zlqv7IOGSWWulVfyO5p54aIUCOZGeB/z.GPnmb7APBUEoRQG', '2023-02-06', 'uploads/3a81e77938749a87147a1aac240fad33.jpg', 'this is my bio info', '', '', 'https://youtube.com'),
(5, 'John Doe', 'john@email.com', '$2y$10$BIrG/UguHw4cPGKygtNj9.quHe7XcT1Wr0YfrO3lfTeBLLmSRngjK', '2023-02-10', 'uploads/vllkyt7dg1hrovc8i.jpg', '', '', '', ''),
(6, 'jesus', 'jesus.santos364@gmail.com', '$2y$10$Qm7rTJLrn24qALQoogbRMeHdEtzcHMIKHXrwtiYx5GXXquykeyI6i', '2023-04-30', 'uploads/__son_goku_vegeta_and_broly_dragon_ball_and_3_more_drawn_by_hk_chaaan__sample-a464c69d0747bfada10ef96942ae59d9.jpg', 'Just Chillin','','','');

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


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
