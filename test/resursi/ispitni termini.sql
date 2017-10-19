CREATE TABLE IF NOT EXISTS `ispiti` (
`id` int(11) NOT NULL,
  `predmet` varchar(50) NOT NULL,
  `rok` varchar(50) NOT NULL,
  `prostorija` varchar(5) NOT NULL,
  `kolokvij` varchar(20) NOT NULL,
  `grupa` varchar(10) NOT NULL,
  `datum` varchar(20) NOT NULL,
  `opis` blob NOT NULL,
  `tekst` longblob NOT NULL,
  `autor` varchar(100) NOT NULL,
  `brojstranica` varchar(10) NOT NULL
);



CREATE TABLE IF NOT EXISTS `prostor` (
  `id` int(11) NOT NULL,
  `lokacija` varchar(20) NOT NULL,
  `kat` varchar(3) NOT NULL,
  `naziv` varchar(30) NOT NULL,
  `opis` varchar(500) NOT NULL,
  `broj_mjesta` varchar(5) NOT NULL,
  `koordinate` varchar(100) NOT NULL,
  `zavod` varchar(10) NOT NULL,
  `zauzece` varchar(5) NOT NULL
);
