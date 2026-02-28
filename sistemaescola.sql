-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 02/02/2026 às 17:20
-- Versão do servidor: 8.4.7
-- Versão do PHP: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistemaescola`
--
CREATE DATABASE IF NOT EXISTS `sistemaescola` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `sistemaescola`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

DROP TABLE IF EXISTS `aluno`;
CREATE TABLE IF NOT EXISTS `aluno` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dataNascimento` date DEFAULT NULL,
  `nomePai` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nomeMae` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefone` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sexo` varchar(9) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bairro` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`id`, `nome`, `dataNascimento`, `nomePai`, `nomeMae`, `telefone`, `email`, `sexo`, `bairro`) VALUES
(3, 'Atualizado 6552', '1971-03-13', 'Ned Stark', 'Lyanna Stark', '(47)1234-6789', 'atualizado.1769051212@teste.com', 'Masculino', 'Agua Verde'),
(7, 'Arya Stark', '0000-00-00', 'Ned Stark', 'Katlyn Stark', '(47)12346-6789', 'aria@aria', 'Feminino', 'Boqueirão'),
(8, 'Sergio Luiz da Silveira', '1988-12-30', 'Sergio Luiz da Silveira', 'Sergio Luiz da Silveira', '(41)12345-6789', 'sergio@sergio', 'Masculino', 'Jardim Botanico'),
(18, 'Dexter Morgan', '1980-06-12', 'Harry Morgan', 'Laura Moser', '(47)98745-6123', 'dexter@dexter.com', 'Masculino', 'Ecoville'),
(19, 'Dexter Morgan', '1980-06-12', 'Harry Morgan', 'Laura Moser', '(47)98745-6123', 'dexter@dexter.com', 'Masculino', 'Ecoville'),
(20, 'Dexter Morgan', '1971-02-01', 'Harry Morgan', 'Laura Moser', '41999990001', 'dexter.m@miamimetro.com', 'Masculino', 'Batel'),
(21, 'Debra Morgan', '1979-12-07', 'Harry Morgan', 'Doris Morgan', '41999990002', 'deb.morgan@miamimetro.com', 'Feminino', 'Agua Verde'),
(22, 'Angel Batista', '1969-01-20', 'Juan Batista', 'Elena Batista', '41999990003', 'batista@miamimetro.com', 'Masculino', 'Portão'),
(23, 'Maria LaGuerta', '1970-05-15', 'Eduardo LaGuerta', 'Isabel LaGuerta', '41999990004', 'laguerta@miamimetro.com', 'Feminino', 'Centro Civico'),
(24, 'Vince Masuka', '1975-03-10', 'Hiroshi Masuka', 'Akemi Masuka', '41999990005', 'masuka@miamimetro.com', 'Masculino', 'Hauer'),
(25, 'Rita Bennett', '1980-04-22', 'George Brandon', 'Beatrice Brandon', '41999990006', 'rita.b@gmail.com', 'Feminino', 'Ecoville'),
(26, 'James Doakes', '1965-08-11', 'Robert Doakes', 'Alice Doakes', '41999990007', 'doakes@miamimetro.com', 'Masculino', 'Boqueirão'),
(27, 'Joey Quinn', '1978-10-30', 'Patrick Quinn', 'Maureen Quinn', '41999990008', 'quinn@miamimetro.com', 'Masculino', 'Alto da XV'),
(28, 'Hannah McKay', '1984-06-12', 'Clinton McKay', 'Sheila McKay', '41999990009', 'hannah.mckay@outlook.com', 'Feminino', 'Jardim Botanico'),
(29, 'Arthur Mitchell', '1945-09-03', 'William Mitchell', 'Rose Mitchell', '41999990010', 'trinity@fourwalls.com', 'Masculino', 'Santa Candida'),
(30, 'Brian Moser', '1969-04-10', 'Thomas Moser', 'Laura Moser', '41999990011', 'b.moser@icebox.com', 'Masculino', 'Cajuru'),
(31, 'Jamie Batista', '1985-09-18', 'Juan Batista', 'Elena Batista', '41999990012', 'jamie.b@gmail.com', 'Feminino', 'Xaxim'),
(32, 'Hank Voight', '1960-03-15', 'Richard Voight', 'Mary Voight', '41999990301', 'voight.unit@cpd.gov', 'Masculino', 'CIC'),
(33, 'Trudy Platt', '1965-10-12', 'Arthur Platt', 'Edna Platt', '41999990302', 'platt.desk@cpd.gov', 'Feminino', 'Agua Verde'),
(34, 'Jay Halstead', '1984-05-14', 'Pat Halstead', 'Katherine Halstead', '41999990303', 'halstead@cpd.gov', 'Masculino', 'Centro Civico'),
(35, 'Hailey Upton', '1988-11-20', 'Nicholas Upton', 'Elena Upton', '41999990304', 'upton.h@cpd.gov', 'Feminino', 'Ecoville'),
(36, 'Kevin Atwater', '1989-06-18', 'Lew Atwater', 'Dolores Atwater', '41999990305', 'atwater.k@cpd.gov', 'Masculino', 'Boqueirão'),
(37, 'Wallace Boden', '1962-02-15', 'Wallace Boden Sr.', 'Lillian Boden', '41999990306', 'boden.51@cfd.gov', 'Masculino', 'Jardim das Americas'),
(38, 'Randall McHolland (Mouch)', '1960-04-10', 'George McHolland', 'Alice McHolland', '41999990307', 'mouch.51@cfd.gov', 'Masculino', 'Hauer'),
(39, 'Sylvie Brett', '1988-03-01', 'Douglas Brett', 'Julie Brett', '41999990308', 'brett.s@cfd.gov', 'Feminino', 'Portão'),
(40, 'Connor Rhodes', '1982-12-30', 'Cornelius Rhodes', 'Elizabeth Rhodes', '41999990309', 'rhodes.med@chicago.com', 'Masculino', 'Batel'),
(41, 'Eddard (Ned) Stark', '1963-04-17', 'Rickard Stark', 'Lyarra Stark', '41999990310', 'ned.stark@winterfell.com', 'Masculino', 'Santa Candida'),
(42, 'Jon Snow', '1983-12-26', 'Rhaegar Targaryen', 'Lyanna Stark', '41999990311', 'jon.snow@thewall.com', 'Masculino', 'Santa Candida'),
(43, 'Catelyn Stark', '1964-07-20', 'Hoster Tully', 'Minisa Tully', '41999990312', 'cat.stark@riverrun.com', 'Feminino', 'Alto da XV'),
(44, 'Theon Greyjoy', '1982-01-15', 'Balon Greyjoy', 'Alannys Greyjoy', '41999990313', 'theon.g@ironislands.com', 'Masculino', 'Cajuru'),
(45, 'Joffrey Baratheon', '1995-05-10', 'Jaime Lannister', 'Cersei Lannister', '41999990314', 'king.joffrey@redkeep.com', 'Masculino', 'Batel'),
(46, 'Petyr Baelish (Littlefinger)', '1968-02-11', 'Lord Baelish', 'Alayne Baelish', '41999990315', 'chaos@ladder.com', 'Masculino', 'Centro Civico'),
(47, 'Donald Mallard (Ducky)', '1933-09-19', 'Donald Mallard Sr.', 'Victoria Mallard', '41999990316', 'ducky.m@ncis.gov', 'Masculino', 'Jardim Botanico'),
(48, 'Leon Vance', '1963-07-08', 'Casey Vance', 'Maude Vance', '41999990317', 'director.vance@ncis.gov', 'Masculino', 'Xaxim'),
(49, 'Eleanor Bishop', '1985-04-14', 'Lawrence Bishop', 'Barbara Bishop', '41999990318', 'bishop.e@ncis.gov', 'Feminino', 'Ecoville'),
(50, 'Nick Amaro', '1980-11-20', 'Cesare Amaro', 'Elena Amaro', '41999990319', 'amaro.n@nypd.gov', 'Masculino', 'Portão'),
(51, 'George Huang', '1960-06-09', 'Stephen Huang', 'Mary Huang', '41999990320', 'huang.psych@nypd.gov', 'Masculino', 'Centro Civico'),
(52, 'Melinda Warner', '1965-02-10', 'Samuel Warner', 'Alice Warner', '41999990321', 'warner.me@nypd.gov', 'Feminino', 'Hauer'),
(53, 'Nick Fury', '1950-12-21', 'Jack Fury', 'Katherine Fury', '41999990322', 'director@shield.gov', 'Masculino', 'Boqueirão'),
(54, 'Peggy Carter', '1921-04-09', 'Harrison Carter', 'Amanda Carter', '41999990323', 'agent.carter@ssr.gov', 'Feminino', 'Alto da XV'),
(55, 'James Rhodes (War Machine)', '1968-10-06', 'Terrence Rhodes', 'Roberta Rhodes', '41999990324', 'war.machine@stark.com', 'Masculino', 'CIC'),
(56, 'Alfred Pennyworth', '1943-05-19', 'Jarvis Pennyworth', 'Mary Pennyworth', '41999990325', 'alfred@wayne.com', 'Masculino', 'Batel'),
(57, 'James Gordon', '1960-01-05', 'Anthony Gordon', 'Thelma Gordon', '41999990326', 'gordon@gcpd.gov', 'Masculino', 'Sitio Cercado'),
(58, 'Howard Hamlin', '1965-04-12', 'George Hamlin', 'Cheryl Hamlin', '41999990327', 'howard@hhm.com', 'Masculino', 'Ecoville'),
(59, 'Kim Wexler', '1968-02-13', 'Gerald Wexler', 'Joanne Wexler', '41999990328', 'kim.wexler@legal.com', 'Feminino', 'Centro Civico'),
(60, 'Hank Schrader', '1966-03-20', 'Henry Schrader Sr.', 'Gemma Schrader', '41999990329', 'hank.dea@justice.gov', 'Masculino', 'Boqueirão'),
(61, 'Skyler White', '1970-08-11', 'Edward Lambert', 'Margaret Lambert', '41999990201', 'sky.w@gmail.com', 'Feminino', 'Ecoville'),
(62, 'Saul Goodman', '1960-11-12', 'Arthur McGill', 'Joanne McGill', '41999990202', 'bettercallsaul@legal.com', 'Masculino', 'Centro Civico'),
(63, 'Gustavo Fring', '1958-04-26', 'Manoel Fring', 'Isabel Fring', '41999990203', 'los.pollos@fring.com', 'Masculino', 'Batel'),
(64, 'Mike Ehrmantraut', '1947-01-31', 'Paul Ehrmantraut', 'Esther Ehrmantraut', '41999990204', 'mike.e@security.com', 'Masculino', 'Hauer'),
(65, 'Marie Schrader', '1975-03-27', 'Edward Lambert', 'Margaret Lambert', '41999990205', 'marie.s@yahoo.com', 'Feminino', 'Agua Verde'),
(66, 'Daryl Dixon', '1969-01-06', 'Will Dixon', 'Doris Dixon', '41999990206', 'daryl.cross@twd.com', 'Masculino', 'Sitio Cercado'),
(67, 'Glenn Rhee', '1981-12-21', 'Kwon Rhee', 'Mei Rhee', '41999990207', 'glenn.delivery@twd.com', 'Masculino', 'Cajuru'),
(68, 'Maggie Greene', '1982-10-07', 'Hershel Greene', 'Josephine Greene', '41999990208', 'maggie.g@farm.com', 'Feminino', 'Jardim Botanico'),
(69, 'Negan Smith', '1966-07-23', 'Thomas Smith', 'Sarah Smith', '41999990209', 'negan@savior.com', 'Masculino', 'Boqueirão'),
(70, 'Fin Tutuola', '1958-02-16', 'William Tutuola', 'Clarice Tutuola', '41999990210', 'fin.t@nypd.gov', 'Masculino', 'Hauer'),
(71, 'Amanda Rollins', '1980-06-10', 'Jim Rollins', 'Kim Rollins', '41999990211', 'rollins.a@nypd.gov', 'Feminino', 'Portão'),
(72, 'Dominick Carisi', '1982-12-01', 'Dominick Carisi Sr.', 'Serafina Carisi', '41999990212', 'carisi.d@nypd.gov', 'Masculino', 'Alto da XV'),
(73, 'Kim Burgess', '1988-02-17', 'Robert Burgess', 'Patty Burgess', '41999990213', 'burgess.21@cpd.gov', 'Feminino', 'Xaxim'),
(74, 'Adam Ruzek', '1985-06-14', 'Bob Ruzek', 'Annie Ruzek', '41999990214', 'ruzek.21@cpd.gov', 'Masculino', 'Boqueirão'),
(75, 'Matthew Casey', '1979-02-12', 'Gregory Casey', 'Nancy Casey', '41999990215', 'casey.51@cfd.gov', 'Masculino', 'Agua Verde'),
(76, 'Christopher Herrmann', '1964-10-10', 'Timothy Herrmann', 'Rose Herrmann', '41999990216', 'herrmann@cfd.gov', 'Masculino', 'Santa Candida'),
(77, 'Tyrion Lannister', '1975-06-11', 'Tywin Lannister', 'Joanna Lannister', '41999990217', 'imp@casterly.com', 'Masculino', 'Batel'),
(78, 'Arya Stark', '1989-02-02', 'Eddard Stark', 'Catelyn Stark', '41999990218', 'no.one@braavos.com', 'Feminino', 'CIC'),
(79, 'Sansa Stark', '1981-12-21', 'Eddard Stark', 'Catelyn Stark', '41999990219', 'lady.winterfell@stark.com', 'Feminino', 'Alto da XV'),
(80, 'Jaime Lannister', '1970-09-03', 'Tywin Lannister', 'Joanna Lannister', '41999990220', 'kingslayer@westeros.com', 'Masculino', 'Centro Civico'),
(81, 'Abby Sciuto', '1969-03-27', 'Nicholas Sciuto', 'Gloria Sciuto', '41999990221', 'abby.lab@ncis.gov', 'Feminino', 'Hauer'),
(82, 'Timothy McGee', '1977-11-15', 'John McGee', 'Jane McGee', '41999990222', 'mcgee.probie@ncis.gov', 'Masculino', 'Ecoville'),
(83, 'Ziva David', '1982-11-12', 'Eli David', 'Rivka David', '41999990223', 'ziva@mossad.gov', 'Feminino', 'Jardim das Americas'),
(84, 'Steve Rogers', '1918-07-04', 'Joseph Rogers', 'Sarah Rogers', '41999990224', 'captain@avengers.com', 'Masculino', 'Jardim Botanico'),
(85, 'Wanda Maximoff', '1989-02-10', 'Oleg Maximoff', 'Iryna Maximoff', '41999990225', 'scarlet.witch@avengers.com', 'Feminino', 'Sitio Cercado'),
(86, 'Peter Parker', '2001-08-10', 'Richard Parker', 'Mary Parker', '41999990226', 'spiderman@stark.com', 'Masculino', 'Cajuru'),
(87, 'Thor Odinson', '0964-05-01', 'Odin Borson', 'Frigga', '41999990227', 'thor@asgard.com', 'Masculino', 'Ecoville'),
(88, 'Clark Kent', '1978-06-18', 'Jonathan Kent', 'Martha Kent', '41999990228', 'superman@dailyplanet.com', 'Masculino', 'Jardim Botanico'),
(89, 'Barry Allen', '1989-03-14', 'Henry Allen', 'Nora Allen', '41999990229', 'flash@centralcity.gov', 'Masculino', 'Xaxim'),
(90, 'Arthur Curry', '1979-01-29', 'Tom Curry', 'Atlanna', '41999990230', 'aquaman@atlantis.com', 'Masculino', 'Portão'),
(91, 'Lois Lane', '1980-08-17', 'Sam Lane', 'Ella Lane', '41999990231', 'lois@dailyplanet.com', 'Feminino', 'Centro Civico'),
(92, 'Walter White', '1958-09-07', 'Walter White Sr.', 'Dorothy White', '41999990101', 'heisenberg@gmail.com', 'Masculino', 'Batel'),
(93, 'Jesse Pinkman', '1984-09-24', 'Adam Pinkman', 'Diane Pinkman', '41999990102', 'capncook@outlook.com', 'Masculino', 'Cajuru'),
(94, 'Rick Grimes', '1973-09-14', 'Rich Grimes', 'Betty Grimes', '41999990103', 'sheriff.rick@gmail.com', 'Masculino', 'Boqueirão'),
(95, 'Michonne', '1980-01-08', 'Nathaniel Hawks', 'Teresa Hawks', '41999990104', 'michonne.katana@twd.com', 'Feminino', 'Sitio Cercado'),
(96, 'Olivia Benson', '1964-01-23', 'Joseph Halloran', 'Serena Benson', '41999990105', 'benson.svu@nypd.gov', 'Feminino', 'Centro Civico'),
(97, 'Elliot Stabler', '1966-10-20', 'Joseph Stabler', 'Bernadette Stabler', '41999990106', 'stabler@nypd.gov', 'Masculino', 'Portão'),
(98, 'Hank Voight', '1960-03-15', 'Richard Voight', 'Mary Voight', '41999990107', 'voight.21@cpd.gov', 'Masculino', 'CIC'),
(99, 'Kelly Severide', '1981-02-25', 'Benny Severide', 'Jennifer Severide', '41999990108', 'severide.51@cfd.gov', 'Masculino', 'Agua Verde'),
(100, 'Jon Snow', '1983-12-26', 'Rhaegar Targaryen', 'Lyanna Stark', '41999990109', 'lord.commander@wall.com', 'Masculino', 'Santa Candida'),
(101, 'Daenerys Targaryen', '1984-05-10', 'Aerys II Targaryen', 'Rhaella Targaryen', '41999990110', 'khaleesi@dragon.com', 'Feminino', 'Jardim Botanico'),
(102, 'Leroy Jethro Gibbs', '1954-05-17', 'Jackson Gibbs', 'Ann Gibbs', '41999990111', 'gibbs.rule4@ncis.gov', 'Masculino', 'Jardim das Americas'),
(103, 'Tony Stark', '1970-05-29', 'Howard Stark', 'Maria Stark', '41999990112', 'iam.ironman@stark.com', 'Masculino', 'Ecoville'),
(104, 'Natasha Romanoff', '1984-11-22', 'Ivan Romanoff', 'Natalia Romanova', '41999990113', 'widow@avengers.com', 'Feminino', 'Alto da XV'),
(105, 'Bruce Wayne', '1972-02-19', 'Thomas Wayne', 'Martha Wayne', '41999990114', 'bruce@waynecorp.com', 'Masculino', 'Batel'),
(106, 'Diana Prince', '1980-03-30', 'Zeus', 'Hippolyta', '41999990115', 'wonder.woman@themyscira.com', 'Feminino', 'Xaxim'),
(107, 'Professor Sergio Silveira', '1974-06-05', 'Professor Sergio Silveira', 'Professor Sergio Silveira', '(41)9911-2964', 'livrosalunossenai@gmail.com', 'Masculino', 'CIC'),
(108, 'Amanda Silveira', '1993-02-21', 'Wanderlei Silveira', 'Sheila Silveira', '(47)99261-7300', 'amanda@amanda', 'Feminino', 'Ecoville');

-- --------------------------------------------------------

--
-- Estrutura para tabela `matricula`
--

DROP TABLE IF EXISTS `matricula`;
CREATE TABLE IF NOT EXISTS `matricula` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nivel` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `turno` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `serie` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `cursoExtra` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `matricula`
--

INSERT INTO `matricula` (`id`, `nivel`, `turno`, `serie`, `cursoExtra`) VALUES
(4, 'Sub-Seq', 'Noite', '1°', 'Pintura'),
(5, 'Integrado', 'Tarde', '', 'Pintura');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
