-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : mer. 03 déc. 2025 à 10:29
-- Version du serveur : 8.4.7
-- Version de PHP : 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_web_film`
--

-- --------------------------------------------------------

--
-- Structure de la table `films`
--

CREATE TABLE `films` (
  `idFilm` int NOT NULL,
  `titre` varchar(68) DEFAULT NULL,
  `annee` varchar(4) DEFAULT NULL,
  `genres` varchar(100) CHARACTER SET utf8mb4 DEFAULT NULL,
  `realisateur` varchar(30) DEFAULT NULL,
  `acteursPrincipaux` varchar(38) DEFAULT NULL,
  `pays` varchar(40) DEFAULT NULL,
  `classementIMDB` varchar(11) DEFAULT NULL,
  `duree` varchar(14) DEFAULT NULL,
  `oscarGagne` varchar(10) DEFAULT NULL,
  `boxOffice` varchar(15) DEFAULT NULL,
  `IdIMDB` varchar(60) DEFAULT NULL,
  `affiche` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`idFilm`, `titre`, `annee`, `genres`, `realisateur`, `acteursPrincipaux`, `pays`, `classementIMDB`, `duree`, `oscarGagne`, `boxOffice`, `IdIMDB`, `affiche`) VALUES
(1, 'The Shawshank Redemption', '1994', 'Drame', 'Frank Darabont', 'Tim Robbins|Morgan Freeman', 'États-Unis', '9.3', '142', '0', '58.0', 'tt0111161', 'https://image.tmdb.org/t/p/w200/9cqNxx0GxF0bflZmeSMuL5tnGzr.jpg'),
(2, 'The Godfather', '1972', 'Crime|Drame', 'Francis Ford Coppola', 'Marlon Brando|Al Pacino', 'États-Unis', '9.2', '175', '3', '246.1', 'tt0068646', 'https://image.tmdb.org/t/p/w200/3bhkrj58Vtu7enYsRolD1fZdja1.jpg'),
(3, 'The Dark Knight', '2008', 'Action|Crime|Drame', 'Christopher Nolan', 'Christian Bale|Heath Ledger', 'États-Unis|Royaume-Uni', '9.0', '152', '2', '1004.9', 'tt0468569', 'https://image.tmdb.org/t/p/w200/qJ2tW6WMUDux911r6m7haRef0WH.jpg'),
(4, 'The Godfather: Part II', '1974', 'Crime|Drame', 'Francis Ford Coppola', 'Al Pacino|Robert De Niro', 'États-Unis', '9.0', '202', '6', '48.5', 'tt0071562', 'https://image.tmdb.org/t/p/w200/hek3koDUyRQk7FIhPXsa6mT2Zc3.jpg'),
(5, '12 Angry Men', '1957', 'Crime|Drame', 'Sidney Lumet', 'Henry Fonda|Lee J. Cobb', 'États-Unis', '9.0', '96', '0', '1.0', 'tt0050083', 'https://image.tmdb.org/t/p/w200/ow3wq89wM8qd5X7hWKxiRfsFf9C.jpg'),
(6, 'The Lord of the Rings: The Return of the King', '2003', 'Aventure|Drame|Fantaisie', 'Peter Jackson', 'Elijah Wood|Viggo Mortensen', 'Nouvelle Zélande|États-Unis|Royaume-Uni', '8.9', '201', '11', '1119.9', 'tt0167260', 'https://image.tmdb.org/t/p/w200/rCzpDGLbOoPwLjy3OAm5NUPOTrC.jpg'),
(7, 'Schindler\'s List', '1993', 'Biographie|Drame|Histoire', 'Steven Spielberg', 'Liam Neeson|Ralph Fiennes', 'États-Unis|Pologne', '8.9', '195', '7', '322.1', 'tt0108052', 'https://image.tmdb.org/t/p/w200/sF1U4EUQS8YHUYjNl3pMGNIQyr0.jpg'),
(8, 'The Lord of the Rings: The Fellowship of the Ring', '2001', 'Aventure|Drame|Fantaisie', 'Peter Jackson', 'Elijah Wood|Ian McKellen', 'Nouvelle Zélande|États-Unis|Royaume-Uni', '8.8', '178', '4', '871.5', 'tt0120737', 'https://image.tmdb.org/t/p/w200/6oom5QYQ2yQTMJIbnvbkBL9cHo6.jpg'),
(9, 'Inception', '2010', 'Action|Science Fiction|Thriller', 'Christopher Nolan', 'Leonardo DiCaprio|Joseph Gordon-Levitt', 'États-Unis|Royaume-Uni', '8.8', '148', '4', '836.8', 'tt1375666', 'https://image.tmdb.org/t/p/w200/xlaY2zyzMfkhk0HSC5VUwzoZPU1.jpg'),
(10, 'Star Wars: Episode V – The Empire Strikes Back', '1980', 'Action|Aventure|Science Fiction', 'Irvin Kershner', 'Mark Hamill|Harrison Ford', 'États-Unis', '8.7', '124', '0', '538.4', 'tt0080684', 'https://image.tmdb.org/t/p/w200/nNAeTmF4CtdSgMDplXTDPOpYzsX.jpg'),
(11, 'The Lord of the Rings: The Two Towers', '2002', 'Aventure|Drame|Fantaisie', 'Peter Jackson', 'Elijah Wood|Ian McKellen', 'Nouvelle Zélande|États-Unis|Royaume-Uni', '8.7', '179', '2', '926.0', 'tt0167261', 'https://image.tmdb.org/t/p/w200/5VTN0pR8gcqV3EPUHHfMGnJYN9L.jpg'),
(12, 'Fight Club', '1999', 'Drame', 'David Fincher', 'Brad Pitt|Edward Norton', 'États-Unis|Allemagne', '8.8', '139', '0', '100.9', 'tt0137523', 'https://image.tmdb.org/t/p/w200/pB8BM7pdSp6B6Ih7QZ4DrQ3PmJK.jpg'),
(13, 'Forrest Gump', '1994', 'Drame|Romance', 'Robert Zemeckis', 'Tom Hanks|Robin Wright', 'États-Unis', '8.8', '142', '6', '678.2', 'tt0109830', 'https://image.tmdb.org/t/p/w200/saHP97rTPS5eLmrLQEcANmKrsFl.jpg'),
(14, 'The Matrix', '1999', 'Action|Science Fiction', 'Lana Wachowski|Lilly Wachowski', 'Keanu Reeves|Laurence Fishburne', 'États-Unis|Australie', '8.7', '136', '4', '466.3', 'tt0133093', 'https://image.tmdb.org/t/p/w200/p96dm7sCMn4VYAStA6siNz30G1r.jpg'),
(15, 'Goodfellas', '1990', 'Biographie|Crime|Drame', 'Martin Scorsese', 'Ray Liotta|Robert De Niro', 'États-Unis', '8.7', '146', '1', '47.0', 'tt0099685', 'https://image.tmdb.org/t/p/w200/aKuFiU82s5ISJpGZp7YkIr3kCUd.jpg'),
(16, 'One Flew Over the Cuckoo\'s Nest', '1975', 'Drame', 'Miloš Forman', 'Jack Nicholson|Louise Fletcher', 'États-Unis|Royaume-Uni', '8.7', '133', '5', '162.0', 'tt0073486', 'https://image.tmdb.org/t/p/w200/kjWsMh72V6d8KRLV4EOoSJLT1H7.jpg'),
(17, 'Se7en', '1995', 'Crime|Drame|Mystère', 'David Fincher', 'Morgan Freeman|Brad Pitt', 'États-Unis', '8.6', '127', '0', '327.3', 'tt0114369', 'https://image.tmdb.org/t/p/w200/191nKfP0ehp3uIvWqgPbFmI4lv9.jpg'),
(18, 'Seven Samurai', '1954', 'Action|Drame', 'Akira Kurosawa', 'Toshirō Mifune|Takashi Shimura', 'Japon', '8.6', '207', '0', '0.0', 'tt0047478', 'https://image.tmdb.org/t/p/w200/lOMGc8bnSwQhS4XyE1S99uH8NXf.jpg'),
(19, 'City of God', '2002', 'Crime|Drame', 'Fernando Meirelles|Kátia Lund', 'Alexandre Rodrigues|Leandro Firmino', 'Brésil', '8.6', '130', '0', '30.6', 'tt0317248', 'https://image.tmdb.org/t/p/w200/k7eYdWvhYQyRQoU2TB2A2Xu2TfD.jpg'),
(20, 'Life Is Beautiful', '1997', 'Comedie|Drame|Romance', 'Roberto Benigni', 'Roberto Benigni|Nicoletta Braschi', 'Italie', '8.6', '116', '3', '229.1', 'tt0118799', 'https://image.tmdb.org/t/p/w200/mfnkSeeVOBVheuyn2lo4tfmOPQb.jpg'),
(21, 'The Silence of the Lambs', '1991', 'Crime|Drame|Thriller', 'Jonathan Demme', 'Jodie Foster|Anthony Hopkins', 'États-Unis', '8.6', '118', '5', '272.7', 'tt0102926', 'https://image.tmdb.org/t/p/w200/uS9m8OBk1A8eM9I042bx8XXpqAq.jpg'),
(22, 'It\'s a Wonderful Life', '1946', 'Drame|Fantaisie|Famille', 'Frank Capra', 'James Stewart|Donna Reed', 'États-Unis', '8.6', '130', '0', '3.3', 'tt0038650', 'https://image.tmdb.org/t/p/w200/mV3VcmMJN6Zwahj42dy9WwPUyRI.jpg'),
(23, 'The Usual Suspects', '1995', 'Crime|Mystère|Thriller', 'Bryan Singer', 'Kevin Spacey|Gabriel Byrne', 'États-Unis|Allemagne', '8.5', '106', '2', '66.8', 'tt0114814', 'https://image.tmdb.org/t/p/w200/99X2SgyFunJFXGAYnDv3sb9pnUD.jpg'),
(24, 'Léon: The Professional', '1994', 'Action|Crime|Drame', 'Luc Besson', 'Jean Reno|Natalie Portman', 'France|États-Unis', '8.5', '110', '0', '', 'tt0110413', 'https://image.tmdb.org/t/p/w200/bxB2q91nKYp8JNzqE7t7TWBVupB.jpg'),
(25, 'Spirited Away', '2001', 'Animation|Aventure|Famille', 'Hayao Miyazaki', 'Rumi Hiiragi|Miyu Irino', 'Japon', '8.6', '125', '1', '355.5', 'tt0245429', 'https://image.tmdb.org/t/p/w200/39wmItIWsg5sZMyRUHLkWBcuVCM.jpg'),
(26, 'Saving Private Ryan', '1998', 'Drame|Histoire|Guerre', 'Steven Spielberg', 'Tom Hanks|Matt Damon', 'États-Unis', '8.6', '169', '5', '481.8', 'tt0120815', 'https://image.tmdb.org/t/p/w200/uqx37cS8cpHg8U35f9U5IBlrCV3.jpg'),
(27, 'The Green Mile', '1999', 'Crime|Drame|Fantaisie', 'Frank Darabont', 'Tom Hanks|Michael Clarke Duncan', 'États-Unis', '8.6', '189', '0', '286.8', 'tt0120689', 'https://image.tmdb.org/t/p/w200/o0lO84GI7qrG6XFvtsPOSV7CTNa.jpg'),
(28, 'Parasite', '2019', 'Comedie|Drame|Thriller', 'Bong Joon Ho', 'Song Kang-ho|Cho Yeo-jeong', 'Corée du sud', '8.6', '132', '4', '258.8', 'tt6751668', 'https://image.tmdb.org/t/p/w200/7IiTTgloJzvGI1TAYymCfbfl3vT.jpg'),
(29, 'Interstellar', '2014', 'Aventure|Drame|Science Fiction', 'Christopher Nolan', 'Matthew McConaughey|Anne Hathaway', 'États-Unis|Royaume-Uni', '8.6', '169', '1', '677.5', 'tt0816692', 'https://image.tmdb.org/t/p/w200/gEU2QniE6E77NI6lCU6MxlNBvIx.jpg'),
(30, 'American History X', '1998', 'Crime|Drame', 'Tony Kaye', 'Edward Norton|Edward Furlong', 'États-Unis', '8.5', '119', '0', '23.9', 'tt0120586', 'https://image.tmdb.org/t/p/w200/x2drgoXYZ8484lqyDj7L1CEVR4T.jpg'),
(31, 'City Lights', '1931', 'Comedie|Drame|Romance', 'Charlie Chaplin', 'Charlie Chaplin|Virginia Cherrill', 'États-Unis', '8.5', '87', '0', '4.3', 'tt0021749', 'https://image.tmdb.org/t/p/w200/bXNvzjULc9jrOVhGfjcc64uKZmZ.jpg'),
(32, 'The Lion King', '1994', 'Animation|Aventure|Drame', 'Roger Allers|Rob Minkoff', 'Matthew Broderick|Jeremy Irons', 'États-Unis', '8.5', '88', '2', '968.5', 'tt0110357', 'https://image.tmdb.org/t/p/w200/sKCr78MXSLixwmZ8DyJLrpMsd15.jpg'),
(33, 'Back to the Future', '1985', 'Aventure|Comedie|Science Fiction', 'Robert Zemeckis', 'Michael J. Fox|Christopher Lloyd', 'États-Unis', '8.5', '116', '1', '388.8', 'tt0088763', 'https://image.tmdb.org/t/p/w200/vN5B5WgYscRGcQpVhHl6p9DDTP0.jpg'),
(34, 'Terminator 2: Judgment Day', '1991', 'Action|Science Fiction', 'James Cameron', 'Arnold Schwarzenegger|Linda Hamilton', 'États-Unis', '8.5', '137', '4', '520.9', 'tt0103064', 'https://image.tmdb.org/t/p/w200/jFTVD4XoWQTcg7wdyJKa8PEds5q.jpg'),
(35, 'Modern Times', '1936', 'Comedie|Drame', 'Charlie Chaplin', 'Charlie Chaplin|Paulette Goddard', 'États-Unis', '8.5', '87', '0', '1.5', 'tt0027977', 'https://image.tmdb.org/t/p/w200/eqLVa5YQg5FmmDi3vbm46KgcPDq.jpg'),
(36, 'Once Upon a Time in the West', '1968', 'Western', 'Sergio Leone', 'Henry Fonda|Claudia Cardinale', 'Italie|États-Unis', '8.5', '165', '0', '5.3', 'tt0064116', 'https://image.tmdb.org/t/p/w200/qbYgqOczabWNn2XKwgMtVrntD6P.jpg'),
(37, 'Alien', '1979', 'Horreur|Science Fiction', 'Ridley Scott', 'Sigourney Weaver|Tom Skerritt', 'Royaume-Uni|États-Unis', '8.4', '117', '1', '104.9', 'tt0078748', 'https://image.tmdb.org/t/p/w200/vfrQk5IPloGg1v9Rzbh2Eg3VGyM.jpg'),
(38, 'The Pianist', '2002', 'Biographie|Drame|Musique', 'Roman Polanski', 'Adrien Brody|Thomas Kretschmann', 'France|Pologne|Allemagne', '8.5', '150', '3', '120.1', 'tt0253474', 'https://image.tmdb.org/t/p/w200/2hFvxCCWrTmCYwfy7yum0GKRi3Y.jpg'),
(39, 'The Departed', '2006', 'Crime|Drame|Thriller', 'Martin Scorsese', 'Leonardo DiCaprio|Matt Damon', 'États-Unis', '8.5', '151', '4', '291.5', 'tt0407887', 'https://image.tmdb.org/t/p/w200/nT97ifVT2J1yMQmeq20Qblg61T.jpg'),
(40, 'Gladiator', '2000', 'Action|Aventure|Drame', 'Ridley Scott', 'Russell Crowe|Joaquin Phoenix', 'États-Unis|Royaume-Uni', '8.5', '155', '5', '465.5', 'tt0172495', 'https://image.tmdb.org/t/p/w200/ty8TGRuvJLPUmAR1H1nRIsgwvim.jpg'),
(41, 'Apocalypse Now', '1979', 'Drame|Guerre|Aventure', 'Francis Ford Coppola', 'Martin Sheen|Marlon Brando', 'États-Unis', '8.4', '147', '2', '', 'tt0078788', 'https://image.tmdb.org/t/p/w200/gQB8Y5RCMkv2zwzFHbUJX3kAhvA.jpg'),
(42, 'Dr. Strangelove or: How I Learned to Stop Worrying and Love the Bomb', '1964', 'Comedie|Satire', 'Stanley Kubrick', 'Peter Sellers|George C. Scott', 'Royaume-Uni|États-Unis', '8.4', '95', '0', '', 'tt0057012', 'https://image.tmdb.org/t/p/w200/7SixLzxcqezkZEYU8pcHZgbkmjp.jpg'),
(43, 'The Great Dictator', '1940', 'Comedie|Drame|Satire', 'Charlie Chaplin', 'Charlie Chaplin|Paulette Goddard', 'États-Unis', '8.4', '125', '0', '', 'tt0032553', 'https://image.tmdb.org/t/p/w200/1QpO9wo7JWecZ4NiBuu625FiY1j.jpg'),
(44, 'Memento', '2000', 'Crime|Mystère|Thriller', 'Christopher Nolan', 'Guy Pearce|Carrie-Anne Moss', 'États-Unis', '8.4', '113', '0', '39.7', 'tt0209144', 'https://image.tmdb.org/t/p/w200/fKTPH2WvH8nHTXeBYBVhawtRqtR.jpg'),
(45, 'Rashomon', '1950', 'Drame|Mystère|Crime', 'Akira Kurosawa', 'Toshirō Mifune|Machiko Kyō', 'Japon', '8.2', '88', '0', '', 'tt0042876', 'https://image.tmdb.org/t/p/w200/vL7Xw04nFMHwnvXRFCmYYAzMUvY.jpg'),
(46, 'Chinatown', '1974', 'Crime|Drame|Mystère', 'Roman Polanski', 'Jack Nicholson|Faye Dunaway', 'États-Unis', '8.2', '131', '1', '29.2', 'tt0071315', 'https://image.tmdb.org/t/p/w200/kZRSP3FmOcq0xnBulqpUQngJUXY.jpg'),
(47, 'The Third Man', '1949', 'Film-Noir|Mystère', 'Carol Reed', 'Joseph Cotten|Orson Welles', 'Royaume-Uni', '8.1', '104', '1', '', 'tt0041959', 'https://image.tmdb.org/t/p/w200/rO2Fq0AZZx9obs52KJdx4mRE8p5.jpg'),
(48, 'North by Northwest', '1959', 'Action|Aventure|Mystère', 'Alfred Hitchcock', 'Cary Grant|Eva Marie Saint', 'États-Unis', '8.3', '136', '0', '', 'tt0053125', 'https://image.tmdb.org/t/p/w200/kNOFPQrel9YFCVzI0DF8FnCEpCw.jpg'),
(49, 'Vertigo', '1958', 'Drame|Mystère|Romance', 'Alfred Hitchcock', 'James Stewart|Kim Novak', 'États-Unis', '8.3', '128', '0', '7.3', 'tt0052357', 'https://image.tmdb.org/t/p/w200/15uOEfqBNTVtDUT7hGBVCka0rZz.jpg'),
(50, 'The Apartment', '1960', 'Comedie|Drame|Romance', 'Billy Wilder', 'Jack Lemmon|Shirley MacLaine', 'États-Unis', '8.3', '125', '5', '24.6', 'tt0053604', 'https://image.tmdb.org/t/p/w200/hhSRt1KKfRT0yEhEtRW3qp31JFU.jpg'),
(51, 'Rear Window', '1954', 'Crime|Drame|Mystère', 'Alfred Hitchcock', 'James Stewart|Grace Kelly', 'États-Unis', '8.5', '111', '0', '37.9', 'tt0047396', 'https://image.tmdb.org/t/p/w200/ILVF0eJxHMddjxeQhswFtpMtqx.jpg'),
(52, 'A Clockwork Orange', '1971', 'Crime|Drame|Science Fiction', 'Stanley Kubrick', 'Malcolm McDowell|Patrick Magee', 'Royaume-Uni|États-Unis', '8.3', '136', '4', '114.0', 'tt0066921', 'https://image.tmdb.org/t/p/w200/4sHeTAp65WrSSuc05nRBKddhBxO.jpg'),
(53, 'Blade Runner', '1982', 'Science Fiction|Thriller', 'Ridley Scott', 'Harrison Ford|Rutger Hauer', 'États-Unis', '8.2', '117', '2', '32.9', 'tt0083658', 'https://image.tmdb.org/t/p/w200/63N9uy8nd9j7Eog2axPQ8lbr3Wj.jpg'),
(54, 'Taxi Driver', '1976', 'Crime|Drame|Thriller', 'Martin Scorsese', 'Robert De Niro|Jodie Foster', 'États-Unis', '8.3', '114', '1', '28.3', 'tt0075314', 'https://image.tmdb.org/t/p/w200/ekstpH614fwDX8DUln1a2Opz0N8.jpg'),
(55, 'The Good, the Bad and the Ugly', '1966', 'Western', 'Sergio Leone', 'Clint Eastwood|Eli Wallach', 'Italie|Espagne|Allemagne', '8.8', '161', '0', '25.1', 'tt0060196', 'https://image.tmdb.org/t/p/w200/bX2xnavhMYjWDoZp1VM6VnU1xwe.jpg'),
(56, 'The Graduate', '1967', 'Comedie|Drame|Romance', 'Mike Nichols', 'Dustin Hoffman|Anne Bancroft', 'États-Unis', '8.0', '106', '1', '104.9', 'tt0061722', 'https://image.tmdb.org/t/p/w200/z1Z1tZMR66RxcNeHbwoEhYeqOlP.jpg'),
(57, 'Heat', '1995', 'Crime|Drame|Thriller', 'Michael Mann', 'Al Pacino|Robert De Niro', 'États-Unis', '8.2', '170', '0', '187.4', 'tt0113277', 'https://image.tmdb.org/t/p/w200/umSVjVdbVwtx5ryCA2QXL44Durm.jpg'),
(58, 'Amélie', '2001', 'Comedie|Romance|Fantaisie', 'Jean-Pierre Jeunet', 'Audrey Tautou|Mathieu Kassovitz', 'France|Allemagne', '8.3', '122', '0', '174.2', 'tt0211915', 'https://image.tmdb.org/t/p/w200/vZ9NhNbQQ3yhtiC5sbhpy5KTXns.jpg'),
(59, 'Pan\'s Labyrinth', '2006', 'Drame|Fantaisie|Guerre', 'Guillermo del Toro', 'Ivana Baquero|Sergi López', 'Espagne|Mexique', '8.2', '118', '3', '83.3', 'tt0457430', 'https://image.tmdb.org/t/p/w200/z7xXihu5wHuSMWymq5VAulPVuvg.jpg'),
(60, 'The Social Network', '2010', 'Biographie|Drame', 'David Fincher', 'Jesse Eisenberg|Andrew Garfield', 'États-Unis', '7.7', '120', '3', '224.9', 'tt1285016', 'https://image.tmdb.org/t/p/w200/n0ybibhJtQ5icDqTp8eRytcIHJx.jpg'),
(61, 'The Breakfast Club', '1985', 'Comedie|Drame', 'John Hughes', 'Emilio Estevez|Anthony Michael Hall', 'États-Unis', '7.8', '97', '0', '51.5', 'tt0088847', 'https://image.tmdb.org/t/p/w200/wM9ErA8UVdcce5P4oefQinN8VVV.jpg'),
(62, 'Raging Bull', '1980', 'Biographie|Drame|Sport', 'Martin Scorsese', 'Robert De Niro|Cathy Moriarty', 'États-Unis', '8.2', '129', '2', '23.4', 'tt0081398', 'https://image.tmdb.org/t/p/w200/1WV7WlTS8LI1L5NkCgjWT9GSW3O.jpg'),
(63, 'The Princess Bride', '1987', 'Aventure|Famille|Fantaisie', 'Rob Reiner', 'Cary Elwes|Robin Wright', 'États-Unis', '8.1', '98', '0', '30.9', 'tt0093779', 'https://image.tmdb.org/t/p/w200/2FC9L9MrjBoGHYjYZjdWQdopVYb.jpg'),
(64, 'Babylon', '1980', 'Drame', 'Unknown', 'Unknown', 'États-Unis', '', '', '0', '', 'tt0080406', 'https://image.tmdb.org/t/p/w200/sbh5cwdoZ5TPE4JDO0Z7HGLa4IX.jpg'),
(65, 'The Big Lebowski', '1998', 'Comedie|Crime', 'Joel Coen|Ethan Coen', 'Jeff Bridges|John Goodman', 'États-Unis', '8.1', '117', '0', '46.7', 'tt0118715', 'https://image.tmdb.org/t/p/w200/9mprbw31MGdd66LR0AQKoDMoFRv.jpg'),
(66, 'The Truman Show', '1998', 'Comedie|Drame|Science Fiction', 'Peter Weir', 'Jim Carrey|Ed Harris', 'États-Unis', '8.1', '103', '0', '264.1', 'tt0120382', 'https://image.tmdb.org/t/p/w200/vuza0WqY239yBXOadKlGwJsZJFE.jpg'),
(67, 'The Handmaiden', '2016', 'Drame|Mystère|Romance', 'Park Chan-wook', 'Kim Min-hee|Kim Tae-ri', 'Corée du sud', '8.1', '145', '0', '38.3', 'tt4016934', 'https://image.tmdb.org/t/p/w200/dLlH4aNHdnmf62umnInL8xPlPzw.jpg'),
(68, 'No Country for Old Men', '2007', 'Crime|Drame|Thriller', 'Joel Coen|Ethan Coen', 'Tommy Lee Jones|Javier Bardem', 'États-Unis', '8.1', '122', '4', '171.6', 'tt0477348', 'https://image.tmdb.org/t/p/w200/6d5XOczc226jECq0LIX0siKtgHR.jpg'),
(69, 'There Will Be Blood', '2007', 'Drame', 'Paul Thomas Anderson', 'Daniel Day-Lewis|Paul Dano', 'États-Unis', '8.1', '158', '2', '76.2', 'tt0469494', 'https://image.tmdb.org/t/p/w200/fa0RDkAlCec0STeMNAhPaF89q6U.jpg'),
(70, 'The Sting', '1973', 'Crime|Drame|Comedie', 'George Roy Hill', 'Paul Newman|Robert Redford', 'États-Unis', '8.3', '129', '7', '159.3', 'tt0070735', 'https://image.tmdb.org/t/p/w200/4VdQopZb0lx13Me3yxE5rUXMGCI.jpg'),
(71, 'The Third Man', '1949', 'Film-Noir|Mystère', 'Carol Reed', 'Joseph Cotten|Orson Welles', 'Royaume-Uni', '8.0', '104', '1', '', 'tt0041959', 'https://image.tmdb.org/t/p/w600_and_h900_face/k0R968gZjXUTroDKa9nRdTjAXJW.jpg'),
(72, 'The Great Escape', '1963', 'Aventure|Drame|Histoire', 'John Sturges', 'Steve McQueen|James Garner', 'Royaume-Uni|États-Unis', '8.2', '172', '0', '11.7', 'tt0057115', 'https://image.tmdb.org/t/p/w200/gBH4H8UMFxl139HaLz6lRuvsel8.jpg'),
(73, 'The Bridge on the River Kwai', '1957', 'Aventure|Drame|Guerre', 'David Lean', 'William Holden|Alec Guinness', 'Royaume-Uni|États-Unis', '8.1', '161', '7', '30.6', 'tt0050212', 'https://image.tmdb.org/t/p/w200/7paXMt2e3Tr5dLmEZOGgFEn2Vo7.jpg'),
(74, 'The Wizard of Oz', '1939', 'Aventure|Famille|Fantaisie', 'Victor Fleming', 'Judy Garland|Ray Bolger', 'États-Unis', '8.0', '101', '2', '400.0', 'tt0032138', 'https://image.tmdb.org/t/p/w200/pfAZFD7I2hxW9HCChTuAzsdE6UX.jpg'),
(76, 'Paths of Glory', '1957', 'Drame|Guerre', 'Stanley Kubrick', 'Kirk Douglas|Adolphe Menjou', 'États-Unis', '8.4', '88', '0', '', 'tt0050825', 'https://image.tmdb.org/t/p/w200/hGg1UCQSHlXfv2HI9bDHT2OQBam.jpg'),
(77, 'The Grapes of Wrath', '1940', 'Drame', 'John Ford', 'Henry Fonda|Jane Darwell', 'États-Unis', '8.1', '129', '2', '3.6', 'tt0032551', 'https://image.tmdb.org/t/p/w200/eUcxMVBIA0Jg8l1RGUqycrc3eIQ.jpg'),
(78, 'My Neighbor Totoro', '1988', 'Animation|Famille|Fantaisie', 'Hayao Miyazaki', 'Hitoshi Takagi|Noriko Hidaka', 'Japon', '8.2', '86', '0', '45.2', 'tt0096283', 'https://image.tmdb.org/t/p/w200/rtGDOeG9LzoerkDGZF9dnVeLppL.jpg'),
(80, 'Die Hard', '1988', 'Action|Thriller', 'John McTiernan', 'Bruce Willis|Alan Rickman', 'États-Unis', '8.2', '132', '0', '140.8', 'tt0095016', 'https://image.tmdb.org/t/p/w200/aJCpHDC6RoGz7d1Fzayl019xnxX.jpg'),
(81, 'Oldboy', '2003', 'Action|Drame|Mystère', 'Park Chan-wook', 'Choi Min-sik|Yoo Ji-tae', 'Corée du sud', '8.4', '120', '0', '17.0', 'tt0364569', 'https://image.tmdb.org/t/p/w200/pWDtjs568ZfOTMbURQBYuT4Qxka.jpg'),
(82, 'Das Boot', '1981', 'Aventure|Drame|Thriller', 'Wolfgang Petersen', 'Jürgen Prochnow|Herbert Grönemeyer', 'Allemagne', '8.3', '149', '0', '11.7', 'tt0082096', 'https://image.tmdb.org/t/p/w200/u8FhQPncOAkwcei2OI9orPWhV6K.jpg'),
(83, 'The Thing', '1982', 'Horreur|Science Fiction|Thriller', 'John Carpenter', 'Kurt Russell|Wilford Brimley', 'États-Unis', '8.1', '109', '0', '19.6', 'tt0084787', 'https://image.tmdb.org/t/p/w200/tzGY49kseSE9QAKk47uuDGwnSCu.jpg'),
(84, 'The Seventh Seal', '1957', 'Drame|Fantaisie', 'Ingmar Bergman', 'Max von Sydow|Bengt Ekerot', 'Suède', '8.2', '96', '0', '', 'tt0050976', 'https://image.tmdb.org/t/p/w200/wcZ21zrOsy0b52AfAF50XpTiv75.jpg'),
(85, 'Wild Strawberries', '1957', 'Drame', 'Ingmar Bergman', 'Victor Sjöström|Bibi Andersson', 'Suède', '8.0', '91', '0', '', 'tt0050986', 'https://image.tmdb.org/t/p/w200/iyTD2QnySNMPUPE3IedZQipSWfz.jpg'),
(86, 'Ikiru', '1952', 'Drame', 'Akira Kurosawa', 'Takashi Shimura|Shinichi Himori', 'Japon', '8.1', '143', '0', '', 'tt0044741', 'https://image.tmdb.org/t/p/w200/dgNTS4EQDDVfkzJI5msKuHu2Ei3.jpg'),
(87, 'On the Waterfront', '1954', 'Crime|Drame', 'Elia Kazan', 'Marlon Brando|Eva Marie Saint', 'États-Unis', '8.1', '108', '8', '9.6', 'tt0047296', 'https://image.tmdb.org/t/p/w200/fKjLZy9W8VxMOp5OoyWojmLVCQw.jpg'),
(88, 'Sunset Boulevard', '1950', 'Drame|Film-Noir', 'Billy Wilder', 'Gloria Swanson|William Holden', 'États-Unis', '8.4', '110', '3', '5.3', 'tt0043014', 'https://image.tmdb.org/t/p/w200/oOZIN0sbRNLKQC4RRCQnmAx1PlV.jpg'),
(89, 'Rebecca', '1940', 'Drame|Mystère|Romance', 'Alfred Hitchcock', 'Laurence Olivier|Joan Fontaine', 'Royaume-Uni|États-Unis', '8.1', '130', '2', '6.0', 'tt0032976', 'https://image.tmdb.org/t/p/w200/1qz3qUOHnVy7dL7M7G8jSErxE4b.jpg'),
(90, 'The Maltese Falcon', '1941', 'Crime|Film-Noir|Mystère', 'John Huston', 'Humphrey Bogart|Mary Astor', 'États-Unis', '8.0', '101', '0', '1.8', 'tt0033870', 'https://image.tmdb.org/t/p/w200/bf4o6Uzw5wqLjdKwRuiDrN1xyvl.jpg'),
(91, 'Touch of Evil', '1958', 'Crime|Drame|Film-Noir', 'Orson Welles', 'Charlton Heston|Orson Welles', 'États-Unis', '8.0', '95', '0', '', 'tt0052311', 'https://image.tmdb.org/t/p/w200/1pvRgmfBaoMczIJBOi9gCOZ4FMC.jpg'),
(93, 'The Exorcist', '1973', 'Horreur', 'William Friedkin', 'Ellen Burstyn|Linda Blair', 'États-Unis', '8.0', '122', '2', '441.3', 'tt0070047', 'https://image.tmdb.org/t/p/w200/5x0CeVHJI8tcDx8tUUwYHQSNILq.jpg'),
(94, 'The Shining', '1980', 'Horreur|Drame|Mystère', 'Stanley Kubrick', 'Jack Nicholson|Shelley Duvall', 'Royaume-Uni|États-Unis', '8.4', '146', '0', '47.3', 'tt0081505', 'https://image.tmdb.org/t/p/w200/uAR0AWqhQL1hQa69UDEbb2rE5Wx.jpg'),
(95, 'Citizen Kane', '1941', 'Drame|Mystère', 'Orson Welles', 'Orson Welles|Joseph Cotten', 'États-Unis', '8.3', '119', '1', '1.6', 'tt0033467', 'https://image.tmdb.org/t/p/w200/sav0jxhqiH0bPr2vZFU0Kjt2nZL.jpg'),
(96, 'Lawrence of Arabia', '1962', 'Aventure|Biographie|Drame', 'David Lean', 'Peter O\'Toole|Omar Sharif', 'Royaume-Uni', '8.3', '222', '7', '70.0', 'tt0056172', 'https://image.tmdb.org/t/p/w200/AiAm0EtDvyGqNpVoieRw4u65vD1.jpg'),
(97, 'The Bridge on the River Kwai', '1957', 'Aventure|Drame|Guerre', 'David Lean', 'William Holden|Alec Guinness', 'Royaume-Uni|États-Unis', '8.1', '161', '7', '30.6', 'tt0050212', 'https://image.tmdb.org/t/p/w200/7paXMt2e3Tr5dLmEZOGgFEn2Vo7.jpg'),
(98, 'Double Indemnity', '1944', 'Crime|Drame|Film-Noir', 'Billy Wilder', 'Fred MacMurray|Barbara Stanwyck', 'États-Unis', '8.0', '107', '0', '5.7', 'tt0036775', 'https://image.tmdb.org/t/p/w200/rVNYZZgfhwqVMMWlBmxOfWqnwCj.jpg'),
(99, 'Annie Hall', '1977', 'Comedie|Romance', 'Woody Allen', 'Woody Allen|Diane Keaton', 'États-Unis', '8.0', '93', '4', '38.3', 'tt0075686', 'https://image.tmdb.org/t/p/w200/gBo4G0p8iVS998aYvXS656jbsH2.jpg'),
(100, 'Some Like It Hot', '1959', 'Comedie|Romance', 'Billy Wilder', 'Marilyn Monroe|Tony Curtis', 'États-Unis', '8.2', '121', '1', '25.0', 'tt0053291', 'https://image.tmdb.org/t/p/w200/hVIKyTK13AvOGv7ICmJjK44DTzp.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`idFilm`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `films`
--
ALTER TABLE `films`
  MODIFY `idFilm` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
