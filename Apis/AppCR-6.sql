-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 29 jan. 2024 à 09:30
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `AppCR`
--

-- --------------------------------------------------------

--
-- Structure de la table `Cabinet`
--

CREATE TABLE `Cabinet` (
  `id_cabinet` int(11) NOT NULL,
  `nom` text NOT NULL,
  `ville` text DEFAULT NULL,
  `codePostal` int(7) DEFAULT NULL,
  `rue` varchar(255) DEFAULT NULL,
  `id_region` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Cabinet`
--

INSERT INTO `Cabinet` (`id_cabinet`, `nom`, `ville`, `codePostal`, `rue`, `id_region`) VALUES
(1, 'Cabinet Des Terreaux', 'Lyon', 69001, '3 rue des Capucins', 2),
(2, 'Cabinet Sans-Soucis', 'Lyon', 69003, '54 cour Albert Thomas', 2),
(3, 'cabinet de l\'hotel de ville', 'saint etienne', 42000, '01 place hotel de ville', 2),
(4, 'cabinet jules ledin', 'saint etienne', 42000, '14 rue jules ledin', 2);

-- --------------------------------------------------------

--
-- Structure de la table `CompteRendu`
--

CREATE TABLE `CompteRendu` (
  `id_compteRendu` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `motif` text DEFAULT NULL,
  `bilan` varchar(1000) DEFAULT NULL,
  `id_visiteur` int(11) DEFAULT NULL,
  `id_praticien` int(11) DEFAULT NULL,
  `id_echantillon_1` int(11) DEFAULT NULL,
  `id_echantillon_2` int(11) DEFAULT NULL,
  `note` int(1) DEFAULT NULL,
  `id_cabinet` int(11) DEFAULT NULL,
  `id_region` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `CompteRendu`
--

INSERT INTO `CompteRendu` (`id_compteRendu`, `date`, `motif`, `bilan`, `id_visiteur`, `id_praticien`, `id_echantillon_1`, `id_echantillon_2`, `note`, `id_cabinet`, `id_region`) VALUES
(4, '2023-12-02', 'Visite présentation produit', 'Ensemble très bien', 28, 2, 3, 3, 4, 1, 2),
(5, '2023-12-05', 'Visite présentation produit', 'Très bien passé. Mais le produit n\'a pas plu.', 28, 1, 3, 3, 4, 2, 2),
(6, '2023-12-14', 'Première visite', 'Très bien passé', 28, 2, 3, 3, 5, 1, 2),
(10, '2023-12-14', 'Visite présentation produit', 'Bien', 28, 3, 3, 3, 5, 1, 2),
(11, '2023-12-07', 'Visite présentation produit', 'Bien', 28, 3, 3, 3, 5, 1, 2),
(33, '2023-11-09', 'relance visite', 'pour l\'intégration potentielle du produit dans sa pratique quotidienne. Il a posé des questions spécifiques sur l\'aspect technique et a demandé des éclaircissements sur l\'aspect clinique. Dans l\'ensemble, la visite a été positive, et le praticien a montré un intérêt à en savoir plus sur les prochaines étapes. \r\n', 29, 5, 4, 1, 2, 4, 2),
(36, '2023-11-09', 'relance visite', 'pour l&#039;intégration potentielle du produit dans sa pratique quotidienne. Il a posé des questions spécifiques sur l&#039;aspect technique et a demandé des éclaircissements sur l&#039;aspect clinique. Dans l&#039;ensemble, la visite a été positive, et le praticien a montré un intérêt à en savoir plus sur les prochaines étapes. \r\n', 29, 4, 3, 5, 2, 3, 2),
(37, '2023-11-17', 'visite', 'Bien que le médecin ait montré un certain scepticisme au début, il a semblé plus à l\'aise après avoir eu des réponses satisfaisantes à ses questions. Il a suggéré que des essais cliniques pilotes pourraient être envisagés dans son établissement pour évaluer l\'efficacité du produit dans un contexte réel.', 29, 5, 1, 6, 4, 4, 2),
(39, '2023-11-24', 'visite', 'Le médecin a montré une ouverture à l&#039;idée d&#039;explorer le produit davantage et a demandé des informations sur les prochaines étapes, y compris la disponibilité d&#039;échantillons pour des essais pratiques. Il a également exprimé son intérêt pour une réunion de suivi pour approfondir certains aspects du produit. La visite s&#039;est conclue sur une note positive avec un engagement continu du praticien à explorer la possibilité d&#039;intégrer le produit dans sa pratique clinique.', 28, 1, 3, 5, 4, 2, 2),
(40, '2023-11-24', 'visite', 'Le médecin a montré une ouverture à l&#039;idée d&#039;explorer le produit davantage et a demandé des informations sur les prochaines étapes, y compris la disponibilité d&#039;échantillons pour des essais pratiques. Il a également exprimé son intérêt pour une réunion de suivi pour approfondir certains aspects du produit. La visite s&#039;est conclue sur une note positive avec un engagement continu du praticien à explorer la possibilité d&#039;intégrer le produit dans sa pratique clinique.', 28, 1, 3, 5, 4, 2, 2),
(41, '2023-12-05', 'visite', 'Le médecin a exprimé son enthousiasme pour l&#039;approche novatrice du produit et a posé des questions pertinentes sur son intégration potentielle dans les protocoles de traitement existants. Il a suggéré d&#039;organiser une session de formation pour son équipe afin d&#039;optimiser l&#039;utilisation du produit.', 28, 4, 6, 5, 2, 3, 2),
(42, '2023-12-02', 'visite', 'La visite a été constructive, bien que le médecin ait exprimé le besoin de données complémentaires avant de considérer pleinement l&#039;intégration du produit dans sa pratique. Il a accepté de participer à des essais cliniques pilotes pour évaluer plus avant l&#039;efficacité et la sécurité du produit.', 28, 4, 2, 4, 4, 3, 2),
(43, '2023-12-01', 'visite', 'Le médecin a exprimé son enthousiasme pour l&#039;approche novatrice du produit et a posé des questions pertinentes sur son intégration potentielle dans les protocoles de traitement existants. Il a suggéré d&#039;organiser une session de formation pour son équipe afin d&#039;optimiser l&#039;utilisation du produit.', 28, 5, 6, 2, 2, 4, 2),
(47, '2024-01-19', 'test', 'Ensemble très bien', NULL, NULL, 3, 2, 4, 2, 2),
(48, '2024-01-19', 'test', 'Ensemble très bien', NULL, NULL, 3, 2, 4, 2, 2),
(49, '2024-01-19', 'test', 'Ensemble très bien', NULL, NULL, 3, 2, 4, 2, 2),
(50, '2024-01-19', 'test', 'Ensemble très bien', NULL, NULL, 3, 2, 4, 2, 2),
(58, '2024-01-19', 'test', 'Ensemble très bien', 7, 5, 3, 2, 4, 2, 2),
(60, '2024-01-19', 'test', 'Ensemble très bien', 7, 5, 3, 2, 4, 2, 2),
(61, '2024-01-19', 'test', 'Ensemble très bien', 7, 5, 3, 2, 4, 2, 2),
(62, '2024-01-24', 'test', 'ceci est un test de l\'api Update', 7, 5, 3, 2, 2, 2, 2),
(63, '2024-01-25', 'test', 'Ensemble très bien', 7, 5, 3, 2, 4, 2, 2),
(64, '2024-01-25', 'test', 'Ensemble très bien', 7, 5, 3, 2, 4, 2, 2),
(65, '2024-01-25', 'test', 'Ensemble très bienfdfggdfngjdfngjkdf', 7, 5, 3, 2, 4, 2, 2),
(66, '2024-01-25', 'test', 'Ensemble très bienfdfggdfngjdfngjkdf', 7, 5, 3, 2, 4, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `Echantillon`
--

CREATE TABLE `Echantillon` (
  `id_echantillon` int(11) NOT NULL,
  `nom` text DEFAULT NULL,
  `dateDistribution` date DEFAULT NULL,
  `quantite` int(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `sortie` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Echantillon`
--

INSERT INTO `Echantillon` (`id_echantillon`, `nom`, `dateDistribution`, `quantite`, `description`, `sortie`) VALUES
(1, 'paracétamol', '1878-11-16', 2000, 'Le paracétamol, aussi appelé acétaminophène, est un composé chimique utilisé comme antalgique et antipyrétique, qui figure parmi les médicaments les plus communs, utilisés et prescrits au monde.', 1),
(2, 'ibuprofène', '1961-05-16', 2000, 'Il s\'agit de la substance active d\'un médicament AINS utilisé pour soulager les symptômes de l\'arthrite, de la dysménorrhée primaire, de la pyrexie et comme analgésique, spécialement en cas d\'inflammation.', 0),
(3, 'morphine', '1804-03-16', 2000, 'Médicament extrait de l\'opium, capable de calmer des douleurs intenses en agissant sur le système nerveux central (analgésique central) et de provoquer l\'endormissement.', 1),
(4, 'Venlafaxine', '2023-11-01', 2000, 'La venlafaxine, est un antidépresseur utilisé pour le traitement de la dépression et les troubles anxieux. C&#039;est un inhibiteur de la recapture de la sérotonine et de la noradrénaline (IRSNa). À doses élevées, il inhibe également la recapture de la dopamine, mais dans une moindre mesure. Son nom commercial est Effexor (de l&#039;entreprise Wyeth).  La venlafaxine est disponible dans les pharmacies en gélules ou comprimés de 37,5, 75, 150, et 225 mg uniquement sur ordonnance.', 0),
(5, 'Quitaxon', '2023-11-01', 2000, 'Ce médicament appartient à la famille des antidépresseurs imipraminiques. Il possède des effets atropiniques, qui ne participent pas à son activité, mais qui expliquent certaines contre-indications et certains effets indésirables.', 1),
(6, 'berroca', '2023-11-01', 2000, 'Berocca Performance est une formulation de vitamines B, de vitamine C et de magnésium, de calcium et de zinc ajoutés. Lors de sa sortie pour la première fois en 1969, Berocca est venu dans une seule saveur, Berry, qui est devenu plus tard Original Berry. Il est maintenant disponible en quatre saveurs : Berry Original, Orange, Blackcurrant et Mango &amp; Orange.  Le médecin a exprimé son enthousiasme pour l&#039;intégration potentielle du produit dans sa pratique quotidienne. Il a posé des questions spécifiques sur [aspect technique] et a demandé des éclaircissements sur [aspect clinique]. Dans l&#039;ensemble, la visite a été positive, et le Dr. [Nom du Médecin] a montré un intérêt à en savoir plus sur les prochaines étapes.', 0);

-- --------------------------------------------------------

--
-- Structure de la table `Mail`
--

CREATE TABLE `Mail` (
  `id_mail` int(11) NOT NULL,
  `objet` text DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `message` text DEFAULT NULL,
  `id_visiteur` int(11) DEFAULT NULL,
  `id_delegue` int(11) DEFAULT NULL,
  `lu` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Mail`
--

INSERT INTO `Mail` (`id_mail`, `objet`, `date`, `message`, `id_visiteur`, `id_delegue`, `lu`) VALUES
(3, 'bonjour', '2023-12-01 18:13:07', 'voici un praticien pour vous : René Deglond', 6, 29, 0),
(12, 'visite', '2023-11-10 23:17:03', 'Bonjour,\r\n\r\nJ\'espère que tout se déroule bien. Les praticiens que vous avez visités initialement pour présenter nos produits ont manifesté un intérêt positif. Serait-il possible de retourner les voir avec des échantillons supplémentaires pour renforcer cet enthousiasme ?\r\n\r\nMerci de me faire savoir si vous avez besoin de plus d\'échantillons ou de soutien logistique pour organiser ces nouvelles visites.\r\n\r\nCordialement \r\n', 6, 29, NULL),
(14, 'bonsoir', '2023-12-06 23:22:24', 'Bonsoir,\r\n\r\nJ&#039;espère que vos premières visites ont été fructueuses. On a remarqué un intérêt particulier chez les praticiens. Pensez-vous pouvoir revenir avec des échantillons supplémentaires pour capitaliser sur cet élan ?\r\n\r\nFaites-moi savoir si vous avez besoin de quoi que ce soit pour rendre ces visites encore plus efficaces.\r\n\r\nBien à vous', 6, 29, 0),
(15, 'deuxième tour', '2023-12-06 23:22:52', 'Bien le bonsoir,\r\n\r\nLes retours des praticiens suite à votre première série de visites étaient positifs. Pourriez-vous organiser un deuxième tour avec des échantillons additionnels pour approfondir la discussion ?\r\n\r\nSi vous avez besoin d&#039;un coup de main ou de ressources, n&#039;hésitez pas à me le faire savoir.\r\n\r\nCordialement ', 6, 29, 0);

-- --------------------------------------------------------

--
-- Structure de la table `Praticien`
--

CREATE TABLE `Praticien` (
  `id_praticien` int(11) NOT NULL,
  `nom` text DEFAULT NULL,
  `prenom` text DEFAULT NULL,
  `specialité` text DEFAULT NULL,
  `id_cabinet` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Praticien`
--

INSERT INTO `Praticien` (`id_praticien`, `nom`, `prenom`, `specialité`, `id_cabinet`, `description`) VALUES
(1, 'Viral', 'Jeremy', 'Généraliste', 2, 'Le docteur Jeremy Viral vous accueille dans son cabinet à Lyon 1e.  Le médecin généraliste reçoit les enfants et les adultes pour tous types de soins médicaux généraux (consultation, contrôle annuel, vaccination, bilan de santé).'),
(2, 'Poupeney', 'Céline', 'Dentiste', 1, 'Le docteur Céline Poupeney vous accueille dans son cabinet situé au rez-de-chaussée (entrée Consultations) du cabinet des terreaux, à Lyon.'),
(3, 'Tartaix', 'Philippe-Henry', 'Orthodontiste', 1, 'Le docteur Philippe-Henry Tartaix vous accueille dans son cabinet situé au rez-de-chaussée (entrée Consultations) du cabinet des terreaux, à Lyon.'),
(4, 'Moreau', 'Laura', 'Médecin Généraliste\n', 3, 'Bonjour à tous,  Je suis le Dr. Laura Moreau, médecin généraliste passionnée par la santé holistique. Ayant obtenu mon diplôme de médecine à l&#039;Université Médicale, j&#039;ai consacré ma carrière à fournir des soins de santé complets et personnalisés. Mon approche intègre des méthodes préventives et des conseils lifestyle pour favoriser le bien-être général de mes patients. En dehors du cabinet, je m&#039;engage dans des initiatives communautaires visant à sensibiliser aux pratiques de vie saines. Je suis ravie de collaborer avec chacun de vous pour promouvoir la santé à tous les niveaux.'),
(5, 'Dupont', 'Alexandre', 'Cardiologue', 4, 'Bonjour,  Je suis le Dr. Alexandre Dupont, cardiologue dévoué spécialisé dans le traitement des maladies cardiovasculaires. J&#039;ai consacré ma carrière à la compréhension et à la gestion des affections cardiaques. Mon engagement envers la recherche et l&#039;adoption des dernières avancées médicales permet d&#039;offrir des soins de pointe à mes patients. En dehors de la clinique, je participe activement à des programmes de sensibilisation sur la santé cardiaque. C&#039;est avec enthousiasme que je collabore avec vous pour promouvoir la santé cardiovasculaire dans notre communauté.'),
(6, 'Lefevre', 'Camille', 'Nutritionniste', 2, ' Bonjour à tous,  Je suis le Dr. Camille Lefevre, nutritionniste passionnée par la promotion d&#039;une alimentation équilibrée. Avec un diplôme en nutrition de l&#039;Université de Médecine, j&#039;ai axé ma pratique sur la création de plans alimentaires personnalisés. Mon objectif est d&#039;aider mes patients à atteindre leurs objectifs de santé grâce à des choix alimentaires judicieux. En dehors de la consultation, j&#039;anime des ateliers sur la nutrition et je suis impliquée dans des projets visant à améliorer l&#039;éducation nutritionnelle. Je suis impatiente de partager mes connaissances avec vous et de collaborer pour promouvoir des modes de vie sains. ');

-- --------------------------------------------------------

--
-- Structure de la table `Region`
--

CREATE TABLE `Region` (
  `id_region` int(11) NOT NULL,
  `nom` text DEFAULT NULL,
  `id_delegue` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Region`
--

INSERT INTO `Region` (`id_region`, `nom`, `id_delegue`) VALUES
(2, 'Auvergne-Rhône-Alpes', 29),
(3, 'Bourgogne-Franche-Comté', 4),
(4, 'Bretagne', 5),
(5, 'Centre-Val de Loire', 6),
(6, 'Corse', 7),
(7, 'Grand Est', 8),
(8, 'Hauts-de-France', 9),
(9, 'Île-de-France', 10),
(10, 'Normandie', 11),
(11, 'Nouvelle-Aquitaine', 12),
(12, 'Occitanie', 13),
(13, 'Pays de la Loire', 14),
(14, 'Provence-Alpes-Côte d\'Azur', 15),
(15, 'Guadeloupe', 16),
(16, 'Guyane', 17),
(17, 'Martinique', 18),
(18, 'La Réunion', 19),
(19, 'Mayotte', 20);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `Id_user` int(11) NOT NULL,
  `Nom` text DEFAULT NULL,
  `Prenom` text DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Type` text DEFAULT NULL,
  `Region` int(11) DEFAULT NULL,
  `Token` varchar(64) NOT NULL,
  `TimeStamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`Id_user`, `Nom`, `Prenom`, `Email`, `Password`, `Type`, `Region`, `Token`, `TimeStamp`) VALUES
(1, 'responsable', 'responsable', 'responsable@responsable.fr', '$2y$10$ZfRQ4b8rhyoHjpBCFzDL3OfTAKQGvUzlFxIMW20qp9dL9C1yp94/S', 'responsable', NULL, '', '2024-01-18 17:06:00'),
(2, 'Martin', 'Adèle', 'adelemartin@gsb.fr', '$2y$10$.Ar9FxQRRZQQI3NLi9VD5.SkemhjaT2tIFNLuShHlLFP6X6u/rqkK', 'delegue', 2, '', '2024-01-18 17:06:00'),
(4, 'Escofier', 'Alain', 'escofieralain@gsb.fr', '$2y$10$dmsrMEwINJuhw4ZjwUqNT.YVlvHh5E15Mr1yT5120UJoVXjX8mKKS', 'delegue', 3, '', '2024-01-18 17:06:00'),
(5, 'Palazollo', 'Antoine', 'antoinepalazollo@gsb.fr', '$2y$10$HpXH..vZcCiejIx4Y0AhWOvJsk2vNffulXW1Kso8eZOPYWT9/Xape', 'delegue', 4, '', '2024-01-18 17:06:00'),
(6, 'Comte', 'Stephane', 'stephanecomte@gsb.fr', '$2y$10$fN2lXslvOu0pG5EoX8tyl.D3LU03yP27eDSLP.hMXrngSm45zWLPe', 'delegue', 5, '', '2024-01-18 17:06:00'),
(7, 'Roche', 'Sylvie', 'sylvieroche@gsb.fr', '$2y$10$7KQgXNI.3cVFXvoMIIKULu6XcWTcgZZ3/KIbaoEZ693S/U0lK.F1m', 'delegue', 6, '', '2024-01-18 17:06:00'),
(8, 'Claus', 'Jacques', 'jacquesclaus@gsb.fr', '$2y$10$Tq62zt6Sbv1iLytYUR7vauIU.4NjeoqdutyHrCkSCR7Dfnv6mjQgS', 'delegue', 7, '', '2024-01-18 17:06:00'),
(9, 'Aubert', 'Dyllan', 'dyllanaubert@gsb.fr', '$2y$10$n/gvglB7.oCHzXCd0segRuGloV4ghnoH3VLqqdaT2BwSiKu5Ih5Lq', 'delegue', 8, '', '2024-01-18 17:06:00'),
(10, 'Blanc', 'Alice', 'aliceblanc@gsb.fr', '$2y$10$mrVJ9l6VhGVGsiKjJibqkeSQcZ.1jWNZX0BCwjpn3oykBnEdNwgQu', 'delegue', 9, '', '2024-01-18 17:06:00'),
(11, 'Clair', 'Nathan', 'nathanclair@gsb.fr', '$2y$10$mMRqPefA8zllLmfb8IH4Hul4460BlACVBDYFyjhOYpi51JwHvh1CG', 'delegue', 10, '', '2024-01-18 17:06:00'),
(12, 'Mathgen', 'Agnès', 'agnesmathgen@gsb.fr', '$2y$10$jMWSSxDPWNkskz1sWm94YOyPBGGRXxvfDdfeWlb5XvxwiLwlSnLxC', 'delegue', 11, '', '2024-01-18 17:06:00'),
(13, 'Jordan', 'Mickael', 'mickaeljordan@gsb.fr', '$2y$10$cAchSPpVEgs9W5csGg7mLuym5pZZ.aLlts/VZ6/fiHMyBuR093lDS', 'delegue', 12, '', '2024-01-18 17:06:00'),
(14, 'Bocuse', 'Paul', 'paulbocuse@gsb.fr', '$2y$10$y9sCZOAM3rQ2xjRqEWMcKutSZfjCpkjGjCUxXNvUvmgm2kysd/vPC', 'delegue', 13, '', '2024-01-18 17:06:00'),
(15, 'Dubois', 'Jean', 'jeandubois@gsb.fr', '$2y$10$e3.xfjmOYLlFZC1FT.UrvuA5Z8NmRT325ZvlNCwChng4YVciv.UyK', 'delegue', 14, '', '2024-01-18 17:06:00'),
(16, 'Perrez', 'Roger', 'rogerperrez@gsb.fr', '$2y$10$RB0aAZlXV.MqY97ZUAjaquS4DrpubgtH2yAnGwlFvd/JyPTnvF1xq', 'delegue', 15, '', '2024-01-18 17:06:00'),
(17, 'Lardoise', 'Valentin', 'valentinlardoise@gsb.fr', '$2y$10$be4eCq9BqqUaiFdPrn.Bqu9I/R44sJVEGVc5fIxKz.OvsQq3JrOs6', 'delegue', 16, '', '2024-01-18 17:06:00'),
(18, 'Duvernois', 'Michelle', 'michelleduvernois@gsb.fr', '$2y$10$fIZnuV37n/S0SUFgzLIc8ee9gj8XWlz1AyUBZPOwcbupuvaw4wyFe', 'delegue', 17, '', '2024-01-18 17:06:00'),
(19, 'Alliphe', 'Baptiste', 'baptistealliphe@gsb.fr', '$2y$10$o/13HiYeW8zS5..UD0cGn.3/8r6k9Vjhf/P1BI.c6oD8xExO/EJ1i', 'delegue', 18, '', '2024-01-18 17:06:00'),
(20, 'Berout', 'George', 'georgeberout@gsb.fr', '$2y$10$JRt1Ec09ZuD8QnI6m9DhwOMyD4Ua3dU/APLYo74zMhElOMG58e8w.', 'delegue', 19, '', '2024-01-18 17:06:00'),
(23, 'Vendou', 'Allya', 'allyavendou@gsb.fr', '$2y$10$3bkB0NRePrQ67oOd5fXzbOIVfeCdIvZZwdeNjr2/SOStQnN9k7lIa', 'visiteur', 2, '', '2024-01-18 17:06:00'),
(25, 'Marrielle', 'Florence', 'florencemarrielle@gsb.fr', '$2y$10$hYc7oM0TS31VFfSUejnLAezyEev0C73aeTRqjsWYw7woI5xPuIgfe', 'visiteur', 3, '', '2024-01-18 17:06:00'),
(26, 'Némar', 'Jean', 'jeannemar@gsb.fr', '$2y$10$7BVwMsJbRrRpUsh8aR12nOeoOXZs061VpqZJ6WUfnT66fnwyt1jfK', 'visiteur', 3, '', '2024-01-18 17:06:00'),
(27, 'Monmartre', 'Balzac', 'balzacmonmartre@gsb.fr', '$2y$10$2tjRPFmmJ5A6YhhcHi80y.GxgZpgb6daf28F2o0IBw2aAetLfOhs.', 'visiteur', 3, '', '2024-01-18 17:06:00'),
(28, 'visiteur', 'visiteur', 'visiteur@visiteur.fr', '$2y$10$0mNyIRDxlrfIYbBblmNPlesrNWwH8RMt4fyDBYn3ZiSxoaZsDF9qO', 'visiteur', 3, '', '2024-01-18 17:06:00'),
(29, 'delegue', 'delegue', 'delegue@delegue.fr', '$2y$10$e.aLwbvWHXbKfZtG1Hid3.1//8ndv/jrTMf7ZTjV3xwBU5dSwzSGm', 'delegue', 2, '9fd6f66d3fa8bb4a2f822e768e4ed87238d006ce9d5dc1f6089a029f4b8a7db9', '2024-01-26 15:24:56');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Cabinet`
--
ALTER TABLE `Cabinet`
  ADD PRIMARY KEY (`id_cabinet`),
  ADD KEY `id_region` (`id_region`);

--
-- Index pour la table `CompteRendu`
--
ALTER TABLE `CompteRendu`
  ADD PRIMARY KEY (`id_compteRendu`),
  ADD KEY `id_visteur` (`id_visiteur`),
  ADD KEY `id_praticien` (`id_praticien`),
  ADD KEY `id_echantillon_1` (`id_echantillon_1`),
  ADD KEY `id_echantillon_2` (`id_echantillon_2`),
  ADD KEY `id_cabinet` (`id_cabinet`),
  ADD KEY `id_region` (`id_region`);

--
-- Index pour la table `Echantillon`
--
ALTER TABLE `Echantillon`
  ADD PRIMARY KEY (`id_echantillon`);

--
-- Index pour la table `Mail`
--
ALTER TABLE `Mail`
  ADD PRIMARY KEY (`id_mail`),
  ADD KEY `id_visiteur` (`id_visiteur`),
  ADD KEY `id_delegue` (`id_delegue`);

--
-- Index pour la table `Praticien`
--
ALTER TABLE `Praticien`
  ADD PRIMARY KEY (`id_praticien`),
  ADD KEY `id_cabinet` (`id_cabinet`);

--
-- Index pour la table `Region`
--
ALTER TABLE `Region`
  ADD PRIMARY KEY (`id_region`),
  ADD KEY `id_delegue` (`id_delegue`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_user`),
  ADD KEY `fk_user_region` (`Region`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Cabinet`
--
ALTER TABLE `Cabinet`
  MODIFY `id_cabinet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `CompteRendu`
--
ALTER TABLE `CompteRendu`
  MODIFY `id_compteRendu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `Echantillon`
--
ALTER TABLE `Echantillon`
  MODIFY `id_echantillon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `Mail`
--
ALTER TABLE `Mail`
  MODIFY `id_mail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `Praticien`
--
ALTER TABLE `Praticien`
  MODIFY `id_praticien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `Region`
--
ALTER TABLE `Region`
  MODIFY `id_region` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `Id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Cabinet`
--
ALTER TABLE `Cabinet`
  ADD CONSTRAINT `cabinet_ibfk_1` FOREIGN KEY (`id_region`) REFERENCES `Region` (`id_region`);

--
-- Contraintes pour la table `CompteRendu`
--
ALTER TABLE `CompteRendu`
  ADD CONSTRAINT `compterendu_ibfk_1` FOREIGN KEY (`id_visiteur`) REFERENCES `user` (`Id_user`),
  ADD CONSTRAINT `compterendu_ibfk_2` FOREIGN KEY (`id_praticien`) REFERENCES `Praticien` (`id_praticien`),
  ADD CONSTRAINT `compterendu_ibfk_3` FOREIGN KEY (`id_echantillon_1`) REFERENCES `Echantillon` (`id_echantillon`),
  ADD CONSTRAINT `compterendu_ibfk_4` FOREIGN KEY (`id_echantillon_2`) REFERENCES `Echantillon` (`id_echantillon`),
  ADD CONSTRAINT `compterendu_ibfk_5` FOREIGN KEY (`id_cabinet`) REFERENCES `Cabinet` (`id_cabinet`),
  ADD CONSTRAINT `compterendu_ibfk_6` FOREIGN KEY (`id_region`) REFERENCES `Region` (`id_region`);

--
-- Contraintes pour la table `Mail`
--
ALTER TABLE `Mail`
  ADD CONSTRAINT `mail_ibfk_2` FOREIGN KEY (`id_delegue`) REFERENCES `user` (`Id_user`);

--
-- Contraintes pour la table `Praticien`
--
ALTER TABLE `Praticien`
  ADD CONSTRAINT `praticien_ibfk_1` FOREIGN KEY (`id_cabinet`) REFERENCES `Cabinet` (`id_cabinet`);

--
-- Contraintes pour la table `Region`
--
ALTER TABLE `Region`
  ADD CONSTRAINT `region_ibfk_1` FOREIGN KEY (`id_delegue`) REFERENCES `user` (`Id_user`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_region` FOREIGN KEY (`Region`) REFERENCES `Region` (`id_region`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
