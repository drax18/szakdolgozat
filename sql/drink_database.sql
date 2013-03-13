-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Hoszt: localhost
-- Létrehozás ideje: 2013. márc. 13. 19:39
-- Szerver verzió: 5.5.20
-- PHP verzió: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Adatbázis: `drink_database`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet: `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text COLLATE utf8_hungarian_ci NOT NULL,
  `password` text COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=2 ;

--
-- A tábla adatainak kiíratása `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'bff05bb245fea509656ff22cd2a782bc');

-- --------------------------------------------------------

--
-- Tábla szerkezet: `admin_email`
--

CREATE TABLE IF NOT EXISTS `admin_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner` text COLLATE utf8_hungarian_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text COLLATE utf8_hungarian_ci NOT NULL,
  `date` text COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=16 ;

--
-- A tábla adatainak kiíratása `admin_email`
--

INSERT INTO `admin_email` (`id`, `owner`, `user_id`, `message`, `date`) VALUES
(15, 'drax18', 25, 'bálna cápa', '2013/03/09 - 23:40');

-- --------------------------------------------------------

--
-- Tábla szerkezet: `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `drink` text COLLATE utf8_hungarian_ci NOT NULL,
  `drink_id` int(11) NOT NULL,
  `owner` text COLLATE utf8_hungarian_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `piece` int(11) NOT NULL,
  `cart_name` text COLLATE utf8_hungarian_ci NOT NULL,
  `action` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=6 ;

--
-- A tábla adatainak kiíratása `cart`
--

INSERT INTO `cart` (`id`, `drink`, `drink_id`, `owner`, `user_id`, `price`, `piece`, `cart_name`, `action`) VALUES
(1, 'Red Absinthe Tunel', 1, 'skull', 30, 8375, 5, 'pirosabszint', 20);

-- --------------------------------------------------------

--
-- Tábla szerkezet: `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categories` text COLLATE utf8_hungarian_ci NOT NULL,
  `link_cat` text COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=30 ;

--
-- A tábla adatainak kiíratása `categories`
--

INSERT INTO `categories` (`id`, `categories`, `link_cat`) VALUES
(1, 'Abszint', 'abszint'),
(2, 'Bor alapúak', 'wine'),
(3, 'Keserű', 'bitter'),
(4, 'Édes-Keserűk', 'sweetbitter'),
(5, 'Tokaj-Hegyalja', 'tokaj'),
(6, 'Villány', 'villany'),
(7, 'Görögország', 'gorog'),
(8, 'Aregentina', 'argentin'),
(9, 'Franciaország', 'francia'),
(10, 'Ausztrália', 'ausztral'),
(11, 'Brandy és Metaxa', 'brandyandmetaxa'),
(12, 'Exklúzív konyak', 'exclusivekonyak'),
(13, 'Gin', 'gin'),
(14, 'Import párlatok', 'importspirits'),
(15, 'Magyar pálinka', 'hungarianbrandy'),
(16, 'Import pezsgő', 'importbubbly'),
(17, 'Magyar pezsgő', 'hungarianbubbly'),
(18, 'Hazai rum', 'hungarianrum'),
(19, 'Import rum', 'importrum'),
(20, 'Tequila gold', 'tequilagold'),
(21, 'Tequila silver', 'tequilasilver'),
(22, 'Vermouth', 'vermouth'),
(23, 'Flavoured', 'flavoured'),
(24, 'Pure', 'pure'),
(25, 'American whiskeys', 'americanwhiskeys'),
(26, 'Canadian whiskies', 'canadianwhiskies'),
(27, 'Irish whiskeys', 'irishwhiskeys'),
(28, 'Malt whiskies', 'maltwhiskies'),
(29, 'Scotch whiskies', 'scotchwhiskies');

-- --------------------------------------------------------

--
-- Tábla szerkezet: `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `drink_id` int(11) NOT NULL,
  `link_name` text COLLATE utf8_hungarian_ci NOT NULL,
  `comment` text COLLATE utf8_hungarian_ci NOT NULL,
  `owner` text COLLATE utf8_hungarian_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` text COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=64 ;

--
-- A tábla adatainak kiíratása `comments`
--

INSERT INTO `comments` (`id`, `drink_id`, `link_name`, `comment`, `owner`, `user_id`, `date`) VALUES
(45, 19, 'incidunt', 'adsasf', 'drax18', 25, '2013-03-08 22:49:43'),
(51, 1, 'pirosabszint', 'asdasdasd', 'drax18', 25, '2013-03-09 19:47:51'),
(53, 18, 'seddoeiusmod', 'Király :D', 'drax18', 25, '2013-03-09 20:28:31'),
(54, 16, 'zwackunicum', ':D', 'janika', 29, '2013-03-10 20:55:24'),
(55, 19, 'incidunt', 'az durva Xd', 'drax18', 25, '2013-03-10 21:41:16'),
(56, 1, 'pirosabszint', 'qwewqrwqwr', 'drax18', 25, '2013-03-12 19:58:17'),
(57, 1, 'pirosabszint', 'sfsdfsdf', 'drax18', 25, '2013-03-12 19:58:22'),
(58, 1, 'pirosabszint', 'werwerwerwerwerwer', 'drax18', 25, '2013-03-12 19:58:48'),
(59, 1, 'pirosabszint', 'sdfsd', 'drax18', 25, '2013-03-12 19:59:16'),
(60, 1, 'pirosabszint', 'haha', 'drax18', 25, '2013-03-12 20:01:12'),
(61, 8, 'bencekeseru', 'aaaaa', 'drax18', 25, '2013-03-12 20:02:42'),
(62, 8, 'bencekeseru', 'sdasda', 'drax18', 25, '2013-03-12 20:02:48'),
(63, 1, 'pirosabszint', 'aaa', 'drax18', 25, '2013-03-12 20:03:00');

-- --------------------------------------------------------

--
-- Tábla szerkezet: `drinks`
--

CREATE TABLE IF NOT EXISTS `drinks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_hungarian_ci NOT NULL,
  `categories_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `link_name` text COLLATE utf8_hungarian_ci NOT NULL,
  `score` double NOT NULL,
  `votes` int(11) NOT NULL,
  `piece` int(11) NOT NULL,
  `drink_information` text COLLATE utf8_hungarian_ci NOT NULL,
  `drink_title` text COLLATE utf8_hungarian_ci NOT NULL,
  `alcohol` int(11) NOT NULL,
  `bottle` text COLLATE utf8_hungarian_ci NOT NULL,
  `action` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=20 ;

--
-- A tábla adatainak kiíratása `drinks`
--

INSERT INTO `drinks` (`id`, `name`, `categories_id`, `price`, `link_name`, `score`, `votes`, `piece`, `drink_information`, `drink_title`, `alcohol`, `bottle`, `action`) VALUES
(1, 'Red Absinthe Tunel', 1, 8375, 'pirosabszint', 9, 2, 282, 'Fogyasztása ugyanolyan ivórituálé szerint zajlik, mint a zöld abszinté: A ma elterjedt ivószertetartás a cseh módszer: Egy kanálra teszünk egy vagy kettő darab kockacukrot, a pohár fölé tartjuk, és leöntjük abszinttal. Miután a cukor felszívta a folyadékot, meggyújtjuk, és várunk, amíg egy picit karamellizálódik. Tipp: magas százalékú (70%+) abszintoknál, ne várd meg amíg teljesen leég a cukor, mert hajlamos ráégni a kanálra. Ezután leöntik a cukrot vízzel, és elkeverik. Nagyon kevesen tudják, hogy az eredeti, francia rituálé nem tartalmazott semmiféle piroeffekteket, sőt szerintem a cseh szertartás nagy csodálkozást vagy neheztelést váltott volna ki egy 19. századi abszintházban. Az eredeti rituálé keretében egy pohár abszintra tettek egy lyukacsos, úgynevezett abszintkanalat, majd arra egy vagy két darab kockacukrot. Erre engedtek nagyon lassan jeges vizet. A legtöbb abszintházban volt egy nagy, gazdagon diszített központi tartály sok kis csappal. Általában 1 : 5-höz higítottak.\r\n', 'A maga 80%-os alkoholfokával igazi kisördög.', 80, '0,7', 20),
(2, 'Black Absinthe Tunel', 1, 8375, 'feketeabszint', 5, 1, 76, 'Itt néhány szó az abszintok fajtáiról: ABSINTHE SUISSE A szárított hozzávalókat kb. 85%-os alkoholban hagyták állni néhány óráig, majd adtak hozzá kevés vizet, és ledesztillálták. A lepárolt folyadékot még egy speciális színezőberendezéssel további gyógynövények hozzáadásával színezték smaragdzöldre. Utána víz hozzáadásával hígították 68-72%-ra. Végül hordókba töltötték és pár hónapig tárolták, így érte el legjobb minőségét és ihatóságát. ABSINTHE FINE Mint a Suisse változat, azzal a különbséggel, hogy a párlat egy részét tiszta alkohollal helyettesítették, és így hígították 68-72%-ra. ABSINTHE DEMI-FINE Mint a Fine, csak 50-60%-ra hígítva ABSINTHE ORDINAIRE Mint a Fine, csak 45-50%-ra higitva ABSINTHE DES ESSENCES Különböző módon nyert növényolajakat kevertek el tiszta szesszel, majd hígították vízzel a kívánt mértékre. Színét általában mesterséges (és gyakran mérgező) anyagok hatására kapta. Ma már nem állítanak elő Absinthe Suisse-t, a Fine változat van legközelebb az igazihoz, de sajnos ezt sem hagyják állni elég ideig. A zöld, fekete, piros, kék(!) szint manapság főleg ételfestékkel nyerik. Van még egy különös abszintfajta, amely főleg Svájcban terjedt el La Bleue néven. Ennél az abszintnál elhagyták a színezés lépését, ezért az üvegben található folyadék teljesen tiszta, átlátszó, s íze is különbözik valamelyest a hagyományos fajtákéhoz képest. A franciák La Blanche néven ismerték.', 'Látott már fekete abszintot? 80%-os.', 80, '0,7', 0),
(3, 'Parnasse Absinthe likőr', 1, 6875, 'parnasse', 0, 0, 479, 'Italy- The Parnassiens were a group of 19th century French poets. Their drink of choice was absinth, and this recipe seeks to recreate the spirit. An intensely anise and fennel-flavored liquor prepared in the traditional method with contact of herbs and clear distillate.', 'Az abszint finomított változata, 50%-os abszint likőr', 50, '0,7', 0),
(4, 'Tunel Absinthe', 1, 8375, 'tunelabszint', 0, 0, 198, 'Most ez a kiváló ital reneszánszkorát éli, mióta a thujon adagot csökkentették benne és ismét engedélyezték az italt ( 1998 ). Így celebrálják az absinthe-t: Végy egy teáskanál cukrot mártsd Absinthe-ba és gyújtsd meg ! Miután a cukor az égés során karamellizálódik és a láng teljesen kialszik a cukrot egy pohárban jeges vízzel és Absithe-tal elkeverjük. Ezáltal képződik a karakterisztikus italkeverék.', 'Az absinthe egy ürömkivonattal előállított szeszes ital, amelyet az ürömfűben található neutroxin thujon miatt 1923-ban kábítószernek minősítettek és betiltottak.', 60, '0,7', 0),
(5, 'Cseh Abszint', 1, 20938, 'csehabszint', 0, 0, 50, 'A cseh absinth (cseh vagy bohém típusú abszint, ánizsmentes abszint, vagy egyszerűen absinth, mely eredetileg az ital német helyesírása) egy, az 1990-es években Csehországban megjelent általában keserű szeszes ital (bitter), melyet a komoly különbségek ellenére abszintként árusítanak. A tipikus cseh absinth csak két dologban hasonlít az eredeti italhoz: tartalmazza a fehér üröm kivonatát és magas az alkoholtartalma. Ánizsból, édesköményből, és az abszint más hagyományos összetevőiből keveset, vagy semennyit sem tartalmaz. Az 1990-es években a cseh absinthgyártók vezették be a „cseh módszert”, mely a kockacukor meggyújtásával jár és gyakran általában Magyarországon is – tévesen az abszint hagyományos előkészítésének hiszik.', 'Mini szamovár, tele abszinttal, díszcsomagolásban.', 70, '2', 0),
(6, 'Absinthe Pére Kermanns', 1, 8000, 'pereabszint', 9, 1, 200, 'Absinthe A francia-porosz háború után (1871) kialakult az abszintivás szertartása, és egyes párizsi klubokban bevett szokás lett a l heur verte - zöld óra. A tiszta abszintet, mivel nagyon keserű volt, kockacukorral édesítették, amihez egy különleges, lukacsos ezüstkanalat is használtak. Szokás volt vízzel is hígítani, amitől a zöld szín opálsárgává vált. Az abszint a francia polgári kultúra része lett, festmények és írók örökítették meg. Éduard Manet: Abszintivó (1859), Edgar Degas: Abszint (1876), Vincent van Gogh 1887-ben készített pasztell csendéletén is látszik. Csupán a leghíresebb hódolóinak a nevéből is egy hosszú lista állhatna össze: Charles Baudelire, Paul Verlaine, Guillamme Apolinaire is fogyasztották. Erre utal Aldous L. Huxley 1954-ben íródott esszéje az érzékelés kapuiról, Ernest Dowson angol költő pedig azt terjesztette, hogy az abszint növeli a férfierőt. Az abszint legjellegzetesebb hatása a hallucinációk jelentkezése. Úgy gondolták, hogy a hallucinációk magasabbrendűek a racionalitásnál és igyekeztek minél többször ebbe az állapotba kerülni.', 'Vincent van Gogh 1887-ben készített pasztell csendéletén is látszik. Abszint, 60%', 60, '0,7', 0),
(7, 'Campari Bitter', 2, 5125, 'camparibitter', 0, 0, 0, 'A múlt század dereka alig múlt el, mikor Gaspare Campari egy Milánóhoz közeli faluból beköltözött a városba, pontosan a dómmal szemközti árkádsorra. Campariék akkor már jó ideje gyártották italaikat. A kis milánói bolt környéke azokban az évek pezsgő munkák helyszíne lett; II. Viktor Emánuel király személyesen helyezte el alapkövét a fedett üzletsornak, mely a dóm terét az Operaházzal, a Scalával köti össze. A Galleria a polgárosodó századvég jellegzetes építménye, mely a korzózást szolgálja a templom és a kultúra szentélye között, s ahol eközben kávézók, elegáns boltok kínálják magukat. Ide szögezte ki a cégalapító Campari a család nevét az egyik bolthajtásra. A fellobogózott Campari kávézóba tért be épp az osztrák-magyar kiegyezés évében a Galleriát felavató uralkodó. Megkóstolta a cég kesernyés italát, s hirtelen örömében királyi rangra emelte - no nem a családot, hanem az italt. Amely persze szakmai titokként kezelt recepten alapult, de azért annyit mindig elmondanak róla, hogy 84 féle mediterrán fűszernövény és gyökér kivonatát tartalmazza. Épp egy emberöltő múltán, 1903-ban, amikor a Campari-család bővíteni készült italgyártó üzemét, kiszemelt egy városhoz közeli villát, Lucini gróf egykori házát, a Casa Altát, a dombra épült „magas házat” (mert ezt jelenti a kifejezés), hogy oda települjön a már szűkössé vált városi üzemből. Körülbelül 70 kiló arany áráért megvették a másfél százados klasszicista villát minden melléképületével, berendezésével, használati eszközeivel, s ott éltek, gazdagodtak, s persze szépítették a kor ízlése szerint családi rezidenciájukat. A Campari fivérek szorgalmas munkával nemzeti itallá fejlesztették a piros nedűt. Bár az ital történetében nem szerepelnek ismeretlen szerzetesek és pincemesterek, mégis a közös emlékezet része lett a Campari, ugyanis az olasz reklám egyik legmarkánsabb szereplője a cég neve. A Camparihoz kapcsolódó történelem a múzeummá alakított Casa Alta falain tekinthető meg. És ebben nemcsak a korabeli utcafotósok művei láthatók (persze azok is) a reklámtáblával ékesített villamosról, hanem az utcai, lóversenytéri fényreklámok, a kávéházi hamutartók, gyufatartók is. Ott vannak a plakátok, festmények, amelyeket a kesernyés ital ihletett, egy műsorfüzet, amely a Scala háború utáni Toscanini-koncertjéről szól, melynek támogatója a Campari. És végül maga a villa, meg a benne lévő kávézó és étterem berendezése, amely - hogy hazai példát vegyünk - a századfordulós Gerbeaud-ra vagy a New York kávéházra emlékeztet. Nincs még se zenegép, se tévé, a polgár ráérősen lapozgat lepedőnyi újságjában, és apró kortyokban issza a kávét és mellé egy kis keserűt.', 'Tűzpiros ital, két évszázados történelemmel. Összetéveszthetetlen, könnyű, kesernyés íz.', 25, '0,7', 0),
(8, 'Bencés keserűlikőr', 3, 5313, 'bencekeseru', 0, 0, 300, 'A jótékony hatású Bencés Keserűlikőr Reisch Elek 1730-as évekből származó receptje alapján készült. A jellegzetes aromájú ital varázsa az összetevők kivételes összhangjában rejlik, melyet 42 gyógynövény keveréke és 12 illóolaj kompozíciója biztosít. A Bencés likőrök ugyanazzal a technológiával készülnek, mint az Agárdi pálinkák, és a likőrök esetében ugyancsak elsődlegesen fontos a tiszta gyümölcs- és gyógynövénytartalom. A Bencés likőrök termelése ízek és összetevők szerint különböző: míg a gyógynövény és keserű likőröket szárított alapanyagokból – ezért évjárattól és idénytől függetlenül – készítik, a meggylikőrt kizárólag a mindössze 3 hétig érő, a meggyszezon végén (júliusban) megvásárolt friss gyümölcsből állítják elő.', '42 gyógynövényből és 12 illóolajból összeállított, kivételesen jó minőségű ital.\r\n', 38, '0,5', 0),
(9, 'Szt. György Keserű', 3, 5313, 'sztgykeseru', 0, 0, 200, '\r\nAz ital Szt. György keresztény lovagról kapta a nevét, aki a legenda szerint egy egész várost mentett meg a pusztulástól, amikor a bajt és betegséget hozó sárkányt kardjával legyőzte. Jótékony összetevőinek köszönhetően a Szt.György Keserű névadójához méltó módon hatékonyan és gyorsan győzi le gyomorpanaszait. Az ital erdei gyógynövények kivonatából készül, majd két hónapos tölgyfahordós érlelés után nyeri el különleges és jótékony hatású gyógynövényes aromáját. A kiváló minőségű, prémium italt elegáns üveg őrzi.', 'Névadójához méltóan harcol az Ön egészségéért\r\n', 37, '0,5', 0),
(10, 'Radeberger bitter', 3, 4625, 'rederberger', 0, 0, 20, '\r\nA likőrök optimális fogyasztási hőmérséklete 12°C fok. Az italt kisméretű likőröspohárban, egyes fajtákat pedig konyakos pohárban, szobahőmérsékleten szokás szervírozni. Újabban kísérleteznek hűtött fogyasztásukkal is: a likőröket nagyobb pohárban jéggel szolgálják fel, illetve shakerben jéggel összerázva, majd pohárba szűrve kínálják a vendégeknek. Ezzel a módszerrel az italok illata és ízanyaga még jobban kiteljesedik. A likőrök terén, mint azt a fentiekben már láthattuk igen széles a termékpaletta. Létezik gyümölcs, fűszer, virág és még számtalan alapanyagú. Ezen italok természetüknél, ízviláguknál fogva mind kiváló coctail-alapanyagok, így felhasználási lehetőségük csaknem végtelen. Gazdag szín és aromaviláguk miatt, elengedhetetlen tartozékai egy-egy bárpultnak. Ezen túlmenően kiváló aperitivek (étvégygerjesztő hatásúak), illetve digestivek (étkezés utáni, emésztést segítő, serkentő italok), remek kísérői a desszerteknek, fagylaltoknak.', 'Fűszeres likőrkülönlegesség.', 12, '0,5', 0),
(11, 'Angostura Bitter', 3, 3738, 'angostura', 0, 0, 200, 'Az Angostura Venezuelából, Trinidad szigetéről származó erős ital, nevét születési helyéről, Angostura városáról kapta, ahol feltalálója Dr. Sieger tevékenykedett. A titkos recept alapján készített likőrt ma is egyedül itt gyártják a világon. Az ital első megalkotója Dr. J.G.B. Siegert, a venezuelai Simon Bolivar hadseregének egyik generálisa volt, aki 1824-ben állította elő először az Angosturat, étvágygerjesztőként és hangulatjavítóként katonái számára. A keserű titkos receptjéről ma is mindösszesen annyit tudunk, hogy rumon alapulva olyan gyógy- és fűszernövényekkel egészül ki, mint a tárnicsgyökér, az angelikagyökér, az encián, a galgant, a kardamom, a kínaifakéreg, vagy a szegfűszeg. Az összetevők pontos számát csakúgy, mint az előállítás módját titok övezi. Az Angostura tiszta, áttetsző, erős, karakteres ital, alkoholtartalma magas, cca 40%. Ízét a különleges gyógynövények, illatát a fűszerek, a narancshéj, a szegfűszeg dominálja. Az Angosturat önállóan nagyon ritkán fogyasztják, elsősorban száraz, kevert italok, cocktailok kiegészítőjeként kedvelt. Legismertebb koktélja az Angostura Fizz, melyben a bittert citromlével, cukorsziruppal, tojásfehérjével és szódavízzel keverve, jéghidegen szolgálják fel.', 'Rum alapú gyógynövény-keserű Venezuelából; elsősorban száraz, kevert italok, cocktailok kiegészítőjeként kedvelt.\r\n', 24, '0,2', 0),
(12, 'Unicum Next', 4, 3744, 'unicumnext', 0, 0, 200, 'A jól ismert Unicum gyógynövényeiből Zwackék egy új kompozíciót hoztak létre, amelyben a keserű ízekért felelős összetevők háttérbe szorulnak és helyettük különféle citrus-jellegű gyümölcsök dominálnak. Az ital kellemes íze legjobban jégbe hűtve érvényesül. Ezt az italt - a Zwack-házzal együtt - azoknak kínáljuk, akik mindig is szerettek volna részesei lenni a rituáléknak, szerettek volna az Unicum-imádók nagy táborába tartozni, csak az eredeti nem ízlett nekik.\r\n', 'Gyógynövények és citrus-félék friss aromájával.\r\n', 35, '0,5', 0),
(13, 'Becherovka', 4, 4375, 'becherovka', 10, 1, 100, 'Receptje máig titkos, akárcsak az Unicumé: csak két szakértő ismeri a titkot. Annyit lehet tudni, hogy 21 fajta gyógyfűből készül. 1807-ben elkészült az eredeti gyomorkeserű receptje és Josef Becher cseppek formájában elkezdte patikájában árulni. Megszületett a Karlovi Vary Becherovka. Josef Becher egyre sikeresebb vállalkozását 1841-ig vezette és lakat alatt tartotta a szesz receptjét. Csak fiának és örökösének, Johann Bechernek adta át az ital titkát, akiről később bebizonyosodott, hogy a recept kitűnő gyámja és emellett jó képességű vállalkozó is. A régi elavult gépeket korszerű berendezésekre cserélte, új gyárat épített és 1867-re a Becherovka gyártása elérte a teljes kapacitást. Az ital mai neve is tőle származik és ő bízta meg sógorát, a karlsbadi Karel Laubot, hogy megtervezze a jellegzetes lapos üveget a különleges címkével. Kiváló: gyomorbántalmak, emésztési rendellenességek, diétás problémák kezelésére. Legfinomabb mélyhűtve, almalével vagy tonikkal keverve és egy szelet citrommal.\r\n', 'Kiváló: gyomorbántalmak, emésztési rendellenességek, diétás problémák kezelésére.\r\n', 38, '0,7', 0),
(14, 'St. Hubertus', 4, 3088, 'sthubertus', 0, 0, 999, 'A magyar likőripar és az ipari likőrtermelés a XIX. század második felében indult virágzásnak. Az első likőrgyártó vállalkozások a kisebb királyi haszonbérletekből fejlődtek ki. Különféle ízesítőkkel és mézzel, később cukorral, úgynevezett édes pálinkákat is árusítottak. Sokat tanultak a bortermelőktől és a kereskedőktől, így nem is meglepő, hogy a likőripar eszközei, szerszámai, gépei, berendezései ma is legnagyobbrészt azonosak a borászatéval. E vállalkozások legtöbbször a tulajdonosok közvetlen személyes irányításával dolgoztak. A korai likőrgyárak egyike volt az 1839-ben Braun Lajos által alapított budapesti Braun Likőrgyár, melynek igazgatását fiai vették át Braun Testvérek néven. A későbbi leszármazott Braun Géza ötletéből született meg a ma is közkedvelt, híres, könnyű, narancsos ízű, gyógynövénypárlatból készült likőr, a St. Hubertus, a vadászok védőszentjéről elnevezett klasszikus magyar likőr, mely immáron több mint száz éve készül titkos receptúra alapján. Likőrnek tulajdonképpen azokat a szeszes italokat nevezzük, amelyek alkoholon (20-42 tf%), vízen, valamint természetes vagy mesterséges zamatanyagokon kívül még jelentős mennyiségű cukrot (18-60%) is tartalmaznak. Kétségkívül közös tulajdonságuk, hogy különböző adalékanyagokkal, különböző módon és mértékben édesítettek és ízesítettek.\r\n', 'Könnyű, narancsos ízű, gyógynövénypárlatból készült likőr\r\n', 36, '0,5', 0),
(15, 'Jägermeister', 4, 6238, 'jaigermeister', 9, 1, 205, 'A legtöbb keserűlikőrnek (így a Jägermeisternek is) a gyártó által ajánlott vagy egyenesen szállított saját pohara van. Ezek egyéni, egyedi formák, általában kicsi űrtartalommal, talpas vagy talp nélküli kivitelben. Sokan ugyanis úgy vélik, hogy lehűtve a likőr jobban kibontja aromáit. Ám az on the rocks likőr felszolgáláshoz olyan méretű pohár szükségeltetik, melyben elférnek a jégkockák vagy a darált, tört jég. A látvány és a fogyaszthatóság, élvezhetőség szempontjából ideális tekintik, ha az ital a jéggel együtt kb. a pohár felét foglalja el. Ilyen meggondolásból használhatjuk e célra a nagyobb konyakos poharakat, persze csakis az olyan típusúakat, melyek szája nem túl keskeny. Szóba jöhetnek még a tumbler poharak is, ezek közül azonban csak a legkisebbek, hiszen egy nagy űrtartalmú pohárban a csekélyke likőr még nagyobb adag jéggel feldúsítva is szánalmas látvány nyújthat. Arról nem is beszélve, hogy bizonyos sűrűbb krémlikőrök esetén az öblös óriáspohár belső falára túl nagy mennyiségű ital kenődik fel (és vész el a fogyasztó számára), a látvány ráadásul még esztétikailag is erősen támadható.\r\n', 'Valóban jó a jäger jéggel? :-)\r\n', 35, '0,7', 0),
(16, 'Zwack Unicum', 4, 6438, 'zwackunicum', 7.5, 2, 200, 'Bár az Unicum receptje titkos, annyi bizonyos, hogy több mint 40 féle gondosan válogatott gyógy- és fűszernövény keverékéből készül. Sajátságos, keserédes ízét, különleges harmóniáját a 6 hónapos tölgyfahordós érlelési periódus teljesíti ki. Az Unicum jótékony hatásának köszönhetően akár méltó bevezetője, akár lezárása lehet az étkezéseknek. Ihatjuk hűtve, nagyszerű összetett ízét pedig leginkább szobahőmérsékleten élvezhetjük.\r\n', 'Aperitifként és digstivként egyaránt fogyasztható.\r\n', 40, '0,5', 20),
(17, 'LOREM IPSUM', 4, 2000, 'loremipsum', 0, 0, 205, 'Érdekes pia elég\r\ndurva és\r\nkeményÉrdekes\r\npia elég durva és\r\nkeményÉrdekes\r\npia elég durva és\r\nkeményÉrdekes\r\npia elég durva és\r\nkeményÉrdekes\r\npia elég durva és\r\nkeményÉrdekes\r\npia elég durva és\r\nkeményÉrdekes\r\npia elég durva és\r\nkeményÉrdekes\r\npia elég durva és\r\nkemény', 'Érdekes pia elég durva és kemény', 50, '0,5', 0),
(18, 'SED DO EIUSMOD', 4, 4000, 'seddoeiusmod', 8, 1, 318, 'Jani tuti kivan\r\négve amúgyJani\r\ntuti kivan égve\r\namúgyJani tuti\r\nkivan égve\r\namúgyJani tuti\r\nkivan égve\r\namúgyJani tuti\r\nkivan égve\r\namúgyJani tuti\r\nkivan égve\r\namúgy', 'Jani tuti kivan égve amúgy', 40, '0,9', 40),
(19, 'INCIDIDUNT', 4, 2000, 'incidunt', 6, 1, 6998, 'Király Dávid\r\nnagyon\r\nmelegKirály\r\nDávid nagyon\r\nmelegKirály\r\nDávid nagyon\r\nmelegKirály\r\nDávid nagyon\r\nmelegKirály\r\nDávid nagyon\r\nmelegKirály\r\nDávid nagyon\r\nmelegKirály\r\nDávid nagyon', 'Király Dávid nagyon meleg', 70, '0,4', 10);

-- --------------------------------------------------------

--
-- Tábla szerkezet: `favorites`
--

CREATE TABLE IF NOT EXISTS `favorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link_name` text COLLATE utf8_hungarian_ci NOT NULL,
  `drink_id` int(11) NOT NULL,
  `name` text COLLATE utf8_hungarian_ci NOT NULL,
  `owner` text COLLATE utf8_hungarian_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=73 ;

--
-- A tábla adatainak kiíratása `favorites`
--

INSERT INTO `favorites` (`id`, `link_name`, `drink_id`, `name`, `owner`, `user_id`) VALUES
(70, 'feketeabszint', 2, 'Black Absinthe Tunel', 'drax18', 25),
(71, 'incidunt', 19, 'INCIDIDUNT', 'drax18', 25),
(72, 'pirosabszint', 1, 'Red Absinthe Tunel', 'drax18', 25);

-- --------------------------------------------------------

--
-- Tábla szerkezet: `myorders`
--

CREATE TABLE IF NOT EXISTS `myorders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link_name` text COLLATE utf8_hungarian_ci NOT NULL,
  `owner` text COLLATE utf8_hungarian_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `piece` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `drink_name` text COLLATE utf8_hungarian_ci NOT NULL,
  `drink_id` int(11) NOT NULL,
  `ordernumber` int(11) NOT NULL,
  `orderdate` text COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=138 ;

--
-- A tábla adatainak kiíratása `myorders`
--

INSERT INTO `myorders` (`id`, `link_name`, `owner`, `user_id`, `piece`, `price`, `drink_name`, `drink_id`, `ordernumber`, `orderdate`) VALUES
(125, 'pirosabszint', 'drax18', 25, 2, 8375, 'Red Absinthe Tunel', 1, 1, '2013/03/08 - 22:58'),
(126, 'feketeabszint', 'drax18', 25, 3, 8375, 'Black Absinthe Tunel', 2, 1, '2013/03/08 - 22:58'),
(134, 'incidunt', 'janika', 29, 1, 2000, 'INCIDIDUNT', 19, 1, '2013/03/10 - 01:37'),
(135, 'seddoeiusmod', 'janika', 29, 1, 4000, 'SED DO EIUSMOD', 18, 1, '2013/03/10 - 01:37'),
(136, 'loremipsum', 'janika', 29, 1, 2000, 'LOREM IPSUM', 17, 1, '2013/03/10 - 01:37'),
(137, 'sthubertus', 'janika', 29, 1, 3088, 'St. Hubertus', 14, 1, '2013/03/10 - 01:37');

-- --------------------------------------------------------

--
-- Tábla szerkezet: `prizes`
--

CREATE TABLE IF NOT EXISTS `prizes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `drink_name` text COLLATE utf8_hungarian_ci NOT NULL,
  `drink_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `piece` int(11) NOT NULL,
  `orderdate` text COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=49 ;

--
-- A tábla adatainak kiíratása `prizes`
--

INSERT INTO `prizes` (`id`, `drink_name`, `drink_id`, `price`, `piece`, `orderdate`) VALUES
(33, 'INCIDIDUNT', 19, 1800, 2, '2013/03/08'),
(34, 'SED DO EIUSMOD', 18, 2400, 2, '2013/03/08'),
(35, 'LOREM IPSUM', 17, 2000, 2, '2013/03/08'),
(36, 'Red Absinthe Tunel', 1, 8375, 2, '2013/03/08'),
(37, 'Black Absinthe Tunel', 2, 8375, 3, '2013/03/08'),
(38, 'Red Absinthe Tunel', 1, 6700, 4, '2013/03/09'),
(39, 'Black Absinthe Tunel', 2, 8375, 4, '2013/03/09'),
(40, 'Parnasse Absinthe likőr', 3, 6875, 2, '2013/03/09'),
(41, 'Tunel Absinthe', 4, 8375, 2, '2013/03/09'),
(42, 'INCIDIDUNT', 19, 1800, 2, '2013/03/09'),
(43, 'SED DO EIUSMOD', 18, 2400, 1, '2013/03/09'),
(44, 'LOREM IPSUM', 17, 2000, 1, '2013/03/09'),
(45, 'INCIDIDUNT', 19, 1800, 1, '2013/03/10'),
(46, 'SED DO EIUSMOD', 18, 2400, 1, '2013/03/10'),
(47, 'LOREM IPSUM', 17, 2000, 1, '2013/03/10'),
(48, 'St. Hubertus', 14, 3088, 1, '2013/03/10');

-- --------------------------------------------------------

--
-- Tábla szerkezet: `scores`
--

CREATE TABLE IF NOT EXISTS `scores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `drink_id` int(11) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `owner` text COLLATE utf8_hungarian_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=41 ;

--
-- A tábla adatainak kiíratása `scores`
--

INSERT INTO `scores` (`id`, `drink_id`, `categories_id`, `owner`, `user_id`, `score`) VALUES
(30, 19, 4, 'drax18', 25, 6),
(31, 1, 1, 'drax18', 25, 10),
(32, 13, 4, 'drax18', 25, 10),
(33, 16, 4, 'drax18', 25, 9),
(34, 20, 5, 'drax18', 25, 6),
(35, 2, 1, 'drax18', 0, 5),
(36, 18, 4, 'drax18', 0, 8),
(37, 6, 1, 'drax18', 0, 9),
(38, 1, 1, 'janika', 0, 8),
(39, 16, 4, 'janika', 0, 6),
(40, 15, 4, 'drax18', 0, 9);

-- --------------------------------------------------------

--
-- Tábla szerkezet: `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` text COLLATE utf8_hungarian_ci NOT NULL,
  `password` text COLLATE utf8_hungarian_ci NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `surname` text COLLATE utf8_hungarian_ci NOT NULL,
  `firstname` text COLLATE utf8_hungarian_ci NOT NULL,
  `phonenumber` text COLLATE utf8_hungarian_ci NOT NULL,
  `email` text COLLATE utf8_hungarian_ci NOT NULL,
  `streetaddress` text COLLATE utf8_hungarian_ci NOT NULL,
  `city` text COLLATE utf8_hungarian_ci NOT NULL,
  `zipcode` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=30 ;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`username`, `password`, `id`, `surname`, `firstname`, `phonenumber`, `email`, `streetaddress`, `city`, `zipcode`) VALUES
('drax18', 'bff05bb245fea509656ff22cd2a782bc', 25, 'Báder', 'László', '06702517738', 'kisunuszi@gmail.com', 'Szemere Bertalan tér 6 3/10', 'Kazinbarcika', 3700),
('jasko', 'bff05bb245fea509656ff22cd2a782bc', 28, 'jasko', 'jasko', '424', 'asd@asd.hu', 'asdas', 'asdasd', 32425),
('janika', 'bff05bb245fea509656ff22cd2a782bc', 29, 'Barra', 'János', '2424', 'asd@asd.hu', 'asdasd', 'asdasd', 242525);

-- --------------------------------------------------------

--
-- Tábla szerkezet: `user_forgotpw`
--

CREATE TABLE IF NOT EXISTS `user_forgotpw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner` text COLLATE utf8_hungarian_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` text COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
