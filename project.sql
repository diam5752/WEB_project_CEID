-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 02 Οκτ 2017 στις 08:28:21
-- Έκδοση διακομιστή: 5.7.14
-- Έκδοση PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `project`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `apostoles`
--

CREATE TABLE `apostoles` (
  `XRONOS` int(11) DEFAULT NULL,
  `KOSTOS` int(11) DEFAULT NULL,
  `TRACKING` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TILEFONO` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `KAT_TILEFONO` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `EXPRESS` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `QR` longblob
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `apostoles`
--

INSERT INTO `apostoles` (`XRONOS`, `KOSTOS`, `TRACKING`, `TILEFONO`, `KAT_TILEFONO`, `EXPRESS`, `QR`) VALUES
(3, 18, 'AM1506897114RI', '0000000001', '0000000004', 'True', 0x6956424f5277304b47676f414141414e5355684555674141414663414141425841514d414141424c426b737641414141426c424d5645582f2f2f38414141425677744e2b4141414172306c45515651346a633353735247444d417746304a39545151634c634d63616446344a4a674176594b3945357a56383577576755785846495679534175515756632b567637344e334730614552755353465263673379674761704e386b7679584c414e564c52444b686a6b7176544e634f7163332f572f58553639482b4e6646536475416d314d54365035775269414d616865794c4a736f726c4732306a6e6a6c3075624752462b7478373554306570714135392b435a746b567a37744e4b6e46693153624f683155546472752b4b6e76733473757238333767646f506e39766c5675465972764e533879697753565765535a776741414141424a52553545726b4a6767673d3d),
(4, 11, 'AM1506897120', '0000000001', '00000000004', 'False', 0x6956424f5277304b47676f414141414e5355684555674141414663414141425841514d414141424c426b737641414141426c424d5645582f2f2f38414141425677744e2b4141414173306c45515651346a633353735132464942414734444e58324f6b434a7178427830713677417375494376527351594a4539425a474f2b644a756f7265456372315664412b506b50674c65746e736a7152425146643441576b6758524a69306133566f7837363936446a55447a6f5233687149352f2f4c7a6c714b50492f71706f75682b7056317a465a49423474674f55354463424d7a4550596a325130506235435633526831764e4a4c50654a69395a4f364279787976726f726d507031484f7250394e6338583071366a624d7339454d683251655672316d587a76574837744a4b502f4b54755031443075395958454773464672334b6a505941414141415355564f524b35435949493d);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `diaxeiristis`
--

CREATE TABLE `diaxeiristis` (
  `USERNAME` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `diaxeiristis`
--

INSERT INTO `diaxeiristis` (`USERNAME`, `PASSWORD`) VALUES
('aggelos', 'diamantopoulos'),
('thodwris', 'katsikeros');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `katasthmata`
--

CREATE TABLE `katasthmata` (
  `ONOMA` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `ODOS` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ARITHMOS` int(11) DEFAULT NULL,
  `POLI` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `TK` int(11) DEFAULT NULL,
  `TILEFONO` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TRANS_ID` int(11) DEFAULT NULL,
  `COORX` double DEFAULT NULL,
  `COORY` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `katasthmata`
--

INSERT INTO `katasthmata` (`ONOMA`, `ODOS`, `ARITHMOS`, `POLI`, `TK`, `TILEFONO`, `TRANS_ID`, `COORX`, `COORY`) VALUES
('AMFILOXIA SHOP', 'asdasda', 21, 'AMFILOXIA', 30500, '0000000001', 8, 38.8633, 21.1666),
('THASSALONIKI', 'asd', 123, 'asd', 54248, '0000000002', 6, 40.6401, 22.9444),
('Καλαβρυτα SHOP', 'Αβ', 120, 'Καλαβρυτα', 25001, '0000000003', 4, 38.091477, 22.110935),
('RIΟ SHOP', 'sdasdas', 25, 'RIO', 26500, '0000000004', 0, 38.28, 21.833);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `parakolouthisi`
--

CREATE TABLE `parakolouthisi` (
  `TOPOTHESIES` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TRACKING` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `FAKE_ID` int(11) NOT NULL COMMENT 'for display only',
  `ARRIVED` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `parakolouthisi`
--

INSERT INTO `parakolouthisi` (`TOPOTHESIES`, `TRACKING`, `FAKE_ID`, `ARRIVED`) VALUES
('IWANNINA', 'AM1506897120', 153, 0),
('PATRA', 'AM1506897120', 152, 0),
('KALAMATA', 'AM1506897120', 151, 0),
('IRAKLEIO', 'AM1506897120', 150, 0),
('IWANNINA', 'AM1506897114RI', 149, 0),
('THESSALONIKI', 'AM1506897114RI', 148, 0),
('ATHINA', 'AM1506897114RI', 147, 0),
('IRAKLEIO', 'AM1506897114RI', 146, 0),
('IWANNINA', 'AM1506896536RI', 137, 0),
('PATRA', 'AM1506896536RI', 136, 0),
('KALAMATA', 'AM1506896536RI', 135, 0),
('IRAKLEIO', 'AM1506896536RI', 134, 0),
('IWANNINA', '1506896262RI', 133, 0),
('PATRA', '1506896262RI', 132, 0),
('KALAMATA', '1506896262RI', 131, 0),
('IRAKLEIO', '1506896262RI', 130, 0),
('IWANNINA', '1506896200RI', 129, 0),
('PATRA', '1506896200RI', 128, 0),
('KALAMATA', '1506896200RI', 127, 0),
('IRAKLEIO', '1506896200RI', 126, 0),
('IWANNINA', '1506896077RI', 125, 0),
('THESSALONIKI', '1506896077RI', 124, 0),
('ATHINA', '1506896077RI', 123, 0),
('IRAKLEIO', '1506896077RI', 122, 0),
('IWANNINA', '1506896029RI', 121, 0),
('PATRA', '1506896029RI', 120, 0),
('KALAMATA', '1506896029RI', 119, 0),
('IRAKLEIO', '1506896029RI', 118, 0);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `transit_hub`
--

CREATE TABLE `transit_hub` (
  `TRANS_COORX` double DEFAULT NULL,
  `TRANS_COORY` double DEFAULT NULL,
  `TRANS_ID` int(11) NOT NULL,
  `ONOMA_TRANS` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `transit_hub`
--

INSERT INTO `transit_hub` (`TRANS_COORX`, `TRANS_COORY`, `TRANS_ID`, `ONOMA_TRANS`) VALUES
(39.68182599999997, 20.86303709999993, 0, 'IWANNINA'),
(40.672306, 22.939453100000037, 1, 'THESSALONIKI'),
(40.855370500000035, 25.861816399999952, 2, 'ALEKSANDROUPOLI'),
(39.6437676, 22.412109399999963, 3, 'LARISSA'),
(38.22523519999999, 21.739196799999945, 4, 'PATRA'),
(38.0562016, 23.58695979999993, 5, 'ATHINA'),
(39.09169960000003, 26.53472899999997, 6, 'MITILINI'),
(37.04202439999999, 22.120971699999927, 7, 'KALAMATA'),
(35.33977430000001, 25.14770509999994, 8, 'IRAKLEIO');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `ypal_kat`
--

CREATE TABLE `ypal_kat` (
  `KAT_USERNAME` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `KAT_PASSWORD` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `KAT_TIL` varchar(11) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `ypal_kat`
--

INSERT INTO `ypal_kat` (`KAT_USERNAME`, `KAT_PASSWORD`, `KAT_TIL`) VALUES
('ypal_kat1', 'a', '0000000001'),
('ypal_kat2', 'a', '0000000002'),
('ypal_kat3', 'a', '0000000003'),
('ypal_kat4', 'a', '0000000004');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `ypal_trans`
--

CREATE TABLE `ypal_trans` (
  `TRANS_USERNAME` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TRANS_PASSWORD` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `TRANS_NAME` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `ypal_trans`
--

INSERT INTO `ypal_trans` (`TRANS_USERNAME`, `TRANS_PASSWORD`, `TRANS_NAME`) VALUES
('ypal_trans3', 'a', 'ALEKSANDROUPOLI'),
('ypal_trans2', 'a', 'THESSALONIKI'),
('ypal_trans1', 'a', 'IWANNINA'),
('ypal_trans4', 'a', 'LARISSA'),
('ypal_trans5', 'a', 'PATRA'),
('ypal_trans6', 'a', 'ATHINA'),
('ypal_trans7', 'a', 'MITILINI'),
('ypal_trans8', 'a', 'KALAMATA'),
('ypal_trans9', 'a', 'IRAKLEIO');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `apostoles`
--
ALTER TABLE `apostoles`
  ADD PRIMARY KEY (`TRACKING`),
  ADD KEY `FK_KATAST_ARXI` (`KAT_TILEFONO`),
  ADD KEY `FK_KATAST_TELOS` (`TILEFONO`);

--
-- Ευρετήρια για πίνακα `diaxeiristis`
--
ALTER TABLE `diaxeiristis`
  ADD PRIMARY KEY (`USERNAME`);

--
-- Ευρετήρια για πίνακα `katasthmata`
--
ALTER TABLE `katasthmata`
  ADD PRIMARY KEY (`TILEFONO`),
  ADD KEY `TRANS_ID` (`TRANS_ID`);

--
-- Ευρετήρια για πίνακα `parakolouthisi`
--
ALTER TABLE `parakolouthisi`
  ADD PRIMARY KEY (`TOPOTHESIES`,`TRACKING`),
  ADD KEY `FK_EXEI` (`TRACKING`),
  ADD KEY `fakeid` (`FAKE_ID`);

--
-- Ευρετήρια για πίνακα `transit_hub`
--
ALTER TABLE `transit_hub`
  ADD PRIMARY KEY (`TRANS_ID`);

--
-- Ευρετήρια για πίνακα `ypal_kat`
--
ALTER TABLE `ypal_kat`
  ADD PRIMARY KEY (`KAT_USERNAME`);

--
-- Ευρετήρια για πίνακα `ypal_trans`
--
ALTER TABLE `ypal_trans`
  ADD PRIMARY KEY (`TRANS_USERNAME`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `parakolouthisi`
--
ALTER TABLE `parakolouthisi`
  MODIFY `FAKE_ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'for display only', AUTO_INCREMENT=154;
--
-- AUTO_INCREMENT για πίνακα `transit_hub`
--
ALTER TABLE `transit_hub`
  MODIFY `TRANS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `katasthmata`
--
ALTER TABLE `katasthmata`
  ADD CONSTRAINT `katasthmata_ibfk_1` FOREIGN KEY (`TRANS_ID`) REFERENCES `transit_hub` (`TRANS_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
