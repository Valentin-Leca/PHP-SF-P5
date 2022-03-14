-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 14 mars 2022 à 10:02
-- Version du serveur :  8.0.20
-- Version de PHP : 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `contenu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date_creation` date NOT NULL,
  `utilisateur_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `description`, `contenu`, `date_creation`, `utilisateur_id`) VALUES
(1, 'Le chat : que lui reste-t-il de ses ancêtres sauvages ?', 'Le chat, un vieux compagnon à la domestication inachevée', 'En novembre 2019, les autorités égyptiennes annonçaient la découverte, sur le site de Saqqarah, de nombreuses momies et statues d’animaux, dont les plus nombreuses étaient celles de chats. L’intérêt que l’Égypte antique portait au petit félin a longtemps laissé supposer que les chats avaient été domestiqués sur les bords du Nil, 3 000 ans avant J.-C. Pourtant, les plus récentes mises au jour témoignent d’une cohabitation bien plus ancienne, qui remonterait au moins à 10 000 ans, en ces temps néolithiques où l’homme fit ses premiers pas d’agriculteur. L’histoire commune a commencé dans les villages du Moyen-Orient. Les réserves des céréales alors cultivées étaient une manne pour les rongeurs. C’est donc d’un œil bienveillant que les premiers fermiers observèrent les chats sauvages approcher leurs greniers pour chasser les indésirables. Tout naturellement, le chat s’est installé près des habitations, comme un commensal profitant de la disponibilité de nourriture, sans toutefois entretenir de relation avec les humains. \r\n\r\nQuand et pourquoi a-t-il franchi la porte du foyer ? Il est impossible de le dire, d’autant que cette domestication s’est probablement produite à plusieurs reprises et dans différents endroits. Cet apprivoisement a dû néanmoins intervenir très tôt. En 2004, à Chypre, la mise au jour d’une sépulture humaine vieille de 9 000 ans révèle la présence d’un chat aux côtés du défunt. Cette découverte signifie d’abord que les humains partis à la conquête de nouvelles terres avaient embarqué sur leurs bateaux des animaux domestiques, dont des chats. Elle indique ensuite que certains d’entre eux étaient suffisamment importants aux yeux des hommes pour les suivre dans leur tombe… Le chat était donc aimé des humains 5 000 ans avant que la civilisation égyptienne n’en fasse le compagnon de son rêve d’éternité. Depuis les bords du Nil, les chats se sont répandus en Asie du Sud-Ouest, en Afrique et en Europe. Même des sites vikings sur la côte baltique ont livré des ossements de chats originaires du pays des pharaons. ', '2021-12-10', 1),
(2, 'Alimentation du chien : fait maison, croquettes, pâtées ?', 'Croquettes pour chien, pâtée en boîte, ou repas fait maison, à base de viande fraîche : comment nourrir son chien pour qu\'il reste en bonne santé ?', 'Le chien, un animal carnivore\r\nOn entend parfois dire que le chien est omnivore et qu\'il mange la même chose que l\'homme. C\'est une erreur ! Le chien est un carnivore : avant d\'être domestiqué par l\'homme, il se nourrissait de la chasse et de charognes. Il suffit de regarder ses dents pour s\'en convaincre : ses molaires et prémolaires, tranchantes, sont faites pour déchirer la viande et broyer les os, et non pour mastiquer des aliments végétaux. La viande doit donc constituer l\'élément de base du régime alimentaire du chien.\r\n\r\nge celui d\'être (en principe) conçus pour être équilibrés. Formulés par des vétérinaires diététiciens, ils sont censés apporter au chien tout ce dont il a besoin, notamment en termes de protéines, acides gras essentiels, vitamines et minéraux. Second avantage, les aliments industriels sont pratiques : on ouvre la boîte ou le sachet, on distribue l\'aliment. C\'est facile, c\'est simple.\r\n\r\nReste qu\'il faut bien choisir ce que l\'on achète : méfiez-vous des produits d\'entrée de gamme, fabriqués à partir de produits carnés de qualité contestable, contenant des céréales en excès, des graisses de mauvaise qualité (destinées à rendre les aliments plus appétents), et des colorants, notamment dans les croquettes (ça, c\'est pour séduire le maître : vert pour les soi-disant légumes, jaune pour les céréales, rouge pour la viande !). En outre, les pâtées humides peuvent renfermer beaucoup d\'eau (jusqu\'à 85%), ce qui les rend moins intéressantes nutritionnellement.\r\n\r\nUn conseil donc : que vous optiez pour des croquettes ou des boîtes, préférez la nourriture \"premium\". Plus chère mais aussi de meilleure qualité, elle assure à votre animal une alimentation plus équilibrée, plus adaptée à ses besoins, gage d\'une meilleure santé pour le chien et permettant de prévenir les troubles de santé.', '2021-12-10', 1),
(9, 'CORONAVIRUS ET PANDÉMIE DE COVID-19', '« Le Covid ne baisse plus, il augmente même » en France, le gouvernement « reste extrêmement vigilant »', 'Alors que la France s’apprête à lever de nombreuses restrictions, lundi 14 mars, le ministre de la santé, Olivier Véran, a fait état, vendredi 11 mars, d’un « rebond » de l’épidémie de Covid-19, mettant en exergue la nécessité pour les personnes fragiles de « continuer à se protéger ».\r\n\r\n« Nous constatons actuellement un rebond, en France, dans les pays qui nous entourent, c’est-à-dire que le Covid ne baisse plus, il augmente même », a dit le ministre lors d’un déplacement en Isère. « Au vu des derniers chiffres d’hier, c’est 20 % d’augmentation », a-t-il précisé. Le nombre de nouveaux cas positifs s’élevait jeudi soir à 74 818, selon Santé publique France, contre 60 225 il y a une semaine.', '2022-02-18', 1),
(19, 'Avec le prix de l’essence, est-ce que travailler vaut encore le coup ?', 'Taxis, aides à domiciles, agriculteurs ou chauffeurs routiers, certaines professions sont particulièrement exposées à l’augmentation continue des prix des carburants depuis dix semaines.', 'Sur la page Facebook qui rassemble plus de 6 000 aides à domicile et auxiliaires de vie, une même préoccupation s’affiche d’une publication à l’autre : « Avec le prix de l’essence, est-ce que travailler vaut encore le coup ? » Comme beaucoup de Français qui utilisent leur voiture quotidiennement, ces femmes qui vont et viennent toute la semaine chez des personnes âgées pour les aider dans leur vie quotidienne, constatent avec appréhension l’augmentation continue des prix des carburants depuis maintenant dix semaines.\r\n\r\nIls battaient déjà des records avant le début de la guerre en Ukraine, sur fond de reprise économique mondiale et d’extractions de pétrole toujours limitées des grands pays producteurs, mais l’offensive russe a poussé les cours du brut à des sommets. En France, le sans plomb 95 a pris 7 centimes en une semaine, et s’affiche en moyenne à 1,8889 euro le litre, quand celui de gazole a bondi de 14 centimes, à 1,8831 euro selon les derniers relevés officiels, datant du vendredi 4 mars. Soit respectivement + 26,7 % et + 36,8 % sur un an. Ce ne sont que des moyennes : les prix dépassent les 2 euros sur l’autoroute ou dans Paris.\r\n\r\n« On ne va pas s’en sortir ! », s’emporte Sylvie Clément, aide à domicile dans le secteur associatif. Sa convention collective prévoit une indemnité de 35 centimes du kilomètre, un prix qui n’a pas bougé depuis 2010 et est censé couvrir l’amortissement du véhicule, l’entretien, l’assurance, et le prix du carburant. C’est encore moins dans le secteur privé, où l’indemnité kilométrique est souvent collée au plancher fixé à 22 centimes du kilomètre. « Je fais 280 km par semaine. A ce prix-là, se déplacer pour une demi-heure n’est plus rentable. » D’autant que le métier, qui rémunère au smic ou juste au-dessus, embauche rarement à temps plein. « Autour de moi, des filles préfèrent arrêter de travailler que de voir 20 % de leur petit salaire partir en essence », explique Anne Lauseig, assistante de vie en Gironde.', '2022-03-04', 1),
(35, 'Besoin de lâcher prise ? Cinq séjours pour échapper au burn-out', '« La Matinale » vous invite au voyage. Cette semaine, on débranche tout, on coupe le son, on se laisse porter par les courants énergétiques dans l’Oise ou on revient à soi grâce à une cure thermale savoyarde.', 'En yourtes à côté de Paris ou en château bourguignon, dans un mas provençal ou à La Baule, face à l’Atlantique, laissez-vous masser, coacher, en vous baladant ou en participant à une simple cérémonie du thé.\r\n\r\nA moins d’une heure trente de Paris, Max et Sophie Gausselmann ont créé La Ferme du Tao, à Beaugies-sous-Bois, dans l’Oise. Max Gausselmann, diplômé en médecines traditionnelles chinoises, propose des initiations, individuelles ou en couple, au qi gong et au tai-chi-chuan. Gymnastique très lente, le tai-chi propose d’apprendre à ralentir pour sentir et rééquilibrer les courants énergétiques. Une histoire de yin et yang ! Cet Allemand a installé des yourtes parfaitement chauffées dans son jardin pour accueillir les visiteurs en quête d’équilibre et de sérénité. Reprendre son souffle au contact de la nature, participer à une cérémonie du thé, s’apaiser au contact des chevaux, se balader au bord de l’Oise ou aller découvrir la superbe cathédrale Notre-Dame de Noyon, telles sont les options d’un séjour entièrement pensé pour se faire du bien.', '2022-03-11', 1),
(36, 'L’«Endurance», mythique bateau britannique de l’expédition Shackleton, retrouvé dans l’Antarctique.', 'Ce mercredi, les membres de l’expédition Endurance22 ont annoncé avoir retrouvé l’épave du navire de l’explorateur britannique Ernest Shackleton, recherchée depuis son naufrage en 1915.', 'La caméra avance péniblement dans les fonds marins obscurs. Puis se dévoile progressivement à l’image la carcasse d’un imposant voilier sur lequel sont accrochés quelques crustacés. Sur la poupe, on peut lire distinctement l’inscription «Endurance». Bingo : les marins et chercheurs de l’expédition Endurance22 viennent de mettre la main sur le bateau le plus recherché du Royaume-Uni, porté disparu depuis cent-sept ans.\r\n\r\nUn mois plus tôt, une équipe d’une centaine de personnes avait quitté Le Cap à bord du brise-glace sud-africain Agulhas II, l’un des navires de recherche polaire les plus grands et modernes au monde. L’objectif de cette mission de quelques semaines, financée à hauteur de 10 millions d’euros par un mystérieux donateur anonyme, était de retrouver l’Endurance, gros trois-mâts goélette qui avait coulé dans l’Antarctique en octobre 1915.', '2022-03-11', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int NOT NULL,
  `commentaire` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `article_id` int NOT NULL,
  `utilisateur_id` int NOT NULL,
  `date_creation_com` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `commentaire`, `article_id`, `utilisateur_id`, `date_creation_com`, `status`) VALUES
(1, 'Très bon article !', 1, 2, '2021-12-10', 2),
(2, 'Moi aussi, j\'adore les blogs ! <3', 2, 3, '2021-12-10', 2),
(25, 'test commentaire en attente\r\n', 2, 12, '2022-03-04', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `mail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `login`, `mail`, `password`, `role`) VALUES
(1, 'Lecavelier', 'Valentin', 'Vleca', 'valentin.val78@hotmail.fr', '$2y$10$XT1WIgYc1rgNlxgrWzq/I.gSOXkmukN6d/8uVlE.NVRIWsGPUxhtS', 2),
(2, 'Bosq', 'Marie', 'Mbosq', 'marie.mbosq@outlook.fr', '$2y$10$wv5X5./j39vKLeRkFgnseOhYxUzCs9CUrhgI.r5OVCavid7KpEE7C', 1),
(3, 'Dupont', 'Jeannine', 'Jeniane', 'jeje.nin@sfr.fr', '$2y$10$smqUzkOXy6x2xUtWKiNoZu3roWNNpjFfnrVT05EPXI9sZ9c5.J80q', 1),
(12, 'Pearl', 'Cédric', 'Cpearl', 'test.test@test.com', '$2y$10$qu/oLrHngBJudBO1PuhxuOB1fVt1c2nWEclxX3XpOUQAozisl14AW', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`),
  ADD KEY `commentaire_ibfk_1` (`article_id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
