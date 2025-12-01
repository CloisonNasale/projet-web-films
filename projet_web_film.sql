-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : lun. 01 déc. 2025 à 10:18
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
  `genres` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `realisateur` varchar(30) DEFAULT NULL,
  `acteursPrincipaux` varchar(38) DEFAULT NULL,
  `pays` varchar(40) DEFAULT NULL,
  `classementIMDB` varchar(11) DEFAULT NULL,
  `duree` varchar(14) DEFAULT NULL,
  `oscarGagne` varchar(10) DEFAULT NULL,
  `boxOffice` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `films`
--

INSERT INTO `films` (`idFilm`, `titre`, `annee`, `genres`, `realisateur`, `acteursPrincipaux`, `pays`, `classementIMDB`, `duree`, `oscarGagne`, `boxOffice`) VALUES
(1, 'The Shawshank Redemption', '1994', 'Drame', 'Frank Darabont', 'Tim Robbins|Morgan Freeman', 'États-Unis', '9.3', '142', '0', '58.0'),
(2, 'The Godfather', '1972', 'Crime|Drame', 'Francis Ford Coppola', 'Marlon Brando|Al Pacino', 'États-Unis', '9.2', '175', '3', '246.1'),
(3, 'The Dark Knight', '2008', 'Action|Crime|Drame', 'Christopher Nolan', 'Christian Bale|Heath Ledger', 'États-Unis|Royaume-Uni', '9.0', '152', '2', '1004.9'),
(4, 'The Godfather: Part II', '1974', 'Crime|Drame', 'Francis Ford Coppola', 'Al Pacino|Robert De Niro', 'États-Unis', '9.0', '202', '6', '48.5'),
(5, '12 Angry Men', '1957', 'Crime|Drame', 'Sidney Lumet', 'Henry Fonda|Lee J. Cobb', 'États-Unis', '9.0', '96', '0', '1.0'),
(6, 'The Lord of the Rings: The Return of the King', '2003', 'Aventure|Drame|Fantaisie', 'Peter Jackson', 'Elijah Wood|Viggo Mortensen', 'Nouvelle Zélande|États-Unis|Royaume-Uni', '8.9', '201', '11', '1119.9'),
(7, 'Schindler\'s List', '1993', 'Biographie|Drame|Histoire', 'Steven Spielberg', 'Liam Neeson|Ralph Fiennes', 'États-Unis|Pologne', '8.9', '195', '7', '322.1'),
(8, 'The Lord of the Rings: The Fellowship of the Ring', '2001', 'Aventure|Drame|Fantaisie', 'Peter Jackson', 'Elijah Wood|Ian McKellen', 'Nouvelle Zélande|États-Unis|Royaume-Uni', '8.8', '178', '4', '871.5'),
(9, 'Inception', '2010', 'Action|Science Fiction|Thriller', 'Christopher Nolan', 'Leonardo DiCaprio|Joseph Gordon-Levitt', 'États-Unis|Royaume-Uni', '8.8', '148', '4', '836.8'),
(10, 'Star Wars: Episode V – The Empire Strikes Back', '1980', 'Action|Aventure|Science Fiction', 'Irvin Kershner', 'Mark Hamill|Harrison Ford', 'États-Unis', '8.7', '124', '0', '538.4'),
(11, 'The Lord of the Rings: The Two Towers', '2002', 'Aventure|Drame|Fantaisie', 'Peter Jackson', 'Elijah Wood|Ian McKellen', 'Nouvelle Zélande|États-Unis|Royaume-Uni', '8.7', '179', '2', '926.0'),
(12, 'Fight Club', '1999', 'Drame', 'David Fincher', 'Brad Pitt|Edward Norton', 'États-Unis|Allemagne', '8.8', '139', '0', '100.9'),
(13, 'Forrest Gump', '1994', 'Drame|Romance', 'Robert Zemeckis', 'Tom Hanks|Robin Wright', 'États-Unis', '8.8', '142', '6', '678.2'),
(14, 'The Matrix', '1999', 'Action|Science Fiction', 'Lana Wachowski|Lilly Wachowski', 'Keanu Reeves|Laurence Fishburne', 'États-Unis|Australie', '8.7', '136', '4', '466.3'),
(15, 'Goodfellas', '1990', 'Biographie|Crime|Drame', 'Martin Scorsese', 'Ray Liotta|Robert De Niro', 'États-Unis', '8.7', '146', '1', '47.0'),
(16, 'One Flew Over the Cuckoo\'s Nest', '1975', 'Drame', 'Miloš Forman', 'Jack Nicholson|Louise Fletcher', 'États-Unis|Royaume-Uni', '8.7', '133', '5', '162.0'),
(17, 'Se7en', '1995', 'Crime|Drame|Mystère', 'David Fincher', 'Morgan Freeman|Brad Pitt', 'États-Unis', '8.6', '127', '0', '327.3'),
(18, 'Seven Samurai', '1954', 'Action|Drame', 'Akira Kurosawa', 'Toshirō Mifune|Takashi Shimura', 'Japon', '8.6', '207', '0', '0.0'),
(19, 'City of God', '2002', 'Crime|Drame', 'Fernando Meirelles|Kátia Lund', 'Alexandre Rodrigues|Leandro Firmino', 'Brésil', '8.6', '130', '0', '30.6'),
(20, 'Life Is Beautiful', '1997', 'Comedie|Drame|Romance', 'Roberto Benigni', 'Roberto Benigni|Nicoletta Braschi', 'Italie', '8.6', '116', '3', '229.1'),
(21, 'The Silence of the Lambs', '1991', 'Crime|Drame|Thriller', 'Jonathan Demme', 'Jodie Foster|Anthony Hopkins', 'États-Unis', '8.6', '118', '5', '272.7'),
(22, 'It\'s a Wonderful Life', '1946', 'Drame|Fantaisie|Famille', 'Frank Capra', 'James Stewart|Donna Reed', 'États-Unis', '8.6', '130', '0', '3.3'),
(23, 'The Usual Suspects', '1995', 'Crime|Mystère|Thriller', 'Bryan Singer', 'Kevin Spacey|Gabriel Byrne', 'États-Unis|Allemagne', '8.5', '106', '2', '66.8'),
(24, 'Léon: The Professional', '1994', 'Action|Crime|Drame', 'Luc Besson', 'Jean Reno|Natalie Portman', 'France|États-Unis', '8.5', '110', '0', ''),
(25, 'Spirited Away', '2001', 'Animation|Aventure|Famille', 'Hayao Miyazaki', 'Rumi Hiiragi|Miyu Irino', 'Japon', '8.6', '125', '1', '355.5'),
(26, 'Saving Private Ryan', '1998', 'Drame|Histoire|Guerre', 'Steven Spielberg', 'Tom Hanks|Matt Damon', 'États-Unis', '8.6', '169', '5', '481.8'),
(27, 'The Green Mile', '1999', 'Crime|Drame|Fantaisie', 'Frank Darabont', 'Tom Hanks|Michael Clarke Duncan', 'États-Unis', '8.6', '189', '0', '286.8'),
(28, 'Parasite', '2019', 'Comedie|Drame|Thriller', 'Bong Joon Ho', 'Song Kang-ho|Cho Yeo-jeong', 'Corée du sud', '8.6', '132', '4', '258.8'),
(29, 'Interstellar', '2014', 'Aventure|Drame|Science Fiction', 'Christopher Nolan', 'Matthew McConaughey|Anne Hathaway', 'États-Unis|Royaume-Uni', '8.6', '169', '1', '677.5'),
(30, 'American History X', '1998', 'Crime|Drame', 'Tony Kaye', 'Edward Norton|Edward Furlong', 'États-Unis', '8.5', '119', '0', '23.9'),
(31, 'City Lights', '1931', 'Comedie|Drame|Romance', 'Charlie Chaplin', 'Charlie Chaplin|Virginia Cherrill', 'États-Unis', '8.5', '87', '0', '4.3'),
(32, 'The Lion King', '1994', 'Animation|Aventure|Drame', 'Roger Allers|Rob Minkoff', 'Matthew Broderick|Jeremy Irons', 'États-Unis', '8.5', '88', '2', '968.5'),
(33, 'Back to the Future', '1985', 'Aventure|Comedie|Science Fiction', 'Robert Zemeckis', 'Michael J. Fox|Christopher Lloyd', 'États-Unis', '8.5', '116', '1', '388.8'),
(34, 'Terminator 2: Judgment Day', '1991', 'Action|Science Fiction', 'James Cameron', 'Arnold Schwarzenegger|Linda Hamilton', 'États-Unis', '8.5', '137', '4', '520.9'),
(35, 'Modern Times', '1936', 'Comedie|Drame', 'Charlie Chaplin', 'Charlie Chaplin|Paulette Goddard', 'États-Unis', '8.5', '87', '0', '1.5'),
(36, 'Once Upon a Time in the West', '1968', 'Western', 'Sergio Leone', 'Henry Fonda|Claudia Cardinale', 'Italie|États-Unis', '8.5', '165', '0', '5.3'),
(37, 'Alien', '1979', 'Horreur|Science Fiction', 'Ridley Scott', 'Sigourney Weaver|Tom Skerritt', 'Royaume-Uni|États-Unis', '8.4', '117', '1', '104.9'),
(38, 'The Pianist', '2002', 'Biographie|Drame|Musique', 'Roman Polanski', 'Adrien Brody|Thomas Kretschmann', 'France|Pologne|Allemagne', '8.5', '150', '3', '120.1'),
(39, 'The Departed', '2006', 'Crime|Drame|Thriller', 'Martin Scorsese', 'Leonardo DiCaprio|Matt Damon', 'États-Unis', '8.5', '151', '4', '291.5'),
(40, 'Gladiator', '2000', 'Action|Aventure|Drame', 'Ridley Scott', 'Russell Crowe|Joaquin Phoenix', 'États-Unis|Royaume-Uni', '8.5', '155', '5', '465.5'),
(41, 'Apocalypse Now', '1979', 'Drame|Guerre|Aventure', 'Francis Ford Coppola', 'Martin Sheen|Marlon Brando', 'États-Unis', '8.4', '147', '2', ''),
(42, 'Dr. Strangelove or: How I Learned to Stop Worrying and Love the Bomb', '1964', 'Comedie|Satire', 'Stanley Kubrick', 'Peter Sellers|George C. Scott', 'Royaume-Uni|États-Unis', '8.4', '95', '0', ''),
(43, 'The Great Dictator', '1940', 'Comedie|Drame|Satire', 'Charlie Chaplin', 'Charlie Chaplin|Paulette Goddard', 'États-Unis', '8.4', '125', '0', ''),
(44, 'Memento', '2000', 'Crime|Mystère|Thriller', 'Christopher Nolan', 'Guy Pearce|Carrie-Anne Moss', 'États-Unis', '8.4', '113', '0', '39.7'),
(45, 'Rashomon', '1950', 'Drame|Mystère|Crime', 'Akira Kurosawa', 'Toshirō Mifune|Machiko Kyō', 'Japon', '8.2', '88', '0', ''),
(46, 'Chinatown', '1974', 'Crime|Drame|Mystère', 'Roman Polanski', 'Jack Nicholson|Faye Dunaway', 'États-Unis', '8.2', '131', '1', '29.2'),
(47, 'The Third Man', '1949', 'Film-Noir|Mystère', 'Carol Reed', 'Joseph Cotten|Orson Welles', 'Royaume-Uni', '8.1', '104', '1', ''),
(48, 'North by Northwest', '1959', 'Action|Aventure|Mystère', 'Alfred Hitchcock', 'Cary Grant|Eva Marie Saint', 'États-Unis', '8.3', '136', '0', ''),
(49, 'Vertigo', '1958', 'Drame|Mystère|Romance', 'Alfred Hitchcock', 'James Stewart|Kim Novak', 'États-Unis', '8.3', '128', '0', '7.3'),
(50, 'The Apartment', '1960', 'Comedie|Drame|Romance', 'Billy Wilder', 'Jack Lemmon|Shirley MacLaine', 'États-Unis', '8.3', '125', '5', '24.6'),
(51, 'Rear Window', '1954', 'Crime|Drame|Mystère', 'Alfred Hitchcock', 'James Stewart|Grace Kelly', 'États-Unis', '8.5', '111', '0', '37.9'),
(52, 'A Clockwork Orange', '1971', 'Crime|Drame|Science Fiction', 'Stanley Kubrick', 'Malcolm McDowell|Patrick Magee', 'Royaume-Uni|États-Unis', '8.3', '136', '4', '114.0'),
(53, 'Blade Runner', '1982', 'Science Fiction|Thriller', 'Ridley Scott', 'Harrison Ford|Rutger Hauer', 'États-Unis', '8.2', '117', '2', '32.9'),
(54, 'Taxi Driver', '1976', 'Crime|Drame|Thriller', 'Martin Scorsese', 'Robert De Niro|Jodie Foster', 'États-Unis', '8.3', '114', '1', '28.3'),
(55, 'The Good, the Bad and the Ugly', '1966', 'Western', 'Sergio Leone', 'Clint Eastwood|Eli Wallach', 'Italie|Espagne|Allemagne', '8.8', '161', '0', '25.1'),
(56, 'The Graduate', '1967', 'Comedie|Drame|Romance', 'Mike Nichols', 'Dustin Hoffman|Anne Bancroft', 'États-Unis', '8.0', '106', '1', '104.9'),
(57, 'Heat', '1995', 'Crime|Drame|Thriller', 'Michael Mann', 'Al Pacino|Robert De Niro', 'États-Unis', '8.2', '170', '0', '187.4'),
(58, 'Amélie', '2001', 'Comedie|Romance|Fantaisie', 'Jean-Pierre Jeunet', 'Audrey Tautou|Mathieu Kassovitz', 'France|Allemagne', '8.3', '122', '0', '174.2'),
(59, 'Pan\'s Labyrinth', '2006', 'Drame|Fantaisie|Guerre', 'Guillermo del Toro', 'Ivana Baquero|Sergi López', 'Espagne|Mexique', '8.2', '118', '3', '83.3'),
(60, 'The Social Network', '2010', 'Biographie|Drame', 'David Fincher', 'Jesse Eisenberg|Andrew Garfield', 'États-Unis', '7.7', '120', '3', '224.9'),
(61, 'The Breakfast Club', '1985', 'Comedie|Drame', 'John Hughes', 'Emilio Estevez|Anthony Michael Hall', 'États-Unis', '7.8', '97', '0', '51.5'),
(62, 'Raging Bull', '1980', 'Biographie|Drame|Sport', 'Martin Scorsese', 'Robert De Niro|Cathy Moriarty', 'États-Unis', '8.2', '129', '2', '23.4'),
(63, 'The Princess Bride', '1987', 'Aventure|Famille|Fantaisie', 'Rob Reiner', 'Cary Elwes|Robin Wright', 'États-Unis', '8.1', '98', '0', '30.9'),
(64, 'Babylon', '1980', 'Drame', 'Unknown', 'Unknown', 'États-Unis', '', '', '0', ''),
(65, 'The Big Lebowski', '1998', 'Comedie|Crime', 'Joel Coen|Ethan Coen', 'Jeff Bridges|John Goodman', 'États-Unis', '8.1', '117', '0', '46.7'),
(66, 'The Truman Show', '1998', 'Comedie|Drame|Science Fiction', 'Peter Weir', 'Jim Carrey|Ed Harris', 'États-Unis', '8.1', '103', '0', '264.1'),
(67, 'The Handmaiden', '2016', 'Drame|Mystère|Romance', 'Park Chan-wook', 'Kim Min-hee|Kim Tae-ri', 'Corée du sud', '8.1', '145', '0', '38.3'),
(68, 'No Country for Old Men', '2007', 'Crime|Drame|Thriller', 'Joel Coen|Ethan Coen', 'Tommy Lee Jones|Javier Bardem', 'États-Unis', '8.1', '122', '4', '171.6'),
(69, 'There Will Be Blood', '2007', 'Drame', 'Paul Thomas Anderson', 'Daniel Day-Lewis|Paul Dano', 'États-Unis', '8.1', '158', '2', '76.2'),
(70, 'The Sting', '1973', 'Crime|Drame|Comedie', 'George Roy Hill', 'Paul Newman|Robert Redford', 'États-Unis', '8.3', '129', '7', '159.3'),
(71, 'The Third Man (dup)', '1949', 'Film-Noir|Mystère', 'Carol Reed', 'Joseph Cotten|Orson Welles', 'Royaume-Uni', '8.0', '104', '1', ''),
(72, 'The Great Escape', '1963', 'Aventure|Drame|Histoire', 'John Sturges', 'Steve McQueen|James Garner', 'Royaume-Uni|États-Unis', '8.2', '172', '0', '11.7'),
(73, 'The Bridge on the River Kwai', '1957', 'Aventure|Drame|Guerre', 'David Lean', 'William Holden|Alec Guinness', 'Royaume-Uni|États-Unis', '8.1', '161', '7', '30.6'),
(74, 'The Wizard of Oz', '1939', 'Aventure|Famille|Fantaisie', 'Victor Fleming', 'Judy Garland|Ray Bolger', 'États-Unis', '8.0', '101', '2', '400.0'),
(75, 'The Great Dictator (dup)', '1940', 'Comedie|Drame|Satire', 'Charlie Chaplin', 'Charlie Chaplin|Paulette Goddard', 'États-Unis', '8.0', '125', '0', ''),
(76, 'Paths of Glory', '1957', 'Drame|Guerre', 'Stanley Kubrick', 'Kirk Douglas|Adolphe Menjou', 'États-Unis', '8.4', '88', '0', ''),
(77, 'The Grapes of Wrath', '1940', 'Drame', 'John Ford', 'Henry Fonda|Jane Darwell', 'États-Unis', '8.1', '129', '2', '3.6'),
(78, 'My Neighbor Totoro', '1988', 'Animation|Famille|Fantaisie', 'Hayao Miyazaki', 'Hitoshi Takagi|Noriko Hidaka', 'Japon', '8.2', '86', '0', '45.2'),
(79, 'Rashomon (dup)', '1950', 'Drame|Mystère|Crime', 'Akira Kurosawa', 'Toshirō Mifune|Machiko Kyō', 'Japon', '8.2', '88', '0', ''),
(80, 'Die Hard', '1988', 'Action|Thriller', 'John McTiernan', 'Bruce Willis|Alan Rickman', 'États-Unis', '8.2', '132', '0', '140.8'),
(81, 'Oldboy', '2003', 'Action|Drame|Mystère', 'Park Chan-wook', 'Choi Min-sik|Yoo Ji-tae', 'Corée du sud', '8.4', '120', '0', '17.0'),
(82, 'Das Boot', '1981', 'Aventure|Drame|Thriller', 'Wolfgang Petersen', 'Jürgen Prochnow|Herbert Grönemeyer', 'Allemagne', '8.3', '149', '0', '11.7'),
(83, 'The Thing', '1982', 'Horreur|Science Fiction|Thriller', 'John Carpenter', 'Kurt Russell|Wilford Brimley', 'États-Unis', '8.1', '109', '0', '19.6'),
(84, 'The Seventh Seal', '1957', 'Drame|Fantaisie', 'Ingmar Bergman', 'Max von Sydow|Bengt Ekerot', 'Suède', '8.2', '96', '0', ''),
(85, 'Wild Strawberries', '1957', 'Drame', 'Ingmar Bergman', 'Victor Sjöström|Bibi Andersson', 'Suède', '8.0', '91', '0', ''),
(86, 'Ikiru', '1952', 'Drame', 'Akira Kurosawa', 'Takashi Shimura|Shinichi Himori', 'Japon', '8.1', '143', '0', ''),
(87, 'On the Waterfront', '1954', 'Crime|Drame', 'Elia Kazan', 'Marlon Brando|Eva Marie Saint', 'États-Unis', '8.1', '108', '8', '9.6'),
(88, 'Sunset Boulevard', '1950', 'Drame|Film-Noir', 'Billy Wilder', 'Gloria Swanson|William Holden', 'États-Unis', '8.4', '110', '3', '5.3'),
(89, 'Rebecca', '1940', 'Drame|Mystère|Romance', 'Alfred Hitchcock', 'Laurence Olivier|Joan Fontaine', 'Royaume-Uni|États-Unis', '8.1', '130', '2', '6.0'),
(90, 'The Maltese Falcon', '1941', 'Crime|Film-Noir|Mystère', 'John Huston', 'Humphrey Bogart|Mary Astor', 'États-Unis', '8.0', '101', '0', '1.8'),
(91, 'Touch of Evil', '1958', 'Crime|Drame|Film-Noir', 'Orson Welles', 'Charlton Heston|Orson Welles', 'États-Unis', '8.0', '95', '0', ''),
(92, 'Paths of Glory (dup2)', '1957', 'Drame|Guerre', 'Stanley Kubrick', 'Kirk Douglas|Adolphe Menjou', 'États-Unis', '8.4', '88', '0', ''),
(93, 'The Exorcist', '1973', 'Horreur', 'William Friedkin', 'Ellen Burstyn|Linda Blair', 'États-Unis', '8.0', '122', '2', '441.3'),
(94, 'The Shining', '1980', 'Horreur|Drame|Mystère', 'Stanley Kubrick', 'Jack Nicholson|Shelley Duvall', 'Royaume-Uni|États-Unis', '8.4', '146', '0', '47.3'),
(95, 'Citizen Kane', '1941', 'Drame|Mystère', 'Orson Welles', 'Orson Welles|Joseph Cotten', 'États-Unis', '8.3', '119', '1', '1.6'),
(96, 'Lawrence of Arabia', '1962', 'Aventure|Biographie|Drame', 'David Lean', 'Peter O\'Toole|Omar Sharif', 'Royaume-Uni', '8.3', '222', '7', '70.0'),
(97, 'The Bridge on the River Kwai', '1957', 'Aventure|Drame|Guerre', 'David Lean', 'William Holden|Alec Guinness', 'Royaume-Uni|États-Unis', '8.1', '161', '7', '30.6'),
(98, 'Double Indemnity', '1944', 'Crime|Drame|Film-Noir', 'Billy Wilder', 'Fred MacMurray|Barbara Stanwyck', 'États-Unis', '8.0', '107', '0', '5.7'),
(99, 'Annie Hall', '1977', 'Comedie|Romance', 'Woody Allen', 'Woody Allen|Diane Keaton', 'États-Unis', '8.0', '93', '4', '38.3'),
(100, 'Some Like It Hot', '1959', 'Comedie|Romance', 'Billy Wilder', 'Marilyn Monroe|Tony Curtis', 'États-Unis', '8.2', '121', '1', '25.0');

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
