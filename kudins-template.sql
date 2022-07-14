-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2022 at 04:51 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kudins_template`
--
CREATE DATABASE IF NOT EXISTS `kudins_template` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `kudins_template`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(40) NOT NULL,
  `name` varchar(150) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `name`, `username`, `password`) VALUES
('8c033154-f6f4-11ec-95d3-1cb72c965d78', 'Agus Kurniadin Khaer', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id_collection` varchar(40) NOT NULL,
  `id_user` varchar(40) NOT NULL,
  `id_template` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id_collection`, `id_user`, `id_template`) VALUES
('d46d9e8b-9bb6-4d07-a5bd-134fa9e4ebbf', '061c0763-b21f-444a-baf7-6d277325cd37', '8418b6c0-7ba8-4f01-99fa-551f3efdafc6');

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id_template` varchar(40) NOT NULL,
  `name` varchar(150) NOT NULL,
  `id_subcategory` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `last_update` date NOT NULL DEFAULT current_timestamp(),
  `released` date NOT NULL DEFAULT current_timestamp(),
  `image` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `template_file` varchar(200) NOT NULL,
  `is_free` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id_template`, `name`, `id_subcategory`, `description`, `last_update`, `released`, `image`, `price`, `template_file`, `is_free`) VALUES
('0b3eb1a3-469e-4b17-845f-4cfeecae590f', 'Dompetku by SLAB Design Studio', 'cef9dac1-bb90-41fb-b237-5618ed443a34', 'voluptate legimus? Consequentia exquirere, quoad sit id, quod volumus, effectum. Sed hoc sane concedamus. Duo Reges: constructio interrete. Multoque hoc melius nos veriusque quam Stoici. ', '2022-06-30', '2022-06-30', 'template-1656565229.png', 0, 'Dompetku_by_SLAB_Design_Studio-1656565229.zip', 1),
('1845a138-e728-4e80-a60a-f88ed3f89cc9', 'Secoola by Maulana Farhan', '4cb0350d-ba52-4151-80ad-16881e0d7f03', 'Ut placet, inquit, etsi enim illud erat aptius, aequum cuique concedere. Sed mehercule pergrata mihi oratio tua. Quis istud possit, inquit, negare? Non dolere, inquam, istud quam vim habeat postea videro; ', '2022-06-30', '2022-06-30', 'template-1656565472.png', 200000, 'Secoola-1656565472.zip', 0),
('2df137c3-afde-4497-ae80-b59953982d92', 'Workspace inspiration by Vicky Perdana', 'baa03e40-dbb2-4b1e-b2f9-12ed4ddf383a', 'Est autem etiam actio quaedam corporis, quae motus et status naturae congruentis tenet; Iam in altera philosophiae parte. ', '2022-06-30', '2022-06-30', 'template-1656565109.png', 200000, 'Workspace_inspiration_by_Vicky_Perdana-1656565109.zip', 0),
('5f9411ec-1294-4077-88f2-10b7f131265e', 'Financial Trading Learning App by Dimitry Lauretsky', '4cb0350d-ba52-4151-80ad-16881e0d7f03', 'Ergo adhuc, quantum equidem intellego, causa non videtur fuisse mutandi nominis. Sed tamen est aliquid, quod nobis non liceat, liceat illis. ', '2022-06-30', '2022-06-30', 'template-1656565673.png', 0, 'Financial_Trading_Learning_App_by_Dimitry_Lauretsky-1656565673.zip', 1),
('65137948-83c0-496b-9f7f-812bdf054aaa', 'Dwija Online Course by Syahrul Falah', '4cb0350d-ba52-4151-80ad-16881e0d7f03', 'Quamquam tu hanc copiosiorem etiam soles dicere. Roges enim Aristonem, ', '2022-06-30', '2022-06-30', 'template-1656563305.png', 250000, 'Dwija_Online_Course_by_Syahrul_Falah-1656563305.zip', 0),
('6e202733-5825-48d4-8bc9-a3dbdcc6e30a', 'Nitendo Game by offdesignarea', '2ad62bde-0f20-4f7e-9aa6-5dd60cb0a6a6', 'Portenta haec esse dicit, neque ea ratione ullo modo posse vivi; Commoda autem et incommoda in eo genere sunt, quae praeposita et reiecta diximus; Conferam avum tuum Drusum cum C.', '2022-06-30', '2022-06-30', 'template-1656564790.png', 500000, 'Nitendo_Game_by_offdesignarea-1656564790.zip', 0),
('8418b6c0-7ba8-4f01-99fa-551f3efdafc6', 'Berita Lauwba', '61e70586-e1c2-408f-924e-1de637e20e0b', 'Ego quoque, inquit, didicerim libentius si quid attuleris, quam te reprehenderim. Haec et tu ita posuisti, et verba vestra sunt. Saepe ab Aristotele, a Theophrasto mirabiliter est laudata per se ipsa rerum scientia; Non quam nostram quidem, inquit Pomponius iocans; Piso igitur hoc modo, vir optimus tuique, ut scis, amantissimus. Quid turpius quam sapientis vitam ex insipientium sermone pendere? ', '2022-07-01', '2022-07-01', 'template-1656683711.png', 6000, 'Berita_Lauwba-1656683710.zip', 1),
('858abac2-02ec-42bd-b9ed-263b4cb0077b', 'GameShark live straming game app by Azhar Dwi', '2ad62bde-0f20-4f7e-9aa6-5dd60cb0a6a6', 'Rapior illuc, revocat autem Antiochus, nec est praeterea, quem audiamus. ', '2022-06-30', '2022-06-30', 'template-1656564678.png', 100000, 'GameShark_live_straming_game_app_by_Azhar_Dwi-1656564678.zip', 0),
('8c804951-bf26-4566-add3-254d1eb27883', 'Simple blog app exploration by Giorgi', '61e70586-e1c2-408f-924e-1de637e20e0b', 'Res enim se praeclare habebat, et quidem in utraque parte. Quid affers, cur Thorius, cur Caius Postumius, cur omnium horum magister, Orata, non iucundissime vixerit? Pudebit te, inquam, ', '2022-06-30', '2022-06-30', 'template-1656564005.png', 150000, 'Simple_blog_app_exploration_by_Giorgi-1656564005.zip', 1),
('93b4df42-3dbf-44dd-b890-38931ef90b45', 'Bitpro Currency Finance Banking by Syful Islam', 'cef9dac1-bb90-41fb-b237-5618ed443a34', 'Duo Reges: constructio interrete. Multoque hoc melius nos veriusque quam Stoici. ', '2022-06-30', '2022-06-30', 'template-1656565335.png', 0, 'Bitpro_Currency_Finance_Banking_by_Syful_Islam-1656565335.zip', 1),
('a09080ed-0267-44c3-8e97-01234418c1b9', 'Odyah Ecommerce App by Sajon', '693baabc-7fe8-49d2-8183-5b38872839d3', 'Et quod est munus, quod opus sapientiae? Ab hoc autem quaedam non melius quam veteres, quaedam omnino relicta. Iubet igitur nos Pythius Apollo noscere nosmet ipsos. Nam his libris eum malo quam reliquo ornatu villae delectari. Portenta haec esse dicit, neque ea ratione ullo modo posse vivi; Commoda autem et incommoda in eo genere sunt, quae praeposita et reiecta diximus; Conferam avum tuum Drusum cum C.', '2022-06-30', '2022-06-30', 'template-1656564976.png', 600000, 'Odyah_Ecommerce_App_by_Sajon-1656564976.zip', 0),
('a1a83b14-0bce-45ac-8770-9c4810eddc66', 'HR Mobile App by Dimitry Lauretsky', 'baa03e40-dbb2-4b1e-b2f9-12ed4ddf383a', 'There is an onboarding page that introduces users to the app functions. The first screen displays stats that reflect the number of job openings and the number of interviews conducted. Other screens display the list of tasks and chats with interviewees.\r\n\r\nThis concept was designed with the use of a dark blue shadow palette. The main UI elements are accented with vivid blue, orange, and green colors. The dark color palette looks minimalistic and it is often associated with the business.\r\n\r\nThis design combines the elements of a task management app, messenger and it can display stats. With such an app, HR managers can always stay in touch with potential employees using only smartphones.', '2022-06-30', '2022-06-30', 'template-1656559285.png', 0, 'HR_Mobile_App_by_Dimitry_Lauretsky-1656559285.zip', 1),
('ba027282-e4d7-4258-a01b-0c9865648c98', 'Online Digital Loan Exploration by Azie Melasari', 'cef9dac1-bb90-41fb-b237-5618ed443a34', 'Quamquam tu hanc copiosiorem etiam soles dicere. Roges enim Aristonem, bonane ei videantur haec: vacuitas doloris, divitiae,', '2022-06-30', '2022-06-30', 'template-1656564535.png', 0, 'Online_Digital_Loan_Exploration_by_Azie_Melasari-1656564535.zip', 1),
('d4568dcc-511a-4418-a9e4-d2281d4ab0d7', 'Bag Shopping by Bogdan Nikitin', '693baabc-7fe8-49d2-8183-5b38872839d3', 'Res enim se praeclare habebat, et quidem in utraque parte. Quid affers, cur Thorius, cur Caius Postumius, cur omnium horum magister, Orata, non iucundissime vixerit? Pudebit te, inquam, illius tabulae, quam Cleanthes sane commode verbis depingere solebat. Expressa vero in iis aetatibus, quae iam confirmatae sunt. Post enim Chrysippum eum non sane est disputatum. Nummus in Croesi divitiis obscuratur, pars est tamen divitiarum. ', '2022-06-30', '2022-06-30', 'template-1656564165.png', 0, 'Bag_Shopping_by_Bogdan_Nikitin-1656564165.zip', 1),
('e65f1ad6-098e-4696-b96a-e3aae3c7eff4', 'SmartOffice Concept App', 'baa03e40-dbb2-4b1e-b2f9-12ed4ddf383a', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Bonum negas esse divitias, praeposìtum esse dicis? Fortemne possumus dicere eundem illum Torquatum? Quae sunt igitur communia vobis cum antiquis, iis sic utamur quasi concessis; Sed tamen intellego quid velit. Atque his de rebus et splendida est eorum et illustris oratio. Duo Reges: constructio interrete. ', '2022-06-30', '2022-06-30', 'template-1656564387.png', 0, 'SmartOffice_Concept_App-1656564387.zip', 1),
('edad4c25-d7cc-4932-b4a6-3cc7805f9770', 'World Puzzle Game by NestStrix', '2ad62bde-0f20-4f7e-9aa6-5dd60cb0a6a6', 'Nonne videmus quanta perturbatio rerum omnium consequatur, quanta confusio? Qualem igitur hominem natura inchoavit? Idcirco enim non desideraret, quia, quod dolore caret, id in voluptate est. Ut id aliis narrare gestiant', '2022-06-30', '2022-06-30', 'template-1656563150.png', 200000, 'World_Puzzle_Game_by_NestStrix-1656563150.zip', 0);

-- --------------------------------------------------------

--
-- Table structure for table `template_category`
--

CREATE TABLE `template_category` (
  `id_category` varchar(40) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `cover_image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `template_category`
--

INSERT INTO `template_category` (`id_category`, `category`, `description`, `cover_image`) VALUES
('0051d68e-6dd6-4114-a3f0-84e765bc1d75', 'Mobile App Mockup Design', 'In manufacturing and design, a mockup, or mock-up, is a scale or full-size model of a design or device, used for teaching, demonstration, design evaluation, promotion, and other purposes. A mockup may be a prototype if it provides at least part of the functionality of a system and enables testing of a design.', 'category1656558950.png'),
('15a9bd14-d5a2-43ec-9062-848459a3af9b', 'Mobile Flutter', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ac tamen hic mallet non dolere. An hoc usque quaque, aliter in vita? Homines optimi non intellegunt totam rationem everti, si ita res se habeat. Duo Reges: constructio interrete. Ego quoque, inquit, didicerim libentius si quid attuleris, quam te reprehenderim. Mihi enim erit isdem istis fortasse iam utendum. In quo etsi est magnus, tamen nova pleraque et perpauca de moribus. Hoc non est positum in nostra actione. ', 'category1656561593.png'),
('a2618361-5371-464f-bfb9-7281e0fc6c1e', 'Native Android XML Templates', 'Primum in nostrane potestate est, quid meminerimus? Est enim effectrix multarum et magnarum voluptatum. In qua si nihil est praeter rationem.', 'category1656562019.png');

-- --------------------------------------------------------

--
-- Table structure for table `template_gallery`
--

CREATE TABLE `template_gallery` (
  `id_gallery` varchar(40) NOT NULL,
  `id_template` varchar(40) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `template_gallery`
--

INSERT INTO `template_gallery` (`id_gallery`, `id_template`, `image`) VALUES
('00063c40-5f9b-4b17-a602-858cf3e930dc', '8418b6c0-7ba8-4f01-99fa-551f3efdafc6', 'gallery-1656683751.png'),
('2ba26f9e-fbc4-4031-91af-998e68824326', 'edad4c25-d7cc-4932-b4a6-3cc7805f9770', 'gallery-1656655853.png'),
('37502357-10f1-4467-8297-345f9ec17a68', '8c804951-bf26-4566-add3-254d1eb27883', 'gallery-1656586847.png'),
('420dadbf-743f-4695-8c25-179d5613347e', 'edad4c25-d7cc-4932-b4a6-3cc7805f9770', 'gallery-1656655841.png'),
('6376963e-9f26-4471-b8dc-2f3865d97b75', '8418b6c0-7ba8-4f01-99fa-551f3efdafc6', 'gallery-1656683860.png'),
('77e3190c-0011-41f3-a6d7-d46de6abacc8', 'edad4c25-d7cc-4932-b4a6-3cc7805f9770', 'gallery-1656655864.png'),
('7d70f78b-19cc-4fdb-8d16-bb1dff687f6c', '8c804951-bf26-4566-add3-254d1eb27883', 'gallery-1656586830.png'),
('db85269a-243e-4738-946a-66c8896d3e8f', '8c804951-bf26-4566-add3-254d1eb27883', 'gallery-1656586816.png'),
('f201a2e3-ce03-48f4-907f-718d6a7708d2', '8418b6c0-7ba8-4f01-99fa-551f3efdafc6', 'gallery-1656683799.png'),
('f7e5bd10-8ce3-4bcd-a181-701dc4851f6d', '8c804951-bf26-4566-add3-254d1eb27883', 'gallery-1656586859.png');

-- --------------------------------------------------------

--
-- Table structure for table `template_subcategory`
--

CREATE TABLE `template_subcategory` (
  `id_subcategory` varchar(40) NOT NULL,
  `id_category` varchar(40) NOT NULL,
  `subcategory` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `cover_image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `template_subcategory`
--

INSERT INTO `template_subcategory` (`id_subcategory`, `id_category`, `subcategory`, `description`, `cover_image`) VALUES
('2ad62bde-0f20-4f7e-9aa6-5dd60cb0a6a6', '0051d68e-6dd6-4114-a3f0-84e765bc1d75', 'Games', 'Tubulum fuisse, qua illum, cuius is condemnatus est rogatione, P. Eorum enim est haec querela, qui sibi cari sunt seseque diligunt. ', 'subcategory1656561945.png'),
('4cb0350d-ba52-4151-80ad-16881e0d7f03', '15a9bd14-d5a2-43ec-9062-848459a3af9b', 'E-learning', 'Bonum negas esse divitias, praeposìtum esse dicis? Oratio me istius philosophi non offendit; Egone non intellego, quid sit don Graece, Latine voluptas? Ex quo, id quod omnes expetunt, beate vivendi ratio inveniri et comparari potest. Cenasti in vita numquam bene,', 'subcategory1656561784.png'),
('61e70586-e1c2-408f-924e-1de637e20e0b', 'a2618361-5371-464f-bfb9-7281e0fc6c1e', 'Articles', 'Idcirco enim non desideraret, quia, quod dolore caret, id in voluptate est. Ut id aliis narrare gestiant?', 'subcategory1656562173.png'),
('693baabc-7fe8-49d2-8183-5b38872839d3', '15a9bd14-d5a2-43ec-9062-848459a3af9b', 'Ecommerce', 'Illum mallem levares, quo optimum atque humanissimum virum, Cn. Illa sunt similia: hebes acies est cuipiam oculorum, corpore alius senescit; Huius, Lyco, oratione locuples, rebus ipsis ielunior. Confecta res esset. Itaque ad tempus ad Pisonem omnes. ', 'subcategory1656561696.png'),
('baa03e40-dbb2-4b1e-b2f9-12ed4ddf383a', '0051d68e-6dd6-4114-a3f0-84e765bc1d75', 'Office', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ac tamen hic mallet non dolere. An hoc usque quaque, aliter in vita? Homines optimi non intellegunt totam rationem everti, si ita res se habeat. Duo Reges: constructio interrete. Ego quoque, inquit, didicerim libentius si quid attuleris, quam te reprehenderim.', 'subcategory1656559080.png'),
('cef9dac1-bb90-41fb-b237-5618ed443a34', 'a2618361-5371-464f-bfb9-7281e0fc6c1e', 'E-Wallet', 'Primum in nostrane potestate est, quid meminerimus? Est enim effectrix multarum et magnarum voluptatum. In qua si nihil est praeter rationem,', 'subcategory1656562253.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(40) NOT NULL,
  `email` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `name`, `password`) VALUES
('061c0763-b21f-444a-baf7-6d277325cd37', 'aguskkhaer@gmail.com', 'Agus K Khaer', '01c3c766ce47082b1b130daedd347ffd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id_collection`),
  ADD KEY `id_user` (`id_user`,`id_template`),
  ADD KEY `id_template` (`id_template`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id_template`),
  ADD KEY `id_subcategory` (`id_subcategory`);

--
-- Indexes for table `template_category`
--
ALTER TABLE `template_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `template_gallery`
--
ALTER TABLE `template_gallery`
  ADD PRIMARY KEY (`id_gallery`),
  ADD KEY `id_template` (`id_template`);

--
-- Indexes for table `template_subcategory`
--
ALTER TABLE `template_subcategory`
  ADD PRIMARY KEY (`id_subcategory`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `collections`
--
ALTER TABLE `collections`
  ADD CONSTRAINT `collections_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `collections_ibfk_2` FOREIGN KEY (`id_template`) REFERENCES `template` (`id_template`) ON DELETE CASCADE;

--
-- Constraints for table `template`
--
ALTER TABLE `template`
  ADD CONSTRAINT `template_ibfk_1` FOREIGN KEY (`id_subcategory`) REFERENCES `template_subcategory` (`id_subcategory`) ON DELETE CASCADE;

--
-- Constraints for table `template_gallery`
--
ALTER TABLE `template_gallery`
  ADD CONSTRAINT `template_gallery_ibfk_1` FOREIGN KEY (`id_template`) REFERENCES `template` (`id_template`) ON DELETE CASCADE;

--
-- Constraints for table `template_subcategory`
--
ALTER TABLE `template_subcategory`
  ADD CONSTRAINT `template_subcategory_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `template_category` (`id_category`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
