-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 22 mai 2024 à 01:03
-- Version du serveur :  10.5.19-MariaDB-0+deb11u2-log
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `e22200744_db2`
--

-- --------------------------------------------------------

--
-- Structure de la table `T_ACTUALITE_ACT`
--

CREATE TABLE `T_ACTUALITE_ACT` (
  `act_id` int(11) NOT NULL,
  `act_titre` varchar(80) NOT NULL,
  `act_texte` varchar(500) NOT NULL,
  `act_date` datetime NOT NULL,
  `act_etat` char(1) NOT NULL,
  `com_pseudo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `T_ACTUALITE_ACT`
--

INSERT INTO `T_ACTUALITE_ACT` (`act_id`, `act_titre`, `act_texte`, `act_date`, `act_etat`, `com_pseudo`) VALUES
(1, 'Expostion 2024', 'L exposition de cette annee ouvrira ces porte le 30 mai 2024 nous esperons vous y voir nombreux/ses', '2024-02-05 11:01:51', 'E', 'venot.lisa.lv@gmail.com'),
(2, 'Attention travaux devant le batiment', 'Il y a des travaux devant le lieu de l exposition jusqu a fin juin, faites attention en vous garant', '2024-02-07 12:38:49', 'E', 'venot.lisa.lv@gmail.com'),
(3, 'Ajout de tableaux', 'L exposition de cette annee comptera plus de tableau que celle de l année passée pour notre plus grand bonheur', '2024-02-07 12:38:49', 'E', 'venot.lisa.lv@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `T_ASSOCIATION_ASS`
--

CREATE TABLE `T_ASSOCIATION_ASS` (
  `hyp_id` int(11) NOT NULL,
  `fic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `T_ASSOCIATION_ASS`
--

INSERT INTO `T_ASSOCIATION_ASS` (`hyp_id`, `fic_id`) VALUES
(2, 1),
(14, 1),
(3, 2),
(14, 2),
(1, 3),
(15, 3),
(1, 4),
(15, 4),
(5, 5),
(16, 5),
(4, 6),
(16, 6),
(3, 7),
(14, 7),
(4, 8),
(14, 8),
(4, 9),
(16, 9),
(6, 10),
(16, 10);

-- --------------------------------------------------------

--
-- Structure de la table `T_COMPTE_COM`
--

CREATE TABLE `T_COMPTE_COM` (
  `com_pseudo` varchar(200) NOT NULL,
  `com_motdepasse` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `T_COMPTE_COM`
--

INSERT INTO `T_COMPTE_COM` (`com_pseudo`, `com_motdepasse`) VALUES
('boignyfamilly@orange.fr', '9b83a0f6d1c83b356d2b1f0ba968b07a'),
('coucoutoi221@gmail.com', '925f9e2e93c2bb867c4fdd9fa36038de'),
('e@e.fr', '5aac058fb4e708d19a77780ed6bd50b1'),
('fireicegame35@gmail.com', '2db34c54d884ffacc35f9444a0901c79'),
('gestionnaire1@nom_etablissement.fr', 'd1c7dd460b0ab4887399c1ae45f6c6b1'),
('jk@kiki.com', 'e10adc3949ba59abbe56e057f20f883e'),
('m@m.fr', 'b735b0c78e12553e91397a3ff19f8fd1'),
('samson.damien19@gmail.com', 'b41aec99ce80aa855756adf00ed681c1'),
('th212.rigolt@gmail.com', '5c0035865d854fce0896ef115666cdd8'),
('vanessaplt12@gmail.com', '3756163e63eece7f052351d4661c4319'),
('venot.lisa.lv@gmail.com', '19e70287b0b32b19af89a94682cce24a');

-- --------------------------------------------------------

--
-- Structure de la table `T_FICHE_FIC`
--

CREATE TABLE `T_FICHE_FIC` (
  `fic_id` int(11) NOT NULL,
  `fic_label` varchar(80) NOT NULL,
  `fic_contenue` varchar(500) NOT NULL,
  `fic_image` varchar(300) NOT NULL,
  `fic_code` char(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `fic_etat` char(1) NOT NULL,
  `suj_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `T_FICHE_FIC`
--

INSERT INTO `T_FICHE_FIC` (`fic_id`, `fic_label`, `fic_contenue`, `fic_image`, `fic_code`, `fic_etat`, `suj_id`) VALUES
(1, 'Peinture du port de brest faite par NOEL Jules', 'Peinture du port de Brest en 1864 faites par Jules NOEL. C est une huile sur toile mesurant 114 par 146cm. Elle est exposé habituellement dans le musée des Beaux-Arts de brest', 'brest2.jpeg', 'Tab_Br-21489', 'E', 1),
(2, 'Peinture du port de brest faites par Louis-Nicolas Van Blarenberghe', 'Peinture du port de Brest en 1774 faites par Louis-Nicolas Van Blarenberghe. C est une huile sur toile mesurant 74.3 par 107cm. Elle est exposé habituellement au Metropolitan Museum of Art a New York', 'brest1.jpeg', 'Tab_Br-45618', 'E', 1),
(3, 'Peinture de Concarneau par Fernand Le Gout-Gérard', 'Peinture de Concarneau faites par Fernand Le Gout-Gérard. C est une huile sur toile mesurant 81 par 100cm. Le nom de cette peinture est Concarneau,retour de pêche,l attente des Bretonnes', 'concarneau2.jpeg', 'Tab_Co-48123', 'E', 2),
(4, 'Peinture de Concarneau par Fernand Le Gout-Gérard', 'Peinture de Concarneau faites par Fernand Le Gout-Gérard en 1910. Le nom de cette peinture est Quai animé à Concarneau ', 'concarneau1.jpeg', 'Tab_Co-75941', 'E', 2),
(5, 'Peinture du port de lorient faites par Berthe Morisot', 'Peinture du port de Brest faites par Berthe Morisot en 1869. C est une huile sur toile mesurant 43 par 72cm. Elle est exposé habituellement au	National Gallery of Art a Washington', 'lorient2.jpg', 'Tab_Lo-45678', 'E', 3),
(6, 'Peinture du port de lorient faites par \r\nJean-Francois Hue', 'Peinture du port de Lorient faites par Jean-Francois Hue', 'lorient1.jpg', 'Tab_Lo-78315', 'E', 3),
(7, 'Peinture du port de Brest faites par Louis-Nicolas Van Blarenberghe', 'Peinture du port de Brest en 1776 faites par Louis-Nicolas Van Blarenberghe, intitulé Le Port de Brest, une prise de la mâture . C est une gouache sur velin mesurant 36.6 par 62.4cm. Elle est exposé habituellement dans le musée des Beaux-Arts de brest', 'brest4.jpg', 'Tab_Br-48523', 'E', 1),
(8, 'Peinture du port de Brest faites par Jean Francois Hue', 'Peinture du port de Brest en 1795 faites par Jean-Francois Hue. C est une huile sur toile mesurant 160 par 260.5cm. Elle est exposé habituellement dans le musée du Louvre', 'brest3.jpg', 'Tab_Br-43452', 'E', 1),
(9, 'Peinture de la rade de Lorient faites par Arnaud Guibé', 'Peinture de la rade de Lorient faites par Arnaud Guibé. C est une acrylique sur toile mesurant 30.5 par 50.5cm.', 'lorient3.jpg', 'Tab_Lo-78126', 'E', 3),
(10, 'Peinture du port de Lorient faites par Jean-Francois Hue', 'Peinture du port de Lorient au 18eme siecle faites par Jean-Francois Hue. C est un tableau mesurant 117 par 176cm.Elle est exposé au musée Port Louis', 'lorient4.jpg', 'Tab_Lo-45212', 'E', 3),
(11, 'Peinture de la ville de Concarneau faites par Henri Barnoin', 'Peinture de la ville de Concarneau au 20eme siecle faites par Henri Barnoin. C est une huile sur toile', 'concarneau3.jpg', 'Tab_Co-77889', 'E', 2),
(12, 'Peinture de la plage de Concarneau faites par Annick Berteaux ', 'Peinture de la plage de Concarneau faites par Annick Bertaux en 2017. C est une aquarelle sur papier mesurant 21 par 31cm', 'concarneau4.jpg', 'Tab_Co-74185', 'E', 2);

-- --------------------------------------------------------

--
-- Structure de la table `T_HYPERLIEN_HYP`
--

CREATE TABLE `T_HYPERLIEN_HYP` (
  `hyp_id` int(11) NOT NULL,
  `hyp_nom` varchar(80) NOT NULL,
  `hyp_url` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `T_HYPERLIEN_HYP`
--

INSERT INTO `T_HYPERLIEN_HYP` (`hyp_id`, `hyp_nom`, `hyp_url`) VALUES
(1, 'Fernand Legout-Gérard', 'https://fr.wikipedia.org/wiki/Fernand_Legout-G%C3%A9rard'),
(2, 'Jules Noel', 'https://fr.wikipedia.org/wiki/Jules_No%C3%ABl_(peintre)'),
(3, 'Louis-Nicolas Blarenberghe', 'https://fr.wikipedia.org/wiki/Louis-Nicolas_Van_Blarenberghe'),
(4, 'Jean-François Hue', 'https://fr.wikipedia.org/wiki/Jean-Fran%C3%A7ois_Hue'),
(5, 'Berthe Morisot', 'https://fr.wikipedia.org/wiki/Berthe_Morisot'),
(6, 'Arnaud Guibé', 'https://www.artmajeur.com/aguibeart'),
(7, 'Henri Barnoin', 'https://fr.wikipedia.org/wiki/Henri_Alphonse_Barnoin'),
(8, 'Annick Berteaux', 'hhttps://www.faunesauvage.fr/fsartiste/berteaux-annick'),
(14, 'Ville de Brest', 'https://www.brest-metropole-tourisme.fr/'),
(15, 'Ville de Concarneau', 'https://www.concarneau.fr/ville/'),
(16, 'Ville de Lorient', 'https://www.lorient.bzh/');

-- --------------------------------------------------------

--
-- Structure de la table `T_PROFIL_PRO`
--

CREATE TABLE `T_PROFIL_PRO` (
  `com_pseudo` varchar(200) NOT NULL,
  `pro_nom` varchar(80) NOT NULL,
  `pro_prenom` varchar(80) NOT NULL,
  `pro_validite` char(1) NOT NULL,
  `pro_statut` char(1) NOT NULL,
  `pro_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `T_PROFIL_PRO`
--

INSERT INTO `T_PROFIL_PRO` (`com_pseudo`, `pro_nom`, `pro_prenom`, `pro_validite`, `pro_statut`, `pro_date`) VALUES
('boignyfamilly@orange.fr', 'venot', 'benoit', 'A', 'M', '2024-02-02'),
('coucoutoi221@gmail.com', 'rigolts', 'matteo', 'A', 'G', '2023-02-13'),
('e@e.fr', 'edward', 'ed', 'D', 'M', '2024-04-06'),
('fireicegame35@gmail.com', 'leroy', 'merlin', 'A', 'M', '2023-07-02'),
('gestionnaire1@nom_etablissement.fr', 'marc', 'valerie', 'A', 'G', '2022-02-02'),
('jk@kiki.com', 'o\'kif', 'jeff', 'A', 'M', '2024-04-18'),
('m@m.fr', 'fontaine', 'tom', 'A', 'G', '2024-04-06'),
('samson.damien19@gmail.com', 'samson', 'damien', 'A', 'M', '2022-08-02'),
('th212.rigolt@gmail.com', 'rigolt', 'thomas', 'A', 'M', '2023-08-07'),
('vanessaplt12@gmail.com', 'pilot', 'vanessa', 'A', 'M', '2024-01-01'),
('venot.lisa.lv@gmail.com', 'venot', 'lisa', 'A', 'G', '2022-02-02');

-- --------------------------------------------------------

--
-- Structure de la table `T_SUJET_SUJ`
--

CREATE TABLE `T_SUJET_SUJ` (
  `suj_id` int(11) NOT NULL,
  `suj_nom` varchar(80) NOT NULL,
  `suj_date` date NOT NULL,
  `com_pseudo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `T_SUJET_SUJ`
--

INSERT INTO `T_SUJET_SUJ` (`suj_id`, `suj_nom`, `suj_date`, `com_pseudo`) VALUES
(1, 'Port de brest', '2024-03-05', 'samson.damien19@gmail.com'),
(2, 'Ville de Concarneau', '2024-03-05', 'venot.lisa.lv@gmail.com'),
(3, 'Ville de Lorient', '2024-03-05', 'venot.lisa.lv@gmail.com'),
(4, 'Ville de Rennes', '2024-04-08', 'm@m.fr');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `T_ACTUALITE_ACT`
--
ALTER TABLE `T_ACTUALITE_ACT`
  ADD PRIMARY KEY (`act_id`),
  ADD KEY `fk_act_com` (`com_pseudo`);

--
-- Index pour la table `T_ASSOCIATION_ASS`
--
ALTER TABLE `T_ASSOCIATION_ASS`
  ADD PRIMARY KEY (`fic_id`,`hyp_id`),
  ADD KEY `fk_ass_hyp` (`hyp_id`);

--
-- Index pour la table `T_COMPTE_COM`
--
ALTER TABLE `T_COMPTE_COM`
  ADD PRIMARY KEY (`com_pseudo`);

--
-- Index pour la table `T_FICHE_FIC`
--
ALTER TABLE `T_FICHE_FIC`
  ADD PRIMARY KEY (`fic_id`),
  ADD KEY `fk_fic_suj` (`suj_id`);

--
-- Index pour la table `T_HYPERLIEN_HYP`
--
ALTER TABLE `T_HYPERLIEN_HYP`
  ADD PRIMARY KEY (`hyp_id`);

--
-- Index pour la table `T_PROFIL_PRO`
--
ALTER TABLE `T_PROFIL_PRO`
  ADD PRIMARY KEY (`com_pseudo`);

--
-- Index pour la table `T_SUJET_SUJ`
--
ALTER TABLE `T_SUJET_SUJ`
  ADD PRIMARY KEY (`suj_id`),
  ADD KEY `fk_suj_com` (`com_pseudo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `T_ACTUALITE_ACT`
--
ALTER TABLE `T_ACTUALITE_ACT`
  MODIFY `act_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `T_FICHE_FIC`
--
ALTER TABLE `T_FICHE_FIC`
  MODIFY `fic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `T_HYPERLIEN_HYP`
--
ALTER TABLE `T_HYPERLIEN_HYP`
  MODIFY `hyp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `T_SUJET_SUJ`
--
ALTER TABLE `T_SUJET_SUJ`
  MODIFY `suj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `T_ACTUALITE_ACT`
--
ALTER TABLE `T_ACTUALITE_ACT`
  ADD CONSTRAINT `fk_act_com` FOREIGN KEY (`com_pseudo`) REFERENCES `T_COMPTE_COM` (`com_pseudo`);

--
-- Contraintes pour la table `T_ASSOCIATION_ASS`
--
ALTER TABLE `T_ASSOCIATION_ASS`
  ADD CONSTRAINT `fk_ass_fic` FOREIGN KEY (`fic_id`) REFERENCES `T_FICHE_FIC` (`fic_id`),
  ADD CONSTRAINT `fk_ass_hyp` FOREIGN KEY (`hyp_id`) REFERENCES `T_HYPERLIEN_HYP` (`hyp_id`);

--
-- Contraintes pour la table `T_FICHE_FIC`
--
ALTER TABLE `T_FICHE_FIC`
  ADD CONSTRAINT `fk_fic_suj` FOREIGN KEY (`suj_id`) REFERENCES `T_SUJET_SUJ` (`suj_id`);

--
-- Contraintes pour la table `T_PROFIL_PRO`
--
ALTER TABLE `T_PROFIL_PRO`
  ADD CONSTRAINT `fk_pro_com` FOREIGN KEY (`com_pseudo`) REFERENCES `T_COMPTE_COM` (`com_pseudo`);

--
-- Contraintes pour la table `T_SUJET_SUJ`
--
ALTER TABLE `T_SUJET_SUJ`
  ADD CONSTRAINT `fk_suj_com` FOREIGN KEY (`com_pseudo`) REFERENCES `T_COMPTE_COM` (`com_pseudo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
