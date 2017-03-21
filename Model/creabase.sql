
DROP TABLE if EXISTS reserver; 
DROP TABLE if EXISTS piste; 
DROP TABLE if EXISTS news; 
DROP TABLE if EXISTS livre; 

DROP TABLE if EXISTS jouer; 
DROP TABLE if EXISTS interpreter; 
DROP TABLE if EXISTS emprunter; 


DROP TABLE if EXISTS ecrire; 
DROP TABLE if EXISTS dvd; 
DROP TABLE if EXISTS cd; 
DROP TABLE if EXISTS categorie; 
DROP TABLE if EXISTS avis; 

DROP TABLE if EXISTS artiste; 
DROP TABLE if EXISTS adherent; 

CREATE TABLE IF NOT EXISTS `adherent` (
  `id` int(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `dateNaissance` varchar(255) NOT NULL,
  `dateInscription` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `adherent`
--

INSERT INTO `adherent` (`id`, `login`, `pass`, `nom`, `prenom`, `mail`, `adresse`, `tel`, `dateNaissance`, `dateInscription`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 'admin', 'admin@admin.fr', 'IUT Blagnac', '00.00.00.00.00', '01/01/1900', '2015-12-06'),
(2, 'jean.dupont', '12dea96fec20593566ab75692c9949596833adc9', 'Jean', 'Dupont', 'j-dupont@gmail.fr', '12 rue Robert', '05.01.01.01.01', '01/01/1990', '2015-12-06');

-- --------------------------------------------------------

--
-- Structure de la table `artiste`
--

CREATE TABLE IF NOT EXISTS `artiste` (
  `id` int(255) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `artiste`
--

INSERT INTO `artiste` (`id`, `nom`, `prenom`) VALUES
(1, 'Amine', ''),
(2, 'O-Zone', ''),
(3, 'Bieber', 'Justin'),
(4, 'Emera', 'Louane'),
(5, 'Ocelot', 'Michel'),
(6, 'Mylod', 'Mark'),
(7, 'Pester', 'Lorie'),
(8, 'Ziade', 'Tarek'),
(9, 'Ingalls Wilder', 'Laura'),
(10, 'Chappuis', 'Philippe'),
(11, 'Keneally', 'Thomas');

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE IF NOT EXISTS `avis` (
  `id` int(255) NOT NULL,
  `idArticle` int(255) NOT NULL,
  `idAdherent` int(255) NOT NULL,
  `note` int(255) NOT NULL,
  `critique` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(100) NOT NULL,
  `libelle` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
(1, 'Dessin Anime'),
(2, 'Comedie'),
(3, 'Concert');

-- --------------------------------------------------------

--
-- Structure de la table `cd`
--

CREATE TABLE IF NOT EXISTS `cd` (
  `id` int(11) NOT NULL,
  `titre` varchar(30) NOT NULL,
  `date_parution` date NOT NULL,
  `categorie` varchar(30) NOT NULL,
  `cover` varchar(50) NOT NULL,
  `nbPistes` int(100) NOT NULL,
  `idAuteur` int(100) NOT NULL,
  `idCompositeur` int(100) NOT NULL,
  `idInterprete` int(100) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `duree` int(100) NOT NULL,
  `reserve` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `cd`
--

INSERT INTO `cd` (`id`, `titre`, `date_parution`, `categorie`, `cover`, `nbPistes`, `idAuteur`, `idCompositeur`, `idInterprete`, `genre`, `duree`, `reserve`) VALUES
(1, 'J''voulais', '2009-02-25', '', './View/image/J_voulais.jpg', 3, 1, 1, 1, 'Raï''n''B', 2903, 0),
(2, 'DiscO-Zone', '2004-06-04', '', './View/image/DiscO-Zone.jpg', 11, 2, 2, 2, 'Pop', 3169, 1),
(3, 'Never Say Never', '2015-08-30', '', './View/image/Never_Say_Never.jpg', 1, 3, 3, 3, 'Pop', 206, 1),
(4, 'Jour 1', '2014-03-21', '', './View/image/Jour_1.jpg', 1, 4, 4, 4, 'Variete Francaise', 223, 0);

-- --------------------------------------------------------

--
-- Structure de la table `dvd`
--

CREATE TABLE IF NOT EXISTS `dvd` (
  `id` int(255) NOT NULL,
  `titre` varchar(30) NOT NULL,
  `date_parution` date NOT NULL,
  `idCategorie` int(255) NOT NULL,
  `cover` varchar(50) NOT NULL,
  `genre` varchar(30) NOT NULL,
  `duree` int(255) NOT NULL,
  `idRealisateur` int(255) NOT NULL,
  `reserve` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `dvd`
--

INSERT INTO `dvd` (`id`, `titre`, `date_parution`, `idCategorie`, `cover`, `genre`, `duree`, `idRealisateur`, `reserve`) VALUES
(1, 'Kirikou et la sorciere', '1998-03-25', 1, './View/image/Kirikou.jpg', 'Dessin Anime', 4440, 5, 0),
(2, 'Ali G Indahouse', '2002-03-21', 2, './View/image/Ali_G.jpg', 'Comedie', 5280, 6, 1),
(3, 'Lorie Live Tour', '2008-06-20', 3, './View/image/Lorie.jpg', 'Concert', 9000, 7, 0);

-- --------------------------------------------------------

--
-- Structure de la table `ecrire`
--

CREATE TABLE IF NOT EXISTS `ecrire` (
  `idLivre` int(11) NOT NULL,
  `idArtiste` int(11) NOT NULL,
  `date_ecriture` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `emprunter`
--

CREATE TABLE IF NOT EXISTS `emprunter` (
  `idEmprunt` int(11) NOT NULL,
  `idMedia` int(11) DEFAULT NULL,
  `idAdherent` int(11) DEFAULT NULL,
  `dateEmprunt` date DEFAULT NULL,
  `typeMedia` varchar(255) DEFAULT NULL,
  `dateRetour` date NOT NULL,
  `renouvele` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `emprunter`
--

INSERT INTO `emprunter` (`idEmprunt`, `idMedia`, `idAdherent`, `dateEmprunt`, `typeMedia`, `dateRetour`, `renouvele`) VALUES
(1, 1, 2, '2016-01-16', 'Livre', '2016-02-13', 1),
(2, 2, 3, '2016-01-29', 'CD', '2016-02-12', 0);

-- --------------------------------------------------------

--
-- Structure de la table `interpreter`
--

CREATE TABLE IF NOT EXISTS `interpreter` (
  `idPiste` int(11) NOT NULL,
  `idArtiste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `jouer`
--

CREATE TABLE IF NOT EXISTS `jouer` (
  `idDvd` int(11) NOT NULL,
  `idArtiste` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE IF NOT EXISTS `livre` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `date_parution` date NOT NULL,
  `categorie` int(255) NOT NULL,
  `cover` varchar(30) NOT NULL,
  `idAuteur` int(100) NOT NULL,
  `resume` text NOT NULL,
  `type` varchar(30) NOT NULL,
  `reserve` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `livre`
--

INSERT INTO `livre` (`id`, `titre`, `date_parution`, `categorie`, `cover`, `idAuteur`, `resume`, `type`, `reserve`) VALUES
(1, 'Programmation Python', '2015-12-01', 1, './View/image/Python.jpg', 8, 'Python est tout indiqué pour le développement d''applications web : serveurs de contenu, moteurs de recherche, agents intelligents, objets distribués... Il est également performant pour réaliser des scripts d''administration système ou d''analyse de fichiers textuels, pour gérer l''accès à des bases de données, pour servir de langage glu entre plusieurs applications, réaliser des applications graphiques classiques, etc. Pour autant, le développeur n''exploitera vraiment sa puissance qu''en ayant acquis une certaine culture. C''est ce que ce livre permet d''acquérir par la description de techniques éprouvées dans tous les grands projets de développement en Python. Au-delà de la prise en main (installation des environnements d''exécution et de développement, rappels de syntaxe avec les primitives et la bibliothèque standard), cet ouvrage aborde les bonnes pratiques de développement Python, depuis les conventions de nommage et les design patterns objet les plus courants jusqu''à la programmation dirigée par les tests et l''optimisation de code. Enrichie en nouveaux cas pratiques et exercices, cette édition mise à jour pour Python 2.6 détaille également le script de migration 2to3 vers Python 3 et présente la bibliothèque ctypes qui permet de manipuler les structures de données en C/C++.', 'Manuel', 1),
(2, 'La petite maison dans la prairie', '1932-09-14', 2, './View/image/Petite_Maison.jpg', 9, 'Charles Ingalls, sa femme Caroline, leurs trois filles Mary, Laura et Carrie ainsi que leur chien Jack quittent le Wisconsin pour émigrer vers l''Ouest. Un long voyage sur un modeste chariot de pionniers bâché les attend pour aller au Kansas, un vaste état aux grandes étendues de prairies verdoyantes. Cependant, après de multiples événements, ils abandonnent leur maison de rondins du Wisconsin pour s''installer à Walnut Grove (Minnesota) au lieu-dit Plum Creek, où les terres sont fertiles. Charles va ensuite construire sa propre ferme et travaillera comme employé à la scierie du village.', 'Roman', 1),
(3, 'Titeuf : La loi du préau', '1996-06-12', 3, './View/image/Titeuf.jpg', 10, 'La série raconte la vie quotidienne de Titeuf, un enfant semblerait-il âgé de huit ou dix ans, à la mèche blonde caractéristique, de ses amis et de leur vision du monde des adultes. Une grande partie des discussions abordées concernent les mystères des filles, du sexe, de la séduction, et de Nadia, la fille dont Titeuf est plus ou moins secrètement amoureux. Une grande caractéristique de Titeuf sont ses nombreuses expressions, notamment « tchô » et « c''est pô juste ». Il est souvent accompagné de ses meilleurs amis, Manu, Hugo et François. Le nom Titeuf viendrait de « p''tit œuf » car Zep trouvait que son personnage avait la tête en forme d’œuf.', 'BD', 1),
(4, 'La liste de Schindler', '1994-02-04', 1, './View/image/Schindler.jpg', 11, 'En 1939, Oskar Schindler, un industriel ambitieux, recrute de la main d''oeuvre juive dans une fabrique de Cracovie pour l''armée allemande. Soutenu par un comptable juif, Itzhak Stern, il va sauver d''une mort certaine plus de milles juifs dont les noms ont été réunis sur une liste.\r\n\r\nEn 1944, la machine nazie s’emballe et Hitler décide d’activer l’extermination des juifs. La décision de fermer Plaszow pour envoyer tous les juifs à Auschwitz. Devant cette décision, Oskar Schindler réussi à convaincre un Goeth désabusé de racheter la main d’œuvre juive pour monter une usine en dehors de la Pologne. \r\nA l’aide de Stern, il va rédiger LA liste des gens que Schindler veut sauver de l’extermination. Jour après jour, les noms d’hommes, de femmes, de vieillards, d’enfants vont s’ajouter sur cette liste, chaque nom étant financé par Schindler. \r\n1100 personnes vont prendre le train pour la Hongrie et travailler dans une fabrique d’obus, échappant ainsi à l’extermination. Schindler financera avec sa fortune personnelle cette usine et fera en sorte qu’elle ne produise aucun obus en état de fonctionnement et ce pendant les 7 mois restant jusqu’à la libération par l’armée russe.', 'Roman', 1);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(255) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `cover` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `titre`, `contenu`, `cover`, `date`) VALUES
(1, 'bienvenue', 'Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.', './View/image/book.jpg', '0000-00-00 00:00:00'),
(2, 'Autre News', 'Exemple supplémentaire', './View/image/book.jpg', '2015-11-29 00:00:00'),
(3, 'Article 4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse commodo est placerat, sollicitudin diam sit amet, vulputate ante. Donec mollis erat mi. Nam mattis viverra feugiat. Vivamus luctus venenatis nisi eu sodales. Suspendisse in dolor fermentum, semper nisi eu, volutpat erat. Maecenas pellentesque mauris eget tortor rhoncus, fringilla maximus nibh finibus. Ut lacinia, elit ac dignissim varius, dui elit convallis nulla, ac bibendum purus elit quis nunc.', './View/image/book.jpg', '2015-12-10 19:21:13');

-- --------------------------------------------------------

--
-- Structure de la table `piste`
--

CREATE TABLE IF NOT EXISTS `piste` (
  `id` int(11) NOT NULL,
  `duree` int(100) NOT NULL,
  `titre` varchar(30) NOT NULL,
  `idAuteur` int(100) NOT NULL,
  `idCompositeur` int(100) NOT NULL,
  `idInterprete` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reserver`
--

CREATE TABLE IF NOT EXISTS `reserver` (
  `idReservation` int(11) NOT NULL,
  `idMedia` int(11) DEFAULT NULL,
  `idAdherent` int(11) DEFAULT NULL,
  `dateReservation` date DEFAULT NULL,
  `typeMedia` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `artiste`
--
ALTER TABLE `artiste`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cd`
--
ALTER TABLE `cd`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `dvd`
--
ALTER TABLE `dvd`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ecrire`
--
ALTER TABLE `ecrire`
  ADD PRIMARY KEY (`idLivre`,`idArtiste`);

--
-- Index pour la table `emprunter`
--
ALTER TABLE `emprunter`
  ADD PRIMARY KEY (`idEmprunt`);

--
-- Index pour la table `interpreter`
--
ALTER TABLE `interpreter`
  ADD PRIMARY KEY (`idPiste`,`idArtiste`);

--
-- Index pour la table `jouer`
--
ALTER TABLE `jouer`
  ADD PRIMARY KEY (`idDvd`,`idArtiste`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `piste`
--
ALTER TABLE `piste`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reserver`
--
ALTER TABLE `reserver`
  ADD PRIMARY KEY (`idReservation`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `artiste`
--
ALTER TABLE `artiste`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `cd`
--
ALTER TABLE `cd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `dvd`
--
ALTER TABLE `dvd`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `emprunter`
--
ALTER TABLE `emprunter`
  MODIFY `idEmprunt` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `piste`
--
ALTER TABLE `piste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `reserver`
--
ALTER TABLE `reserver`
  MODIFY `idReservation` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;

