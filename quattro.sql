# phpMyAdmin SQL Dump
# version 2.5.3
# http://www.phpmyadmin.net
#
# Host: localhost
# Generation Time: May 09, 2004 at 09:42 PM
# Server version: 4.0.15
# PHP Version: 4.3.3
# 
# Database : `recensioni`
# 

# --------------------------------------------------------

#
# Table structure for table `commenti`
#

CREATE TABLE `commenti` (
  `id` int(11) NOT NULL auto_increment,
  `id_review` int(11) NOT NULL default '0',
  `user` varchar(8) NOT NULL default '',
  `testo` text NOT NULL,
  `data` timestamp(14) NOT NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=46 ;

#
# Dumping data for table `commenti`
#

INSERT INTO `commenti` (`id`, `id_review`, `user`, `testo`, `data`) VALUES (1, 14, 'mrmoon', 'recensione un po\' troppo corta', 20041203222005),
(43, 26, 'mrmoon', 'sì, in effetti il meglio si raggiunge con "Joy and Pain"', 20040403133743),
(41, 26, 'mrmoon', 'Piace molto anche a me!', 20040403133328),
(42, 26, 'mrmoon', 'ritengo che le prime tracce siano noiose...fortunatamente compensano le ultime :-)', 20040403133534),
(30, 13, 'mrmoon', 'secondo me è il migliore album degli incognito', 20001221112354),
(40, 23, 'mrmoon', 'ottimo', 20040403123434),
(39, 13, 'mrmoon', 'anche secondo me prova tempo', 20001220152523),
(44, 23, 'bene', 'Bella la copertina, ma non ho mai ascoltato il cd... Se ne vale la pena lo farò...', 20040501172902),
(45, 26, 'mrmoon', 'Che groove ragazzi!', 20040509112638);

# --------------------------------------------------------

#
# Table structure for table `recensioni`
#

CREATE TABLE `recensioni` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user` varchar(8) NOT NULL default '',
  `artista` varchar(40) NOT NULL default '',
  `titolo` varchar(40) NOT NULL default '',
  `data` timestamp(14) NOT NULL,
  `anno` smallint(6) NOT NULL default '0',
  `img_url` varchar(200) default NULL,
  `testo` text NOT NULL,
  `genere` enum('vocal-jazz','swing-jazz','traditional-jazz','modal-jazz','jazz-funk','smooth-jazz','acid-jazz','soul-jazz','fusion','blues-jazz','free-jazz','standard-jazz','dancefloor-jazz','groove','caribbean-jazz','bossa-nova') NOT NULL default 'vocal-jazz',
  `avg` decimal(3,2) NOT NULL default '0.00',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=27 ;

#
# Dumping data for table `recensioni`
#

INSERT INTO `recensioni` (`id`, `user`, `artista`, `titolo`, `data`, `anno`, `img_url`, `testo`, `genere`, `avg`) VALUES (2, 'herbie', 'herbie hancock', 'head hunters', 20040501092716, 1970, 'http://columbia.jazz', 'Il disco piu venduto nella storia del jazz!', 'jazz-funk', '0.00'),
(23, 'mrmoon', 'Jamiroquai', 'Alive Without Travelling', 20040509122705, 1997, 'http://twm/uploads/wskihhufgjaj.jpg', 'Un bootleg stupendo che non puo\' mancare agli appassionati di questa band.', 'acid-jazz', '7.25'),
(26, 'mrmoon', 'Count Basic', 'Live', 20040509113824, 1997, 'http://twm/uploads/hgaseraajgpd.jpg', 'In questo album troviamo la formazione al completo dei Count Basic mentre alla voce troviamo la fantasica Kelli Sae, che tra altri ha collaborato agli ultimi album degli Incognito. L\'album presenta molti dei successi di Peter Legat eseguiti magistralmente dal vivo a Vienna nell\'ultima tappa del tour europeo. Da menzionare il tocco del bassista Willi Langer molto groovy. Se si ama l\'acid jazz nella vena piu\' soul questo album non puo\' mancare. Pregevole la qualita\' sonora.', 'soul-jazz', '0.00'),
(13, 'mrmoon', 'incognito', 'beneath the surface', 20040430225527, 1996, 'http://cog.uk', 'stupendo, suscita forti emozioni. E\' incredibile la forza del basso!', 'acid-jazz', '0.00');

# --------------------------------------------------------

#
# Table structure for table `utenti`
#

CREATE TABLE `utenti` (
  `user` varchar(8) NOT NULL default '',
  `passwd` varchar(8) NOT NULL default '',
  `admin` enum('y','n') NOT NULL default 'n',
  `nome` varchar(16) NOT NULL default '',
  `cognome` varchar(16) NOT NULL default '',
  `email` varchar(60) NOT NULL default '',
  PRIMARY KEY  (`user`)
) TYPE=MyISAM;

#
# Dumping data for table `utenti`
#

INSERT INTO `utenti` (`user`, `passwd`, `admin`, `nome`, `cognome`, `email`) VALUES ('mrmoon', 'whatever', 'y', 'Rinaldo', 'Bergamini', 'rinberg@libero.it'),
('herbie', 'funkster', 'n', 'Herbie', 'Hancock', 'rinaldo.bergamini@aliceposta.it'),
('bene', 'bene', 'n', 'Benedetta', 'Franceschini', 'benefrance@libero.it'),
('guybrush', 'whatever', 'n', 'Guybrush', 'Threepwood', 'guybrush@lucasarts.com');

# --------------------------------------------------------

#
# Table structure for table `voti`
#

CREATE TABLE `voti` (
  `id` int(11) NOT NULL auto_increment,
  `user` varchar(8) NOT NULL default '',
  `id_review` int(11) NOT NULL default '0',
  `voto` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=12 ;

#
# Dumping data for table `voti`
#

INSERT INTO `voti` (`id`, `user`, `id_review`, `voto`) VALUES (1, 'mrmoon', 23, 6),
(2, 'mrmoon', 26, 8),
(3, 'mrmoon', 13, 6),
(4, 'herbie', 23, 8),
(5, 'bene', 23, 6),
(11, 'guybrush', 23, 9);
