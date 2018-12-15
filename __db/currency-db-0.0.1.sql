DROP TABLE IF EXISTS `currency`;

CREATE TABLE `currency` (
  `id` INT NOT NULL,
  `code` VARCHAR(16) NULL,
  `type` ENUM('fiat', 'crypto') NULL,
  `name` VARCHAR(255) NULL,
  `unit` TINYINT NULL,
  `country_id` INT NULL,
  `country_name` VARCHAR(255) NULL,
  PRIMARY KEY (`id`),
  INDEX `idx_type` (`type` ASC),
  INDEX `idx_code` (`code` ASC),
  INDEX `idx_name` (`name` ASC),
  INDEX `idx_country` (`country_id` ASC)
);

LOCK TABLES `currency` WRITE;
/*!40000 ALTER TABLE `currency` DISABLE KEYS */;
INSERT INTO `currency` VALUES (4,'AFA','fiat','Afghani',0,4,'AFGHANISTAN'),
    (8,'ALK','fiat','Old Lek',0,8,'ALBANIA'),
    (12,'DZD','fiat','Algerian Dinar',2,12,'ALGERIA'),
    (20,'ADP','fiat','Andorran Peseta',0,20,'ANDORRA'),
    (24,'AON','fiat','New Kwanza',0,24,'ANGOLA'),
    (31,'AZM','fiat','Azerbaijanian Manat',0,31,'AZERBAIJAN'),
    (32,'ARY','fiat','Peso',0,32,'ARGENTINA'),
    (36,'AUD','fiat','Australian Dollar',2,798,'TUVALU'),
    (40,'ATS','fiat','Schilling',0,40,'AUSTRIA'),
    (44,'BSD','fiat','Bahamian Dollar',2,NULL,'BAHAMAS (THE)'),
    (48,'BHD','fiat','Bahraini Dinar',3,48,'BAHRAIN'),
    (50,'BDT','fiat','Taka',2,50,'BANGLADESH'),
    (51,'AMD','fiat','Armenian Dram',2,51,'ARMENIA'),
    (52,'BBD','fiat','Barbados Dollar',2,52,'BARBADOS'),
    (56,'BEF','fiat','Belgian Franc',0,56,'BELGIUM'),
    (60,'BMD','fiat','Bermudian Dollar',2,60,'BERMUDA'),
    (64,'BTN','fiat','Ngultrum',2,64,'BHUTAN'),
    (68,'BOP','fiat','Peso boliviano',0,NULL,'BOLIVIA'),
    (70,'BAD','fiat','Dinar',0,70,'BOSNIA AND HERZEGOVINA'),
    (72,'BWP','fiat','Pula',2,72,'BOTSWANA'),
    (76,'BRN','fiat','New Cruzado',0,76,'BRAZIL'),
    (84,'BZD','fiat','Belize Dollar',2,84,'BELIZE'),
    (90,'SBD','fiat','Solomon Islands Dollar',2,90,'SOLOMON ISLANDS'),
    (96,'BND','fiat','Brunei Dollar',2,96,'BRUNEI DARUSSALAM'),
    (100,'BGL','fiat','Lev',0,100,'BULGARIA'),
    (104,'BUK','fiat','Kyat',0,NULL,'BURMAÂ '),
    (108,'BIF','fiat','Burundi Franc',0,108,'BURUNDI'),
    (112,'BYB','fiat','Belarusian Ruble',0,112,'BELARUS'),
    (116,'KHR','fiat','Riel',2,116,'CAMBODIA'),
    (124,'CAD','fiat','Canadian Dollar',2,124,'CANADA'),
    (132,'CVE','fiat','Cabo Verde Escudo',2,132,'CABO VERDE'),
    (136,'KYD','fiat','Cayman Islands Dollar',2,NULL,'CAYMAN ISLANDS (THE)'),
    (144,'LKR','fiat','Sri Lanka Rupee',2,144,'SRI LANKA'),
    (152,'CLP','fiat','Chilean Peso',0,152,'CHILE'),
    (156,'CNY','fiat','Yuan Renminbi',2,156,'CHINA'),
    (170,'COP','fiat','Colombian Peso',2,170,'COLOMBIA'),
    (174,'KMF','fiat','Comorian Franc ',0,NULL,'COMOROS (THE)'),
    (180,'ZRZ','fiat','Zaire',0,NULL,'ZAIRE'),
    (188,'CRC','fiat','Costa Rican Colon',2,188,'COSTA RICA'),
    (191,'HRK','fiat','Croatian Kuna',0,191,'CROATIA'),
    (192,'CUP','fiat','Cuban Peso',2,192,'CUBA'),
    (196,'CYP','fiat','Cyprus Pound',0,196,'CYPRUS'),
    (200,'CSK','fiat','Koruna',0,NULL,'CZECHOSLOVAKIA'),
    (203,'CSJ','fiat','Krona A/53',0,NULL,'CZECHOSLOVAKIA'),
    (208,'DKK','fiat','Danish Krone',2,304,'GREENLAND'),
    (214,'DOP','fiat','Dominican Peso',2,NULL,'DOMINICAN REPUBLIC (THE)'),
    (218,'ECS','fiat','Sucre',0,218,'ECUADOR'),
    (222,'SVC','fiat','El Salvador Colon',2,222,'EL SALVADOR'),
    (226,'GQE','fiat','Ekwele',0,226,'EQUATORIAL GUINEA'),
    (230,'ETB','fiat','Ethiopian Birr',2,231,'ETHIOPIA'),
    (232,'ERN','fiat','Nakfa',2,232,'ERITREA'),
    (233,'EEK','fiat','Kroon',0,233,'ESTONIA'),
    (238,'FKP','fiat','Falkland Islands Pound',2,NULL,'FALKLAND ISLANDS (THE) [MALVINAS]'),
    (242,'FJD','fiat','Fiji Dollar',2,242,'FIJI'),
    (246,'FIM','fiat','Markka',0,246,'FINLAND'),
    (250,'FRF','fiat','French Franc',0,NULL,'SAINT-BARTHÃ‰LEMY'),
    (262,'DJF','fiat','Djibouti Franc',0,262,'DJIBOUTI'),
    (268,'GEK','fiat','Georgian Coupon',0,268,'GEORGIA'),
    (270,'GMD','fiat','Dalasi',2,NULL,'GAMBIA (THE)'),
    (276,'DEM','fiat','Deutsche Mark',0,276,'GERMANY'),
    (278,'DDM','fiat','Mark der DDR',0,NULL,'GERMAN DEMOCRATIC REPUBLIC'),
    (288,'GHC','fiat','Cedi',0,288,'GHANA'),
    (292,'GIP','fiat','Gibraltar Pound',2,292,'GIBRALTAR'),
    (300,'GRD','fiat','Drachma',0,300,'GREECE'),
    (320,'GTQ','fiat','Quetzal',2,320,'GUATEMALA'),
    (324,'GNS','fiat','Syli',0,324,'GUINEA'),
    (328,'GYD','fiat','Guyana Dollar',2,328,'GUYANA'),
    (332,'HTG','fiat','Gourde',2,332,'HAITI'),
    (340,'HNL','fiat','Lempira',2,340,'HONDURAS'),
    (344,'HKD','fiat','Hong Kong Dollar',2,344,'HONG KONG'),
    (348,'HUF','fiat','Forint',2,348,'HUNGARY'),
    (352,'ISJ','fiat','Old Krona',0,352,'ICELAND'),
    (356,'INR','fiat','Indian Rupee',2,356,'INDIA'),
    (360,'IDR','fiat','Rupiah',0,626,'TIMOR-LESTE'),
    (364,'IRR','fiat','Iranian Rial',2,364,'IRAN (ISLAMIC REPUBLIC OF)'),
    (368,'IQD','fiat','Iraqi Dinar',3,368,'IRAQ'),
    (372,'IEP','fiat','Irish Pound',0,372,'IRELAND'),
    (376,'ILR','fiat','Old Shekel',0,376,'ISRAEL'),
    (380,'ITL','fiat','Italian Lira',0,674,'SAN MARINO'),
    (388,'JMD','fiat','Jamaican Dollar',2,388,'JAMAICA'),
    (392,'JPY','fiat','Yen',0,392,'JAPAN'),
    (398,'KZT','fiat','Tenge',2,398,'KAZAKHSTAN'),
    (400,'JOD','fiat','Jordanian Dinar',3,400,'JORDAN'),
    (404,'KES','fiat','Kenyan Shilling',2,404,'KENYA'),
    (408,'KPW','fiat','North Korean Won',2,408,'KOREA (THE DEMOCRATIC PEOPLEâ€™S REPUBLIC OF)'),
    (410,'KRW','fiat','Won',0,410,'KOREA (THE REPUBLIC OF)'),
    (414,'KWD','fiat','Kuwaiti Dinar',3,414,'KUWAIT'),
    (417,'KGS','fiat','Som',2,417,'KYRGYZSTAN'),
    (418,'LAJ','fiat','Pathet Lao Kip',0,NULL,'LAO'),
    (422,'LBP','fiat','Lebanese Pound',2,422,'LEBANON'),
    (426,'LSM','fiat','Loti',0,426,'LESOTHO'),
    (428,'LVR','fiat','Latvian Ruble',0,428,'LATVIA'),
    (430,'LRD','fiat','Liberian Dollar',2,430,'LIBERIA'),
    (434,'LYD','fiat','Libyan Dinar',3,434,'LIBYA'),
    (440,'LTT','fiat','Talonas',0,440,'LITHUANIA'),
    (442,'LUF','fiat','Luxembourg Franc',0,442,'LUXEMBOURG'),
    (446,'MOP','fiat','Pataca',2,446,'MACAO'),
    (450,'MGF','fiat','Malagasy Franc',0,450,'MADAGASCAR'),
    (454,'MWK','fiat','Kwacha',0,454,'MALAWI'),
    (458,'MYR','fiat','Malaysian Ringgit',2,458,'MALAYSIA'),
    (462,'MVQ','fiat','Maldive Rupee',0,462,'MALDIVES'),
    (466,'MLF','fiat','Mali Franc',0,466,'MALI'),
    (470,'MTP','fiat','Maltese Pound',0,470,'MALTA'),
    (478,'MRO','fiat','Ouguiya',0,478,'MAURITANIA'),
    (480,'MUR','fiat','Mauritius Rupee',2,480,'MAURITIUS'),
    (484,'MXP','fiat','Mexican Peso',0,484,'MEXICO'),
    (496,'MNT','fiat','Tugrik',2,496,'MONGOLIA'),
    (498,'MDL','fiat','Moldovan Leu',2,498,'MOLDOVA (THE REPUBLIC OF)'),
    (504,'MAD','fiat','Moroccan Dirham',2,732,'WESTERN SAHARA'),
    (508,'MZM','fiat','Mozambique Metical',0,508,'MOZAMBIQUE'),
    (512,'OMR','fiat','Rial Omani',3,512,'OMAN'),
    (516,'NAD','fiat','Namibia Dollar',2,516,'NAMIBIA'),
    (524,'NPR','fiat','Nepalese Rupee',2,524,'NEPAL'),
    (528,'NLG','fiat','Netherlands Guilder',0,528,'NETHERLANDS'),
    (532,'ANG','fiat','Netherlands Antillean Guilder',0,NULL,'NETHERLANDS ANTILLES'),
    (533,'AWG','fiat','Aruban Florin',2,533,'ARUBA'),
    (548,'VUV','fiat','Vatu',0,548,'VANUATU'),
    (554,'NZD','fiat','New Zealand Dollar',2,772,'TOKELAU'),
    (558,'NIC','fiat','Cordoba',0,558,'NICARAGUA'),
    (566,'NGN','fiat','Naira',2,566,'NIGERIA'),
    (578,'NOK','fiat','Norwegian Krone',2,744,'SVALBARD AND JAN MAYEN'),
    (586,'PKR','fiat','Pakistan Rupee',2,586,'PAKISTAN'),
    (590,'PAB','fiat','Balboa',2,591,'PANAMA'),
    (598,'PGK','fiat','Kina',2,598,'PAPUA NEW GUINEA'),
    (600,'PYG','fiat','Guarani',0,600,'PARAGUAY'),
    (604,'PES','fiat','Sol',0,604,'PERU'),
    (608,'PHP','fiat','Philippine Peso',2,NULL,'PHILIPPINES (THE)'),
    (616,'PLZ','fiat','Zloty',0,616,'POLAND'),
    (620,'PTE','fiat','Portuguese Escudo',0,620,'PORTUGAL'),
    (624,'GWP','fiat','Guinea-Bissau Peso',0,624,'GUINEA-BISSAU'),
    (626,'TPE','fiat','Timor Escudo',0,626,'TIMOR-LESTE'),
    (634,'QAR','fiat','Qatari Rial',2,634,'QATAR'),
    (642,'ROL','fiat','Old Leu',0,642,'ROMANIA'),
    (643,'RUB','fiat','Russian Ruble',2,NULL,'RUSSIAN FEDERATION (THE)'),
    (646,'RWF','fiat','Rwanda Franc',0,646,'RWANDA'),
    (654,'SHP','fiat','Saint Helena Pound',2,654,'SAINT HELENA, ASCENSION AND TRISTAN DA CUNHA'),
    (678,'STD','fiat','Dobra',0,678,'SAO TOME AND PRINCIPE'),
    (682,'SAR','fiat','Saudi Riyal',2,682,'SAUDI ARABIA'),
    (690,'SCR','fiat','Seychelles Rupee',2,690,'SEYCHELLES'),
    (694,'SLL','fiat','Leone',2,694,'SIERRA LEONE'),
    (702,'SGD','fiat','Singapore Dollar',2,702,'SINGAPORE'),
    (703,'SKK','fiat','Slovak Koruna',0,703,'SLOVAKIA'),
    (704,'VNC','fiat','Old Dong',0,NULL,'VIETNAM'),
    (705,'SIT','fiat','Tolar',0,705,'SLOVENIA'),
    (706,'SOS','fiat','Somali Shilling',2,706,'SOMALIA'),
    (710,'ZAR','fiat','Rand',2,710,'SOUTH AFRICA'),
    (716,'ZWD','fiat','Zimbabwe Dollar',0,716,'ZIMBABWE'),
    (720,'YDD','fiat','Yemeni Dinar',0,NULL,'YEMEN, DEMOCRATIC'),
    (724,'ESP','fiat','Spanish Peseta',0,724,'SPAIN'),
    (728,'SSP','fiat','South Sudanese Pound',2,728,'SOUTH SUDAN'),
    (736,'SDP','fiat','Sudanese Pound',0,729,'SUDAN'),
    (740,'SRG','fiat','Surinam Guilder',0,740,'SURINAME'),
    (748,'SZL','fiat','Lilangeni',0,748,'SWAZILAND'),
    (752,'SEK','fiat','Swedish Krona',2,752,'SWEDEN'),
    (756,'CHF','fiat','Swiss Franc',2,756,'SWITZERLAND'),
    (760,'SYP','fiat','Syrian Pound',2,760,'SYRIAN ARAB REPUBLIC'),
    (762,'TJR','fiat','Tajik Ruble',0,762,'TAJIKISTAN'),
    (764,'THB','fiat','Baht',2,764,'THAILAND'),
    (776,'TOP','fiat','Paâ€™anga',2,776,'TONGA'),
    (780,'TTD','fiat','Trinidad and Tobago Dollar',2,780,'TRINIDAD AND TOBAGO'),
    (784,'AED','fiat','UAE Dirham',2,NULL,'UNITED ARAB EMIRATES (THE)'),
    (788,'TND','fiat','Tunisian Dinar',3,788,'TUNISIA'),
    (792,'TRL','fiat','Old Turkish Lira',0,792,'TURKEY'),
    (795,'TMM','fiat','Turkmenistan Manat',0,795,'TURKMENISTAN'),
    (800,'UGW','fiat','Old Shilling',0,800,'UGANDA'),
    (804,'UAK','fiat','Karbovanet',0,804,'UKRAINE'),
    (807,'MKD','fiat','Denar',2,807,'MACEDONIA (THE FORMER YUGOSLAV REPUBLIC OF)'),
    (810,'RUR','fiat','Russian Ruble',0,860,'UZBEKISTAN'),
    (818,'EGP','fiat','Egyptian Pound',2,818,'EGYPT'),
    (826,'GBP','fiat','Pound Sterling',2,NULL,'UNITED KINGDOM OF GREAT BRITAIN AND NORTHERN IRELAND (THE)'),
    (834,'TZS','fiat','Tanzanian Shilling',2,834,'TANZANIA, UNITED REPUBLIC OF'),
    (840,'USD','fiat','US Dollar',2,850,'VIRGIN ISLANDS (U.S.)'),
    (858,'UYP','fiat','Uruguayan Peso',0,858,'URUGUAY'),
    (860,'UZS','fiat','Uzbekistan Sum',2,860,'UZBEKISTAN'),
    (862,'VEB','fiat','Bolivar',0,NULL,'VENEZUELA'),
    (882,'WST','fiat','Tala',2,882,'SAMOA'),
    (886,'YER','fiat','Yemeni Rial',2,887,'YEMEN'),
    (890,'YUN','fiat','Yugoslavian Dinar',0,NULL,'YUGOSLAVIA'),
    (891,'YUM','fiat','New Dinar',0,NULL,'YUGOSLAVIA'),
    (894,'ZMK','fiat','Zambian Kwacha',0,894,'ZAMBIA'),
    (901,'TWD','fiat','New Taiwan Dollar',2,NULL,'TAIWAN (PROVINCE OF CHINA)'),
    (927,'UYW','fiat','Unidad Previsional',4,858,'URUGUAY'),
    (928,'VES','fiat','BolÃ­var Soberano',2,862,'VENEZUELA (BOLIVARIAN REPUBLIC OF)'),
    (929,'MRU','fiat','Ouguiya',2,478,'MAURITANIA'),
    (930,'STN','fiat','Dobra',2,678,'SAO TOME AND PRINCIPE'),
    (931,'CUC','fiat','Peso Convertible',2,192,'CUBA'),
    (932,'ZWL','fiat','Zimbabwe Dollar',2,716,'ZIMBABWE'),
    (933,'BYN','fiat','Belarusian Ruble',2,112,'BELARUS'),
    (934,'TMT','fiat','Turkmenistan New Manat',2,795,'TURKMENISTAN'),
    (935,'ZWR','fiat','Zimbabwe Dollar',0,716,'ZIMBABWE'),
    (936,'GHS','fiat','Ghana Cedi',2,288,'GHANA'),
    (937,'VEF','fiat','BolÃ­var',0,862,'VENEZUELA (BOLIVARIAN REPUBLIC OF)'),
    (938,'SDG','fiat','Sudanese Pound',0,728,'SOUTH SUDAN'),
    (939,'GHP','fiat','Ghana Cedi',0,288,'GHANA'),
    (940,'UYI','fiat','Uruguay Peso en Unidades Indexadas (UI)',0,858,'URUGUAY'),
    (941,'RSD','fiat','Serbian Dinar',2,688,'SERBIA'),
    (942,'ZWN','fiat','Zimbabwe Dollar (new)',0,716,'ZIMBABWE'),
    (943,'MZN','fiat','Mozambique Metical',2,508,'MOZAMBIQUE'),
    (944,'AZN','fiat','Azerbaijan Manat',2,31,'AZERBAIJAN'),
    (945,'AYM','fiat','Azerbaijan Manat',0,31,'AZERBAIJAN'),
    (946,'RON','fiat','New Romanian Leu ',0,642,'ROMANIA'),
    (947,'CHE','fiat','WIR Euro',2,756,'SWITZERLAND'),
    (948,'CHC','fiat','WIR Franc (for electronic)',0,756,'SWITZERLAND'),
    (949,'TRY','fiat','New Turkish Lira',0,792,'TURKEY'),
    (950,'XAF','fiat','CFA Franc BEAC',0,266,'GABON'),
    (951,'XCD','fiat','East Caribbean Dollar',2,670,'SAINT VINCENT AND THE GRENADINES'),
    (952,'XOF','fiat','CFA Franc BCEAO',0,768,'TOGO'),
    (953,'XPF','fiat','CFP Franc',0,876,'WALLIS AND FUTUNA'),
    (954,'XEU','fiat','European Currency Unit (E.C.U)',0,NULL,'EUROPEAN MONETARY CO-OPERATION FUND (EMCF)'),
    (955,'XBA','fiat','Bond Markets Unit European Composite Unit (EURCO)',0,NULL,'ZZ01_Bond Markets Unit European_EURCO'),
    (956,'XBB','fiat','Bond Markets Unit European Monetary Unit (E.M.U.-6)',0,NULL,'ZZ02_Bond Markets Unit European_EMU-6'),
    (957,'XBC','fiat','Bond Markets Unit European Unit of Account 9 (E.U.A.-9)',0,NULL,'ZZ03_Bond Markets Unit European_EUA-9'),
    (958,'XBD','fiat','Bond Markets Unit European Unit of Account 17 (E.U.A.-17)',0,NULL,'ZZ04_Bond Markets Unit European_EUA-17'),
    (959,'XAU','fiat','Gold',0,NULL,'ZZ08_Gold'),
    (960,'XDR','fiat','SDR (Special Drawing Right)',0,NULL,'INTERNATIONAL MONETARY FUND (IMF)Â '),
    (961,'XAG','fiat','Silver',0,NULL,'ZZ11_Silver'),
    (962,'XPT','fiat','Platinum',0,NULL,'ZZ10_Platinum'),
    (963,'XTS','fiat','Codes specifically reserved for testing purposes',0,NULL,'ZZ06_Testing_Code'),
    (964,'XPD','fiat','Palladium',0,NULL,'ZZ09_Palladium'),
    (965,'XUA','fiat','ADB Unit of Account',0,NULL,'MEMBER COUNTRIES OF THE AFRICAN DEVELOPMENT BANK GROUP'),
    (967,'ZMW','fiat','Zambian Kwacha',2,894,'ZAMBIA'),
    (968,'SRD','fiat','Surinam Dollar',2,740,'SURINAME'),
    (969,'MGA','fiat','Malagasy Ariary',2,450,'MADAGASCAR'),
    (970,'COU','fiat','Unidad de Valor Real',2,170,'COLOMBIA'),
    (971,'AFN','fiat','Afghani',2,4,'AFGHANISTAN'),
    (972,'TJS','fiat','Somoni',2,762,'TAJIKISTAN'),
    (973,'AOA','fiat','Kwanza',2,24,'ANGOLA'),
    (974,'BYR','fiat','Belarusian Ruble',0,112,'BELARUS'),
    (975,'BGN','fiat','Bulgarian Lev',2,100,'BULGARIA'),
    (976,'CDF','fiat','Congolese Franc',2,180,'CONGO (THE DEMOCRATIC REPUBLIC OF THE)'),
    (977,'BAM','fiat','Convertible Mark',2,70,'BOSNIA AND HERZEGOVINA'),
    (978,'EUR','fiat','Euro',0,NULL,'SERBIA AND MONTENEGRO'),
    (979,'MXV','fiat','Mexican Unidad de Inversion (UDI)',2,484,'MEXICO'),
    (980,'UAH','fiat','Hryvnia',2,804,'UKRAINE'),
    (981,'GEL','fiat','Lari',2,268,'GEORGIA'),
    (982,'AOR','fiat','Kwanza Reajustado',0,24,'ANGOLA'),
    (983,'ECV','fiat','Unidad de Valor Constante (UVC)',0,218,'ECUADOR'),
    (984,'BOV','fiat','Mvdol',2,68,'BOLIVIA (PLURINATIONAL STATE OF)'),
    (985,'PLN','fiat','Zloty',2,616,'POLAND'),
    (986,'BRL','fiat','Brazilian Real',2,76,'BRAZIL'),
    (987,'BRR','fiat','Cruzeiro Real',0,76,'BRAZIL'),
    (988,'LUL','fiat','Luxembourg Financial Franc',0,442,'LUXEMBOURG'),
    (989,'LUC','fiat','Luxembourg Convertible Franc',0,442,'LUXEMBOURG'),
    (990,'CLF','fiat','Unidad de Fomento',4,152,'CHILE'),
    (991,'ZAL','fiat','Financial Rand',0,710,'SOUTH AFRICA'),
    (992,'BEL','fiat','Financial Franc',0,56,'BELGIUM'),
    (993,'BEC','fiat','Convertible Franc',0,56,'BELGIUM'),
    (994,'XSU','fiat','Sucre',0,NULL,'SISTEMA UNITARIO DE COMPENSACION REGIONAL DE PAGOS \"SUCRE\"'),
    (995,'ESB','fiat','\"A\" Account (convertible Peseta Account)',0,724,'SPAIN'),
    (996,'ESA','fiat','Spanish Peseta',0,724,'SPAIN'),
    (997,'USN','fiat','US Dollar (Next day)',2,NULL,'UNITED STATES OF AMERICA (THE)'),
    (998,'USS','fiat','US Dollar (Same day)',0,NULL,'UNITED STATES'),
    (999,'XXX','fiat','The codes assigned for transactions where no currency is involved',0,NULL,'ZZ07_No_Currency');
/*!40000 ALTER TABLE `currency` ENABLE KEYS */;
UNLOCK TABLES;