-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 29, 2023 at 10:07 AM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `state_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_04_20_102627_create_posts_table', 2),
(5, '2022_05_16_063305_crate_mst_contactus_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mstPageName`
--

CREATE TABLE `mstPageName` (
  `id` int(10) NOT NULL,
  `strPageUrl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mstPageName`
--

INSERT INTO `mstPageName` (`id`, `strPageUrl`) VALUES
(1, 'missionandvision'),
(2, 'introduction');

-- --------------------------------------------------------

--
-- Table structure for table `mst_aboutus`
--

CREATE TABLE `mst_aboutus` (
  `id` int(10) NOT NULL,
  `strTitle` varchar(255) NOT NULL,
  `strPageName` varchar(255) DEFAULT NULL,
  `strLanguageCode` varchar(255) NOT NULL,
  `strDescription` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `enmStatus` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0-Inactive,1-Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_aboutus`
--

INSERT INTO `mst_aboutus` (`id`, `strTitle`, `strPageName`, `strLanguageCode`, `strDescription`, `created_at`, `updated_at`, `deleted_at`, `enmStatus`) VALUES
(1, 'રાજ્ય મધ્યસ્થ ગ્રંથાલયનો પરિચય', 'અમારા વિશે', 'gu', '&lt;p&gt;૧ મે, ૧૯૬૦માં બૃહદ મુંબઈ રાજ્યથી અલગ થયા બાદ ગુજરાત રાજ્યની સ્થાપના થઇ, ત્યારપછી અન્ય રાજ્યોની જેમ ગુજરાતમાં પણ મધ્યસ્થ ગ્રંથાલયની જરૂરીયાત અંગે વિચારવાનું શરુ થયું હતું. શરૂઆતમાં ગૂજરાત વિધાપીઠના ગ્રંથાલયને ડીમ્ડ રાજ્ય મધ્યસ્થ ગ્રંથાલયનો દરજ્જો આપી પ્રેસ એન્ડ રજીસ્ટ્રેશન ઓફ બુક્સ એક્ટની જોગવાઈઓ મુજબ પુસ્તકો મેળવી કોપીરાઈટ સેકશનના નિભાવ માટે ગ્રાંટ આપવાનું ચાલું કર્યું હતું. રાજ્યનું પાટનગર જ્યારે અમદાવાદથી ગાંધીનગર ખસેડાયું એ પછી સને ૧૯૭૨માં હાલ જ્યાં રાજ્ય મધ્યસ્થ ગ્રંથાલય બેસે છે એ ભવનની ડિઝાઈન રાજ્ય ગ્રંથાલય ભવન માટે કરવામાં આવી હતી અને એ ભવન રાજ્ય મધ્યસ્થ ગ્રંથાલય માટે કરવાનું હતું, પરંતુ વિધાનસભાનું નવું મકાન તૈયાર થાય તે પહેલાં તાત્કાલિક વિધાનસભાના ઉપયોગ માટે આ મકાન તૈયાર કરવામાં આવ્યું હતું. એ રીતે વચગાળાના ઉપયોગ માટે ગુજરાત વિધાનસભાએ તેને પોતાના હસ્તક લીધું હતું.&lt;/p&gt;\r\n\r\n&lt;p&gt;સન ૧૯૮૨માં ગુજરાત વિધાનસભા માટે નવા ભવનનું નિર્માણ થતાં આ ભવન નિયામકશ્રી, ગ્રંથાલય કચેરીને રાજ્ય મધ્યસ્થ ગ્રંથાલય શરુ કરવા માટે પરત સોપાયું હતું. અને એ રીતે સન ૧૯૮૨માં રાજ્ય મધ્યસ્થ ગ્રંથાલયની સ્થાપના થઇ. અહી લગાતાર દસ વર્ષ સુધી ગુજરાત વિધાનસભા કાર્યરત રહી હોવાથી રાજ્ય ગ્રંથાલય ભવન આજે પણ સામાન્ય બોલચાલમાં જૂની વિધાનસભા તરીકે પણ ઓળખાય છે. અત્યારે રાજ્ય મધ્યસ્થ ગ્રંથાલય, ગાંધીનગર રમતગમત, યુવા અને સાંસ્કૃતિક પ્રવૃતિઓ વિભાગ હેઠળ આવતા નિયામક, ગ્રંથાલય કચેરી અંતર્ગત કાર્ય કરી રહ્યું છે. રાજ્ય મધ્યસ્થ ગ્રંથાલય, ગાંધીનગર એ રાજ્યની સાર્વજનિક ગ્રંથાલય વ્યવસ્થાના ક્રમમાં સર્વોચ્ચ ક્રમે (Apex Library in Hirarchy of Public Governmental Library) આવે છે. સન ૨૦૧૦ માં &amp;lsquo;નેશનલ મિશન ઓન લાયબ્રેરીઝ&amp;rsquo; ની સહાયથી રૂ. ૩ કરોડના ખર્ચે નેશનલ સ્કુલ ઓફ ડીઝાઈન, અમદાવાદ (NID) મારફત સને ૨૦૧૦માં આ ભવનની મરામત તથા નવીન સાજસજાવટ કરવામાં આવી હતી.&lt;/p&gt;\r\n\r\n&lt;p&gt;અદ્યતન ટેકનોલોજી સાથે કદમથી કદમ મિલાવીને ચાલવા માટે રાજ્ય મધ્યસ્થ ગ્રંથાલય, ગાંધીનગરની ગ્રંથાલય સેવાઓ અને કાર્યોનું સને ૨૦૦૬ના વર્ષમાં કોમ્પ્યુટરીકરણ કરવામાં આવેલ છે. ઇન્ફ્લીબનેટ (Information Library Network) , ગાંધીનગર દ્વારા તૈયાર કરાયેલ &amp;ldquo;SOUL&amp;rdquo; (SOFTWER FOR UNIVERSITY LIBREIES) સોફ્ટવેરનો કોમ્પ્યુટરીકરણ કરવા માટે ઉપયોગ કરવામાં આવ્યો છે. ગ્રંથાલયના વાચક સભ્યોને પુસ્તકોની સત્વરે અને સરળતાથી આપ-લે થઇ શકે તથા પુસ્તકની ઓળખ માટે તેને RFID ટેકનોલોજીથી સજ્જ કરવામાં આવ્યા છે.&lt;/p&gt;\r\n\r\n&lt;p&gt;તાજેતરમાં જ નેશનલ મિશન ઓન લાયબ્રેરીઝ પ્રૉજેક્ટ અન્વયે મંજુર થયેલ રુ. ૧,૦૪,૦૩,૬૧૦/- ના પ્રૉજેક્ટ હેઠળ ઘણી નવી કાર્યરચનાઓ કરવામાં આવી છે. જેમાં દિવ્યાંગજનો તથા વયસ્ક નાગરિકો ગ્રંથાલયના ત્રીજા માળ સુધીના વિભાગો સુધી સરળતાથી આવનજાવન કરી શકે તે માટે જૂની લીફ્ટની જગ્યાએ નવી લીફ્ટ કાર્યાન્વિત કરવામાં આવી છે. વાચકોને પીવાનું શુધ્ધ પાણી મળી રહે તે માટે ગ્રંથાલયના દરેક માળ પર નવા આર.ઓ. તથા વૉટરકુલર લગાવવામાં આવ્યા છે. ગ્રંથાલયના જ્ઞાનકેંદ્ર (Knowledge Centre)માં જૂનું સર્વર તથા કોમ્પ્યુટર્સ બદલીને નવું સર્વર, નવા કોમ્પ્યુટર્સ તેમજ નવી વાતાનુકૂલિત સુવિધા ઊભી કરવામાં આવી છે. જેનાથી ગ્રંથાલયના વાચકો ઈન્ટરનેટનો ઉપયોગ કરીને તેમને જોઈતી માહિતી ઓનલાઈન મેળવી શકે છે. ગ્રંથાલયના વાચકોને નકલ કરાવવાની સેવા ગ્રંથાલયમાં જ મળી રહે તે માટે બે મલ્ટીફંકશનલ ઝેરોક્ષ મશીન વસાવવામાં આવ્યા છે. એક ૫૪&amp;rdquo;ના સ્ક્રીન સાથેનું નવું ટી.વી. ખરીદીને અલગથી ટી,વી, ક્ક્ષ ઊભો કર્યો છે. જેનાથી ટી.વી.ની અલગઅલગ ચેનલ પર પ્રસારિત થતાં જ્ઞાનસંવર્ધક તથા માહિતીજન્ય કાર્યક્રમો ગ્રંથાલયના વાચકો નિહાળી શકે છે.&lt;/p&gt;\r\n\r\n&lt;p&gt;વળી, દિવ્યાંગજનો, બાળકો તથા વયસ્ક નાગરિકોને રસ પડે તેવા કાર્યક્રમો પણ ડીવીડી પ્લેયર પર સીડી લગાવીને અવારનવાર કરવામાં આવે છે. ગ્રંથાલયના વાચકોને ગ્રંથાલયના વિવિધ વિભાગો, સ્ત્રોતો, સેવાઓ, નિયમો, સમય વિગેરેની જાણકારી ઓનલાઈન મળી રહે તેવા ઉદ્દેશથી ગ્રંથાલયની સ્વતંત્ર વેબસાઈટ પણ બનાવવામાં આવી છે.આ વેબસાઈટના માધ્યમથી વાચક હવે સભ્યપદ માટે ઓનલાઈન અરજી કરી શકે છે તેમજ સભ્ય ફી ની ચૂકવણી પણ ઓનલાઈન થઈ શકે છે. તદ્પરાંત સમાજનો દિવ્યાંગવર્ગ માહિતી અને જ્ઞાન મેળવવાથી વંચિત રહી ન જાય તે માટે આધુનિક ટેકનોલોજીના માધ્યમથી તેમને ઉપયોગી સોફ્ટવેર તથા ઉપકરણો સાથેનો એક અલાયદો વિભાગ તેમના માટે બનાવવામાં આવ્યો છે. જ્યાં બેસીને તેઓ તેમની જ્ઞાનતૃષા છીપાવી શકે છે.&lt;/p&gt;\r\n\r\n&lt;p&gt;હાલ સચિવાલય તથા રાજ્યના અન્ય ભાગોમાં ઉચ્ચ અધિકારી તરીકે ફરજ બજાવી રહ્યાં છે તે પૈકીનાં ઘણા અધિકારીઓ આજે પણ સ્વીકારે છે કે વિદ્યાર્થીકાળમાં તેઓએ આ રાજ્ય મધ્યસ્થ ગ્રંથાલયમાં બેસીને સ્પર્ધાત્મક પરીક્ષાઓની તૈયારી કરી હતી. જેના ફળસ્વરૂપે આજે તેઓ ઉજ્જવળ કારકિર્દી બનાવી શક્યા છે. આ સીલસીલો આજે પણ ચાલું છે. ગાંધીનગરના અનેક વિદ્યાર્થી/વિદ્યાર્થીનીઓ આજની તારીખે પણ અહી બેસીને સ્પર્ધાત્મક પરીક્ષાઓની તૈયારી કરી પોતાના સુંદર ભવિષ્યનું નિર્માણ કરી રહ્યા છે.&lt;/p&gt;\r\n\r\n&lt;p&gt;રાજ્ય મધ્યસ્થ ગ્રંથાલય ગાંધીનગર શહેરની તદ્દન મધ્યમાં સેકટર-૧૭ સ્થિત આવેલું છે. તેની બિલકુલ સામેથી સ્વર્ણિમ પાર્ક પસાર થાય છે, જે હરિયાળીથી શોભતો નગરનો સુંદરત્તમ પાર્ક છે. ગ્રંથાલયની આજુબાજુનું પરિસર પણ વનરાજીથી છવાયેલું છે, જે ગ્રંથાલયની શોભામાં અભિવૃધ્ધિ કરી તેને દર્શનીય બનાવે છે. અહીં ગ્રંથાલયમાં સેવા આપતા અધિકારી/કર્મચારીઓ ગ્રંથાલય શાસ્ત્રના વિશેષજ્ઞો છે અને વાચકોને બહેતરીન ગ્રંથાલય સેવા આપવા માટે પ્રતિબધ્ધ છે.&lt;/p&gt;', '2022-04-22 06:45:47', '2022-10-19 13:21:47', NULL, '1'),
(2, 'Introduction to State Central Library', 'About Us', 'en', '&lt;p&gt;On May 1, 1960, after the separation of the Greater Mumbai State, the State of Gujarat was established, after which, like other states, Gujarat also started thinking about the need for a central library. Initially, the Gujarat Vidhapith Library was given the status of Deemed State Central Library and started giving grants for acquiring books and maintaining the Copyright Section as per the provisions of the Press and Registration of Books Act. When the state capital was shifted from Ahmedabad to Gandhinagar in the year 1972, the building where the State Central Library now sits was designed for the State Central Library and that building was to be used for the State Central Library, but before the new Assembly building was ready, it was immediately used for the Assembly. The building was prepared. Thus, the Gujarat Assembly took it over for interim use.&lt;/p&gt;\r\n\r\n&lt;p&gt;In the year 1982, after the construction of a new building for the Gujarat Legislative Assembly, this building was handed over to the Director, Library Office to start the State Central Library. And thus the State Central Library was established in the year 1982. Rajya Granthalaya Bhavan is also colloquially known as the Old Legislative Assembly as the Gujarat Legislative Assembly functioned here for ten consecutive years. Presently the State Central Library, Gandhinagar is functioning under the Director, Library Office under the Department of Sports, Youth and Cultural Activities. Rajya Madhyastha Granthalaya, Gandhinagar is the Apex Library in Hierarchy of Public Governmental Library of the State. In the year 2010, with the help of &amp;#39;National Mission on Libraries&amp;#39; Rs. The building was renovated and refurbished in 2010 by the National School of Design, Ahmedabad (NID) at a cost of 3 crores.&lt;/p&gt;\r\n\r\n&lt;p&gt;In the year 1982, after the construction of a new building for the Gujarat Legislative Assembly, this building was handed over to the Director, Library Office to start the State Central Library. And thus the State Central Library was established in the year 1982. Rajya Granthalaya Bhavan is also colloquially known as the Old Legislative Assembly as the Gujarat Legislative Assembly functioned here for ten consecutive years. Presently the State Central Library, Gandhinagar is functioning under the Director, Library Office under the Department of Sports, Youth and Cultural Activities. Rajya Madhyastha Granthalaya, Gandhinagar is the Apex Library in Hierarchy of Public Governmental Library of the State. In the year 2010, with the help of &amp;#39;National Mission on Libraries&amp;#39; Rs. The building was renovated and refurbished in 2010 by the National School of Design, Ahmedabad (NID) at a cost of 3 crores.&lt;/p&gt;\r\n\r\n&lt;p&gt;Recently sanctioned under National Mission on Libraries project Rs. 1,04,03,610/- under the project many new structures have been made. A new lift has been installed in place of the old lift so that the disabled and senior citizens can easily move up to the third floor of the library. New RO on every floor of the library to provide clean drinking water to the readers. And water cooler has been installed. In the knowledge center of the library, the old server and computers have been replaced with a new server, new computers and a new air-conditioned facility. So that the readers of the library can get the information they need online using the internet. Two multifunctional xerox machines have been installed in the library to provide photocopying services to the patrons of the library. A new TV with a 54&amp;rdquo; screen. Separately, TV, station has been set up after purchase. By which the readers of the library can watch educational and informative programs broadcasted on different TV channels.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', '2022-04-22 07:30:09', '2023-01-20 12:23:50', NULL, '1'),
(3, 'Test', '', 'en', '&lt;p&gt;stfgerg&lt;/p&gt;', '2022-04-22 07:32:08', '2022-05-13 10:02:40', '2022-05-13 10:02:40', '1'),
(4, 'test1', '', 'en', '&lt;p&gt;this is for the&amp;nbsp; test scsdf&lt;/p&gt;', '2022-05-17 09:51:59', '2022-05-17 09:52:50', '2022-05-17 09:52:50', '1'),
(5, 'efgehbc', '', 'gu', '&lt;p&gt;qweqwd v d ghhrtyer&lt;/p&gt;', '2022-05-17 09:53:31', '2022-06-16 07:02:45', '2022-06-16 07:02:45', '1'),
(6, 'erter', '', 'gu', '&lt;p&gt;ertewter gertger&lt;/p&gt;', '2022-06-16 07:02:36', '2022-08-26 11:26:11', '2022-08-26 11:26:11', '1'),
(7, 'hph', '', 'en', '&lt;p&gt;dsa&lt;/p&gt;', '2022-08-17 08:57:31', '2022-08-17 08:58:04', '2022-08-17 08:58:04', '1'),
(8, 'qwe', '', 'en', '&lt;p&gt;qwe&lt;/p&gt;', '2022-08-26 12:48:21', '2022-08-26 12:49:26', '2022-08-26 12:49:26', '1'),
(9, 'asdas', '', 'en', '&lt;p&gt;awsd&lt;/p&gt;', '2022-08-26 12:53:39', '2022-08-26 12:53:51', '2022-08-26 12:53:51', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_aboutus1`
--

CREATE TABLE `mst_aboutus1` (
  `id` int(10) NOT NULL,
  `strTitle` varchar(255) NOT NULL,
  `strLanguageCode` varchar(255) NOT NULL,
  `strDescription` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mst_achievement`
--

CREATE TABLE `mst_achievement` (
  `id` int(10) NOT NULL,
  `strTitle` varchar(255) NOT NULL,
  `strLanguageCode` varchar(255) NOT NULL,
  `strDescription` text NOT NULL,
  `strPageName` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `enmStatus` enum('0','1') DEFAULT '1' COMMENT '1-active,0-InActive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_achievement`
--

INSERT INTO `mst_achievement` (`id`, `strTitle`, `strLanguageCode`, `strDescription`, `strPageName`, `created_at`, `updated_at`, `deleted_at`, `enmStatus`) VALUES
(1, 'નેશનલ મિશન ઓન લાયબ્રેરીઝ', 'gu', '&lt;p&gt;તાજેતરમાં જ નેશનલ મિશન ઓન લાયબ્રેરીઝ પ્રૉજેક્ટ અન્વયે મંજુર થયેલ રુ. ૧,૦૪,૦૩,૬૧૦/- ના પ્રૉજેક્ટ હેઠળ ઘણી નવી કાર્યરચનાઓ કરવામાં આવી છે. જેમાં દિવ્યાંગજનો તથા વયસ્ક નાગરિકો ગ્રંથાલયના ત્રીજા માળ સુધીના વિભાગો સુધી સરળતાથી આવનજાવન કરી શકે તે માટે જૂની લીફ્ટની જગ્યાએ નવી લીફ્ટ કાર્યાન્વિત કરવામાં આવી છે. વાચકોને પીવાનું શુધ્ધ પાણી મળી રહે તે માટે ગ્રંથાલયના દરેક માળ પર નવા આર.ઓ. તથા વૉટરકુલર લગાવવામાં આવ્યા છે. ગ્રંથાલયના જ્ઞાનકેંદ્ર (Knowledge Centre)માં જૂનું સર્વર તથા કોમ્પ્યુટર્સ બદલીને નવું સર્વર, નવા કોમ્પ્યુટર્સ તેમજ નવી વાતાનુકૂલિત સુવિધા ઊભી કરવામાં આવી છે. જેનાથી ગ્રંથાલયના વાચકો ઈન્ટરનેટનો ઉપયોગ કરીને તેમને જોઈતી માહિતી ઓનલાઈન મેળવી શકે છે. ગ્રંથાલયના વાચકોને નકલ કરાવવાની સેવા ગ્રંથાલયમાં જ મળી રહે તે માટે બે મલ્ટીફંકશનલ ઝેરોક્ષ મશીન વસાવવામાં આવ્યા છે. એક ૫૪ ઇંચ ના સ્ક્રીન સાથેનું નવું ટી.વી. ખરીદીને અલગથી ટી.વી. કક્ષ ઊભો કર્યો છે. જેનાથી ટી.વી. ની અલગઅલગ ચેનલ પર પ્રસારિત થતાં જ્ઞાન સંવર્ધક તથા માહિતીજન્ય કાર્યક્રમો ગ્રંથાલયના વાચકો નિહાળી શકે છે. વળી દિવ્યાંગજનો, બાળકો તથા વય નાગરિકોને રસ પડે તેવા કાર્યક્રમો પણ ડીવીડી પ્લેયર પર સીડી લગાવીને અવારનવાર કરવામાં આવે છે. ગ્રંથાલયના વાચકોને ગ્રંથાલયના વિવિધ વિભાગો, સ્ત્રોતો, સેવાઓ, નિયમો, સમય વગેરેની જાણકારી ઓનલાઈન મળી રહે તેવા ઉદ્દેશથી ગ્રંથાલયની સ્વતંત્ર વેબસાઈટ પણ બનાવવામાં આવી છે. તદઉ૫રાંત સમાજનો દિવ્યાંગ વર્ગ માહિતી અને જ્ઞાન મેળવવાથી વંચિત રહી ન જાય તે માટે આધુનિક ટેકનોલોજીના માધ્યમથી તેમને ઉપયોગી સોફ્ટવેર તથા ઉપકરણો સાથેનો એક અલાયદો વિભાગ તેમના માટે બનાવવામાં આવ્યો છે. જ્યાં બેસીને તેઓ તેમની જ્ઞાનતૃષા છીપાવી શકે છે.\r\nવિદ્યાર્થીઓના વાંચન અર્થે વિદ્યાર્થી વાંચન ખંડ સમગ્ર વર્ષ દરમ્યાન ખુલ્લો રાખવામાં આવે છે. (પાંચ રજા સિવાય).\r\nવિદ્યાર્થીઓ ટેકનોલોજી સાથે આગળ વધે તે માટે ગ્રંથાલયમાં ઇ-લાયબ્રેરી થકી ઇ-બુક્સ રીડીંગની સુવિધા આપવામાં આવે છે.\r\nગ્રંથાલય RFID ટેકનોલોજી ઉપલબ્ધ છે.\r\nગ્રંથાલયમાં આવતા વાચકો ઉપરાંત ઘરે બેઠા પુસ્તક પ્રજાને ઉપલબ્ધ બને તે હેતુથી ગ્રંથાલય દ્વારા ગાંધીનગરના શહેરી વિસ્તાર તથા ગાંધીનગર જિલ્લાના ગ્રામીણ વિસ્તારોમાં ફરતાં પુસ્તકાલયની સેવાઓ આપવામાં આવે છે.&lt;/p&gt;', 'સિધ્ધિઓ', '2022-06-22 00:00:00', '2023-05-10 10:37:31', NULL, '1'),
(2, 'National Mission on Libraries', 'en', '&lt;p&gt;Mission on Libraries project Rs. 1,04,03,610/- under the project many new structures have been made. A new lift has been installed in place of the old lift so that the disabled and senior citizens can easily move up to the third floor sections of the library..ll&lt;/p&gt;', 'Achievements', NULL, '2022-10-14 11:21:35', NULL, '1'),
(3, 'Perspiciatis in ali', 'en', '&lt;p&gt;dasd&lt;/p&gt;', NULL, '2022-07-20 14:02:26', '2022-07-20 14:02:32', '2022-07-20 14:02:32', '1'),
(4, 'Recusandae Similiqu', 'gu', '&lt;p&gt;sdfs&lt;/p&gt;', NULL, '2022-07-20 14:13:02', '2022-07-20 14:13:14', '2022-07-20 14:13:14', '1'),
(5, 'jojiohu', 'en', '&lt;p&gt;lkpjipji&lt;/p&gt;', NULL, '2022-07-20 14:14:15', '2022-07-20 14:14:21', '2022-07-20 14:14:21', '1'),
(6, '\'kl[[ko[ko[pklo', 'en', '&lt;p&gt;&amp;#39;/&lt;/p&gt;\r\n\r\n&lt;p&gt;;;[\\;[p\\p[\\p[&lt;/p&gt;', NULL, '2022-07-20 14:15:25', '2022-07-20 14:15:43', '2022-07-20 14:15:43', '1'),
(7, 'rere', 'en', '&lt;p&gt;ewewqew&lt;/p&gt;', NULL, '2022-08-08 09:43:04', '2022-08-17 09:36:15', '2022-08-17 09:36:15', '1'),
(8, 'Sed quia', 'en', '&lt;p&gt;trerte trte&lt;/p&gt;', NULL, '2022-08-08 11:35:04', '2022-08-17 09:36:11', '2022-08-17 09:36:11', '1'),
(9, 'Blanditiis sint id', 'en', '&lt;p&gt;qwddddwq ef&lt;/p&gt;', NULL, '2022-08-09 11:41:31', '2022-08-17 09:35:58', '2022-08-17 09:35:58', '1'),
(10, 'Itaque rerum amet c', 'en', '&lt;p&gt;dsa xc xcx&lt;/p&gt;', NULL, '2022-08-17 09:06:19', '2022-08-17 09:36:04', '2022-08-17 09:36:04', '1'),
(11, 'Aut quis eaque conse', 'en', '&lt;p&gt;hp&lt;/p&gt;', NULL, '2022-08-17 09:06:46', '2022-08-17 09:35:50', '2022-08-17 09:35:50', '1'),
(12, 'hp', 'en', '&lt;p&gt;qwwq&lt;/p&gt;', NULL, '2022-08-17 09:15:19', '2022-08-17 09:36:01', '2022-08-17 09:36:01', '1'),
(13, 'hp', 'en', '&lt;p&gt;qwwqwqmnbmn bmn&lt;/p&gt;', NULL, '2022-08-17 09:37:36', '2022-08-18 05:27:36', '2022-08-18 05:27:36', '1'),
(14, 'Nobis ut necessitati', 'en', '&lt;p&gt;rewerw&lt;/p&gt;', NULL, '2022-08-18 05:27:08', '2022-08-18 05:28:44', '2022-08-18 05:28:44', '1'),
(15, 'hp', 'en', '&lt;p&gt;qwewq&lt;/p&gt;', NULL, '2022-08-18 05:36:59', '2022-08-26 12:49:40', '2022-08-26 12:49:40', '1'),
(16, 'Sed quia', 'en', '&lt;p&gt;qwqwe&lt;/p&gt;', NULL, '2022-08-26 12:54:59', '2022-08-26 12:55:03', '2022-08-26 12:55:03', '1'),
(17, 'Sed quia', 'en', '&lt;p&gt;ser&lt;/p&gt;', NULL, '2022-08-26 13:28:29', '2022-08-26 13:28:32', '2022-08-26 13:28:32', '1'),
(18, 'er', 'gu', '&lt;p&gt;erw&lt;/p&gt;', NULL, '2022-08-26 13:31:52', '2022-08-26 13:31:54', '2022-08-26 13:31:54', '1'),
(19, 'hp', 'en', '&lt;p&gt;qwewq&lt;/p&gt;', NULL, '2022-08-31 05:56:34', '2022-10-14 11:21:44', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `mst_activities`
--

CREATE TABLE `mst_activities` (
  `id` int(10) NOT NULL,
  `strActivities` text NOT NULL,
  `strPageName` text,
  `strLanguageCode` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `enmStatus` enum('0','1') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_activities`
--

INSERT INTO `mst_activities` (`id`, `strActivities`, `strPageName`, `strLanguageCode`, `created_at`, `updated_at`, `deleted_at`, `enmStatus`) VALUES
(1, 'ગ્રંથાલયનો ઉપયોગ કરવા માંગતા દરેક વાચકને ગ્રંથાલયનું સભ્યપદ આપવામાં આવે છે..', 'પ્રવૃતિઓ', 'gu', '2022-05-04 00:00:00', '2022-10-13 13:56:01', NULL, '1'),
(2, 'વિશિષ્ટ વાચક વર્ગ જેવા કે વૃધ્ધો, બાળકો, મહિલાઓ, અંધજનો વગેરે માટે અલગથી વાંચન સુવિધાની વ્યવસ્થા કરવામાં આવેલ છે.', 'પ્રવૃતિઓ', 'gu', '2022-05-04 00:00:00', '2022-10-13 14:01:21', NULL, '1'),
(3, 'ફરતા પુસ્તકાલયની પ્રવૃતિ ધ્વારા ગાંધીનગરના શહેરી તથા ગ્રામીણ વિસ્તારમાં ગ્રંથાલય સેવાઓ પૂરી પડાઇ રહી છે.2321312', '0', 'gu', '2022-05-17 10:26:32', '2022-05-17 11:32:55', '2022-05-17 11:32:55', '0'),
(5, 'અંધજનો માટે અલગથી બ્રેઇલ કોર્નર શરૂ કરવામાં આવેલ છે.', 'પ્રવૃતિઓ', 'gu', '2022-06-16 07:48:46', '2022-10-13 13:53:38', NULL, '1'),
(6, 'આધુનિક ગ્રંથાલયની સેવાઓ હેઠળ પ્રજાજનોને જ્ઞાન કેન્દ્રના માધ્યમથી અનેકવિધ વિષયોને આવરી લઇને ઇન્ટરનેટ સેવાઓ પૂરી પાડવામાં આવે છે.', 'પ્રવૃતિઓ', 'gu', '2022-06-16 09:08:35', '2022-10-13 13:55:57', NULL, '1'),
(7, 'પ્રજાજન ગ્રંથાલય અભિમુખ બને તે માટે વિવિધ વિસ્તરણ પ્રવૃતિઓ કરવામાં આવે છે.', 'પ્રવૃતિઓ', 'gu', '2022-06-16 09:09:29', '2023-01-19 11:03:52', NULL, '1'),
(8, 'ફરતા પુસ્તકાલયની પ્રવૃતિ ધ્વારા ગાંધીનગરના શહેરી તથા ગ્રામીણ વિસ્તારમાં ગ્રંથાલય સેવાઓ પૂરી પડાઇ રહી છે.', 'પ્રવૃતિઓ', 'gu', '2022-06-16 09:09:47', '2022-10-13 14:01:11', NULL, '1'),
(10, 'Library membership is given to every reader who wants to use the library.', 'Activities', 'en', '2022-07-05 06:33:49', '2022-10-13 13:56:07', NULL, '1'),
(11, 'Separate reading facility has been arranged for special reading category like      Senior Citizen, Children, Women, Blind people etc.', 'Activities', 'en', '2022-07-05 06:34:20', '2022-10-13 13:56:20', NULL, '1'),
(12, 'A separate Braille Corner has been started for the blind.', 'Activities', 'en', '2022-07-05 06:34:34', '2022-10-13 13:49:01', NULL, '1'),
(13, 'Under the services of modern library, internet services are provided to the     public through knowledge centre covering various subjects.', 'Activities', 'en', '2022-07-05 06:34:49', '2022-10-13 13:56:25', NULL, '1'),
(14, 'Various extension activities are carried out to make the public library    oriented.', 'Activities', 'en', '2022-07-05 06:35:01', '2022-10-13 13:56:30', NULL, '1'),
(15, 'Library services are being provided in urban and rural areas of Gandhinagar    through mobile library activities.', 'Activities', 'en', '2022-07-05 06:35:20', '2022-10-13 13:56:11', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_administrativeoffice`
--

CREATE TABLE `mst_administrativeoffice` (
  `id` int(10) NOT NULL,
  `strLanguageCode` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `strAdministrative` text NOT NULL,
  `enmStatus` enum('0','1') DEFAULT '1',
  `strPageName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_administrativeoffice`
--

INSERT INTO `mst_administrativeoffice` (`id`, `strLanguageCode`, `created_at`, `updated_at`, `deleted_at`, `strAdministrative`, `enmStatus`, `strPageName`) VALUES
(1, 'gu', NULL, '2022-10-14 11:07:47', NULL, 'ગ્રંથાલયનું વહીવટી તથા નાણાંકીય બાબતોનું સંચાલન આ વિભાગ હેઠળ થાય છે.', '1', 'વહીવટી કાર્યાલય'),
(4, 'en', '2022-07-05 06:44:33', '2022-10-14 11:00:56', NULL, 'The administrative and financial matters of the library are managed under this department.', '1', 'Administrative Office'),
(8, 'en', '2022-08-31 06:35:26', '2022-10-14 11:01:03', NULL, 'sda', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `mst_announcement`
--

CREATE TABLE `mst_announcement` (
  `id` int(11) NOT NULL,
  `strLanguage` varchar(255) DEFAULT NULL,
  `strPageName` varchar(255) DEFAULT NULL,
  `str_content` text,
  `dtiEventDate` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `enmStatus` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0-Inactive,1-Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_announcement`
--

INSERT INTO `mst_announcement` (`id`, `strLanguage`, `strPageName`, `str_content`, `dtiEventDate`, `created_at`, `updated_at`, `deleted_at`, `enmStatus`) VALUES
(3, 'gu', 'જાહેરાત', '<p>સન ૧૯૮૨માં રાજ્ય વિધાનસભા માટે નવા ભવનનું નિર્માણ થતાં આ ભવન નિયામકશ્રી, ગ્રંથાલય કચેરીને રાજ્ય મધ્યસ્થ ગ્રંથાલય શરુ કરવા માટે પરત સોપ્યું હતું. અને એ રીતે સન ૧૯૮૨માં રાજ્ય મધ્યસ્થ ગ્રંથાલયની સ્થાપના થઇ. અહી લગાતાર દસ વર્ષ સુધી રાજ્યની વિધાનસભા કાર્યરત રહી હોવાથી રાજ્ય ગ્રંથાલય ભવન સામાન્ય બોલચાલમાં જૂની વિધાનસભા તરીકે પણ ઓળખાય છે. અત્યારે રાજ્ય મધ્યસ્થ ગ્રંથાલય, ગાંધીનગર રમતગમત, યુવા અને સાંસ્કૃતિક પ્રવૃતિઓ વિભાગ હેઠળ આવતા નિયામક, ગ્રંથાલય કચેરી અંતર્ગત કાર્ય કરી રહ્યું છે. રાજ્ય મધ્યસ્થ ગ્રંથાલય, ગાંધીનગર એ રાજ્યની સાર્વજનિક ગ્રંથાલય વ્યવસ્થાના ક્રમમાં સર્વોચ્ચ ક્રમે (Apex Library in Hierarchy of Public Governmental Library) આવે છે. સન ૨૦૧૦ માં &lsquo;નેશનલ મિશન ઓન લાયબ્રેરીઝ&rsquo; ની સહાયથી રૂ. ૩ કરોડના ખર્ચે નેશનલ સ્કુલ ઓફ ડીઝાઈન, અમદાવાદ (NID) મારફત સને ૨૦૧૦માં આ ભવનની મરામત તથા નવીન સાજસજાવટ કરવામાં આવી હતી.</p>', '2023-01-10', '2022-04-25 12:05:22', '2023-05-10 12:11:37', NULL, '0'),
(6, 'en', 'Announcement', '<p>sdade dsa wea we&nbsp;</p>', NULL, '2022-08-08 08:42:52', '2023-05-10 12:12:46', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_bookexchange`
--

CREATE TABLE `mst_bookexchange` (
  `id` int(10) NOT NULL,
  `strLanguageCode` varchar(255) NOT NULL,
  `strBookExchange` text NOT NULL,
  `strPageName` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `enmStatus` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0-Inactive,1-Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_bookexchange`
--

INSERT INTO `mst_bookexchange` (`id`, `strLanguageCode`, `strBookExchange`, `strPageName`, `created_at`, `updated_at`, `deleted_at`, `enmStatus`) VALUES
(1, 'gu', '<p>ગ્રંથાલયમાં ગુજરાતી ભાષાના ૪૯૫૯૫ પુસ્તકો, હિન્દી ભાષાના ૩૬૩૮૫ પુસ્તકો અને અંગ્રેજી ભાષાના ૪૬૪૭૨ પુસ્તકો થઇ કુલ ૧૩૨૪૫૨ પુસ્તકો ઉપલબ્ધ છે. આમાંથી કોઇપણ ગ્રંથ વાચકસભ્ય પોતાના વાચકકાર્ડ ઉપર ૧૪ દિવસ માટે ઘરે વાંચવા માટે ઇસ્યુ કરાવી શકે છે. આ સેવાનો હાલ ૪૬૯૧૨ જેટલા વાચકસભ્યો લાભ લઇ રહ્યા છે. ગ્રંથાલયના સમય પત્રક મુજબ પુસ્તક આપ લેની આ સુવિધા વાચક સભ્યો માટે ઉપલબ્ધ હોય છે. પુસ્તક ચૌદ દિવસની મુદત માટે ઈસ્યુ કરવામાં આવે છે. મુદત પૂરી થાય તે પહેલાં પુસ્તક રિન્યુ કરાવી શકાય છે. મુદત વીત્યા બાદ પરત કરવામાં આવતાં પુસ્તની દૈનિક ૦૦.૫૦ પૈસા લેખે લેઈટ ફી લેવામાં આવે છે.</p>', 'પુસ્તક આપ-લે', NULL, '2022-10-14 11:47:23', NULL, '1'),
(5, 'en', '<p>The library has 3 books in Gujarati language, 3 books in Hindi language and 3 books in English language and a total of 15 books are available. Readers can issue any of these books on their member card for 14 days to read at home. At present, 215 readers are availing this service. This facility is available to the readers as per the schedule of the library. The book is issued for a period of fourteen days. The book can be renewed before the expiration date. A late fee is charged at the rate of 0.50 Paisa.</p>', 'Books Issue-Return', '2022-06-16 11:37:44', '2022-10-14 11:47:03', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_common_pages`
--

CREATE TABLE `mst_common_pages` (
  `id` int(10) NOT NULL,
  `strLanguageCode` varchar(255) NOT NULL,
  `strCommonPage` text NOT NULL,
  `strPageName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_common_pages`
--

INSERT INTO `mst_common_pages` (`id`, `strLanguageCode`, `strCommonPage`, `strPageName`) VALUES
(1, 'gu', 'વિદ્યાર્થી અધ્યયન કક્ષ', 'વિદ્યાર્થી અધ્યયન કક્ષ'),
(2, 'en', 'Reading Hall for Boys', 'Reading Hall for Boys'),
(3, 'gu', 'જ્ઞાન કેન્દ્ર વિભાગ', 'જ્ઞાન કેન્દ્ર વિભાગ'),
(4, 'en', 'Knowledge Center Section', 'Knowledge Center Section'),
(5, 'en', 'Membership', 'Membership'),
(6, 'en', 'Children Section', 'Children Section'),
(7, 'gu', 'બાળ વિભાગ', 'બાળ વિભાગ'),
(8, 'en', 'Braille Section', 'Braille Section'),
(9, 'gu', 'દિવ્યાંગ વિભાગ', 'દિવ્યાંગ વિભાગ'),
(10, 'en', 'Gujarati Books Issue-Return', 'Gujarati Books Issue-Return'),
(11, 'gu', 'ગુજરાતી પુસ્તક આપ-લે વિભાગ', 'ગુજરાતી પુસ્તક આપ-લે વિભાગ'),
(12, 'gu', 'હિન્દી અને અંગ્રેજી પુસ્તક આપ-લે વિભાગ', 'હિન્દી અને અંગ્રેજી પુસ્તક આપ-લે વિભાગ'),
(13, 'en', 'Hindi & English Books Issue-Return', 'Hindi & English Books Issue-Return'),
(14, 'en', 'Magazine/Newspaper Section', 'Magazine/Newspaper Section'),
(15, 'gu', 'સામાયિક/સમાચારપત્ર વિભાગ', 'સામાયિક/સમાચારપત્ર વિભાગ'),
(16, 'gu', 'સંદર્ભ સાહિત્ય વિભાગ', 'સંદર્ભ સાહિત્ય વિભાગ'),
(17, 'en', 'Reference Section', 'Reference Section'),
(18, 'en', 'T.V. Room', 'T.V. Room'),
(19, 'gu', 'ટી.વી. કક્ષ', 'ટી.વી. કક્ષ'),
(20, 'gu', 'વિદ્યાર્થીનીઓનો અધ્યયન કક્ષ', 'વિદ્યાર્થીનીઓનો અધ્યયન કક્ષ'),
(21, 'en', 'Reading Hall for Girls', 'Reading Hall for Girls'),
(22, 'gu', 'વહીવટી કાર્યાલય', 'વહીવટી કાર્યાલય'),
(23, 'en', 'Administrative Office', 'Administrative Office'),
(24, 'en', 'Technical Section', 'Technical Section'),
(25, 'gu', 'તકનીકી વિભાગ', 'તકનીકી વિભાગ'),
(26, 'gu', 'ફરતું પુસ્તકાલય વિભાગ', 'ફરતું પુસ્તકાલય વિભાગ'),
(27, 'en', 'Mobile Library Section', 'Mobile Library Section'),
(28, 'gu', 'રીડીંગ કોર્નર વિભાગ', 'રીડીંગ કોર્નર વિભાગ'),
(29, 'en', 'Reading Corner Section', 'Reading Corner Section'),
(30, 'en', 'Magazine / Newspaper Library Service', 'Magazine / Newspaper Library Service'),
(31, 'gu', 'સામાયિક/સમાચારપત્ર વાંચનાલય સેવા', 'સામાયિક/સમાચારપત્ર વાંચનાલય સેવા'),
(32, 'en', 'Library and information service for the disabled', 'Library and information service for the disabled'),
(33, 'gu', 'દિવ્યાંગજનોને ગ્રંથાલય અને માહિતી સેવા', 'દિવ્યાંગજનોને ગ્રંથાલય અને માહિતી સેવા'),
(34, 'gu', 'સભ્ય બનો', 'સભ્ય બનો'),
(35, 'gu', 'ફરતા પુસ્તકાલયની સેવા', 'ફરતા પુસ્તકાલયની સેવા'),
(36, 'gu', 'નાગરિક અધિકારપત્ર', 'નાગરિક અધિકારપત્ર'),
(37, 'en', 'Civil Rights Charter', 'Civil Rights Charter'),
(38, 'gu', 'ફોટો ગેલેરી', 'ફોટો ગેલેરી'),
(39, 'en', 'Photo Gallery', 'Photo Gallery'),
(40, 'en', 'Video Gallery', 'Video Gallery'),
(41, 'gu', 'વિડિયો ગેલેરી', 'વિડિયો ગેલેરી'),
(42, 'en', 'Contact Information', 'Contact Information'),
(43, 'gu', 'સંપર્ક માહિતી', 'સંપર્ક માહિતી'),
(44, 'gu', 'વહીવટી માળખું', 'વહીવટી માળખું'),
(45, 'en', 'Administrative Structure', 'Administrative Structure'),
(46, 'gu', 'જ્ઞાન કેન્દ્ર', 'જ્ઞાન કેન્દ્ર'),
(47, 'en', 'Knowledge Center', 'Knowledge Center'),
(48, 'en', 'Mobile Library Service', 'Mobile Library Service'),
(49, 'gu', 'ફરતા પુસ્તકાલયની સેવા', 'ફરતા પુસ્તકાલયની સેવા');

-- --------------------------------------------------------

--
-- Table structure for table `mst_contactus`
--

CREATE TABLE `mst_contactus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `strLanguageCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strLibraryAddress` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `strLibrarainName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strLibrarianMainDesignation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `strLibrarianDesignation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `strLibrarianPhoto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mst_copyright`
--

CREATE TABLE `mst_copyright` (
  `id` int(10) NOT NULL,
  `strLanguageCode` varchar(255) NOT NULL,
  `strCopyright` text NOT NULL,
  `strPageName` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `enmStatus` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0-Inactive,1-Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_copyright`
--

INSERT INTO `mst_copyright` (`id`, `strLanguageCode`, `strCopyright`, `strPageName`, `created_at`, `updated_at`, `deleted_at`, `enmStatus`) VALUES
(1, 'gu', '<p>મિશન મુંબઇ સરકારે નિમેલી પુસ્તકાલય વિકાસ સમિતિની ભલામણ અનુસાર ઈ.સ. ૧૯૪૬માં એક મધ્યસ્થ પુસ્તકાલય મુંબઈ માટે અને ત્રણ પ્રાદેશિક પુસ્તકાલયો અમદાવાદ, પૂના અને ધારવાડમાં શરુ કરવાનું નક્કી થયું હતું. ગુજરાત પ્રાદેશિક પુસ્તકાલયનું કામ ગૂજરાત વિદ્યાપીઠ ગ્રંથાલયને સોંપ્યુ હતું. એ મુજબ કૉપીરાઈટ એક્ટ અંતર્ગત જે પુસ્તકો મુંબઈ મધ્યસ્થ ગ્રંથાલયમાં મેળવવામાં આવ્યા હતાં તેમાંથી ગુજરાતી ભાષાના બધાં પુસ્તકો ગૂજરાત વિદ્યાપીઠને સોંપ્યા હતાં.ઈ.સ. ૧૯૮૨માં રાજ્ય મધ્યસ્થ ગ્રંથાલય, ગાંધીનગરની સ્થાપના થતાં આ વિભાગમાં &#39;પ્રેસ એન્ડ રજીસ્ટ્રેશન ઓફ બુક્સ એક્ટ&#39; હેઠળ ગુજરાત રાજયમાં પ્રકાશિત થતાં દરેક પુસ્તકની બે નકલો રાજ્ય મધ્યસ્થ ગ્રંથાલય, ગાંધીનગર ; એક નકલ ગૂજરાત વિદ્યાપીઠને ; એક નકલ મધ્યવર્તી પુસ્તકાલય, વડોદરા ; એક નકલ માહિતી નિયામકશ્રીની કચેરી, ગાંધીનગર તથા એક નકલ નેશનલ લાયબ્રેરી, કોલકાતાને પ્રાપ્ત થાય છે. જેને યોગ્ય રીતે સાચવીને આ વિભાગમાં જાળવવામાં આવે છે. હાલમાં આ કોપીરાઇટ વિભાગમાં કુલ 72080 જેટલા પુસ્તકો સંગ્રહિત કરાયેલ છે.</p>', 'કોપીરાઇટ વિભાગ', NULL, '2022-10-14 12:31:05', NULL, '1'),
(4, 'en', '<p>mission As per the recommendation of the Library Development Committee appointed by the Mumbai Government. It was decided to start a central library for Mumbai in 1946 and three regional libraries in Ahmedabad, Poona and Dharwad. The work of Gujarat Regional Library was handed over to Gujarat Vidyapeeth Library. Accordingly, all the books in Gujarati language were handed over to Gujarat Vidyapeeth from the books which were obtained in the Mumbai Central Library under the Copyright Act. Since the establishment of the State Central Library in 1982, each book published in the State of Gujarat under the &lsquo;Press and Registration Books Act&rsquo; in this section The State Central Library receives two copies; One copy to Gujarat Vidyapith; One copy to Central Library, Vadodara ; One Copy to Directorate of Information, Gandhinagar and One copy to National library Kolkata is received. Which is properly preserved in this section. A total of 72080 books are currently stored in this copyright section.</p>', 'Copyright Section', '2022-07-05 06:45:25', '2022-10-14 12:30:38', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_event`
--

CREATE TABLE `mst_event` (
  `id` int(11) NOT NULL,
  `strName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `strPageName` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `strLanguageCode` varchar(255) DEFAULT NULL,
  `dtiEventdatetime` datetime NOT NULL,
  `txtVenue` text CHARACTER SET utf8 NOT NULL,
  `strImg` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `enmStatus` enum('1','0') DEFAULT '1',
  `enmDeleted` enum('0','1') DEFAULT '0' COMMENT '1 for delete and 0 for active',
  `intPosition` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_event`
--

INSERT INTO `mst_event` (`id`, `strName`, `strPageName`, `strLanguageCode`, `dtiEventdatetime`, `txtVenue`, `strImg`, `enmStatus`, `enmDeleted`, `intPosition`) VALUES
(1, 'આંતરરાષ્ટ્રીય મહિલા દિવસ', 'ફોટો ગેલેરી', 'gu', '2023-01-24 07:23:19', 'તા. ૮ માર્ચ', '1655459546_W01.jpg', '1', '0', 6),
(2, 'વિશ્વ માતૃભાષા દિવસ', 'ફોટો ગેલેરી', NULL, '2023-01-24 05:56:33', 'તા. ૨૧/૦૨/૨૦૨૨', '1655459774_01.jpg', '1', '0', 1),
(3, 'ઝવેરચંદ મેઘાણીજીના પુણ્યતિથિ', 'ફોટો ગેલેરી', 'gu', '2023-01-24 07:23:31', 'રાષ્ટ્રીય શાયર ઝવેરચંદ મેઘાણીજીના પુણ્યતિથિના પ્રસંગ પર પુસ્તક પ્રદર્શન', '1655969086_BOOK01.jpg', '1', '0', 4),
(4, 'ડૉ.બાબાસાહેબ આંબેડકર', 'ફોટો ગેલેરી', 'gu', '2023-05-10 12:22:03', '14 એપ્રિલ', '1683721323_001.jpeg', '1', '0', 3),
(5, 'વિશ્વપુસ્તક દિવસ', 'ફોટો ગેલેરી', 'gu', '2023-05-10 12:21:33', 'ગ્રંથપૂજનનો પ્રસંગ', '1683721293_WhatsApp Image 2023-04-23 at 1.04.42 PM (1).jpeg', '1', '0', 2),
(6, 'નવીનતા માટે યુનિવર્સિટીના વિદ્યાર્થીઓ', 'ફોટો ગેલેરી', NULL, '2023-01-24 05:56:29', 'પુસ્તકાલય', '1655969952_STD01.jpeg', '1', '0', 5),
(24, 'Calvin Paul', 'ફોટો ગેલેરી', 'gu', '2023-06-08 11:35:23', '૮ માર્ચ ૨૦૨૨', '1686224123_3.jpg', '1', '0', 7);

-- --------------------------------------------------------

--
-- Table structure for table `mst_event_gallery`
--

CREATE TABLE `mst_event_gallery` (
  `id` int(11) NOT NULL,
  `intEventid` int(11) NOT NULL,
  `StrEventImg` varchar(255) CHARACTER SET utf8 NOT NULL,
  `enmDeleted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_event_gallery`
--

INSERT INTO `mst_event_gallery` (`id`, `intEventid`, `StrEventImg`, `enmDeleted`) VALUES
(1, 1, '16553743551.jpg', NULL),
(2, 1, '16553743911.jpg', NULL),
(3, 2, '16553760881.jpg', 1),
(4, 2, '16553796361.jpg', 1),
(5, 2, '16553797031.jpg', 0),
(6, 1, '16553809391.jpg', 0),
(7, 1, '16553809462.jpg', 1),
(8, 1, '1655384228AlokKumarPandey.jpg', 1),
(9, 7, '16554444841.jpg', 0),
(10, 7, '16554444892.jpg', 0),
(11, 1, '1655444676ambaji.png', 0),
(12, 1, '1655451131AlokKumarPandey.jpg', 0),
(13, 8, '1655459636W10.jpg', 1),
(14, 8, '1655459636W09.jpg', 1),
(15, 8, '1655459636W08.jpg', 1),
(16, 8, '1655459636W07.jpg', 1),
(17, 8, '1655459637W06.jpg', 1),
(18, 8, '1655459637W05.jpg', 1),
(19, 8, '1655459637W04.jpg', 1),
(20, 8, '1655459637W03.jpg', 1),
(21, 8, '1655459637W02.jpg', 1),
(22, 9, '165545978706.jpg', 1),
(23, 9, '165545978805.jpg', 1),
(24, 9, '165545978804.jpg', 1),
(25, 9, '165545978803.jpg', 1),
(26, 9, '165545978802.jpg', 1),
(27, 9, '165546020306.jpg', 1),
(28, 9, '165546020305.jpg', 1),
(29, 9, '165546020404.jpg', 1),
(30, 9, '165546020403.jpg', 1),
(31, 9, '165546020402.jpg', 1),
(32, 10, '1655969095BOOK04.jpg', 1),
(33, 10, '1655969095BOOK03.jpg', 1),
(34, 10, '1655969095BOOK02.jpg', 1),
(35, 11, '1655969233BAMB06.jpeg', 1),
(36, 11, '1655969233BAMB05.jpeg', 1),
(37, 11, '1655969233BAMB04.jpeg', 1),
(38, 11, '1655969234BAMB03.jpeg', 1),
(39, 11, '1655969234BAMB02.jpeg', 1),
(40, 12, '1655969358GRANTH05.jpg', 1),
(41, 12, '1655969359GRANTH04.jpg', 1),
(42, 12, '1655969360GRANTH03.jpg', 1),
(43, 12, '1655969361GRANTH02.jpg', 1),
(44, 13, '1655969960STD04.jpeg', 1),
(45, 13, '1655969960STD03.jpeg', 1),
(46, 13, '1655969961STD02.jpeg', 1),
(47, 8, '1656073564W10.jpg', 0),
(48, 8, '1656073565W09.jpg', 0),
(49, 8, '1656073565W08.jpg', 0),
(50, 8, '1656073565W07.jpg', 0),
(51, 8, '1656073566W06.jpg', 0),
(52, 8, '1656073566W05.jpg', 0),
(53, 8, '1656073566W04.jpg', 0),
(54, 8, '1656073566W03.jpg', 0),
(55, 8, '1656073567W02.jpg', 0),
(56, 10, '1656073642BOOK04.jpg', 0),
(57, 10, '1656073642BOOK03.jpg', 0),
(58, 10, '1656073643BOOK02.jpg', 0),
(59, 10, '1656073643BOOK01.jpg', 0),
(60, 11, '1656073675BAMB06.jpeg', 1),
(61, 11, '1656073676BAMB05.jpeg', 1),
(62, 11, '1656073676BAMB04.jpeg', 1),
(63, 11, '1656073676BAMB03.jpeg', 1),
(64, 11, '1656073677BAMB02.jpeg', 1),
(65, 11, '1656073677BAMB01.jpeg', 1),
(66, 13, '1656073773STD04.jpeg', 0),
(67, 13, '1656073774STD03.jpeg', 0),
(68, 13, '1656073774STD02.jpeg', 0),
(69, 9, '165607380106.jpg', 1),
(70, 9, '165607380105.jpg', 1),
(71, 9, '165607380204.jpg', 1),
(72, 9, '165607380203.jpg', 1),
(73, 9, '165607380202.jpg', 1),
(74, 12, '1656073930GRANTH05.jpg', 1),
(75, 12, '1656073930GRANTH04.jpg', 0),
(76, 12, '1656073932GRANTH03.jpg', 1),
(77, 12, '1656073934GRANTH02.jpg', 0),
(78, 12, '1658310977krishna1.jpg', 1),
(79, 11, '168372106300.1.jpeg', 0),
(80, 11, '16837210641.jpeg', 0),
(81, 11, '1683721064WhatsAppImage2023-04-13at12.06.19PM(4).jpeg', 0),
(82, 11, '1683721065002.jpeg', 0),
(83, 11, '1683721065001.jpeg', 0),
(84, 9, '1683721215IMG_20230221_121115.jpg', 0),
(85, 9, '1683721216IMG_20230221_121043.jpg', 0),
(86, 9, '1683721216IMG_20230221_120943.jpg', 0),
(87, 9, '1683721246WhatsAppImage2023-04-23at1.04.40PM(1).jpeg', 0),
(88, 9, '1683721246WhatsAppImage2023-04-23at1.04.42PM(1).jpeg', 0),
(89, 9, '1683721246WhatsAppImage2023-04-23at1.04.37PM.jpeg', 0),
(90, 9, '1683721247WhatsAppImage2023-04-23at1.04.35PM(2).jpeg', 0),
(91, 9, '1683721247WhatsAppImage2023-04-23at1.04.34PM.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mst_functions`
--

CREATE TABLE `mst_functions` (
  `id` int(10) NOT NULL,
  `strLanguageCode` varchar(10) NOT NULL,
  `strFunction` text NOT NULL,
  `strPageName` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `enmStatus` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0-Inactive,1-Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_functions`
--

INSERT INTO `mst_functions` (`id`, `strLanguageCode`, `strFunction`, `strPageName`, `created_at`, `updated_at`, `deleted_at`, `enmStatus`) VALUES
(1, 'gu', 'ગ્રંથાલયસેવાની ઉપલબ્ધિ સહજ બનાવવા માટેનાં વિવિધ વ્યવસ્થાકીય કાર્યો.', 'કાર્યો', NULL, '2022-10-14 12:57:33', NULL, '1'),
(2, 'gu', 'લોકોની રજુઆતોનો ઝડપી અને ન્યાયપૂર્ણ નિકાલ થાય તે પ્રમાણે કાર્યરચના કરવી.', 'કાર્યો', NULL, '2022-10-14 12:57:41', NULL, '1'),
(3, 'en', 'asdfsf', NULL, '2022-05-19 06:28:15', '2022-05-19 06:50:58', '2022-05-19 06:50:58', '0'),
(4, 'en', 'sdf', NULL, '2022-05-19 06:54:12', '2022-05-19 06:55:50', '2022-05-19 06:55:50', '0'),
(5, 'gu', 'wefrwerfwe', NULL, '2022-05-19 06:55:01', '2022-05-19 06:56:05', '2022-05-19 06:56:05', '0'),
(6, 'gu', 'asdfsf', NULL, '2022-06-16 07:09:48', '2022-06-16 09:17:04', '2022-06-16 09:17:04', '0'),
(7, 'gu', 'પ્રજામાં પુસ્તકોનો ઉપયોગ વધે તેમજ વાંચનટેવ વિકસે તે માટે પ્રયાસો કરવા.', 'કાર્યો', '2022-06-16 09:15:40', '2022-10-14 12:57:45', NULL, '1'),
(8, 'gu', 'સામાન્ય પ્રજાજનોને વધુમાં વધુ સાર્વજનિક ગ્રંથાલય સેવાથી સાંકળી લેવાય તેવું આયોજન કરવું.', 'કાર્યો', '2022-06-16 09:16:36', '2022-10-14 12:57:49', NULL, '1'),
(9, 'gu', 'સામાન્ય પ્રજાજન વધુમાં વધુ ગ્રંથાલય અભિમુખ બને તે માટે વિસ્તરણ પ્રવૃતિઓનું આયોજન કરવું.', 'કાર્યો', '2022-06-16 09:16:57', '2022-10-14 12:57:57', NULL, '1'),
(10, 'en', 'Various administrative functions to facilitate the availability of library services.', 'Functions', '2022-07-05 06:39:07', '2022-10-14 12:58:02', NULL, '1'),
(11, 'en', 'To make efforts to increase the use of books among the people as well as to     develop reading habits.', 'Functions', '2022-07-05 06:39:24', '2022-10-14 12:58:07', NULL, '1'),
(12, 'en', 'To work out the speedy and just disposal of people\'s representations.', 'Functions', '2022-07-05 06:39:34', '2022-10-14 12:58:12', NULL, '1'),
(13, 'en', 'To plan to involve the general public in public library service as much as    possible.', 'Functions', '2022-07-05 06:39:45', '2022-10-14 12:58:16', NULL, '1'),
(14, 'en', 'To organize extension activities for the general public to become more library     oriented.', 'Functions', '2022-07-05 06:39:55', '2022-10-14 12:58:20', NULL, '1'),
(15, 'en', 'asaa', NULL, '2022-08-17 10:07:08', '2022-08-17 10:08:00', '2022-08-17 10:08:00', '1'),
(16, 'gu', 'ertgert', NULL, '2022-08-26 11:27:31', '2022-08-26 11:27:47', '2022-08-26 11:27:47', '1'),
(17, 'gu', 'Dolorum enim nihil f', NULL, '2022-08-29 10:03:12', '2022-08-29 10:03:34', '2022-08-29 10:03:34', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_introduction`
--

CREATE TABLE `mst_introduction` (
  `id` int(11) NOT NULL,
  `strLanguage` varchar(255) NOT NULL,
  `str_introcontent` text NOT NULL,
  `strPageName` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `enmStatus` enum('0','1') NOT NULL DEFAULT '1' COMMENT '1-Active,0-InActive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_introduction`
--

INSERT INTO `mst_introduction` (`id`, `strLanguage`, `str_introcontent`, `strPageName`, `created_at`, `updated_at`, `deleted_at`, `enmStatus`) VALUES
(1, 'en', '<p>After the separation of Greater Mumbai State, the state of Gujarat was established on 1st May, 1960, after the establishment of Gujarat State, like other states, In also Gujarat need for a central library began to be considered. Initially, the Gujarat Vidyapith Library was given the status of Deemed State Central Library and continued to receive grants for the maintenance of the copyright section by obtaining books as per the provisions of the Press and Registration of Books Act. When the state capital was shifted from Ahmedabad to Gandhinagar, the State Library Building was built in the year 1972, where the present Central Library situated. But the State Assembly took it into its own hands for interim use. When a new building was constructed for the State Legislative Assembly in the year 1982, this building was handed over to the Directorate of Libraries to start the State Central Library. And thus in the year 1982 the State Central Library was established. The state library building is also known as the old assembly in common parlance as the state assembly has been functioning here for ten consecutive years. At present the Central Central Library, Gandhinagar is functioning under the Directorate of Libraries, Gandhinagar under the Sports, Youth and Cultural Activities Department. State Central Library, Gandhinagar ranks highest in the state&#39;s public library system (Apex Library in Hierarchy of Public Governmental Library). In the year 2010 with the help of &#39;National Mission on Libraries&#39; the building was renovated at a cost of Rs. 3 crore through National School of Design, Ahmedabad (NID).</p>\n\n<p>In order to keep pace with the latest technology, the library services and functions of the State Central Library, Gandhinagar have been computerized in the year 2006. The &quot;SOUL&quot; (SOFTWARE FOR UNIVERSITY LIBRARIES) software developed by INFLIBNET (Information and Library Network), Gandhinagar has been used for computerization. The library is equipped with RFID technology for quick and easy exchange of books with its readers and for its identification.</p>\n\n<p>Many of the officers who are currently serving as high officials in the Secretariat and other parts of the state still admit that as a student they sat in the State Central Library and prepared for competitive examinations. As a result, they have been able to make a bright career today. This series continues today. Many students of Gandhinagar are building their beautiful future by sitting here today and preparing for competitive exams.</p>\n\n<p>The State Central Library is located in Sector-17, in the heart of Gandhinagar city. Right in front of it passes the Swarnim Park, the most beautiful park in the town adorned with greenery. The surroundings of the library are also covered with forests, which add to the beauty of the library and make it spectacular. The officers / staff serving in the library here are experts in library science and are committed to provide the best library service to the readers. If the knowledge is sacred then the libraries where it is stored can also be called Gyan Mandir.</p>', 'Introduction', '2022-04-14 10:45:44', '2022-10-13 07:30:11', NULL, '1'),
(2, 'gu', '<p>૧ મે ૧૯૬૦માં બૃહદ મુંબઈ રાજ્યથી અલગ થયા બાદ ગુજરાત રાજ્યની સ્થાપના થઇ ત્યારપછી અન્ય રાજ્યોની જેમ ગુજરાત માં પણ મધ્યસ્થ ગ્રંથાલયની જરૂરીયાત અંગે વિચારવાનું શરુ થયું હતું. શરૂઆતમાં ગૂજરાત વિધાપીઠના ગ્રંથાલયને ડીમ્ડ રાજ્ય મધ્યસ્થ ગ્રંથાલયનો દરજ્જો આપી પ્રેસ એન્ડ રજીસ્ટ્રેશન ઓફ બુક્સ એક્ટની જોગવાઈઓ મુજબ પુસ્તકો મેળવી કોપીરાઈટ સેકશનના નિભાવ માટે ગ્રાંટ આપવાનું ચાલું કર્યું હતું. રાજ્યનું પાટનગર જ્યારે અમદાવાદથી ગાંધીનગર ખસેડાયું એ પછી સને ૧૯૭૨માં હાલ જ્યાં રાજ્ય મધ્યસ્થ ગ્રંથાલય બેસે છે ત્યાં રાજ્ય ગ્રંથાલય ભવન બંધાયું હતું. પરંતુ વચગાળાના ઉપયોગ માટે રાજ્ય વિધાનસભાએ તેને પોતાના હસ્તક લીધું હતું.</p>\r\n\r\n<p>સન ૧૯૮૨માં રાજ્ય વિધાનસભા માટે નવા ભવનનું નિર્માણ થતાં આ ભવન નિયામકશ્રી, ગ્રંથાલય કચેરીને રાજ્ય મધ્યસ્થ ગ્રંથાલય શરુ કરવા માટે પરત સોપ્યું હતું. અને એ રીતે સન ૧૯૮૨માં રાજ્ય મધ્યસ્થ ગ્રંથાલયની સ્થાપના થઇ. અહી લગાતાર દસ વર્ષ સુધી રાજ્યની વિધાનસભા કાર્યરત રહી હોવાથી રાજ્ય ગ્રંથાલય ભવન સામાન્ય બોલચાલમાં જૂની વિધાનસભા તરીકે પણ ઓળખાય છે. અત્યારે રાજ્ય મધ્યસ્થ ગ્રંથાલય, ગાંધીનગર રમતગમત, યુવા અને સાંસ્કૃતિક પ્રવૃતિઓ વિભાગ હેઠળ આવતા નિયામક, ગ્રંથાલય કચેરી અંતર્ગત કાર્ય કરી રહ્યું છે. રાજ્ય મધ્યસ્થ ગ્રંથાલય, ગાંધીનગર એ રાજ્યની સાર્વજનિક ગ્રંથાલય વ્યવસ્થાના ક્રમમાં સર્વોચ્ચ ક્રમે (Apex Library in Hierarchy of Public Governmental Library) આવે છે. સન ૨૦૧૦ માં &lsquo;નેશનલ મિશન ઓન લાયબ્રેરીઝ&rsquo; ની સહાયથી રૂ. ૩ કરોડના ખર્ચે નેશનલ સ્કુલ ઓફ ડીઝાઈન, અમદાવાદ (NID) મારફત સને ૨૦૧૦માં આ ભવનની મરામત તથા નવીન સાજસજાવટ કરવામાં આવી હતી.</p>\r\n\r\n<p>અદ્યતન ટેકનોલોજી સાથે કદમથી કદમ મિલાવીને ચાલવા માટે રાજ્ય મધ્યસ્થ ગ્રંથાલય, ગાંધીનગરની ગ્રંથાલય સેવાઓ અને કાર્યોનું સને ૨૦૦૬ના વર્ષમાં કોમ્પયુટરીકરણ કરવામાં આવેલ છે. ઇન્ફ્લીબનેટ (Information Library Network) , ગાંધીનગર દ્વારા તૈયાર કરાયેલ &ldquo;SOUL&rdquo; (SOFTWER FOR UNIVERSITY LIBRARIES) સોફ્ટવેરનો કોમ્પ્યુટરીકરણ કરવા માટે ઉપયોગ કરવામાં આવ્યો છે. ગ્રંથાલયના વાચક સભ્યોને પુસ્તકોની સત્વરે અને સરળતાથી આપ-લે થઇ શકે તથા તેની ઓળખ માટે તેને RFID ટેકનોલોજીથી સજ્જ કરવામાં આવ્યા છે.</p>\r\n\r\n<p>હાલ સચિવાલય તથા રાજ્યના અન્ય ભાગોમાં ઉચ્ચ અધિકારી તરીકે ફરજ બજાવી રહ્યા છે તે પૈકીના ઘણા અધિકારીઓ આજે પણ સ્વીકારે છે કે વિદ્યાર્થીકાળમાં તેઓએ આ રાજ્ય મધ્યસ્થ ગ્રંથાલયમાં બેસીને સ્પર્ધાત્મક પરીક્ષાઓની તૈયારી કરી હતી. જેના ફળસ્વરૂપે આજે તેઓ ઉજ્જવળ કારકિર્દી બનાવી શક્યા છે. આ સીલસીલો આજે પણ ચાલું છે. ગાંધીનગરના અનેક વિદ્યાર્થી/વિદ્યાર્થીનીઓ આજની તારીખે પણ અહી બેસીને સ્પર્ધાત્મક પરીક્ષાઓની તૈયારી કરી પોતાના સુંદર ભવિષ્યનું નિર્માણ કરી રહ્યા છે.</p>\r\n\r\n<p>રાજ્ય મધ્યસ્થ ગ્રંથાલય ગાંધીનગર શહેરની તદ્દન મધ્યમાં સેક્ટર-૧૭ સ્થિત આવેલું છે. તેની બિલકુલ સામેથી સ્વર્ણિમ પાર્ક પસાર થાય છે, જે હરિયાળીથી શોભતો નગરનો સુંદરત્તમ પાર્ક છે. ગ્રંથાલયની આજુબાજુનું પરિસર પણ વનરાજીથી છવાયેલું છે, જે ગ્રંથાલયની શોભામાં અભિવૃધ્ધિ કરી તેને દર્શનીય બનાવે છે. અહીં ગ્રંથાલયમાં સેવા આપતા અધિકારી/કર્મચારીઓ ગ્રંથાલય શાસ્ત્રના વિશેષજ્ઞો છે અને વાચકોને બહેતરીન ગ્રંથાલય સેવા આપવા માટે પ્રતિબધ્ધ છે. જ્ઞાન જો પવિત્ર હોય તો જ્યાં તેનો સંગ્રહ થાય છે તે ગ્રંથાલયોને જ્ઞાનમંદિર પણ કહી શકાય.</p>\r\n\r\n<p>&nbsp;</p>', 'પરિચય', '2022-04-14 12:04:54', '2022-10-13 09:02:25', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_knowledge_category`
--

CREATE TABLE `mst_knowledge_category` (
  `id` int(10) NOT NULL,
  `strLanguageCode` varchar(255) NOT NULL,
  `strCategory` varchar(255) NOT NULL,
  `strDetail` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `enmStatus` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0-Inactive,1-Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_knowledge_category`
--

INSERT INTO `mst_knowledge_category` (`id`, `strLanguageCode`, `strCategory`, `strDetail`, `created_at`, `updated_at`, `deleted_at`, `enmStatus`) VALUES
(1, 'gu', 'સમય તથા રજા :', 'નોલેજ સેન્ટરનો સમય સવારના ૧૦.૩૦ થી સાંજના ૬.૦૦ કલાક સુધીનો રહેશે.', NULL, NULL, NULL, '1'),
(2, 'en', 'Expedita', 'Voluptatem simil', '2022-07-26 10:27:50', '2022-07-26 11:08:46', '2022-07-26 11:08:46', '1'),
(3, 'en', 'Earum iste adipisicibghvbjhuguigh', 'Et voluptatum ration', '2022-07-26 11:07:49', '2022-07-27 06:12:53', '2022-07-27 06:12:53', '1'),
(4, 'gu', 'સભ્યપદ :', 'નોલેજ સેન્ટરનો સમય સવારના ૧૦.૩૦ થી સાંજના ૬.૦૦ કલાક સુધીનો રહેશે.', '2022-07-27 06:12:41', '2022-07-28 08:41:46', NULL, '1'),
(5, 'en', 'Et et esse recusand', 'Velit natus vel', '2022-07-28 08:21:39', '2022-07-28 08:22:03', '2022-07-28 08:22:03', '1'),
(6, 'gu', 'સમયમર્યાદા :', 'નોલેજ સેન્ટરનો સમય સવારના ૧૦.૩૦ થી સાંજના ૬.૦૦ કલાક સુધીનો રહેશે.', '2022-07-28 08:42:08', '2022-07-28 08:42:08', NULL, '1'),
(7, 'gu', 'મૂલ્ય :', 'નોલેજ સેન્ટરનો સમય સવારના ૧૦.૩૦ થી સાંજના ૬.૦૦ કલાક સુધીનો રહેશે.', '2022-07-28 09:03:24', '2022-07-28 09:03:24', NULL, '1'),
(8, 'gu', 'સેવાઓ :', 'નોલેજ સેન્ટરનો સમય સવારના ૧૦.૩૦ થી સાંજના ૬.૦૦ કલાક સુધીનો રહેશે.', '2022-07-28 09:03:58', '2022-07-28 09:03:58', NULL, '1'),
(9, 'gu', 'જવાબદારી :', 'નોલેજ સેન્ટરનો સમય સવારના ૧૦.૩૦ થી સાંજના ૬.૦૦ કલાક સુધીનો રહેશે.', '2022-07-28 09:16:51', '2022-07-28 09:16:51', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_knowledge_center`
--

CREATE TABLE `mst_knowledge_center` (
  `id` int(10) NOT NULL,
  `strLanguageCode` varchar(255) NOT NULL,
  `strCategoryCode` varchar(255) NOT NULL,
  `strTitle` text NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `enmStatus` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0-Inactive,1-Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_knowledge_center`
--

INSERT INTO `mst_knowledge_center` (`id`, `strLanguageCode`, `strCategoryCode`, `strTitle`, `deleted_at`, `created_at`, `updated_at`, `enmStatus`) VALUES
(1, 'gu', 'Tempor eos velitjhkgjugjhgh', 'Nostrum quis enim ut', '2022-07-28 05:25:59', '2022-07-27 04:44:08', '2022-07-28 05:25:59', '1'),
(2, 'en', 'Praesentium fugiat', 'Quis officia rerum p', '2022-07-27 05:24:54', '2022-07-27 05:24:39', '2022-07-27 05:24:54', '1'),
(3, 'en', 'Ea possimus irure', 'Aut architecto ea sa', '2022-07-27 13:20:07', '2022-07-27 06:07:49', '2022-07-27 13:20:07', '1'),
(4, 'gu', 'Dolorem laborum vel', 'Dolores sed officiis', '2022-07-27 06:12:23', '2022-07-27 06:11:37', '2022-07-27 06:12:23', '1'),
(5, 'en', 'Enim tempor anim in', 'hpgh mn', '2022-07-28 08:29:24', '2022-07-27 10:51:33', '2022-07-28 08:29:24', '1'),
(6, 'en', 'Voluptatibus mollit', 'Laborum Sequi culpa', '2022-07-28 05:25:00', '2022-07-27 11:02:39', '2022-07-28 05:25:00', '1'),
(7, 'en', 'Sint excepturi eius', 'Enim tenetur officia', '2022-07-28 05:25:15', '2022-07-27 11:27:21', '2022-07-28 05:25:15', '1'),
(8, 'en', 'Aut molestiae volupt', 'Aliquip maxime perfe', '2022-07-28 05:25:09', '2022-07-27 11:38:55', '2022-07-28 05:25:09', '1'),
(9, 'en', 'સમય તથા રજા :', 'Quae amet iure sint', '2022-07-28 05:25:12', '2022-07-27 12:14:20', '2022-07-28 05:25:12', '1'),
(10, 'en', 'સમય તથા રજા :', 'Quae amet iure sint', '2022-07-28 05:25:26', '2022-07-27 12:14:39', '2022-07-28 05:25:26', '1'),
(11, 'en', 'Enim tempor anim in', 'Nemo velit sint eos', '2022-07-28 05:24:52', '2022-07-27 12:15:31', '2022-07-28 05:24:52', '1'),
(12, 'en', 'સમય તથા રજા :', 'Necessitatibus susci', '2022-07-28 05:25:18', '2022-07-27 12:49:45', '2022-07-28 05:25:18', '1'),
(13, 'en', 'સમય તથા રજા :', 'Necessitatibus susci', '2022-07-28 05:25:21', '2022-07-27 12:49:47', '2022-07-28 05:25:21', '1'),
(14, 'en', 'સમય તથા રજા :', 'Necessitatibus susci', '2022-07-28 05:25:23', '2022-07-27 12:49:54', '2022-07-28 05:25:23', '1'),
(15, 'en', 'Enim tempor anim in', 'Eiusmod quis et id', '2022-07-28 05:25:38', '2022-07-27 12:50:20', '2022-07-28 05:25:38', '1'),
(16, 'gu', 'Enim tempor anim in', 'hp', '2022-07-28 05:25:55', '2022-07-27 12:51:14', '2022-07-28 05:25:55', '1'),
(17, 'gu', 'Enim tempor anim in', 'Quia voluptatem qui', '2022-07-28 05:26:05', '2022-07-27 12:54:42', '2022-07-28 05:26:05', '1'),
(18, 'gu', 'Enim tempor anim in', 'Quia voluptatem', '2022-07-28 08:42:35', '2022-07-27 12:55:45', '2022-07-28 08:42:35', '1'),
(19, 'gu', 'Enim tempor anim in', 'Quia voluptatem qui', '2022-07-28 08:42:37', '2022-07-27 12:56:01', '2022-07-28 08:42:37', '1'),
(20, 'gu', 'સમય તથા રજા :', '૧) સરકારશ્રી ધ્વારા નક્કી કરાયેલ અઠવાડિક રજા અને જાહેર રજાઓના દિવસોમાં નોલેજ સેન્ટરમાં રજા રહેશે.', NULL, '2022-07-27 13:08:07', '2022-07-28 08:42:52', '1'),
(21, 'gu', 'સમય તથા રજા :', 'Enim sed quidem duis', '2022-07-28 08:31:47', '2022-07-27 13:08:19', '2022-07-28 08:31:47', '1'),
(22, 'gu', 'સમય તથા રજા :', '(૨) નોલેજ સેન્ટરમાં અનિવાર્ય કારણોસર તથા મેન્ટેનન્સ સબંધિત કામગીરી માટે જરૂરિયાત ઉભી થયે નોલેજ સેન્ટરની સેવાઓ બંધ રાખવાની સત્તા ગ્રંથપાલ, રાજ્ય મધ્યસ્થ ગ્રંથાલય, ગાંધીનગરને રહેશે.', NULL, '2022-07-27 13:10:55', '2022-07-28 08:43:17', '1'),
(23, 'en', 'Enim tempor anim in', 'hp', '2022-07-28 05:25:41', '2022-07-27 13:20:24', '2022-07-28 05:25:41', '1'),
(24, 'en', 'સમય તથા રજા :', 'Et similique non inv', '2022-07-28 05:25:30', '2022-07-27 13:29:45', '2022-07-28 05:25:30', '1'),
(25, 'en', 'Enim tempor anim in', 'Ducimus voluptatem harin', '2022-07-28 05:25:45', '2022-07-28 05:14:02', '2022-07-28 05:25:45', '1'),
(26, 'en', 'Enim tempor anim in', 'hp', '2022-07-28 05:26:02', '2022-07-28 05:15:51', '2022-07-28 05:26:02', '1'),
(27, 'en', 'Enim tempor anim in', 'harin', '2022-07-28 05:25:35', '2022-07-28 05:20:34', '2022-07-28 05:25:35', '1'),
(28, 'gu', 'સભ્યપદ :', '(૧) રાજ્ય મધ્યસ્થ ગ્રંથાલય, ગાંધીનગરનું સભ્યપદ ધરાવતા કાર્ડધારકો નોલેજ સેન્ટરમાં પ્રવેશ મેળવી શકશે અને નોલેજ સેન્ટરની સેવાઓનો ઉપયોગ કરી શકશે.', NULL, '2022-07-28 06:35:38', '2022-07-28 08:43:34', '1'),
(29, 'en', 'સમય તથા રજા :', 'hpgh', '2022-07-28 08:31:51', '2022-07-28 06:35:52', '2022-07-28 08:31:51', '1'),
(30, 'en', 'Enim tempor anim in', 'hhgggfd', '2022-07-28 08:30:27', '2022-07-28 08:30:03', '2022-07-28 08:30:27', '1'),
(31, 'gu', 'Enim tempor anim in', 'hpppparekh', '2022-07-28 08:42:31', '2022-07-28 08:36:17', '2022-07-28 08:42:31', '1'),
(32, 'gu', 'સભ્યપદ :', '(૨) ગ્રંથપાલ, રાજ્ય મધ્યસ્થ ગ્રંથાલય, ગાંધીનગર ધ્વારા અનિવાર્ય કારણોસર અથવા સરકારી કામગીરી અર્થે કોઇ પ્રતિનિધિને અધિકૃત કરે તો તેવા અધિકૃત વ્યક્તિ નોલેજ સેન્ટરનો ઉપયોગ રાજ્ય મધ્યસ્થ ગ્રંથાલય, ગાંધીનગરનું સભ્યપદ ન હોય તો પણ કરી શકશે.', NULL, '2022-07-28 08:50:25', '2022-07-28 08:50:25', '1'),
(33, 'gu', 'સમયમર્યાદા :', '(૧) નોલેજ સેન્ટરનો ઉપયોગ પ્રતિ એક ઉપયોગકર્તા વધુમાં વધુ ૧કલાક કરી શકશે જો અન્ય ઉપયોગકર્તાઓની પ્રતિક્ષાયાદી ન હોય તો વધુ સમય ફાળવવામાં આવશે.', NULL, '2022-07-28 08:51:07', '2022-07-28 08:51:07', '1'),
(34, 'gu', 'સમયમર્યાદા :', '(૨) નોલેજ સેન્ટરમાં સિમિત કોમ્પ્યુટર ઉપલબ્ધ હોઇ તમામ ઉપયોગકર્તાઓને સુવિધાપૂર્ણ સેવાઓ આપી શકાય તે માટે પ્રતિક્ષા યાદીમાં નામ નોંધાવવાનું રહેશે. અને સમય ફાળવણી થાય તે મુજબ નોલેજ સેન્ટરની સેવાઓનો લાભ ઉપલબ્ધ બનાવવામાં આવશે.', NULL, '2022-07-28 08:52:05', '2022-07-28 08:52:35', '1'),
(35, 'gu', 'મૂલ્ય :', '(૧) નોલેજ સેન્ટરનો ઉપયોગકર્તા તમામ ઇન્ટરનેટ સેવાના વપરાશ બદલ પ્રતિ કલાક દીઠ રૂ. ૧૦/- ચાર્જ વસુલ કરવામાં આવશે. (જો ૧ કલાકથી ઓછા સમય માટે પણ આ સેવાનો લાભ ઉપયોગકર્તા મેળવશે તો પણ રૂ. ૧૦/- ચાર્જ વસુલ કરવામાં આવશે.) જેની પહોંચ આપવામાં આવશે.', NULL, '2022-07-28 09:05:22', '2022-07-28 09:05:22', '1'),
(36, 'gu', 'મૂલ્ય :', '(૨) અનિવાર્ય કારણોસર કોઇ ઉપભોકતાને નોલેજ સેન્ટરની સેવા મેળવતા હોય તેવા સમયે ચાલુ સમય દરમ્યાન અટકાવવા પડે તે માટેની સતા ગ્રંથપાલશ્રી, રાજ્ય મધ્યસ્થ ગ્રંથાલય, ગાંધીનગરની રહેશે.', NULL, '2022-07-28 09:05:47', '2022-07-28 09:05:47', '1'),
(37, 'gu', 'સેવાઓ :', '(૧) નોલેજ સેન્ટરમાં શૈક્ષણિક, આરોગ્ય, વ્યવસાયિક, સામાજિક, સંશોધન, પર્યાવરણ, ગણિત, ભાષા, સાહિત્ય, જનરલ જ્ઞાન જેવા વિષયોને આવરી લેતી ઇન્ટરનેટ સેવાઓ ઉપલબ્ધ બનાવવામાં આવશે.', NULL, '2022-07-28 09:08:54', '2022-07-28 09:08:54', '1'),
(38, 'gu', 'સેવાઓ :', '(૨) નોલેજ સેન્ટરમાં ઇન્ટરનેટ સેવાઓના ઉપયોગકર્તાઓ ધ્વારા અનઅધિકૃત સાઇટ્સના ઉપયોગ પર પ્રતિબંધ છે. તેમ છતાં જો કોઇ ઉપયોગકર્તા દુરઉપયોગ કરતા જોવા મળશે તો કાયદાકીય પગલા લેવાશે જેની જવાબદારી સંબંધિત ઉપયોગકર્તાની રહેશે.', NULL, '2022-07-28 09:09:24', '2022-07-28 09:12:01', '1'),
(39, 'gu', 'સેવાઓ :', '(૩) નોલેજ સેન્ટરમાં ઉક્ત વિષયો પૈકીની કોઇપણ માહિતી જરૂર હોય તો ઉપયોગકર્તા પોતાની પેનડ્રાઇવ /સી.ડી.માં અધિકૃત વ્યક્તિની પૂર્વમંજુરી મેળવી જે તે ફાઈલને ધ્યાનમાં રાખીને ડાઉનલોડ કરવાની સુવિધા આપવામાં આવશે.', NULL, '2022-07-28 09:14:34', '2022-07-28 09:14:34', '1'),
(40, 'gu', 'જવાબદારી :', '(૧) નોલેજ સેન્ટરમાં ઉપલબ્ધ કરાયેલ તમામ સુવિધાઓ જેમ કે કોમ્પ્યુટર સોફ્ટવેર/હાર્ડવેર, ફર્નિચર, લાઇટ અથવા અન્ય કોઇપણ ચીજવસ્તુને નુકસાન થશે તો જે તે ઉપયોગકર્તા પાસેથી અધિકૃત સત્તા સુચવે તે રીતે નાણાંકીય વસુલાત કરાશે.', NULL, '2022-07-28 09:17:20', '2022-07-28 09:17:20', '1'),
(41, 'gu', 'જવાબદારી :', '(૨) નોલેજ સેન્ટરમાં ઉપયોગકર્તાઓ ધ્વારા બિનજરૂરી ચર્ચા, મોટેથી વાતો કરવી, મોટા અવાજે બોલવું, ખોટી અને વજૂદ વગરની ફરિયાદો ન કરવા અને કર્મચારીઓ સાથે અસભ્ય વર્તન કરવા પર પ્રતિબંધ છે.', NULL, '2022-07-28 09:18:04', '2022-07-28 09:18:04', '1'),
(42, 'gu', 'જવાબદારી :', '(૩) નોલેજ સેન્ટરમાં મોબાઇલ ફોનના ઉપયોગ કરવા ઉપર સંપૂર્ણ પ્રતિબંધ છે.', NULL, '2022-07-28 09:18:22', '2022-07-28 09:18:22', '1'),
(43, 'gu', 'જવાબદારી :', '(૪) નોલેજ સેન્ટરમાં પ્રવેશ મેળવતા અગાઉ મુખ્ય પ્રવેશ ધ્વાર આગળ સીક્યુરીટી ગાર્ડ પાસે આપની ચીજવસ્તુઓ અને અન્ય સાધનસામગ્રી જમા કરાવવાની રહેશે. તે પછી જ નોલેજ સેન્ટરમાં પ્રવેશ આપવામાં આવશે. આપની ચીજવસ્તુઓ અંગે આપની અંગત જવાબદારી રહેશે.', NULL, '2022-07-28 09:18:40', '2022-07-28 09:18:40', '1'),
(44, 'gu', 'જવાબદારી :', '(૫) નોલેજ સેન્ટરના સુસંચાલનમાં નોલેજ સેન્ટરના કર્મચારીઓને યોગ્ય સહકાર દરેક ઉપયોગકર્તાઓએ આપવાનો રહેશે.', NULL, '2022-07-28 09:18:57', '2022-07-28 09:18:57', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_language`
--

CREATE TABLE `mst_language` (
  `id` int(10) NOT NULL,
  `strLanguage` varchar(255) CHARACTER SET utf8 NOT NULL,
  `strLanguageCode` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `enmStatus` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0-Inactive,1-Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_language`
--

INSERT INTO `mst_language` (`id`, `strLanguage`, `strLanguageCode`, `created_at`, `updated_at`, `deleted_at`, `enmStatus`) VALUES
(1, 'English', 'en', NULL, '2022-06-06 08:42:19', '2022-06-06 08:42:19', '0'),
(2, 'Gujarati', 'gu', NULL, '2022-04-25 09:07:25', '2022-04-25 09:07:25', '0'),
(8, 'ગુજરાતી', 'gu', '2022-04-25 09:08:48', '2023-03-29 13:22:16', NULL, '1'),
(9, 'English', 'en', '2022-06-13 09:31:04', '2022-07-22 07:31:42', NULL, '1'),
(10, 'qw', 'qw', '2022-08-26 13:12:21', '2022-08-26 13:12:31', '2022-08-26 13:12:31', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_leaders`
--

CREATE TABLE `mst_leaders` (
  `id` int(10) NOT NULL,
  `strLeadersName` varchar(255) NOT NULL,
  `strDesignation` varchar(255) NOT NULL,
  `strPlace` varchar(255) NOT NULL,
  `strLeadersPhoto` varchar(255) NOT NULL,
  `strLanguageCode` varchar(255) NOT NULL,
  `strPageName` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `enmStatus` enum('0','1') DEFAULT '1' COMMENT '1-active,0-InActive',
  `intDisplay` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_leaders`
--

INSERT INTO `mst_leaders` (`id`, `strLeadersName`, `strDesignation`, `strPlace`, `strLeadersPhoto`, `strLanguageCode`, `strPageName`, `created_at`, `updated_at`, `deleted_at`, `enmStatus`, `intDisplay`) VALUES
(1, 'શ્રી ભુપેન્દ્રભાઇ પટેલ', 'માનનીય મુખ્યમંત્રીશ્રી', 'ગુજરાત સરકાર', 'cm.png', 'gu', 'નેતાઓ', NULL, '2023-06-09 05:34:44', NULL, '1', 1),
(2, 'શ્રી હર્ષભાઇ સંઘવી', 'માનનીય રાજ્યકક્ષાના મંત્રીશ્રી, રમતગમત યુવા અને સાંસ્કૃતિક પ્રવૃતિઓ વિભાગ,', 'ગુજરાત સરકાર', 'sanghavi.png', 'gu', 'નેતાઓ', NULL, '2023-06-09 05:34:47', NULL, '1', 3),
(3, 'શ્રી અશ્વિનીકુમાર (આઇ.એ.એસ)', 'અગ્ર સચિવ,  રમતગમત યુવા અને સાંસ્કૃતિક પ્રવૃતિઓ વિભાગ', 'ગુજરાત સરકાર', 'shreeashvinikumarias.png', 'gu', 'નેતાઓ', NULL, '2023-06-09 05:31:57', NULL, '1', 4),
(4, 'ડૉ. પંકજ ગોસ્વામી', 'નિયામક, ગ્રંથાલય નિયામકની કચેરી તથા રાજ્ય ગ્રંથપાલ, રાજ્ય મધ્યસ્થ ગ્રંથાલય', 'ગાંધીનગર', 'pankaj-goswami.png', 'gu', 'નેતાઓ', NULL, '2023-06-09 05:31:57', NULL, '1', 5),
(5, 'Mr. Bhupendrabhai Patel', 'Hon\'ble Chief Minister', 'Hon\'ble Chief Minister', '1658751990_profile01.png', 'en', NULL, '2022-07-25 12:26:30', '2023-06-09 05:31:52', NULL, '1', 6),
(6, 'Axel Snow', 'Rerum voluptatem si', 'Nisi dolorum accusam', '1661338764_1655450615_1.jpg', 'en', NULL, '2022-08-17 10:14:56', '2022-08-29 04:46:57', '2022-08-29 04:46:57', '0', 6),
(7, 'Illana Burgess', 'Non in dolor eaque v', 'Nobis ut dolor liber mm', '1660731363_1655451029_1.jpg', 'en', 'Leaders', '2022-08-17 10:16:03', '2022-10-19 13:25:02', NULL, '0', 7),
(8, 'Mona Christensen hh', 'At sint impedit ips hhy', 'Dolore beatae offici hhy', '1660805802_1655451097_Kaleidoscope-finale-schedule.jpg', 'en', NULL, '2022-08-18 06:56:42', '2022-08-18 06:57:10', '2022-08-18 06:57:10', '0', 8),
(9, 'શ્રી મુળુભાઈ હરદાસભાઈ બેરા', 'માનનીય મંત્રીશ્રી, સાંસ્કૃતિક પ્રવૃતિઓ, ગુજરાત સરકાર', 'ગાંધીનગર', '1683790678_new_leaders.jpg', 'gu', 'નેતાઓ', '2023-05-11 07:37:58', '2023-06-09 05:34:47', NULL, '1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mst_librarian_desk`
--

CREATE TABLE `mst_librarian_desk` (
  `id` int(10) NOT NULL,
  `strLibraryMessage` text NOT NULL,
  `strPageName` varchar(255) DEFAULT NULL,
  `strPhoto` varchar(255) NOT NULL,
  `strLibrarianFrom` varchar(255) NOT NULL,
  `strLanguageCode` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `enmStatus` enum('0','1') DEFAULT '1' COMMENT '1-active,0-InActive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_librarian_desk`
--

INSERT INTO `mst_librarian_desk` (`id`, `strLibraryMessage`, `strPageName`, `strPhoto`, `strLibrarianFrom`, `strLanguageCode`, `created_at`, `updated_at`, `deleted_at`, `enmStatus`) VALUES
(1, '<p>&quot;Libraries store the energy that fuels the imagination. They open up windows to the world and inspire us to explore and achieve, and contribute to improving our quality of life.&quot;</p>', 'From Librarian\'s Desk', '1683724594_Pankaj Sir Photo-min.jpg', 'Shri Dr.Pankaj Goswami', 'en', '2022-04-20 10:40:59', '2023-05-10 13:16:34', NULL, '1'),
(2, '<p>પુસ્તકાલયો એવી ઊર્જાનો સંગ્રહ કરે છે જે કલ્પનાને બળ આપે છે. તેઓ વિશ્વ માટે વિન્ડો ખોલે છે અને અમને અન્વેષણ કરવા અને હાંસલ કરવા પ્રેરણા આપે છે અને અમારા જીવનની ગુણવત્તા સુધારવામાં યોગદાન આપે છે.</p>', 'ગ્રંથપાલના ડેસ્ક પરથી', '1683719262_Pankaj Sir Photo-min.jpg', 'શ્રી ડૉ.પંકજ ગોસ્વામી', 'gu', '2022-04-20 10:45:32', '2023-05-10 11:47:42', NULL, '1'),
(3, '<p>kmklmkl;m</p>', NULL, '1650451565gallery03.png', 'Shri Dr.Pankaj Goswami', 'Hi', '2022-04-20 10:46:05', '2022-04-21 09:56:11', '2022-04-21 09:56:11', '1'),
(4, '<p>dfafaf</p>', NULL, '1650531866_gallery01.png', 'Shri Dr.Pankaj Goswami', 'en', '2022-04-21 09:04:26', '2022-04-21 09:56:17', '2022-04-21 09:56:17', '1'),
(5, '<p>sdqwerqwdxqwdw1erw</p>', NULL, '1650532403_gallery01.png', 'Shri Dr.Pankaj Goswami', 'Hi', '2022-04-21 09:13:23', '2022-04-21 09:55:54', '2022-04-21 09:55:54', '1'),
(6, '<p>rewewe</p>', NULL, '1660656706_1655459774_01.jpg', 'Voluptas voluptate r', 'en', '2022-08-16 13:31:46', '2022-08-18 10:40:55', '2022-08-18 10:40:55', '1'),
(7, '<p>qw</p>', NULL, '1661511902_EXTERNAL VIVA ALLOCATION 8TH SEM SUMMER 2022.pdf', 'Maiores quia volupta', 'en', '2022-08-18 10:40:30', '2022-08-26 11:05:43', '2022-08-26 11:05:43', '1'),
(8, '<p>qwqwere hp</p>', NULL, '1661237635_1655451029_1.jpg', 'test hp', 'en', '2022-08-23 06:53:55', '2022-08-23 06:53:55', NULL, '1'),
(9, '<p>fds</p>', NULL, '1661249078_1655451029_1.jpg', 'hp', 'en', '2022-08-23 10:04:38', '2022-08-23 10:04:54', '2022-08-23 10:04:54', '1'),
(10, '<p>qwe</p>', NULL, '1661493044_1660828895_krishna.jpg', 'sad', 'en', '2022-08-26 05:50:44', '2022-08-26 11:26:01', '2022-08-26 11:26:01', '1'),
(11, '<p>qazxsw</p>', NULL, '1661756819_tiger.jpg', 'hp test', 'en', '2022-08-26 11:06:26', '2022-08-29 07:07:08', '2022-08-29 07:07:08', '1'),
(12, '<p>ert</p>', NULL, '1661748278_kaleidoscope-june-22.jpg', 'sd', 'en', '2022-08-29 04:44:38', '2022-08-29 04:45:30', '2022-08-29 04:45:30', '1'),
(13, '<p>QW</p>', NULL, '1661748962_tiger.jpg', 'Omnis magna animi hp', 'en', '2022-08-29 04:56:02', '2022-08-29 07:07:29', '2022-08-29 07:07:29', '1'),
(14, '<p>dsasdas qqqqqqqqqqq</p>', NULL, '1661756801_tiger.jpg', 'Omnis magna animi hp', 'en', '2022-08-29 07:06:41', '2022-08-29 11:05:37', '2022-08-29 11:05:37', '1'),
(15, '<p>QQQ</p>', NULL, '1661768215_tiger.jpg', 'Omnis magna animi hp', 'en', '2022-08-29 10:16:55', '2022-08-29 11:03:09', '2022-08-29 11:03:09', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_libraryTime`
--

CREATE TABLE `mst_libraryTime` (
  `id` int(11) NOT NULL,
  `strPageName` varchar(255) DEFAULT NULL,
  `strLanguage` varchar(255) NOT NULL,
  `str_content` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `enmStatus` enum('0','1') DEFAULT '1' COMMENT '1-active,0-InActive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_libraryTime`
--

INSERT INTO `mst_libraryTime` (`id`, `strPageName`, `strLanguage`, `str_content`, `created_at`, `updated_at`, `deleted_at`, `enmStatus`) VALUES
(1, 'ગ્રંથાલય સમય', 'gu', '<ul>\r\n	<li>સવારના:૧૦.૩૦ થી સાંજના ૬.૧૦ સુધી (મંગળવાર થી શનિવાર)</li>\r\n	<li>રવિવારનો સમય : સવારે ૧૦.૩૦ થી બપોરે ૦૨&nbsp;સુધી</li>\r\n	<li>વાંચનાલય સમય : સવારના ૦૮.૦૦ થી રાતના ૧૨.૦૦ સુધી</li>\r\n	<li>અઠવાડિક રજા : સોમવાર</li>\r\n</ul>', '2022-05-03 06:06:27', '2023-05-10 11:59:46', NULL, '1'),
(2, 'Library Time', 'en', '<ul>\n	<li>\n10.30 am to 6.10 pm (Tuesday to Saturday\n\n	</li>\n	<li>Sunday time: 10.30 am to 3.30 pm</li>\n	<li>Library time: 08.00 am to 11.00 pm</li>\n	<li>Weekly holiday: Monday</li>\n</ul>\n\n<p>&nbsp;</p>', '2022-05-03 06:40:05', '2023-01-24 10:09:22', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_managementofvillagelibraries`
--

CREATE TABLE `mst_managementofvillagelibraries` (
  `id` int(10) NOT NULL,
  `strLanguageCode` varchar(255) NOT NULL,
  `strManagementVillagelibraries` text NOT NULL,
  `strPageName` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `enmStatus` enum('0','1') DEFAULT '1' COMMENT '1-active,0-InActive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_managementofvillagelibraries`
--

INSERT INTO `mst_managementofvillagelibraries` (`id`, `strLanguageCode`, `strManagementVillagelibraries`, `strPageName`, `created_at`, `updated_at`, `deleted_at`, `enmStatus`) VALUES
(1, 'gu', '<p>રાજયના ગાંધીનગર, મહેસાણા, બનાસકાંઠા, પાટણ, અમદાવાદ, સાબરકાંઠા, ભાવનગર, અમરેલી, જુનાગઢ, પોરબંદર, રાજકોટ, જામનગર, સુરેન્દ્રનગર અને કચ્છ એમ ચૌદ જિલ્લાના ૮૭૯ થી વધુ ગ્રામ ગ્રંથાલયોનું સંચાલન રાજય મધ્યસ્થ ગ્રંથાલય, ગાંધીનગર દ્વારા થઇ રહ્યું છે.</p>', 'ગ્રામ ગ્રંથાલયોનું સંચાલન', NULL, '2022-10-17 13:34:25', NULL, '1'),
(2, 'gu', '<p>sasdfasfasd sdsdf</p>', NULL, '2022-06-13 11:35:36', '2022-06-13 11:37:06', '2022-06-13 11:37:06', '1'),
(3, 'en', '<p>Gandhinagar, Mehsana, Banaskantha, Patan, Ahmedabad, Sabarkantha, Bhavnagar, Amreli, Junagadh, Porbandar, Rajkot, Jamnagar, Surendranagar and Kutch, more than 879 village libraries of 14 districts are being managed by State Central Library, Gandhinagar.</p>', 'Management of Village Libraries', '2022-07-05 07:19:59', '2022-10-17 13:34:17', NULL, '1'),
(4, 'en', '<p>hpg</p>', NULL, '2022-08-17 13:06:07', '2022-08-17 13:06:23', '2022-08-17 13:06:23', '1'),
(5, 'en', '<p>hhhpp</p>', NULL, '2022-08-18 06:07:16', '2022-08-18 06:07:33', '2022-08-18 06:07:33', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_membership`
--

CREATE TABLE `mst_membership` (
  `id` int(10) NOT NULL,
  `strMembershipID` text NOT NULL,
  `seq_id` int(10) DEFAULT '0',
  `strCouchdbID` varchar(255) NOT NULL,
  `enmApplicationStatus` enum('1','2','3','4','5','6','7','8') NOT NULL DEFAULT '1' COMMENT '1-Final Attachment Due,2-Your file inProcess,3-Query,4-Replied,5-Verify,6-Payment,7-Approved,8-Replied But Final Attachment Due',
  `intUserId` int(10) DEFAULT NULL,
  `strFirstName` varchar(255) NOT NULL,
  `strMiddleName` varchar(255) DEFAULT NULL,
  `strLastName` varchar(255) NOT NULL,
  `strCurrentAddress` text NOT NULL,
  `strPermantAddress` text NOT NULL,
  `strWorkAddress` text NOT NULL,
  `dtiDOB` date NOT NULL,
  `intPhoneNumber` bigint(10) NOT NULL,
  `strEmail` varchar(255) NOT NULL,
  `strPhoto` varchar(255) DEFAULT NULL,
  `strSigned` varchar(255) DEFAULT NULL,
  `strIDProofType` varchar(255) NOT NULL,
  `strIDProof` varchar(255) DEFAULT NULL,
  `strApplicationType` varchar(255) DEFAULT NULL,
  `intIssuingBook` int(10) NOT NULL,
  `strGuarantorCurrentAddress` text,
  `strGuarantorPermentAddress` text,
  `strGuarantorWorkAddress` text,
  `strGuarantiedDetails` text,
  `strFinalScan` varchar(255) DEFAULT NULL,
  `intAgree` enum('0','1') DEFAULT '0' COMMENT '0-Not Agree,1-Agree',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `dtiFinalSubmitDate` date DEFAULT NULL,
  `dtiApprovalDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_membership`
--

INSERT INTO `mst_membership` (`id`, `strMembershipID`, `seq_id`, `strCouchdbID`, `enmApplicationStatus`, `intUserId`, `strFirstName`, `strMiddleName`, `strLastName`, `strCurrentAddress`, `strPermantAddress`, `strWorkAddress`, `dtiDOB`, `intPhoneNumber`, `strEmail`, `strPhoto`, `strSigned`, `strIDProofType`, `strIDProof`, `strApplicationType`, `intIssuingBook`, `strGuarantorCurrentAddress`, `strGuarantorPermentAddress`, `strGuarantorWorkAddress`, `strGuarantiedDetails`, `strFinalScan`, `intAgree`, `created_at`, `updated_at`, `dtiFinalSubmitDate`, `dtiApprovalDate`) VALUES
(1, '000001/SCL/2022', 1, 'Membership_1', '2', 43, 'Zenaida', 'sdfsdfs', 'Barr', 'G-206,Karnavati Apartment3,, Maninagar', 'fger', 'eter', '2021-07-18', 9909913483, 'vikash.kumar@nascentinfo.com', '1665409567_images.jpeg', '1665409568_shreenathaji.jpg', 'Aadhar Card', '1665409568_membershipform_(1).pdf', '3', 1, NULL, NULL, NULL, NULL, '1665409586_ConformTicket.pdf', '1', '2022-10-10 13:46:08', '2022-10-10 13:46:27', '2022-10-10', NULL),
(2, '000002/SCL/2022', 2, 'Membership_2', '2', 43, 'Zenaida', 'Jaquelyn Barker', 'Barr', 'Rerum debitis optio sed laborum quia dolore ad facere vitae', 'Reprehenderit et culpa elit aliqua Id labore velit enim laboriosam veritatis rerum in distinctio Perspiciatis Nam excepteur sed excepteur', 'Pariatur Et voluptatem Id quam quia suscipit id', '1999-02-08', 9909913483, 'vikash.kumar@nascentinfo.com', '1665409898_shreenathaji.jpg', '1665409898_images.jpeg', 'Aadhar Card', '1665409898_membershipform.pdf', '3', 1, NULL, NULL, NULL, NULL, '1676466299_sample.pdf', '1', '2022-10-10 13:51:38', '2023-02-15 13:04:59', '2023-02-15', NULL),
(3, '000003/SCL/2022', 3, 'Membership_3', '2', 43, 'ankur', 'k', 'Doshi', 'G206', 'dfg', 'dfgdf', '2011-09-06', 9909913483, 'ankur.doshi@nascentinfo.com', '1665481416_images.jpeg', '1665481416_shreenathaji.jpg', 'Election Card', '1665481416_membershipform.pdf', '2', 3, 'test', 'it ullam non ut unde veniam harum vero cumque ex assumenda impedit consequat Vero corrupti enim porro', 'it ullam non ut unde veniam harum vero cumque ex assumenda impedit consequat Vero corrupti enim porro', 'it ullam non ut unde veniam harum vero cumque ex assumenda impedit consequat Vero corrupti enim porro', '1676466227_sample.pdf', '1', '2022-10-11 09:43:36', '2023-02-15 13:03:48', '2023-02-15', NULL),
(4, '000004/SCL/2023', 4, 'Membership_4', '2', 43, 'Richard', 'MacKensie Velazquez', 'Huffman', 'Incididunt quis magni minus corrupti explicabo Quis rerum assumenda vel voluptatem qui tempora maiores commodo perferendis incididunt', 'Atque lorem et enim pariatur Nostrud facilis numquam est eiusmod et do delectus temporibus aut in eum aut eiusmod mollit', 'Consequat Dolore voluptatem non et dolor voluptatem Eum sit sed quas incidunt aute', '2014-05-09', 5522222219, 'vikash.kumar@nascentinfo.com', '1672994808_error.PNG', '1672994808_lion.jpeg', 'Election Card', '1672994809_State_Central_Library.pdf', '4', 3, 'Laborum Et error omnis perferendis distinctio Eum dignissimos cupidatat cupiditate explicabo', 'Ipsam sed culpa laborum Voluptatem Excepteur voluptatum in', 'Dolor omnis repudiandae dolorem doloremque cupidatat illo cum debitis cumque maxime facilis corrupti esse', 'Aut est reiciendis quasi voluptas esse accusamus et sed exercitationem cumque aliqua Quidem rerum perspiciatis', '1676540518_eChallan_99913396170.pdf', '1', '2023-01-06 08:46:49', '2023-02-16 09:41:58', '2023-02-16', NULL),
(5, '000005/SCL/2023', 5, 'Membership_5', '2', 43, 'Aidan', 'Gary Swanson', 'Glover', 'Dignissimos vero voluptatibus aut occaecat dignissimos consequuntur', 'Eiusmod aut ipsa ut dolore aperiam', 'Voluptatibus neque recusandae Velit vero', '1999-08-04', 3152222220, 'vikash.kumar@nascentinfo.com', '1672994863_error.PNG', '1672994863_error.PNG', 'Election Card', '1672994863_State_Central_Library.pdf', '2', 2, 'Ut qui sit necessitatibus est dolorem dignissimos a recusandae Iusto voluptate', 'Esse nostrum veritatis dolor aliquid ex blanditiis soluta laboris dolor dolor ut', 'Quas saepe occaecat rerum nesciunt officia optio voluptas laborum reprehenderit cupiditate nisi ut', 'Labore numquam aut enim similique beatae saepe quasi sit ad', '1672994915_State_Central_Library.pdf', '1', '2023-01-06 08:47:43', '2023-01-06 08:48:35', '2023-01-06', NULL),
(6, '000006/SCL/2023', 6, 'Membership_6', '1', NULL, 'Cheyenne', 'Charlotte Burch', 'Drake', 'A amet eveniet officiis tenetur anim aut omnis sit veniam modi at modi recusandae Sed reiciendis', 'Ut ut est aute veniam porro ut elit consequatur sit ut exercitation hic eos quisquam expedita enim quod', 'Dolores sint neque commodo consequatur officia recusandae Aut in quas explicabo', '1975-01-23', 8082222223, 'vikash.kumar@nascentinfo.com', '1673004825_error.PNG', '1673004825_error.PNG', 'Driving Licence', '1673004825_dummy.pdf', '2', 2, 'Similique et elit sit quas commodo dolore eu tenetur voluptas', 'Proident ea quam excepteur dolore est dolor in quibusdam est', 'In exercitationem ipsa illum voluptate pariatur Maiores voluptates ut ut error', 'Ratione esse iste quod enim et sint', NULL, '0', '2023-01-06 11:33:45', '2023-01-06 11:33:45', NULL, NULL),
(7, '000007/SCL/2023', 7, 'Membership_7', '2', 43, 'Raya', 'Chiquita Gamble', 'Miller', 'Tempor dolores deserunt magna sit maiores est', 'Omnis enim pariatur Illum quia earum minus anim', 'Nulla irure aut voluptatem Mollitia voluptatum', '2010-12-20', 5632222222, 'vikash.kumar@nascentinfo.com', '1673004912_error.PNG', '1673004912_error.PNG', 'Aadhar Card', '1673004913_membershipformpdf.pdf', '1', 2, 'Quia eiusmod sint dolore voluptatibus ad adipisci laboriosam voluptas aliqua Velit fuga Quia lorem molestiae', 'Magni mollitia minima necessitatibus velit sed aut aut ipsa quas maxime est nisi voluptas', 'Voluptas commodi officiis culpa consequatur', 'Pariatur Omnis nobis eaque nihil officiis amet adipisci et sit cupiditate ad dolore debitis dolorem', '1676541876_sample.pdf', '1', '2023-01-06 11:35:13', '2023-02-16 10:04:37', '2023-02-16', NULL),
(8, '000008/SCL/2023', 8, 'Membership_8', '1', 19, 'Jorden', 'Zia Edwards', 'Walters', 'Ducimus amet aut veniam laborum Sed odit saepe accusamus magnam qui molestiae anim alias illum fugiat blanditiis maiores dolorum', 'Culpa dolorem numquam eum eiusmod in et praesentium culpa nulla ex inventore iure amet corporis rem elit quae qui earum', 'Obcaecati distinctio Earum quam asperiores magnam et quod possimus consequatur Officia velit commodo', '1957-02-04', 3093333332, 'vikash.kumar@nascentinfo.com', '1674196053_error.PNG', '1674196053_error.PNG', 'Aadhar Card', '1674196053_dummy.pdf', '4', 2, 'Praesentium in nulla quae aliquam rerum magni voluptatem Commodi ut est voluptatibus earum similique ut magna', 'Ut ad sed ea laboriosam do voluptatibus fugit et explicabo', 'Natus minus sit quis aspernatur autem qui sed mollitia', 'Perspiciatis deserunt minus dolorum et voluptatem eligendi omnis quibusdam officiis eligendi fugit est est laborum nemo officia', NULL, '0', '2023-01-20 06:27:33', '2023-01-20 06:27:33', NULL, NULL),
(9, '000009/SCL/2023', 9, 'Membership_9', '2', 43, 'Kylynn', 'Sebastian Carey', 'Ramos', 'Numquam ea sed qui commodo eos', 'Tempora fuga Dolorem est temporibus aliquip nisi reiciendis numquam perspiciatis animi quia eiusmod ullamco culpa eu beatae', 'Id labore voluptatem Alias in nemo quam aliqua Quae nulla rerum et sit velit blanditiis omnis excepturi alias autem', '1962-08-04', 2692222221, 'vikash.kumar@nascentinfo.com', '1676455100_Screenshot_from_2022-11-24_10-52-43.png', '1676455100_Screenshot_from_2022-11-24_10-52-43.png', 'Election Card', '1676455100_sample.pdf', '4', 1, 'Veritatis non quo qui incidunt dolor', 'Necessitatibus omnis quam enim ex quod doloribus obcaecati', 'Nihil veniam esse distinctio Dolorem occaecat doloribus odit error necessitatibus repellendus Eum nihil qui aspernatur aut ab dicta', 'Perspiciatis est id neque ducimus placeat modi', '1676526349_sample.pdf', '1', '2023-02-15 09:58:20', '2023-02-16 05:45:50', '2023-02-16', NULL),
(10, '000010/SCL/2023', 10, 'Membership_10', '2', 43, 'Vikash Kumar', 'Dipu', 'Yadav', 'dfggggggg', 'fhghfg', 'fghgfh', '2022-02-03', 8888888888, 'vikash.kumar@nascentinfo.com', '1676456141_Screenshot_from_2022-09-07_12-55-36.png', '1676456141_Screenshot_from_2022-07-20_14-48-02.png', 'Election Card', '1676456141_sample.pdf', '1', 2, 'fggggggggggggggggg', 'ghhhhhhhhh', 'ghhhhhhhhh', 'gfffff', '1676543041_317_(1).pdf', '1', '2023-02-15 10:15:41', '2023-02-16 10:24:01', '2023-02-16', NULL),
(11, '000011/SCL/2023', 11, 'Membership_11', '2', 43, 'Winifred', 'Colette Collins', 'Sharpe', 'Quia totam laboriosam aliquid sunt facilis et cum qui sint ea ut', 'Quo suscipit temporibus nemo sunt aut impedit doloribus minima saepe dolores ipsum velit incididunt repellendus Consequat Vel nobis esse voluptatem', 'Est nulla sapiente reprehenderit rerum sapiente ad dolorum aut velit eaque quos doloremque rerum nulla et sit dolore alias ipsam', '2013-08-23', 5802222222, 'vikash.kumar@nascentinfo.com', '1676460260_Screenshot_from_2022-09-28_12-04-30.png', '1676460260_Screenshot_from_2022-11-04_13-08-20.png', 'Driving Licence', '1676460260_sample.pdf', '2', 3, 'Necessitatibus blanditiis veritatis vel voluptatibus voluptatem culpa veniam aut alias reiciendis aliquam quod voluptatem', 'Rerum deserunt iure sed doloribus cumque vero ipsum rerum irure eligendi aliquam', 'Autem rerum mollitia amet veniam aliquid ratione sint ex quasi nisi dolore qui neque vel voluptas placeat', 'Mollit nihil expedita eiusmod aut nulla illo voluptas ut aut totam quis voluptatem repudiandae illo quod', '1676542869_sample.pdf', '1', '2023-02-15 11:24:20', '2023-02-16 10:21:09', '2023-02-16', NULL),
(12, '000012/SCL/2023', 12, 'Membership_12', '2', 43, 'Fletcher', 'Naomi Finley', 'Jones', 'Suscipit laboriosam animi aliqua Dolor harum ut porro exercitation aute deserunt blanditiis mollitia deserunt', 'Voluptatem placeat praesentium eos ipsum non cillum harum tempor ullam aut iusto tempore', 'Iusto consequat Qui molestiae aspernatur nesciunt eum ipsum magnam non', '2016-04-22', 9145555552, 'vikash.kumar@nascentinfo.com', '1676540433_shreenathaji_(1).jpg', '1676540443_Tripadvisor.jpg', 'Driving Licence', '1676540444_matterthatmemberticketislost.pdf', '3', 2, '', '', '', '', '1677674657_sample.pdf', '1', '2023-02-16 09:40:44', '2023-03-01 12:44:17', '2023-03-01', NULL),
(14, '000013/SCL/2023', 13, 'Membership_13', '2', 43, 'Rajah', 'Kennedy Raymond', 'Mcclure', 'Ducimus necessitatibus ut aliquip sunt exercitation nihil', 'Qui autem consequatur architecto voluptatem dolor sunt provident optio', 'Amet nisi qui velit itaque sed sit voluptate vel error repellendus Omnis laudantium', '2022-01-25', 9909913482, 'vikash.kumar@nascentinfo.com', '1676545511_shreenathaji.jpg', '1676545511_images.jpeg', 'Election Card', '1676545511_membershipform.pdf', '3', 1, NULL, NULL, NULL, NULL, '1679903904_membershipform.pdf', '1', '2023-02-16 11:05:11', '2023-03-27 07:58:24', '2023-03-27', NULL),
(15, '000014/SCL/2023', 14, 'Membership_14', '1', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'ankur.doshi@nascentinfo.com', '1677668749_shreenathaji.jpg', '1677668749_krishna.jpg', 'Aadhar Card', '1677668749_ConformTicket.pdf', 'Nonbillable', 2, 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'Nothing', NULL, '0', '2023-03-01 11:05:49', '2023-03-01 11:05:49', NULL, NULL),
(16, '000015/SCL/2023', 15, 'Membership_15', '1', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'ankur.doshi@nascentinfo.com', '1677668805_shreenathaji.jpg', '1677668805_krishna.jpg', 'Pancard', '1677668805_ConformTicket.pdf', 'Nonbillable', 2, 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'Nothing', NULL, '0', '2023-03-01 11:06:45', '2023-03-01 11:06:45', NULL, NULL),
(17, '000016/SCL/2023', 16, 'Membership_16', '1', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'ankur.doshi@nascentinfo.com', '1677668892_shreenathaji.jpg', '1677668892_krishna.jpg', 'Pancard', '1677668892_ConformTicket.pdf', 'Nonbillable', 2, 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'Nothing', NULL, '0', '2023-03-01 11:08:12', '2023-03-01 11:08:12', NULL, NULL),
(18, '000017/SCL/2023', 17, 'Membership_17', '2', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'ankur.doshi@nascentinfo.com', '1677668934_shreenathaji.jpg', '1677668934_krishna.jpg', 'Pancard', '1677668934_ConformTicket.pdf', 'Nonbillable', 2, 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'Nothing', '1677675256_ConformTicket.pdf', '1', '2023-03-01 11:08:55', '2023-03-01 12:54:16', '2023-03-01', NULL),
(20, '000018/SCL/2023', 18, 'Membership_18', '2', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'ankur.doshi@nascentinfo.com', '1677674904_shreenathaji.jpg', '1677674904_krishna.jpg', 'Pancard', '1677674904_ConformTicket.pdf', '1', 2, 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'Nothing', '1679546231_dummy.pdf', '1', '2023-03-01 12:48:24', '2023-03-23 04:37:11', '2023-03-23', NULL),
(21, '000019/SCL/2023', 19, 'Membership_19', '8', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'vikash.kumar@nascentinfo.com', '1677675417_shreenathaji.jpg', '1677675417_krishna.jpg', 'Aadhar Card', '1677675417_ConformTicket.pdf', '1', 2, 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'Nothing', '1680247954_membershipform.pdf', '1', '2023-03-01 12:56:57', '2023-04-03 10:17:41', '2023-03-31', NULL),
(22, '000020/SCL/2023', 20, 'Membership_20', '5', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'ankur.doshi@nascentinfo.com', '1677676826_shreenathaji.jpg', '1677676826_krishna.jpg', 'Pancard', '1677676826_ConformTicket.pdf', '1', 2, 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'Nothing', '1677678754_State_Central_Library1.pdf', '1', '2023-03-01 13:20:26', '2023-03-02 07:21:12', '2023-03-01', NULL),
(23, '000021/SCL/2023', 21, 'Membership_21', '1', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'ankur.doshi@nascentinfo.com', '1678109774_shreenathaji.jpg', '1678109774_krishna.jpg', 'Pancard', '1678109774_ConformTicket.pdf', '1', 2, 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'Nothing', NULL, '0', '2023-03-06 13:36:14', '2023-03-06 13:36:14', NULL, NULL),
(24, '000022/SCL/2023', 22, 'Membership_22', '1', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'doshi.anur9@gmail.com', '1678109826_shreenathaji.jpg', '1678109826_krishna.jpg', 'Pancard', '1678109826_ConformTicket.pdf', '1', 2, 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'Nothing', NULL, '0', '2023-03-06 13:37:06', '2023-03-06 13:37:06', NULL, NULL),
(25, '000023/SCL/2023', 23, 'Membership_23', '1', 43, 'Regan', 'Eagan Murphy', 'Herman', 'Laboris non et ullam atque nihil aut rerum nulla in ut id eos dolore voluptatem ipsum quae rerum in', 'Anim officiis dolore ut magni veniam repudiandae et atque saepe vero Nam laboris id', 'Nisi quam dolor laudantium qui quia minim ducimus rerum repudiandae iure mollitia aut iure velit', '2009-01-24', 9999999999, 'vikash.kumar@nascentinfo.com', '1679466591_shreenathaji.jpg', '1679466591_images.jpeg', 'Election Card', '1679466591_membershipform.pdf', '3', 4, NULL, NULL, NULL, NULL, NULL, '0', '2023-03-22 06:29:51', '2023-03-22 06:29:51', NULL, NULL),
(26, '000024/SCL/2023', 24, 'Membership_24', '1', 43, 'Baxter', 'Anika Blackburn', 'Houston', 'Voluptas qui ea et id recusandae Laboris sunt fugiat', 'Doloribus dignissimos atque omnis neque deleniti nostrum consequatur sit dolores eius perferendis enim enim dolorum libero tempore quas', 'Quos proident qui sit illo eveniet ullamco accusantium in ut', '1957-08-17', 9909913483, 'vikash.kumar@nascentinfo.com', '1679467712_shreenathaji.jpg', '1679467712_images.jpeg', 'Aadhar Card', '1679467712_membershipform.pdf', '3', 3, NULL, NULL, NULL, NULL, NULL, '0', '2023-03-22 06:48:32', '2023-03-22 06:48:32', NULL, NULL),
(27, '000025/SCL/2023', 25, 'Membership_25', '2', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'doshi.anur9@gmail.com', '1679468136_shreenathaji.jpg', '1679468136_krishna.jpg', 'Pancard', '1679468137_ConformTicket.pdf', '1', 2, 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'Nothing', '1679903916_membershipform.pdf', '1', '2023-03-22 06:55:37', '2023-03-27 07:58:36', '2023-03-27', NULL),
(28, '000026/SCL/2023', 26, 'Membership_26', '1', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'doshi.anur9@gmail.com', '1679468328_shreenathaji.jpg', '1679468328_krishna.jpg', 'Pancard', '1679468328_ConformTicket.pdf', '1', 2, 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'Nothing', NULL, '0', '2023-03-22 06:58:49', '2023-03-22 06:58:49', NULL, NULL),
(29, '000027/SCL/2023', 27, 'Membership_27', '1', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'doshi.anur9@gmail.com', '1679468374_shreenathaji.jpg', '1679468374_krishna.jpg', 'Pancard', '1679468374_ConformTicket.pdf', '1', 2, 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'Nothing', NULL, '0', '2023-03-22 06:59:34', '2023-03-22 06:59:34', NULL, NULL),
(30, '000028/SCL/2023', 28, 'Membership_28', '2', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'doshi.anur9@gmail.com', '1679468376_shreenathaji.jpg', '1679468376_krishna.jpg', 'Pancard', '1679468377_ConformTicket.pdf', '1', 2, 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'Nothing', '1679903943_membershipform.pdf', '1', '2023-03-22 06:59:37', '2023-03-27 07:59:03', '2023-03-27', NULL),
(31, '000029/SCL/2023', 29, 'Membership_29', '1', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'doshi.anur9@gmail.com', '1679470428_shreenathaji.jpg', '1679470428_krishna.jpg', 'Pancard', '1679470428_ConformTicket.pdf', '1', 2, 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'Nothing', NULL, '0', '2023-03-22 07:33:48', '2023-03-22 07:33:48', NULL, NULL),
(32, '000030/SCL/2023', 30, 'Membership_30', '4', 43, 'ankur', 'Tatiana Garrison', 'Salinas', 'Doloremque molestiae molestiae animi aut animi et rerum dignissimos quisquam nulla aliqua Labore ratione necessitatibus magni unde quia error', 'Excepturi voluptas aliqua Repellendus Veniam odio et qui aut voluptate Nam neque et consequat Ipsum', 'Perferendis omnis sunt est maxime quae non ipsa voluptatem sunt quisquam amet Nam esse ipsum explicabo Aliquid illum consequatur', '2006-08-05', 9909913483, 'vikash.kumar@nascentinfo.com', '1679471081_shreenathaji.jpg', '1679471081_krishna.jpg', 'Election Card', '1679471081_ConformTicket.pdf', '3', 2, '', '', '', '', NULL, '0', '2023-03-22 07:44:42', '2023-03-22 09:53:40', NULL, NULL),
(33, '000031/SCL/2023', 31, 'Membership_31', '3', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'doshi.anur9@gmail.com', '1679471178_shreenathaji.jpg', '1679471178_krishna.jpg', 'Pancard', '1679471178_ConformTicket.pdf', '1', 2, 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'Nothing', '1680247666_rary_final23.pdf', '1', '2023-03-22 07:46:18', '2023-03-31 07:28:20', '2023-03-31', NULL),
(34, '000032/SCL/2023', 32, 'Membership_32', '7', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'vikash.kumar@nascentinfo.com', '1679481854_shreenathaji.jpg', '1679481854_krishna_image.jpg', 'Aadhar Card', '1679481854_matterthatmemberticketislost.pdf', '3', 2, '', '', '', '', '1679477358_StateCentralLibrary22.pdf', '1', '2023-03-22 07:47:45', '2023-03-22 10:48:04', '2023-03-22', '2023-03-22'),
(35, '000033/SCL/2023', 33, 'Membership_33', '1', 43, 'Keely', 'Madonna Britt', 'Keith', 'Saepe nihil non aliqua A voluptatibus saepe ex atque nobis elit necessitatibus optio eum omnis', 'Et ex voluptate nobis hic repudiandae', 'Laborum Repudiandae aliquam cupidatat rem temporibus sequi', '1970-05-08', 7415555554, 'vikash.kumar@nascentinfo.com', '1679545837_Aha_Logo.png', '1679545837_desktop.jpeg', 'Aadhar Card', '1679545837_ANNEX-881056296401960.pdf', '3', 1, NULL, NULL, NULL, NULL, NULL, '0', '2023-03-23 04:30:37', '2023-03-23 04:30:37', NULL, NULL),
(36, '000034/SCL/2023', 34, 'Membership_34', '4', 43, 'Tad', 'Heather Meyer', 'Mercer', 'Excepteur aliqua Sunt quis optio nemo temporibus', 'Reiciendis corporis sunt error occaecat qui architecto nemo voluptas sint minus nulla autem qui minima a', 'Qui in hic excepturi est totam modi iste a ullamco quibusdam autem cum', '1965-05-22', 6194444444, 'vikash.kumar@nascentinfo.com', '1679546014_Aha_Logo.png', '1679546014_CTP_Response_Error.png', 'Election Card', '1679546014_dummy.pdf', '3', 1, '', '', '', '', '1680246601_State_Central_Library.pdf', '1', '2023-03-23 04:33:34', '2023-03-31 07:11:21', '2023-03-31', NULL),
(37, '000035/SCL/2023', 35, 'Membership_35', '4', 43, 'Blaze', 'Anthony Leach', 'Chang', 'Ex iusto voluptate aut vitae in anim reiciendis odio aute libero non sint tempore dignissimos dolorem lorem elit aliquip fugiat', 'Error voluptates in numquam qui proident', 'Ducimus aliqua Laboriosam irure dicta laborum', '2008-01-07', 9782222222, 'vikash.kumar@nascentinfo.com', '1679547026_CTP_Response_Error.png', '1679547026_Aha_Logo.png', 'Election Card', '1679547027_dummy.pdf', '3', 4, '', '', '', '', '1680246251_rary_final23.pdf', '1', '2023-03-23 04:50:27', '2023-03-31 07:07:59', '2023-03-31', NULL),
(38, '000036/SCL/2023', 36, 'Membership_36', '4', 43, 'Geraldine', 'Jerome Fields', 'Hobbs', 'Adipisicing exercitation id cum est commodo sapiente dolor placeat asperiores asperiores optio voluptas sit voluptate rerum magna dolores fugiat', 'Aliquip vitae ex dolore sapiente commodi nulla eos sint sint recusandae Exercitation libero quia qui temporibus', 'Vel excepturi ipsam asperiores id tempore et similique consequatur voluptas', '2003-11-23', 7774444444, 'vikash.kumar@nascentinfo.com', '1679552985_ticket2.jpg', '1679547672_Aha_Logo.png', 'Election Card', '1679547672_ANNEX-881056296401960.pdf', '3', 3, '', '', '', '', '1679552936_PremiumPaidStatement_2022-2023_.pdf', '1', '2023-03-23 05:01:12', '2023-03-23 06:58:53', '2023-03-23', NULL),
(39, '000037/SCL/2023', 37, 'Membership_37', '4', 43, 'McKenzie', 'Mechelle Lowe', 'Francis', 'Dolorum vero doloribus blanditiis tempor do velit culpa', 'Libero quia sed quaerat quis fuga Quas nisi sit velit', 'Numquam quia voluptatem officia et architecto minim aut voluptatem dolorem voluptas', '1972-10-21', 5345555555, 'vikash.kumar@nascentinfo.com', '1679552621_tickit1.jpg', '1679548669_Aha_Logo.png', 'Election Card', '1679548669_ANNEX-881056296401960.pdf', '4', 4, 'Similique nisi maiores tempora anim deserunt ex maiores at in animi repellendus Sed', 'Quas non beatae ab dolor omnis aut aliquip perferendis velit laboriosam', 'Quas non beatae ab dolor omnis aut aliquip perferendis velit laboriosam', 'Qui aut saepe et dolores cumque rerum ipsum in culpa maxime eveniet aut ipsum ipsa doloremque qui', '1679549712_membershipform.pdf', '1', '2023-03-23 05:17:49', '2023-03-23 06:23:41', '2023-03-23', NULL),
(40, '000038/SCL/2023', 38, 'Membership_38', '7', 43, 'Hakeem', 'Georgia Dickson', 'Hensley', 'Voluptas enim officiis dolorem est sed a cum', 'Excepteur quia est quam neque quia earum et aut nulla optio', 'Dolorem minim earum earum in aliquip ea', '1968-02-06', 1501111111, 'vikash.kumar@nascentinfo.com', '1679549414_images_0.jpg', '1679549451_images_0.jpg', 'Driving Licence', '1679549455_membershipform.pdf', '3', 3, '', '', '', '', '1679549522_membershipform.pdf', '1', '2023-03-23 05:31:01', '2023-03-23 05:34:26', '2023-03-23', '2023-03-23'),
(41, '000039/SCL/2023', 39, 'Membership_39', '2', 43, 'Lacota', 'Neve Chan', 'Mccoy', 'Est itaque et accusantium id rerum sed veniam omnis eos et eiusmod sunt vitae', 'Pariatur Doloremque error sit amet irure non temporibus quis', 'Aliquip quis aut impedit alias est delectus nihil obcaecati sit accusantium', '1966-04-04', 9655555555, 'vikash.kumar@nascentinfo.com', '1679553750_Aha_Logo.png', '1679553750_Aha_Logo.png', 'Aadhar Card', '1679553750_ANNEX-881056296401960.pdf', '4', 1, 'Voluptatem consequatur cupiditate nihil quas officia totam amet adipisci ut sit quia excepturi possimus odio molestias minim omnis', 'Ex labore velit sed quasi in elit sed fugiat ut reprehenderit voluptate sed ipsa voluptatem Pariatur', 'Hic alias sit provident accusantium eveniet ad ea dolorem harum elit iste rerum', 'Quia voluptas commodo in voluptatum odit laborum Aut nostrum adipisci numquam tenetur non enim doloribus beatae', '1679553771_ANNEX-881056296401960.pdf', '1', '2023-03-23 06:42:31', '2023-03-23 06:42:51', '2023-03-23', NULL),
(42, '000040/SCL/2023', 40, 'Membership_40', '2', 43, 'Julian', 'Cathleen Chang', 'Carver', 'Deserunt qui quia ut ducimus tenetur ullamco ipsam quidem et pariatur Quod modi qui illum culpa totam magna laborum', 'Cillum mollitia sed neque sint et placeat velit duis ipsa nulla ad ut cillum eos perspiciatis quod', 'Maxime possimus omnis tempor earum officiis', '1970-02-12', 9909913483, 'vikash.kumar@nascentinfo.com', '1679901785_shreenathaji.jpg', '1679901785_images.jpeg', 'Driving Licence', '1679901785_StateCentralLibrary22.pdf', '3', 3, NULL, NULL, NULL, NULL, '1679903978_membershipform.pdf', '1', '2023-03-27 07:23:05', '2023-03-27 07:59:39', '2023-03-27', NULL),
(43, '000041/SCL/2023', 41, 'Membership_41', '5', 43, 'Cheryl ssf', 'Latifah Oneil', 'Wise', 'Doloribus ratione dolor nobis adipisicing aut eveniet', 'Ullamco alias consectetur aut anim quis modi ipsa est dolores dolor dolor dolor minim eos', 'Delectus aut est anim sed dolor ut fugit quibusdam eius ea quas sit ut ab aut laborum', '2002-04-27', 9909912478, 'vikash.kumar@nascentinfo.com', '1680245776_shreenathaji.jpg', '1680245776_images.jpeg', 'Aadhar Card', '1680245776_ConformTicket.pdf', '3', 2, '', '', '', '', '1680246030_State24.pdf', '1', '2023-03-31 06:56:16', '2023-03-31 07:00:47', '2023-03-31', NULL),
(44, '000042/SCL/2023', 42, 'Membership_42', '7', 43, 'Nell', 'Jordan Morse', 'Hopper', 'Sed dolor libero rem quis consequuntur enim esse', 'Velit sunt eius irure est dolor in nostrud magni aperiam sed dolor ratione dolorem aut impedit expedita cillum sed', 'Enim illum totam impedit atque in consectetur repellendus Nisi non consectetur aliquid', '2000-02-25', 9909913483, 'vikash.kumar@nascentinfo.com', '1680248092_shreenathaji.jpg', '1680248092_krishna.jpg', 'Aadhar Card', '1680248092_membershipform.pdf', '3', 2, '', '', '', '', '1680249559_membershipformpdf.pdf', '1', '2023-03-31 07:34:52', '2023-03-31 14:19:03', '2023-03-31', '2023-03-31'),
(45, '000043/SCL/2023', 43, 'Membership_43', '7', 43, 'Ethan', 'Oleg Valenzuela', 'Burris', 'Laudantium natus enim error labore sed quis', 'Adipisci qui rerum qui commodi nesciunt in nisi ut', 'Inventore corporis enim facilis excepteur adipisci quos', '1955-02-08', 9909913483, 'vikash.kumar@nascentinfo.com', '1680271485_shreenathaji.jpg', '1680271485_images.jpeg', 'Aadhar Card', '1680271486_membershipform.pdf', '2', 1, 'Quisquam ullamco est ullamco aspernatur voluptate aperiam perferendis', 'Ea magni in saepe harum tenetur aut voluptate aspernatur est incidunt atque rerum magni quod excepteur dolore sed', 'Enim dolore est non vel pariatur Dolor aute aut ut explicabo Dolores doloremque cum ut magnam', 'Eius nisi quam duis in sit ullam vel ut dolor accusantium esse adipisci mollitia totam necessitatibus lorem ea', '1680271531_membershipform.pdf', '1', '2023-03-31 14:04:46', '2023-03-31 14:16:52', '2023-03-31', '2023-03-31'),
(46, '000044/SCL/2023', 44, 'Membership_44', '7', 43, 'Jordan', 'Gillian Lindsey', 'Vinson', 'Veniam voluptatum ducimus sit doloribus velit', 'Molestias distinctio Amet amet aperiam reprehenderit velit quia voluptatem molestiae ullam dolor possimus aut magni', 'Vel pariatur Minus animi aperiam officia aut inventore laboris accusantium blanditiis ullam qui et nulla explicabo Magna cillum', '1984-09-20', 9909913483, 'vikash.kumar@nascentinfo.com', '1680525217_shreenathaji.jpg', '1680525217_images.jpeg', 'Election Card', '1680525217_ConformTicket.pdf', '2', 2, 'Rem quisquam praesentium dolores quibusdam qui', 'At fugiat dolorem beatae in in exercitation eiusmod cum officiis est molestiae nisi perferendis', 'At fugiat dolorem beatae in in exercitation eiusmod cum officiis est molestiae nisi perferendis', 'Ut praesentium eu illum ea sed voluptatem quo architecto tempore rerum consectetur ex sed iusto distinctio Veritatis', '1680525365_StateCentralLibrary04.pdf', '1', '2023-04-03 12:33:37', '2023-04-03 12:37:45', '2023-04-03', '2023-04-03'),
(47, '000045/SCL/2023', 45, 'Membership_45', '7', 43, 'Jamalia', 'Aiko Donaldson', 'Aguilar', 'Hic optio eum nemo praesentium consequatur Voluptatem reprehenderit est odio qui sint', 'Tempor nostrum deserunt laborum velit', 'Quas qui enim quo eos lorem soluta in quis sed in fuga Beatae enim sapiente qui cum doloremque rerum', '1971-07-25', 9909913468, 'vikash.kumar@nascentinfo.com', '1680526036_shreenathaji.jpg', '1680526036_krishna.jpg', 'Election Card', '1680526036_StateCentralLibrary04.pdf', '1', 3, 'Non quia qui aliquid molestiae aut', 'Ut qui quam qui ullamco labore id lorem non harum', 'Ipsum qui velit dolore et cum est in ut commodi non assumenda provident placeat dolorem consectetur et et minim', 'Esse ipsa voluptate sapiente voluptatem Tempor sit fugiat facere omnis exercitation', '1680526079_StateCentralLibrary04.pdf', '1', '2023-04-03 12:47:16', '2023-04-03 12:48:48', '2023-04-03', '2023-04-03'),
(48, '000046/SCL/2023', 46, 'Membership_46', '1', 43, 'Ifeoma', 'Austin Elliott', 'Bowen', 'Esse ipsam saepe iusto voluptate aut', 'Sed laboriosam necessitatibus saepe voluptas quaerat nisi nulla optio voluptatem ad eiusmod quo libero consectetur labore', 'Labore incidunt voluptatum consequat Voluptates iure tempor doloremque nulla', '2006-10-15', 8888888888, 'vikash.kumar@nascentinfo.com', '1680759299_desktop.jpeg', '1680759299_down_arrow.png', 'Aadhar Card', '1680759300_dummy.pdf', '2', 4, 'Nihil sunt enim ut veniam ea aut aliquam itaque nostrud voluptas lorem consequat Similique', 'Ullamco illo laboris quia in exercitationem qui harum reiciendis et odit tempora incidunt cupidatat libero labore velit quia', 'Sunt consequat Quia inventore sint beatae id enim dolore delectus vitae commodo et expedita obcaecati blanditiis totam aliquam', 'Consequatur Sit alias ullamco laudantium dolorum quo quam', NULL, '0', '2023-04-06 05:35:00', '2023-04-06 05:35:00', NULL, NULL),
(49, '000047/SCL/2023', 47, 'Membership_47', '1', 43, 'Martina', 'Mufutau Woodard', 'Tucker', 'Aute aspernatur nulla provident earum debitis eaque dolores est fugiat sit', 'Velit suscipit est et pariatur Odit', 'Repudiandae voluptatum consequuntur eius totam ea eos voluptatem commodo rem optio voluptatibus duis labore ratione deserunt distinctio', '2011-08-06', 5555555555, 'vikash.kumar@nascentinfo.com', '1680759308_down_arrow.png', '1680759309_CTP_Response_Error.png', 'Election Card', '1680759310_dummy.pdf', '2', 3, 'Neque cum voluptatum aspernatur nesciunt irure voluptatem Architecto aperiam quia quidem doloribus', 'Officiis impedit est aut eiusmod laboriosam suscipit et voluptatum sit enim accusamus modi enim maiores voluptas voluptatem Ea', 'Distinctio Deserunt laborum Qui sit labore et sed aut molestiae ducimus', 'Deserunt optio non aute quam lorem repudiandae a ut neque reprehenderit', NULL, '0', '2023-04-06 05:35:12', '2023-04-06 05:35:12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mst_membership1`
--

CREATE TABLE `mst_membership1` (
  `id` int(10) NOT NULL,
  `strMembershipID` text NOT NULL,
  `seq_id` int(10) DEFAULT '0',
  `strCouchdbID` varchar(255) NOT NULL,
  `enmApplicationStatus` enum('1','2','3','4','5','6','7','8') NOT NULL DEFAULT '1' COMMENT '1-Final Attachment Due,2-Your file inProcess,3-Query,4-Replied,5-Verify,6-Payment,7-Approved,8-Replied But Final Attachment Due',
  `intUserId` int(10) DEFAULT NULL,
  `strFirstName` varchar(255) NOT NULL,
  `strMiddleName` varchar(255) DEFAULT NULL,
  `strLastName` varchar(255) NOT NULL,
  `strCurrentAddress` text NOT NULL,
  `strPermantAddress` text NOT NULL,
  `strWorkAddress` text NOT NULL,
  `dtiDOB` date NOT NULL,
  `intPhoneNumber` bigint(10) NOT NULL,
  `strEmail` varchar(255) NOT NULL,
  `strPhoto` varchar(255) DEFAULT NULL,
  `strSigned` varchar(255) DEFAULT NULL,
  `strIDProofType` varchar(255) NOT NULL,
  `strIDProof` varchar(255) DEFAULT NULL,
  `strApplicationType` varchar(255) DEFAULT NULL,
  `intIssuingBook` int(10) NOT NULL,
  `strGuarantorCurrentAddress` text,
  `strGuarantorPermentAddress` text,
  `strGuarantorWorkAddress` text,
  `strGuarantiedDetails` text,
  `strFinalScan` varchar(255) DEFAULT NULL,
  `intAgree` enum('0','1') DEFAULT '0' COMMENT '0-Not Agree,1-Agree',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `dtiFinalSubmitDate` date DEFAULT NULL,
  `dtiApprovalDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_membership1`
--

INSERT INTO `mst_membership1` (`id`, `strMembershipID`, `seq_id`, `strCouchdbID`, `enmApplicationStatus`, `intUserId`, `strFirstName`, `strMiddleName`, `strLastName`, `strCurrentAddress`, `strPermantAddress`, `strWorkAddress`, `dtiDOB`, `intPhoneNumber`, `strEmail`, `strPhoto`, `strSigned`, `strIDProofType`, `strIDProof`, `strApplicationType`, `intIssuingBook`, `strGuarantorCurrentAddress`, `strGuarantorPermentAddress`, `strGuarantorWorkAddress`, `strGuarantiedDetails`, `strFinalScan`, `intAgree`, `created_at`, `updated_at`, `dtiFinalSubmitDate`, `dtiApprovalDate`) VALUES
(1, '00001/SCL/2022', 1, 'Membership_1', '2', 43, 'Zenaida', 'sdfsdfs', 'Barr', 'G-206,Karnavati Apartment3,, Maninagar', 'fger', 'eter', '2021-07-18', 9909913483, 'vikash.kumar@nascentinfo.com', '1665409567_images.jpeg', '1665409568_shreenathaji.jpg', 'Aadhar Card', '1665409568_membershipform_(1).pdf', '3', 1, NULL, NULL, NULL, NULL, '1665409586_ConformTicket.pdf', '1', '2022-10-10 13:46:08', '2022-10-10 13:46:27', '2022-10-10', NULL),
(2, '00002/SCL/2022', 2, 'Membership_2', '2', 43, 'Zenaida', 'Jaquelyn Barker', 'Barr', 'Rerum debitis optio sed laborum quia dolore ad facere vitae', 'Reprehenderit et culpa elit aliqua Id labore velit enim laboriosam veritatis rerum in distinctio Perspiciatis Nam excepteur sed excepteur', 'Pariatur Et voluptatem Id quam quia suscipit id', '1999-02-08', 9909913483, 'vikash.kumar@nascentinfo.com', '1665409898_shreenathaji.jpg', '1665409898_images.jpeg', 'Aadhar Card', '1665409898_membershipform.pdf', '3', 1, NULL, NULL, NULL, NULL, '1676466299_sample.pdf', '1', '2022-10-10 13:51:38', '2023-02-15 13:04:59', '2023-02-15', NULL),
(3, '00003/SCL/2022', 3, 'Membership_3', '2', 43, 'ankur', 'k', 'Doshi', 'G206', 'dfg', 'dfgdf', '2011-09-06', 9909913483, 'ankur.doshi@nascentinfo.com', '1665481416_images.jpeg', '1665481416_shreenathaji.jpg', 'Election Card', '1665481416_membershipform.pdf', '2', 3, 'test', 'it ullam non ut unde veniam harum vero cumque ex assumenda impedit consequat Vero corrupti enim porro', 'it ullam non ut unde veniam harum vero cumque ex assumenda impedit consequat Vero corrupti enim porro', 'it ullam non ut unde veniam harum vero cumque ex assumenda impedit consequat Vero corrupti enim porro', '1676466227_sample.pdf', '1', '2022-10-11 09:43:36', '2023-02-15 13:03:48', '2023-02-15', NULL),
(4, '00004/SCL/2023', 4, 'Membership_4', '2', 43, 'Richard', 'MacKensie Velazquez', 'Huffman', 'Incididunt quis magni minus corrupti explicabo Quis rerum assumenda vel voluptatem qui tempora maiores commodo perferendis incididunt', 'Atque lorem et enim pariatur Nostrud facilis numquam est eiusmod et do delectus temporibus aut in eum aut eiusmod mollit', 'Consequat Dolore voluptatem non et dolor voluptatem Eum sit sed quas incidunt aute', '2014-05-09', 5522222219, 'vikash.kumar@nascentinfo.com', '1672994808_error.PNG', '1672994808_lion.jpeg', 'Election Card', '1672994809_State_Central_Library.pdf', '4', 3, 'Laborum Et error omnis perferendis distinctio Eum dignissimos cupidatat cupiditate explicabo', 'Ipsam sed culpa laborum Voluptatem Excepteur voluptatum in', 'Dolor omnis repudiandae dolorem doloremque cupidatat illo cum debitis cumque maxime facilis corrupti esse', 'Aut est reiciendis quasi voluptas esse accusamus et sed exercitationem cumque aliqua Quidem rerum perspiciatis', '1676540518_eChallan_99913396170.pdf', '1', '2023-01-06 08:46:49', '2023-02-16 09:41:58', '2023-02-16', NULL),
(5, '00005/SCL/2023', 5, 'Membership_5', '2', 43, 'Aidan', 'Gary Swanson', 'Glover', 'Dignissimos vero voluptatibus aut occaecat dignissimos consequuntur', 'Eiusmod aut ipsa ut dolore aperiam', 'Voluptatibus neque recusandae Velit vero', '1999-08-04', 3152222220, 'vikash.kumar@nascentinfo.com', '1672994863_error.PNG', '1672994863_error.PNG', 'Election Card', '1672994863_State_Central_Library.pdf', '2', 2, 'Ut qui sit necessitatibus est dolorem dignissimos a recusandae Iusto voluptate', 'Esse nostrum veritatis dolor aliquid ex blanditiis soluta laboris dolor dolor ut', 'Quas saepe occaecat rerum nesciunt officia optio voluptas laborum reprehenderit cupiditate nisi ut', 'Labore numquam aut enim similique beatae saepe quasi sit ad', '1672994915_State_Central_Library.pdf', '1', '2023-01-06 08:47:43', '2023-01-06 08:48:35', '2023-01-06', NULL),
(6, '00006/SCL/2023', 6, 'Membership_6', '1', NULL, 'Cheyenne', 'Charlotte Burch', 'Drake', 'A amet eveniet officiis tenetur anim aut omnis sit veniam modi at modi recusandae Sed reiciendis', 'Ut ut est aute veniam porro ut elit consequatur sit ut exercitation hic eos quisquam expedita enim quod', 'Dolores sint neque commodo consequatur officia recusandae Aut in quas explicabo', '1975-01-23', 8082222223, 'vikash.kumar@nascentinfo.com', '1673004825_error.PNG', '1673004825_error.PNG', 'Driving Licence', '1673004825_dummy.pdf', '2', 2, 'Similique et elit sit quas commodo dolore eu tenetur voluptas', 'Proident ea quam excepteur dolore est dolor in quibusdam est', 'In exercitationem ipsa illum voluptate pariatur Maiores voluptates ut ut error', 'Ratione esse iste quod enim et sint', NULL, '0', '2023-01-06 11:33:45', '2023-01-06 11:33:45', NULL, NULL),
(7, '00007/SCL/2023', 7, 'Membership_7', '2', 43, 'Raya', 'Chiquita Gamble', 'Miller', 'Tempor dolores deserunt magna sit maiores est', 'Omnis enim pariatur Illum quia earum minus anim', 'Nulla irure aut voluptatem Mollitia voluptatum', '2010-12-20', 5632222222, 'vikash.kumar@nascentinfo.com', '1673004912_error.PNG', '1673004912_error.PNG', 'Aadhar Card', '1673004913_membershipformpdf.pdf', '1', 2, 'Quia eiusmod sint dolore voluptatibus ad adipisci laboriosam voluptas aliqua Velit fuga Quia lorem molestiae', 'Magni mollitia minima necessitatibus velit sed aut aut ipsa quas maxime est nisi voluptas', 'Voluptas commodi officiis culpa consequatur', 'Pariatur Omnis nobis eaque nihil officiis amet adipisci et sit cupiditate ad dolore debitis dolorem', '1676541876_sample.pdf', '1', '2023-01-06 11:35:13', '2023-02-16 10:04:37', '2023-02-16', NULL),
(8, '00008/SCL/2023', 8, 'Membership_8', '1', 19, 'Jorden', 'Zia Edwards', 'Walters', 'Ducimus amet aut veniam laborum Sed odit saepe accusamus magnam qui molestiae anim alias illum fugiat blanditiis maiores dolorum', 'Culpa dolorem numquam eum eiusmod in et praesentium culpa nulla ex inventore iure amet corporis rem elit quae qui earum', 'Obcaecati distinctio Earum quam asperiores magnam et quod possimus consequatur Officia velit commodo', '1957-02-04', 3093333332, 'vikash.kumar@nascentinfo.com', '1674196053_error.PNG', '1674196053_error.PNG', 'Aadhar Card', '1674196053_dummy.pdf', '4', 2, 'Praesentium in nulla quae aliquam rerum magni voluptatem Commodi ut est voluptatibus earum similique ut magna', 'Ut ad sed ea laboriosam do voluptatibus fugit et explicabo', 'Natus minus sit quis aspernatur autem qui sed mollitia', 'Perspiciatis deserunt minus dolorum et voluptatem eligendi omnis quibusdam officiis eligendi fugit est est laborum nemo officia', NULL, '0', '2023-01-20 06:27:33', '2023-01-20 06:27:33', NULL, NULL),
(9, '00009/SCL/2023', 9, 'Membership_9', '2', 43, 'Kylynn', 'Sebastian Carey', 'Ramos', 'Numquam ea sed qui commodo eos', 'Tempora fuga Dolorem est temporibus aliquip nisi reiciendis numquam perspiciatis animi quia eiusmod ullamco culpa eu beatae', 'Id labore voluptatem Alias in nemo quam aliqua Quae nulla rerum et sit velit blanditiis omnis excepturi alias autem', '1962-08-04', 2692222221, 'vikash.kumar@nascentinfo.com', '1676455100_Screenshot_from_2022-11-24_10-52-43.png', '1676455100_Screenshot_from_2022-11-24_10-52-43.png', 'Election Card', '1676455100_sample.pdf', '4', 1, 'Veritatis non quo qui incidunt dolor', 'Necessitatibus omnis quam enim ex quod doloribus obcaecati', 'Nihil veniam esse distinctio Dolorem occaecat doloribus odit error necessitatibus repellendus Eum nihil qui aspernatur aut ab dicta', 'Perspiciatis est id neque ducimus placeat modi', '1676526349_sample.pdf', '1', '2023-02-15 09:58:20', '2023-02-16 05:45:50', '2023-02-16', NULL),
(10, '00010/SCL/2023', 10, 'Membership_10', '2', 43, 'Vikash Kumar', 'Dipu', 'Yadav', 'dfggggggg', 'fhghfg', 'fghgfh', '2022-02-03', 8888888888, 'vikash.kumar@nascentinfo.com', '1676456141_Screenshot_from_2022-09-07_12-55-36.png', '1676456141_Screenshot_from_2022-07-20_14-48-02.png', 'Election Card', '1676456141_sample.pdf', '1', 2, 'fggggggggggggggggg', 'ghhhhhhhhh', 'ghhhhhhhhh', 'gfffff', '1676543041_317_(1).pdf', '1', '2023-02-15 10:15:41', '2023-02-16 10:24:01', '2023-02-16', NULL),
(11, '00011/SCL/2023', 11, 'Membership_11', '2', 43, 'Winifred', 'Colette Collins', 'Sharpe', 'Quia totam laboriosam aliquid sunt facilis et cum qui sint ea ut', 'Quo suscipit temporibus nemo sunt aut impedit doloribus minima saepe dolores ipsum velit incididunt repellendus Consequat Vel nobis esse voluptatem', 'Est nulla sapiente reprehenderit rerum sapiente ad dolorum aut velit eaque quos doloremque rerum nulla et sit dolore alias ipsam', '2013-08-23', 5802222222, 'vikash.kumar@nascentinfo.com', '1676460260_Screenshot_from_2022-09-28_12-04-30.png', '1676460260_Screenshot_from_2022-11-04_13-08-20.png', 'Driving Licence', '1676460260_sample.pdf', '2', 3, 'Necessitatibus blanditiis veritatis vel voluptatibus voluptatem culpa veniam aut alias reiciendis aliquam quod voluptatem', 'Rerum deserunt iure sed doloribus cumque vero ipsum rerum irure eligendi aliquam', 'Autem rerum mollitia amet veniam aliquid ratione sint ex quasi nisi dolore qui neque vel voluptas placeat', 'Mollit nihil expedita eiusmod aut nulla illo voluptas ut aut totam quis voluptatem repudiandae illo quod', '1676542869_sample.pdf', '1', '2023-02-15 11:24:20', '2023-02-16 10:21:09', '2023-02-16', NULL),
(12, '00012/SCL/2023', 12, 'Membership_12', '2', 43, 'Fletcher', 'Naomi Finley', 'Jones', 'Suscipit laboriosam animi aliqua Dolor harum ut porro exercitation aute deserunt blanditiis mollitia deserunt', 'Voluptatem placeat praesentium eos ipsum non cillum harum tempor ullam aut iusto tempore', 'Iusto consequat Qui molestiae aspernatur nesciunt eum ipsum magnam non', '2016-04-22', 9145555552, 'vikash.kumar@nascentinfo.com', '1676540433_shreenathaji_(1).jpg', '1676540443_Tripadvisor.jpg', 'Driving Licence', '1676540444_matterthatmemberticketislost.pdf', '3', 2, '', '', '', '', '1677674657_sample.pdf', '1', '2023-02-16 09:40:44', '2023-03-01 12:44:17', '2023-03-01', NULL),
(14, '00013/SCL/2023', 13, 'Membership_13', '2', 43, 'Rajah', 'Kennedy Raymond', 'Mcclure', 'Ducimus necessitatibus ut aliquip sunt exercitation nihil', 'Qui autem consequatur architecto voluptatem dolor sunt provident optio', 'Amet nisi qui velit itaque sed sit voluptate vel error repellendus Omnis laudantium', '2022-01-25', 9909913482, 'vikash.kumar@nascentinfo.com', '1676545511_shreenathaji.jpg', '1676545511_images.jpeg', 'Election Card', '1676545511_membershipform.pdf', '3', 1, NULL, NULL, NULL, NULL, '1679903904_membershipform.pdf', '1', '2023-02-16 11:05:11', '2023-03-27 07:58:24', '2023-03-27', NULL),
(15, '00014/SCL/2023', 14, 'Membership_14', '1', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'ankur.doshi@nascentinfo.com', '1677668749_shreenathaji.jpg', '1677668749_krishna.jpg', 'Aadhar Card', '1677668749_ConformTicket.pdf', 'Nonbillable', 2, 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'Nothing', NULL, '0', '2023-03-01 11:05:49', '2023-03-01 11:05:49', NULL, NULL),
(16, '00015/SCL/2023', 15, 'Membership_15', '1', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'ankur.doshi@nascentinfo.com', '1677668805_shreenathaji.jpg', '1677668805_krishna.jpg', 'Pancard', '1677668805_ConformTicket.pdf', 'Nonbillable', 2, 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'Nothing', NULL, '0', '2023-03-01 11:06:45', '2023-03-01 11:06:45', NULL, NULL),
(17, '00016/SCL/2023', 16, 'Membership_16', '1', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'ankur.doshi@nascentinfo.com', '1677668892_shreenathaji.jpg', '1677668892_krishna.jpg', 'Pancard', '1677668892_ConformTicket.pdf', 'Nonbillable', 2, 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'Nothing', NULL, '0', '2023-03-01 11:08:12', '2023-03-01 11:08:12', NULL, NULL),
(18, '00017/SCL/2023', 17, 'Membership_17', '2', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'ankur.doshi@nascentinfo.com', '1677668934_shreenathaji.jpg', '1677668934_krishna.jpg', 'Pancard', '1677668934_ConformTicket.pdf', 'Nonbillable', 2, 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'Nothing', '1677675256_ConformTicket.pdf', '1', '2023-03-01 11:08:55', '2023-03-01 12:54:16', '2023-03-01', NULL),
(20, '00018/SCL/2023', 18, 'Membership_18', '2', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'ankur.doshi@nascentinfo.com', '1677674904_shreenathaji.jpg', '1677674904_krishna.jpg', 'Pancard', '1677674904_ConformTicket.pdf', '1', 2, 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'Nothing', '1679546231_dummy.pdf', '1', '2023-03-01 12:48:24', '2023-03-23 04:37:11', '2023-03-23', NULL),
(21, '00019/SCL/2023', 19, 'Membership_19', '8', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'vikash.kumar@nascentinfo.com', '1677675417_shreenathaji.jpg', '1677675417_krishna.jpg', 'Aadhar Card', '1677675417_ConformTicket.pdf', '1', 2, 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'Nothing', '1680247954_membershipform.pdf', '1', '2023-03-01 12:56:57', '2023-04-03 10:17:41', '2023-03-31', NULL),
(22, '00020/SCL/2023', 20, 'Membership_20', '5', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'ankur.doshi@nascentinfo.com', '1677676826_shreenathaji.jpg', '1677676826_krishna.jpg', 'Pancard', '1677676826_ConformTicket.pdf', '1', 2, 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'Nothing', '1677678754_State_Central_Library1.pdf', '1', '2023-03-01 13:20:26', '2023-03-02 07:21:12', '2023-03-01', NULL),
(23, '00021/SCL/2023', 21, 'Membership_21', '1', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'ankur.doshi@nascentinfo.com', '1678109774_shreenathaji.jpg', '1678109774_krishna.jpg', 'Pancard', '1678109774_ConformTicket.pdf', '1', 2, 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'Nothing', NULL, '0', '2023-03-06 13:36:14', '2023-03-06 13:36:14', NULL, NULL),
(24, '00022/SCL/2023', 22, 'Membership_22', '1', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'doshi.anur9@gmail.com', '1678109826_shreenathaji.jpg', '1678109826_krishna.jpg', 'Pancard', '1678109826_ConformTicket.pdf', '1', 2, 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'Nothing', NULL, '0', '2023-03-06 13:37:06', '2023-03-06 13:37:06', NULL, NULL),
(25, '00023/SCL/2023', 23, 'Membership_23', '1', 43, 'Regan', 'Eagan Murphy', 'Herman', 'Laboris non et ullam atque nihil aut rerum nulla in ut id eos dolore voluptatem ipsum quae rerum in', 'Anim officiis dolore ut magni veniam repudiandae et atque saepe vero Nam laboris id', 'Nisi quam dolor laudantium qui quia minim ducimus rerum repudiandae iure mollitia aut iure velit', '2009-01-24', 9999999999, 'vikash.kumar@nascentinfo.com', '1679466591_shreenathaji.jpg', '1679466591_images.jpeg', 'Election Card', '1679466591_membershipform.pdf', '3', 4, NULL, NULL, NULL, NULL, NULL, '0', '2023-03-22 06:29:51', '2023-03-22 06:29:51', NULL, NULL),
(26, '00024/SCL/2023', 24, 'Membership_24', '1', 43, 'Baxter', 'Anika Blackburn', 'Houston', 'Voluptas qui ea et id recusandae Laboris sunt fugiat', 'Doloribus dignissimos atque omnis neque deleniti nostrum consequatur sit dolores eius perferendis enim enim dolorum libero tempore quas', 'Quos proident qui sit illo eveniet ullamco accusantium in ut', '1957-08-17', 9909913483, 'vikash.kumar@nascentinfo.com', '1679467712_shreenathaji.jpg', '1679467712_images.jpeg', 'Aadhar Card', '1679467712_membershipform.pdf', '3', 3, NULL, NULL, NULL, NULL, NULL, '0', '2023-03-22 06:48:32', '2023-03-22 06:48:32', NULL, NULL),
(27, '00025/SCL/2023', 25, 'Membership_25', '2', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'doshi.anur9@gmail.com', '1679468136_shreenathaji.jpg', '1679468136_krishna.jpg', 'Pancard', '1679468137_ConformTicket.pdf', '1', 2, 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'Nothing', '1679903916_membershipform.pdf', '1', '2023-03-22 06:55:37', '2023-03-27 07:58:36', '2023-03-27', NULL),
(28, '00026/SCL/2023', 26, 'Membership_26', '1', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'doshi.anur9@gmail.com', '1679468328_shreenathaji.jpg', '1679468328_krishna.jpg', 'Pancard', '1679468328_ConformTicket.pdf', '1', 2, 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'Nothing', NULL, '0', '2023-03-22 06:58:49', '2023-03-22 06:58:49', NULL, NULL),
(29, '00027/SCL/2023', 27, 'Membership_27', '1', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'doshi.anur9@gmail.com', '1679468374_shreenathaji.jpg', '1679468374_krishna.jpg', 'Pancard', '1679468374_ConformTicket.pdf', '1', 2, 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'Nothing', NULL, '0', '2023-03-22 06:59:34', '2023-03-22 06:59:34', NULL, NULL),
(30, '00028/SCL/2023', 28, 'Membership_28', '2', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'doshi.anur9@gmail.com', '1679468376_shreenathaji.jpg', '1679468376_krishna.jpg', 'Pancard', '1679468377_ConformTicket.pdf', '1', 2, 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'Nothing', '1679903943_membershipform.pdf', '1', '2023-03-22 06:59:37', '2023-03-27 07:59:03', '2023-03-27', NULL),
(31, '00029/SCL/2023', 29, 'Membership_29', '1', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'doshi.anur9@gmail.com', '1679470428_shreenathaji.jpg', '1679470428_krishna.jpg', 'Pancard', '1679470428_ConformTicket.pdf', '1', 2, 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'Nothing', NULL, '0', '2023-03-22 07:33:48', '2023-03-22 07:33:48', NULL, NULL),
(32, '00030/SCL/2023', 30, 'Membership_30', '4', 43, 'ankur', 'Tatiana Garrison', 'Salinas', 'Doloremque molestiae molestiae animi aut animi et rerum dignissimos quisquam nulla aliqua Labore ratione necessitatibus magni unde quia error', 'Excepturi voluptas aliqua Repellendus Veniam odio et qui aut voluptate Nam neque et consequat Ipsum', 'Perferendis omnis sunt est maxime quae non ipsa voluptatem sunt quisquam amet Nam esse ipsum explicabo Aliquid illum consequatur', '2006-08-05', 9909913483, 'vikash.kumar@nascentinfo.com', '1679471081_shreenathaji.jpg', '1679471081_krishna.jpg', 'Election Card', '1679471081_ConformTicket.pdf', '3', 2, '', '', '', '', NULL, '0', '2023-03-22 07:44:42', '2023-03-22 09:53:40', NULL, NULL),
(33, '00031/SCL/2023', 31, 'Membership_31', '3', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'doshi.anur9@gmail.com', '1679471178_shreenathaji.jpg', '1679471178_krishna.jpg', 'Pancard', '1679471178_ConformTicket.pdf', '1', 2, 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'G-206,Karnavati apartment', 'Nothing', '1680247666_rary_final23.pdf', '1', '2023-03-22 07:46:18', '2023-03-31 07:28:20', '2023-03-31', NULL),
(34, '00032/SCL/2023', 32, 'Membership_32', '7', 43, 'Ankur', 'Kanubhai', 'Doshi', 'G-206,Karnavati', 'G-206,Karnavati apartment', 'G-205,Karnavati 4', '1983-04-13', 9909913483, 'vikash.kumar@nascentinfo.com', '1679481854_shreenathaji.jpg', '1679481854_krishna_image.jpg', 'Aadhar Card', '1679481854_matterthatmemberticketislost.pdf', '3', 2, '', '', '', '', '1679477358_StateCentralLibrary22.pdf', '1', '2023-03-22 07:47:45', '2023-03-22 10:48:04', '2023-03-22', '2023-03-22'),
(35, '00033/SCL/2023', 33, 'Membership_33', '1', 43, 'Keely', 'Madonna Britt', 'Keith', 'Saepe nihil non aliqua A voluptatibus saepe ex atque nobis elit necessitatibus optio eum omnis', 'Et ex voluptate nobis hic repudiandae', 'Laborum Repudiandae aliquam cupidatat rem temporibus sequi', '1970-05-08', 7415555554, 'vikash.kumar@nascentinfo.com', '1679545837_Aha_Logo.png', '1679545837_desktop.jpeg', 'Aadhar Card', '1679545837_ANNEX-881056296401960.pdf', '3', 1, NULL, NULL, NULL, NULL, NULL, '0', '2023-03-23 04:30:37', '2023-03-23 04:30:37', NULL, NULL),
(36, '00034/SCL/2023', 34, 'Membership_34', '4', 43, 'Tad', 'Heather Meyer', 'Mercer', 'Excepteur aliqua Sunt quis optio nemo temporibus', 'Reiciendis corporis sunt error occaecat qui architecto nemo voluptas sint minus nulla autem qui minima a', 'Qui in hic excepturi est totam modi iste a ullamco quibusdam autem cum', '1965-05-22', 6194444444, 'vikash.kumar@nascentinfo.com', '1679546014_Aha_Logo.png', '1679546014_CTP_Response_Error.png', 'Election Card', '1679546014_dummy.pdf', '3', 1, '', '', '', '', '1680246601_State_Central_Library.pdf', '1', '2023-03-23 04:33:34', '2023-03-31 07:11:21', '2023-03-31', NULL),
(37, '00035/SCL/2023', 35, 'Membership_35', '4', 43, 'Blaze', 'Anthony Leach', 'Chang', 'Ex iusto voluptate aut vitae in anim reiciendis odio aute libero non sint tempore dignissimos dolorem lorem elit aliquip fugiat', 'Error voluptates in numquam qui proident', 'Ducimus aliqua Laboriosam irure dicta laborum', '2008-01-07', 9782222222, 'vikash.kumar@nascentinfo.com', '1679547026_CTP_Response_Error.png', '1679547026_Aha_Logo.png', 'Election Card', '1679547027_dummy.pdf', '3', 4, '', '', '', '', '1680246251_rary_final23.pdf', '1', '2023-03-23 04:50:27', '2023-03-31 07:07:59', '2023-03-31', NULL),
(38, '00036/SCL/2023', 36, 'Membership_36', '4', 43, 'Geraldine', 'Jerome Fields', 'Hobbs', 'Adipisicing exercitation id cum est commodo sapiente dolor placeat asperiores asperiores optio voluptas sit voluptate rerum magna dolores fugiat', 'Aliquip vitae ex dolore sapiente commodi nulla eos sint sint recusandae Exercitation libero quia qui temporibus', 'Vel excepturi ipsam asperiores id tempore et similique consequatur voluptas', '2003-11-23', 7774444444, 'vikash.kumar@nascentinfo.com', '1679552985_ticket2.jpg', '1679547672_Aha_Logo.png', 'Election Card', '1679547672_ANNEX-881056296401960.pdf', '3', 3, '', '', '', '', '1679552936_PremiumPaidStatement_2022-2023_.pdf', '1', '2023-03-23 05:01:12', '2023-03-23 06:58:53', '2023-03-23', NULL),
(39, '00037/SCL/2023', 37, 'Membership_37', '4', 43, 'McKenzie', 'Mechelle Lowe', 'Francis', 'Dolorum vero doloribus blanditiis tempor do velit culpa', 'Libero quia sed quaerat quis fuga Quas nisi sit velit', 'Numquam quia voluptatem officia et architecto minim aut voluptatem dolorem voluptas', '1972-10-21', 5345555555, 'vikash.kumar@nascentinfo.com', '1679552621_tickit1.jpg', '1679548669_Aha_Logo.png', 'Election Card', '1679548669_ANNEX-881056296401960.pdf', '4', 4, 'Similique nisi maiores tempora anim deserunt ex maiores at in animi repellendus Sed', 'Quas non beatae ab dolor omnis aut aliquip perferendis velit laboriosam', 'Quas non beatae ab dolor omnis aut aliquip perferendis velit laboriosam', 'Qui aut saepe et dolores cumque rerum ipsum in culpa maxime eveniet aut ipsum ipsa doloremque qui', '1679549712_membershipform.pdf', '1', '2023-03-23 05:17:49', '2023-03-23 06:23:41', '2023-03-23', NULL),
(40, '00038/SCL/2023', 38, 'Membership_38', '7', 43, 'Hakeem', 'Georgia Dickson', 'Hensley', 'Voluptas enim officiis dolorem est sed a cum', 'Excepteur quia est quam neque quia earum et aut nulla optio', 'Dolorem minim earum earum in aliquip ea', '1968-02-06', 1501111111, 'vikash.kumar@nascentinfo.com', '1679549414_images_0.jpg', '1679549451_images_0.jpg', 'Driving Licence', '1679549455_membershipform.pdf', '3', 3, '', '', '', '', '1679549522_membershipform.pdf', '1', '2023-03-23 05:31:01', '2023-03-23 05:34:26', '2023-03-23', '2023-03-23'),
(41, '00039/SCL/2023', 39, 'Membership_39', '2', 43, 'Lacota', 'Neve Chan', 'Mccoy', 'Est itaque et accusantium id rerum sed veniam omnis eos et eiusmod sunt vitae', 'Pariatur Doloremque error sit amet irure non temporibus quis', 'Aliquip quis aut impedit alias est delectus nihil obcaecati sit accusantium', '1966-04-04', 9655555555, 'vikash.kumar@nascentinfo.com', '1679553750_Aha_Logo.png', '1679553750_Aha_Logo.png', 'Aadhar Card', '1679553750_ANNEX-881056296401960.pdf', '4', 1, 'Voluptatem consequatur cupiditate nihil quas officia totam amet adipisci ut sit quia excepturi possimus odio molestias minim omnis', 'Ex labore velit sed quasi in elit sed fugiat ut reprehenderit voluptate sed ipsa voluptatem Pariatur', 'Hic alias sit provident accusantium eveniet ad ea dolorem harum elit iste rerum', 'Quia voluptas commodo in voluptatum odit laborum Aut nostrum adipisci numquam tenetur non enim doloribus beatae', '1679553771_ANNEX-881056296401960.pdf', '1', '2023-03-23 06:42:31', '2023-03-23 06:42:51', '2023-03-23', NULL),
(42, '00040/SCL/2023', 40, 'Membership_40', '2', 43, 'Julian', 'Cathleen Chang', 'Carver', 'Deserunt qui quia ut ducimus tenetur ullamco ipsam quidem et pariatur Quod modi qui illum culpa totam magna laborum', 'Cillum mollitia sed neque sint et placeat velit duis ipsa nulla ad ut cillum eos perspiciatis quod', 'Maxime possimus omnis tempor earum officiis', '1970-02-12', 9909913483, 'vikash.kumar@nascentinfo.com', '1679901785_shreenathaji.jpg', '1679901785_images.jpeg', 'Driving Licence', '1679901785_StateCentralLibrary22.pdf', '3', 3, NULL, NULL, NULL, NULL, '1679903978_membershipform.pdf', '1', '2023-03-27 07:23:05', '2023-03-27 07:59:39', '2023-03-27', NULL),
(43, '00041/SCL/2023', 41, 'Membership_41', '5', 43, 'Cheryl ssf', 'Latifah Oneil', 'Wise', 'Doloribus ratione dolor nobis adipisicing aut eveniet', 'Ullamco alias consectetur aut anim quis modi ipsa est dolores dolor dolor dolor minim eos', 'Delectus aut est anim sed dolor ut fugit quibusdam eius ea quas sit ut ab aut laborum', '2002-04-27', 9909912478, 'vikash.kumar@nascentinfo.com', '1680245776_shreenathaji.jpg', '1680245776_images.jpeg', 'Aadhar Card', '1680245776_ConformTicket.pdf', '3', 2, '', '', '', '', '1680246030_State24.pdf', '1', '2023-03-31 06:56:16', '2023-03-31 07:00:47', '2023-03-31', NULL),
(44, '00042/SCL/2023', 42, 'Membership_42', '7', 43, 'Nell', 'Jordan Morse', 'Hopper', 'Sed dolor libero rem quis consequuntur enim esse', 'Velit sunt eius irure est dolor in nostrud magni aperiam sed dolor ratione dolorem aut impedit expedita cillum sed', 'Enim illum totam impedit atque in consectetur repellendus Nisi non consectetur aliquid', '2000-02-25', 9909913483, 'vikash.kumar@nascentinfo.com', '1680248092_shreenathaji.jpg', '1680248092_krishna.jpg', 'Aadhar Card', '1680248092_membershipform.pdf', '3', 2, '', '', '', '', '1680249559_membershipformpdf.pdf', '1', '2023-03-31 07:34:52', '2023-03-31 14:19:03', '2023-03-31', '2023-03-31'),
(45, '00043/SCL/2023', 43, 'Membership_43', '7', 43, 'Ethan', 'Oleg Valenzuela', 'Burris', 'Laudantium natus enim error labore sed quis', 'Adipisci qui rerum qui commodi nesciunt in nisi ut', 'Inventore corporis enim facilis excepteur adipisci quos', '1955-02-08', 9909913483, 'vikash.kumar@nascentinfo.com', '1680271485_shreenathaji.jpg', '1680271485_images.jpeg', 'Aadhar Card', '1680271486_membershipform.pdf', '2', 1, 'Quisquam ullamco est ullamco aspernatur voluptate aperiam perferendis', 'Ea magni in saepe harum tenetur aut voluptate aspernatur est incidunt atque rerum magni quod excepteur dolore sed', 'Enim dolore est non vel pariatur Dolor aute aut ut explicabo Dolores doloremque cum ut magnam', 'Eius nisi quam duis in sit ullam vel ut dolor accusantium esse adipisci mollitia totam necessitatibus lorem ea', '1680271531_membershipform.pdf', '1', '2023-03-31 14:04:46', '2023-03-31 14:16:52', '2023-03-31', '2023-03-31'),
(46, '00044/SCL/2023', 44, 'Membership_44', '7', 43, 'Jordan', 'Gillian Lindsey', 'Vinson', 'Veniam voluptatum ducimus sit doloribus velit', 'Molestias distinctio Amet amet aperiam reprehenderit velit quia voluptatem molestiae ullam dolor possimus aut magni', 'Vel pariatur Minus animi aperiam officia aut inventore laboris accusantium blanditiis ullam qui et nulla explicabo Magna cillum', '1984-09-20', 9909913483, 'vikash.kumar@nascentinfo.com', '1680525217_shreenathaji.jpg', '1680525217_images.jpeg', 'Election Card', '1680525217_ConformTicket.pdf', '2', 2, 'Rem quisquam praesentium dolores quibusdam qui', 'At fugiat dolorem beatae in in exercitation eiusmod cum officiis est molestiae nisi perferendis', 'At fugiat dolorem beatae in in exercitation eiusmod cum officiis est molestiae nisi perferendis', 'Ut praesentium eu illum ea sed voluptatem quo architecto tempore rerum consectetur ex sed iusto distinctio Veritatis', '1680525365_StateCentralLibrary04.pdf', '1', '2023-04-03 12:33:37', '2023-04-03 12:37:45', '2023-04-03', '2023-04-03'),
(47, '00045/SCL/2023', 45, 'Membership_45', '7', 43, 'Jamalia', 'Aiko Donaldson', 'Aguilar', 'Hic optio eum nemo praesentium consequatur Voluptatem reprehenderit est odio qui sint', 'Tempor nostrum deserunt laborum velit', 'Quas qui enim quo eos lorem soluta in quis sed in fuga Beatae enim sapiente qui cum doloremque rerum', '1971-07-25', 9909913468, 'vikash.kumar@nascentinfo.com', '1680526036_shreenathaji.jpg', '1680526036_krishna.jpg', 'Election Card', '1680526036_StateCentralLibrary04.pdf', '1', 3, 'Non quia qui aliquid molestiae aut', 'Ut qui quam qui ullamco labore id lorem non harum', 'Ipsum qui velit dolore et cum est in ut commodi non assumenda provident placeat dolorem consectetur et et minim', 'Esse ipsa voluptate sapiente voluptatem Tempor sit fugiat facere omnis exercitation', '1680526079_StateCentralLibrary04.pdf', '1', '2023-04-03 12:47:16', '2023-04-03 12:48:48', '2023-04-03', '2023-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `mst_membership_payment`
--

CREATE TABLE `mst_membership_payment` (
  `id` int(10) NOT NULL,
  `intMembershipId` int(10) NOT NULL,
  `strDepositAmount` varchar(255) NOT NULL,
  `strSmartCardFees` varchar(255) NOT NULL,
  `strTotalAmount` varchar(255) NOT NULL,
  `intBookCount` int(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_membership_payment`
--

INSERT INTO `mst_membership_payment` (`id`, `intMembershipId`, `strDepositAmount`, `strSmartCardFees`, `strTotalAmount`, `intBookCount`, `created_at`, `updated_at`) VALUES
(1, 1, '300', '30', '330', 3, '2022-08-26 13:18:25', '2022-08-26 13:18:25'),
(2, 1, '300', '30', '330', 3, '2022-08-26 13:27:19', '2022-08-26 13:27:19'),
(3, 1, '300', '30', '330', 3, '2022-08-26 13:28:54', '2022-08-26 13:28:54'),
(4, 2, '200', '20', '220', 2, '2022-08-26 13:29:29', '2022-08-26 13:29:29'),
(5, 3, '200', '20', '220', 2, '2022-09-01 11:28:32', '2022-09-01 11:28:32'),
(6, 4, '100', '10', '110', 1, '2022-09-01 11:31:01', '2022-09-01 11:31:01'),
(7, 9, '16', '20', '36', 2, '2022-09-02 10:55:19', '2022-09-02 10:55:19'),
(8, 10, '80', '20', '100', 2, '2022-09-14 06:13:36', '2023-02-15 12:31:48'),
(9, 11, '80', '20', '100', 2, '2022-09-28 09:22:37', '2022-09-28 09:22:37'),
(10, 12, '200', '20', '220', 2, '2022-09-28 09:35:05', '2023-02-16 10:32:14'),
(11, 13, '24', '30', '54', 3, '2022-09-28 09:51:29', '2022-09-28 09:51:29'),
(12, 14, '120', '30', '150', 3, '2022-09-28 10:10:38', '2022-09-28 10:10:38'),
(13, 15, '24', '30', '54', 3, '2022-10-06 09:49:59', '2022-10-06 09:49:59'),
(14, 16, '100', '10', '110', 1, '2022-10-10 11:46:32', '2022-10-10 11:46:32'),
(15, 1, '100', '10', '110', 1, '2022-10-10 12:09:36', '2022-10-10 12:09:36'),
(16, 1, '100', '10', '110', 1, '2022-10-10 12:13:56', '2022-10-10 12:13:56'),
(17, 2, '100', '10', '110', 1, '2022-10-10 13:09:44', '2022-10-10 13:09:44'),
(18, 3, '100', '10', '110', 1, '2022-10-10 13:11:24', '2022-10-10 13:11:24'),
(19, 4, '100', '10', '110', 1, '2022-10-10 13:12:31', '2022-10-10 13:12:31'),
(20, 1, '200', '20', '220', 2, '2022-10-10 13:19:22', '2022-10-10 13:19:22'),
(21, 2, '100', '10', '110', 1, '2022-10-10 13:19:59', '2022-10-10 13:19:59'),
(22, 3, '200', '20', '220', 2, '2022-10-10 13:25:37', '2022-10-10 13:25:37'),
(23, 4, '100', '10', '110', 1, '2022-10-10 13:28:59', '2022-10-10 13:28:59'),
(24, 5, '100', '10', '110', 1, '2022-10-10 13:41:38', '2022-10-10 13:41:38'),
(25, 1, '100', '10', '110', 1, '2022-10-10 13:46:15', '2022-10-10 13:46:15'),
(26, 2, '100', '10', '110', 1, '2022-10-10 13:51:46', '2022-10-10 13:51:46'),
(27, 3, '24', '30', '54', 3, '2022-10-11 09:43:44', '2022-10-11 09:43:44'),
(28, 4, '120', '30', '150', 3, '2023-01-06 08:46:57', '2023-01-06 08:46:57'),
(29, 5, '16', '20', '36', 2, '2023-01-06 08:47:51', '2023-01-06 08:47:51'),
(30, 6, '16', '20', '36', 2, '2023-01-06 11:33:53', '2023-01-06 11:33:53'),
(31, 7, '80', '20', '100', 2, '2023-01-06 11:35:20', '2023-01-06 11:35:20'),
(32, 8, '80', '20', '100', 2, '2023-01-20 06:27:41', '2023-01-20 06:27:41'),
(33, 9, '40', '10', '50', 1, '2023-02-15 09:58:28', '2023-02-15 09:58:28'),
(34, 10, '80', '20', '100', 2, '2023-02-15 10:15:48', '2023-02-15 12:31:48'),
(35, 11, '24', '30', '54', 3, '2023-02-15 11:24:28', '2023-02-15 11:24:28'),
(36, 12, '200', '20', '220', 2, '2023-02-16 09:40:52', '2023-02-16 10:32:14'),
(38, 14, '100', '10', '110', 1, '2023-02-16 11:05:18', '2023-02-16 11:05:18'),
(40, 20, '80', '20', '100', 2, '2023-03-01 12:48:31', '2023-03-01 12:48:31'),
(41, 21, '80', '20', '100', 2, '2023-03-01 12:57:04', '2023-04-03 10:17:42'),
(42, 22, '80', '20', '100', 2, '2023-03-01 13:20:34', '2023-03-01 13:20:34'),
(43, 34, '200', '20', '220', 2, '2023-03-22 07:47:52', '2023-03-22 10:46:50'),
(44, 39, '160', '40', '200', 4, '2023-03-23 05:17:58', '2023-03-23 06:23:41'),
(45, 40, '300', '30', '330', 3, '2023-03-23 05:31:09', '2023-03-23 05:33:07'),
(46, 41, '40', '10', '50', 1, '2023-03-23 06:42:38', '2023-03-23 06:42:38'),
(47, 42, '300', '30', '330', 3, '2023-03-27 07:23:13', '2023-03-27 07:23:13'),
(48, 43, '200', '20', '220', 2, '2023-03-31 06:56:24', '2023-03-31 06:59:13'),
(49, 44, '200', '20', '220', 2, '2023-03-31 07:34:59', '2023-03-31 07:36:21'),
(50, 45, '8', '10', '18', 1, '2023-03-31 14:04:53', '2023-03-31 14:04:53'),
(51, 46, '16', '20', '36', 2, '2023-04-03 12:33:45', '2023-04-03 12:35:41'),
(52, 47, '120', '30', '150', 3, '2023-04-03 12:47:23', '2023-04-03 12:47:23'),
(53, 48, '32', '40', '72', 4, '2023-04-06 05:35:15', '2023-04-06 05:35:15'),
(54, 49, '24', '30', '54', 3, '2023-04-06 05:35:31', '2023-04-06 05:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `mst_membership_query`
--

CREATE TABLE `mst_membership_query` (
  `id` int(10) NOT NULL,
  `intMembershipId` int(10) NOT NULL,
  `strComment` text NOT NULL,
  `enmStatus` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0-Commented,1-Reply',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_membership_query`
--

INSERT INTO `mst_membership_query` (`id`, `intMembershipId`, `strComment`, `enmStatus`, `created_at`, `updated_at`) VALUES
(1, 10, '<p>this is test</p>', '1', '2023-02-15 12:16:58', '2023-02-15 12:31:48'),
(2, 10, '<p>xvbd dvegvb etgvb</p>', '1', '2023-02-15 12:27:25', '2023-02-15 12:31:48'),
(3, 12, '<p>sd cfsdc wdcv&nbsp;</p>', '1', '2023-02-16 10:25:02', '2023-02-16 10:32:14'),
(4, 12, '<p>sfdcv</p>', '1', '2023-02-16 10:29:35', '2023-02-16 10:32:14'),
(5, 22, '<p>dgdfgggsdsdgsd</p>', '0', '2023-03-01 13:58:50', '2023-03-01 13:58:50'),
(6, 22, '<p>dgdfgggsdsdgsd</p>', '0', '2023-03-01 14:02:10', '2023-03-01 14:02:10'),
(7, 34, '<p>dfgevdvegvetdg</p>', '1', '2023-03-22 09:29:46', '2023-03-22 10:46:50'),
(8, 34, '<p>cs cdscd</p>', '1', '2023-03-22 10:46:09', '2023-03-22 10:46:50'),
(9, 40, '<p>sscv&nbsp;</p>', '1', '2023-03-23 05:32:38', '2023-03-23 05:33:07'),
(10, 39, '<p>jntjtjtyjh</p>', '1', '2023-03-23 05:36:17', '2023-03-23 06:23:41'),
(11, 38, '<p>fgbfdghed</p>', '1', '2023-03-23 06:29:12', '2023-03-23 06:58:53'),
(12, 38, '<p>cvbdfb&nbsp;</p>', '1', '2023-03-23 06:30:32', '2023-03-23 06:58:53'),
(13, 43, '<p>csdfas</p>', '1', '2023-03-31 06:58:32', '2023-03-31 06:59:13'),
(14, 37, '<p>test fghdf</p>', '1', '2023-03-31 07:05:15', '2023-03-31 07:07:59'),
(15, 36, '<p>fhjftujhrft</p>', '1', '2023-03-31 07:10:33', '2023-03-31 07:11:21'),
(16, 33, '<p>ssdvcs</p>', '0', '2023-03-31 07:28:16', '2023-03-31 07:28:16'),
(17, 21, '<p>fgvweve ev&nbsp;</p>', '1', '2023-03-31 07:33:10', '2023-04-03 10:17:42'),
(18, 44, '<p>rhrtf tnd n</p>', '1', '2023-03-31 07:35:58', '2023-03-31 07:36:21'),
(19, 46, '<p>thi s nsnnsm,&nbsp; vfvsdv</p>', '1', '2023-04-03 12:35:13', '2023-04-03 12:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `mst_members_application_type`
--

CREATE TABLE `mst_members_application_type` (
  `id` int(11) NOT NULL,
  `strApplicationType` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `enmStatus` enum('0','1') DEFAULT '1' COMMENT '1-active,0-InActive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_members_application_type`
--

INSERT INTO `mst_members_application_type` (`id`, `strApplicationType`, `created_at`, `updated_at`, `deleted_at`, `enmStatus`) VALUES
(1, 'Bail', '2022-05-19 12:57:23', '2022-10-07 13:06:59', NULL, '1'),
(2, 'Child', '2022-05-19 13:07:33', '2022-05-19 13:07:33', NULL, '1'),
(3, 'Non-bailable', '2022-05-19 12:58:09', '2022-05-19 13:06:08', NULL, '1'),
(4, 'Renew', '2022-05-19 13:07:54', '2022-05-19 13:07:54', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_mission_vision`
--

CREATE TABLE `mst_mission_vision` (
  `id` int(10) NOT NULL,
  `strMissionVission` text NOT NULL,
  `strTitle` varchar(255) NOT NULL,
  `strPageName` text NOT NULL,
  `strLanguageCode` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `enmStatus` enum('0','1') DEFAULT '1' COMMENT '1-active,0-InActive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_mission_vision`
--

INSERT INTO `mst_mission_vision` (`id`, `strMissionVission`, `strTitle`, `strPageName`, `strLanguageCode`, `created_at`, `updated_at`, `deleted_at`, `enmStatus`) VALUES
(1, 'સમાજના તમામ વર્ગના લોકોને જાહેર ગ્રંથાલય સેવા પૂરી પાડવી. સામાન્ય પ્રજાજનો ઉપરાંત વિશિષ્ટ વર્ગો જેવા કે અંધજનો, વૃધ્ધો, બાળકો, મહિલાઓ વગેરેને જાહેર ગ્રંથાલય સેવાઓ સહજ પ્રાપ્ત બને તે રીતે પ્રજાને જાહેર ગ્રંથાલય સેવાથી સાંકળી લેવી.', 'મિશન અને વિઝન', 'મિશન અને વિઝન', 'gu', NULL, '2022-07-22 06:43:48', NULL, '1'),
(3, 'To provide public library service to all sections of the society. In addition to the general public, special category such as the Blind, Senior Citizen, Children, Women, etc. should be involved in public library services in a way that makes public library services accessible to them.', 'Mission and Vision', 'Mission and Vision', 'en', '2022-07-05 05:52:20', '2022-10-17 13:40:59', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_partners`
--

CREATE TABLE `mst_partners` (
  `id` int(10) NOT NULL,
  `strPartnerURL` text NOT NULL,
  `strLanguageCode` varchar(255) NOT NULL,
  `strPartnerLogo` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `enmStatus` enum('0','1') DEFAULT '1' COMMENT '1-active,0-InActive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_partners`
--

INSERT INTO `mst_partners` (`id`, `strPartnerURL`, `strLanguageCode`, `strPartnerLogo`, `created_at`, `updated_at`, `deleted_at`, `enmStatus`) VALUES
(1, 'https://dolib.gujarat.gov.in/', 'gu', 'logo01.png', '2022-04-25 00:00:00', '2022-04-25 00:00:00', NULL, '1'),
(2, 'https://cleanindia.gujarat.gov.in/', 'gu', 'SwachBharat.png', NULL, NULL, NULL, '1'),
(3, 'fgtgerty123', 'en', '1651053026_logo Final Swach Bharat.png', '2022-04-27 09:50:26', '2022-04-27 09:50:49', '2022-04-27 09:50:49', '1'),
(4, 'https://amritmahotsav.nic.in/', 'en', '1655964166_logo03.png', '2022-06-23 06:02:46', '2023-01-17 08:40:04', '2023-01-17 08:40:04', '1'),
(5, 'https://sycd.gujarat.gov.in/', 'gu', '1655964194_logo02.png', '2022-06-23 06:03:14', '2022-06-23 06:03:14', NULL, '1'),
(6, 'aa', 'en', '1661333812_1655451001_1.jpg', '2022-08-24 09:36:52', '2022-08-26 13:28:52', '2022-08-26 13:28:52', '1'),
(7, 'QQ', 'en', '1661769768_tiger.jpg', '2022-08-29 10:42:48', '2022-08-29 10:43:26', '2022-08-29 10:43:26', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_photo_gallery`
--

CREATE TABLE `mst_photo_gallery` (
  `id` int(10) NOT NULL,
  `strLanguageCode` varchar(255) NOT NULL,
  `strPhoto` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_photo_gallery`
--

INSERT INTO `mst_photo_gallery` (`id`, `strLanguageCode`, `strPhoto`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'gu', 'gallery01.png', NULL, NULL, NULL),
(2, 'gu', 'gallery02.png', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mst_programcalendar`
--

CREATE TABLE `mst_programcalendar` (
  `id` int(10) NOT NULL,
  `strMonths` varchar(255) NOT NULL,
  `strPageName` varchar(255) DEFAULT NULL,
  `strTitle` text NOT NULL,
  `strLanguageCode` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `enmStatus` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0-Inactive,1-Active',
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_programcalendar`
--

INSERT INTO `mst_programcalendar` (`id`, `strMonths`, `strPageName`, `strTitle`, `strLanguageCode`, `created_at`, `updated_at`, `enmStatus`, `deleted_at`) VALUES
(1, '૧૪ એપ્રિલ', 'કાર્યક્રમ કેલેન્ડર – ૨૦૨૨', 'ડૉ. બાબાસાહેબ આંબેડકર જન્મજયંતિ પ્રસંગે ઉજવણી', 'gu', '2022-07-18 00:00:00', '2023-01-20 10:08:25', '1', NULL),
(2, '૨૩ એપ્રિલ', 'કાર્યક્રમ કેલેન્ડર – ૨૦૨૨', 'વિશ્વ પુસ્તક દિવસ અને કોપીરાઇટ દિવસની ઉજવણી', 'gu', NULL, '2023-01-20 10:08:34', '1', NULL),
(3, '૧૨ ઓગષ્ટ', 'કાર્યક્રમ કેલેન્ડર – ૨૦૨૨', 'લાયબ્રેરીયન દિવસની ઉજવણી', 'gu', NULL, '2023-01-20 10:08:22', '1', NULL),
(4, '૧૪ થી ૨૦ નવેમ્બર', 'કાર્યક્રમ કેલેન્ડર – ૨૦૨૨', 'રાષ્ટ્રીય ગ્રંથ સપ્તાહની ઉજવણી', 'gu', NULL, '2023-01-20 10:08:29', '1', NULL),
(5, 'sad', NULL, 'asdas', 'gu', '2022-07-26 07:08:33', '2022-07-29 06:40:37', '1', '2022-07-29 06:40:37'),
(6, 'gret', NULL, 'reyrtyrtey', 'gu', '2022-07-26 07:08:42', '2022-07-26 07:19:48', '1', '2022-07-26 07:19:48'),
(7, 'gret', NULL, '123455', 'gu', '2022-07-26 07:08:42', '2022-07-29 06:40:33', '0', '2022-07-29 06:40:33'),
(8, '12 August', 'Programme Calendar – 2022', 'Celebrating Librarian\'s Day', 'en', '2022-07-29 06:41:45', '2023-01-20 10:06:24', '1', NULL),
(9, '14 April', 'Programme Calendar – 2022', 'Celebration on the occasion of Dr. Babasaheb Ambedkar\'s birth anniversary', 'en', '2022-07-29 06:43:28', '2023-01-20 10:08:08', '1', NULL),
(10, '14 to 20 November', 'Programme Calendar – 2022', 'Celebrating National Book Week', 'en', '2022-07-29 06:44:34', '2023-01-20 10:08:12', '1', NULL),
(11, '23 April', 'Programme Calendar – 2022', 'Celebrating World Book Day and Copyright Day', 'en', '2022-07-29 06:45:18', '2023-01-20 10:08:17', '1', NULL),
(12, '12 se', NULL, 'gfff', 'en', '2022-08-17 12:31:18', '2022-08-17 12:31:56', '1', '2022-08-17 12:31:56'),
(13, '4', NULL, 'Saepe expedita corpo', 'en', '2022-09-16 12:13:44', '2022-09-16 12:13:58', '1', '2022-09-16 12:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `mst_readingcorner`
--

CREATE TABLE `mst_readingcorner` (
  `id` int(10) NOT NULL,
  `strLanguageCode` varchar(255) NOT NULL,
  `strReadingCorner` text NOT NULL,
  `strPageName` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `enmStatus` enum('0','1') CHARACTER SET utf32 DEFAULT '1' COMMENT '1-active,0-InActive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_readingcorner`
--

INSERT INTO `mst_readingcorner` (`id`, `strLanguageCode`, `strReadingCorner`, `strPageName`, `created_at`, `updated_at`, `deleted_at`, `enmStatus`) VALUES
(1, 'gu', '<p>મહાપુરુષોની જન્મ જયંતીને સો, સવાસો, દોઢસો વર્ષ પૂર્ણ થવાના નિમિત્તે સરકારશ્રી દ્વારા તેની ઉજવણીનું આયોજન કરવામાં આવે છે. આવા પ્રસંગોએ ગ્રંથાલય દ્વારા જે તે મહાપુરુષો દ્વારા લિખિત અને તેમના પર લખાયેલા પુસ્તકોનો સમગ્ર વર્ષ દરમ્યાન એક રીડિંગ કોર્નર ઊભો કરવામાં આવે છે. જેમ કે ઝવેરચંદ મેઘાણી કોર્નર, સ્વામી વિવેકાનંદ કોર્નર, મહાત્મા ગાંધીજી કોર્નર વગેરે. જેનો ગ્રંથાલયના વાચકો લાભ લેતાં હોય છે.</p>', 'રીડીંગ કોર્નર', NULL, '2023-05-10 10:47:33', NULL, '1'),
(2, 'en', '<p>ssss</p>', NULL, '2022-06-13 09:34:12', '2022-06-13 09:34:34', '2022-06-13 09:34:34', '1'),
(3, 'en', '<p>dddw</p>', NULL, '2022-06-13 09:35:02', '2022-06-13 09:35:05', '2022-06-13 09:35:05', '1'),
(4, 'en', '<p>KGJEHJFHEHFRFEGFGHDGV</p>', NULL, '2022-06-13 09:36:58', '2022-06-13 10:23:14', '2022-06-13 10:23:14', '1'),
(5, 'en', '<p>zzzz</p>', NULL, '2022-06-13 09:47:16', '2022-06-13 09:47:19', '2022-06-13 09:47:19', '1'),
(6, 'en', '<p>ETRTT6</p>', NULL, '2022-06-13 10:30:53', '2022-06-13 10:31:01', '2022-06-13 10:31:01', '1'),
(7, 'en', '<p>On the occasion of the birth anniversary of great personalities, its celebration is organized by the Government. On such occasions a reading corner is set up throughout the year by the library for books written by those great men and written on them throughout the year. Which the readers of the library are taking advantage of.</p>', 'Reading Corner', '2022-07-05 07:14:07', '2022-10-19 10:43:38', NULL, '1'),
(8, 'en', '<p>rewer hp</p>', NULL, '2022-08-17 05:28:53', '2022-08-17 05:29:27', '2022-08-17 05:29:27', '1'),
(9, 'en', '<p>dsad</p>', NULL, '2022-08-17 13:39:31', '2022-08-24 09:49:26', '2022-08-24 09:49:26', '1'),
(10, 'en', '<p>re</p>', NULL, '2022-08-18 05:22:13', '2022-08-18 05:22:18', '2022-08-18 05:22:18', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_referenceservice`
--

CREATE TABLE `mst_referenceservice` (
  `id` int(10) NOT NULL,
  `strLanguageCode` varchar(255) NOT NULL,
  `strReferenceService` text NOT NULL,
  `strPageName` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `enmStatus` enum('0','1') DEFAULT '1' COMMENT '1-active,0-InActive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_referenceservice`
--

INSERT INTO `mst_referenceservice` (`id`, `strLanguageCode`, `strReferenceService`, `strPageName`, `created_at`, `updated_at`, `deleted_at`, `enmStatus`) VALUES
(1, 'gu', '<p>ગ્રંથાલયના સંદર્ભ વિભાગમાં ગુજરાતી, અંગ્રેજી અને હિન્દી ભાષાના મળીને કુલ ૪૫૦૦ જેટલા સંદર્ભગ્રંથો અને સંદર્ભ સાહિત્ય ઉપલબ્ધ છે. વાચક સભ્યો સંદર્ભ વિભાગમાં બેસીને આ સંદર્ભ સાહિત્યનો ઉપયોગ કરી શકે છે.</p>', 'સંદર્ભ સેવા', NULL, '2023-05-10 10:43:12', NULL, '1'),
(3, 'en', '<p>A total of 4500 reference literature in Gujarati, English and Hindi languages are available in the reference section of the library. Members can use this reference literature by sitting in the reference section.</p>', 'Reference Services', '2022-07-05 07:09:53', '2023-05-10 10:43:23', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_saleofoldmagazines`
--

CREATE TABLE `mst_saleofoldmagazines` (
  `id` int(10) NOT NULL,
  `strLanguageCode` varchar(255) NOT NULL,
  `strSaleofOldMagazines` text NOT NULL,
  `strPageName` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `enmStatus` enum('0','1') DEFAULT '1' COMMENT '1-active,0-InActive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_saleofoldmagazines`
--

INSERT INTO `mst_saleofoldmagazines` (`id`, `strLanguageCode`, `strSaleofOldMagazines`, `strPageName`, `created_at`, `updated_at`, `deleted_at`, `enmStatus`) VALUES
(1, 'gu', '<p>સામાન્ય રસના લોકપ્રિય સામાયિકોના જુના અંકો પ્રજાજનોને નજીવા દરે પ્રાપ્ત થઈ શકે તે માટે ગ્રંથાલય દ્વારા સામાયિકની કિંમતના ૧૦% લેખે કિંમત વસૂલીને સમયાંતરે તેનું વેચાણ કરવામાં આવે છે. ઉ.દા. સામાયિકની કિંમત દસ રુપિયા હોય તો તેની વેચાણ કિંમત એક રુપિયો રાખવામાં આવે છે.</p>', 'જૂના સામાયિકોનું વેચાણ', NULL, '2022-10-19 11:10:08', NULL, '1'),
(2, 'en', '<p>ssdewrrxxsder4tytyhtyhy5r</p>', NULL, '2022-06-13 12:05:14', '2022-06-13 12:06:59', '2022-06-13 12:06:59', '1'),
(3, 'en', '<p>The old issues of popular magazines of general interest are sold periodically by the library at 10% of the price of the magazine so that the public can get them at a nominal rate. E.g. If the price of the magazine is ten rupees, its selling price is kept at one rupee.</p>', 'Sale of Old Magazine', '2022-07-05 07:14:30', '2022-10-19 11:10:02', NULL, '1'),
(4, 'en', '<p>mmnnbm</p>', NULL, '2022-08-17 13:09:48', '2022-08-26 13:11:13', '2022-08-26 13:11:13', '1'),
(5, 'gu', '<p>qwe</p>', NULL, '2022-08-26 13:16:38', '2022-08-26 13:16:40', '2022-08-26 13:16:40', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_studentreadingroom`
--

CREATE TABLE `mst_studentreadingroom` (
  `id` int(11) NOT NULL,
  `strLanguageCode` varchar(255) NOT NULL,
  `strStudentreadingroom` text NOT NULL,
  `strPageName` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `enmStatus` enum('0','1') CHARACTER SET utf16 DEFAULT '1' COMMENT '1-active,0-InActive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_studentreadingroom`
--

INSERT INTO `mst_studentreadingroom` (`id`, `strLanguageCode`, `strStudentreadingroom`, `strPageName`, `created_at`, `updated_at`, `deleted_at`, `enmStatus`) VALUES
(1, 'gu', '<p>પાટનગરના અભ્યાસુ વિદ્યાર્થી/વિદ્યાર્થીનીઓ અભ્યાસલક્ષી સાહિત્યનું વાંચન કરી શકે તે માટે વિદ્યાર્થી અધ્યયનકક્ષોની સુવિધા ઉપલબ્ધ કરવામાં આવી છે.વિદ્યાર્થીઓ માટે સવારના ૮.૦૦ થી રાત્રિના ૧૨.૦૦ સુધી આ અધ્યયનકક્ષો ખુલ્લા રહે છે.દૈનિક 450 થી વધુ વિદ્યાર્થી/ વિદ્યાર્થીનીઓ આ સુવિધાનો લાભ મેળવી રહ્યા છે. વિધાર્થીનીઓ માટે અલગથી અધ્યયનકક્ષની સુવિધા કરાઈ છે જેનો સમય સવારના ૮.00 થી સાંજના ૭.00 સુધીનો રાખવામાં આવેલ છે.</p>', 'વિદ્યાર્થી વાંચનખંડ', NULL, '2023-05-10 10:41:00', NULL, '1'),
(4, 'en', '<p>Reading Hall have been made available to the students for the study. According to the schedule of the library, these Reading Hall are open from 8.00 am to 11.00 pm. More than 350 students are availing this facility daily. A separate classroom has been provided for the Girls.</p>', 'Reading Hall', '2022-07-05 06:56:02', '2022-10-19 12:16:22', NULL, '1'),
(7, 'en', '<p>qweqw</p>', NULL, '2022-08-29 06:57:07', '2022-08-29 06:57:07', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_technicaldepartment`
--

CREATE TABLE `mst_technicaldepartment` (
  `id` int(10) NOT NULL,
  `strLanguageCode` varchar(255) NOT NULL,
  `strTechnical` text NOT NULL,
  `strPageName` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `enmStatus` enum('0','1') CHARACTER SET utf16 DEFAULT '1' COMMENT '1-active,0-InActive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_technicaldepartment`
--

INSERT INTO `mst_technicaldepartment` (`id`, `strLanguageCode`, `strTechnical`, `strPageName`, `created_at`, `updated_at`, `deleted_at`, `enmStatus`) VALUES
(1, 'gu', '<p>ગ્રંથાલયમાં આવનાર નવીન પુસ્તકોનું વર્ગીકરણ, સૂચિકરણ તથા કોમ્પ્યુટરીકરણ આ વિભાગમાં કરવામાં આવે છે. વર્ગીકરણ માટે ડ્યુઇ ડેસીમલ પધ્ધતિ (ડી.ડી.સી.) નો ઉપયોગ કરવામાં આવે છે. તથા કોમ્પ્યુટરીકરણ માટે SOUL 2.0 નો ઉપયોગ કરવામાં આવે છે. આ સાથે ગ્રંથાલયમાં RFID સિસ્ટમ પણ કાર્યરત છે.....</p>', 'તકનીકી વિભાગ', NULL, '2022-10-19 12:21:06', NULL, '1'),
(6, 'en', '<p>The new books coming in the library are classified, indexed and computerized in this section. The Dewey Decimal Classification (DDC) is used for classification. And SOUL 2.0 is used for computerization. The library also has an RFID system&nbsp;</p>', 'Technical Section', '2022-07-05 06:45:08', '2022-10-19 12:21:00', NULL, '1'),
(7, 'en', '<p>qwwqwq</p>', NULL, '2022-08-29 07:00:39', '2022-08-29 07:00:39', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_tvroom`
--

CREATE TABLE `mst_tvroom` (
  `id` int(10) NOT NULL,
  `strLanguageCode` varchar(255) NOT NULL,
  `strTVRoom` text NOT NULL,
  `strPageName` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `enmStatus` enum('0','1') DEFAULT '1' COMMENT '1-active,0-InActive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_tvroom`
--

INSERT INTO `mst_tvroom` (`id`, `strLanguageCode`, `strTVRoom`, `strPageName`, `created_at`, `updated_at`, `deleted_at`, `enmStatus`) VALUES
(8, 'gu', '<p>ટી.વી. કક્ષમાં અલગઅલગ ચેનલ પર પ્રસારિત થતાં જ્ઞાનસંવર્ધક તથા માહિતીજન્ય કાર્યક્રમો પૂર્વ આયોજિત કાર્યક્રમ મુજબ ગ્રંથાલયના વાચકો નિહાળી શકે છે. વળી દિવ્યાંગજનો, બાળકો તથા વયસ્ક નાગરિકોને રસ પડે તેવા કાર્યક્રમો પણ ડીવીડી પ્લેયર પર સીડી લગાવીને બતાવવાનું આયોજન કરવામાં આવે છે.</p>', 'ટી.વી. કક્ષ', '2022-06-28 06:12:48', '2022-10-19 12:29:32', NULL, '1'),
(9, 'en', '<p>Readers of the library can watch the informative and informative programs broadcast on different channels in the room as per the pre-planned program. In addition, programs of interest to persons with disabilities, children and adults are also planned to be shown on CD player with CD.</p>', 'T.V. Room', '2022-07-05 06:44:09', '2022-10-19 12:29:24', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `mst_upcoming_event`
--

CREATE TABLE `mst_upcoming_event` (
  `id` int(10) NOT NULL,
  `strEventTitile` varchar(255) NOT NULL,
  `strPageName` varchar(255) DEFAULT NULL,
  `strEventDescription` text NOT NULL,
  `dtiEventDate` date NOT NULL,
  `strLanguageCode` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `enmStatus` enum('0','1') DEFAULT '1' COMMENT '1-active,0-InActive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_upcoming_event`
--

INSERT INTO `mst_upcoming_event` (`id`, `strEventTitile`, `strPageName`, `strEventDescription`, `dtiEventDate`, `strLanguageCode`, `created_at`, `updated_at`, `deleted_at`, `enmStatus`) VALUES
(1, 'Event At Computer center', 'Upcoming Event', '<p>લોરેમ ઇપ્સુન ડોલર સીટ એમેટ, કોન્સેકટુર એડીપીસિંગ એલિટ, સેડ ડો એપિસોડ ટેમ્પોર લોરેમ ઇપ્સન ડોલર સીટ એમેટ......</p>', '2022-07-28', 'en', NULL, '2023-01-24 09:46:41', NULL, '1'),
(2, 'sdfgv', NULL, '<p>fgvdzv dxgbbvbb</p>', '2022-05-20', 'en', '2022-05-18 10:19:25', '2022-05-18 10:37:33', '2022-05-18 10:37:33', '1'),
(3, 'કોમ્પ્યુટર સેન્ટર ખાતે ઇવેન્ટ', 'આગામી ઇવેન્ટ', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor Lorem ipsum dolor sit amet.......</p>', '2022-07-04', 'en', '2022-07-05 13:53:18', '2023-01-24 09:47:03', NULL, '1'),
(4, 'કોમ્પ્યુટર સેન્ટર ખાતે ઇવેન્ટ', NULL, '<p>gdfgvd bedgbetb</p>', '2022-07-30', 'gu', '2022-07-21 13:48:48', '2022-07-21 13:49:16', '2022-07-21 13:49:16', '1'),
(5, 'upcoming', NULL, '<p>rewwererw</p>', '2022-07-22', 'en', '2022-07-21 13:49:56', '2022-07-26 05:46:56', '2022-07-26 05:46:56', '1'),
(6, 'name', NULL, '<p>name is</p>', '2022-07-29', 'en', '2022-07-21 13:51:26', '2022-07-26 05:46:43', '2022-07-26 05:46:43', '1'),
(7, 'upcoming', NULL, '<p>name iuyuyu</p>', '2021-07-22', 'en', '2022-07-21 13:53:55', '2022-07-26 05:46:59', '2022-07-26 05:46:59', '1'),
(8, 'Officia omnis non eu', NULL, '<p>eqweqw sdasd wdsa wwwwwwwwwwwwwwww</p>', '2022-07-23', 'en', '2022-07-22 09:09:07', '2022-07-26 05:46:53', '2022-07-26 05:46:53', '1'),
(9, 'Omnis omnis cumque d', NULL, '<p>eqweqw sdasd wdsa wwwwwsdtg</p>', '2022-07-22', 'en', '2022-07-22 09:12:55', '2022-07-26 05:47:02', '2022-07-26 05:47:02', '1'),
(10, 'Aut velit delectus', NULL, '<p>ererew fdfdfdre</p>', '2026-07-22', 'en', '2022-07-25 04:26:57', '2022-07-26 05:46:39', '2022-07-26 05:46:39', '1'),
(11, 'upcoming', 'આગામી ઇવેન્ટ', '<p>માનનીય અગ્રસચિવશ્રી, રમતગમત, યુવા અને સાંસ્કૃતિક પ્રવૃતિઓ વિભાગના હસ્તે રાજ્ય મધ્યસ્થ ગ્રંથાલય, ગાંધીનગરની વેબસાઇટનું લોકાર્પણ</p>', '2023-08-11', 'gu', '2022-08-02 09:40:55', '2023-05-10 12:16:10', NULL, '1'),
(12, 'Itaque ab molestias', NULL, '<p>sadawdsfsesf csd</p>', '2022-08-10', 'en', '2022-08-02 11:11:46', '2022-08-02 11:12:18', '2022-08-02 11:12:18', '1'),
(13, 'Dolor ut proident n', NULL, '<p>lllolookihohyu&nbsp;</p>', '2022-08-18', 'en', '2022-08-17 08:39:17', '2022-08-17 08:40:46', '2022-08-17 08:40:46', '1'),
(14, 'At aut dolor lorem a', NULL, '<p>trert</p>', '2022-08-18', 'en', '2022-08-18 05:11:42', '2022-08-18 05:12:24', '2022-08-18 05:12:24', '1'),
(15, 'Qui et rem deserunt', NULL, '<p>wqwe</p>', '2022-08-26', 'gu', '2022-08-24 09:59:44', '2022-08-26 13:08:11', '2022-08-26 13:08:11', '1'),
(16, 'upcoming', NULL, '<p>ewqwwq</p>', '2022-08-26', 'en', '2022-08-26 13:04:57', '2022-08-26 13:05:51', '2022-08-26 13:05:51', '1');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `str_user_type` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `int_otp` int(10) NOT NULL,
  `str_verify_status` int(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `str_user_type`, `int_otp`, `str_verify_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@nascentinfo.com', NULL, '$2y$10$5ycHHVodBKcwf5sJby2iM.MjB18brXunj03Sk6d90QWKgzIz.5xz.', 'admin', 690095, NULL, 'EKBwbK5VC4GoVnkqQC06G7R5CuHi1LQ6O3shaepVboGxBytZAMlH5gpXg8fh', '2022-04-13 13:33:00', '2022-09-09 09:46:34'),
(3, 'harshna@gmail.com', 'harshna@gmail.com', NULL, '$2y$10$6bvAnEyG1tJCwm5dKmvOFOPwubW82j.cymFmBpL5DK2os2x81EqKG', NULL, 0, NULL, NULL, '2022-05-19 09:35:17', '2022-05-19 09:35:17'),
(4, 'harshna11@gmail.com', 'harshna11@gmail.com', NULL, '$2y$10$.uWldqvPlz9MEw.4OP9BueEG7rSJOlAU9kSbWhVBFEXeCC.i3DN5q', 'user', 0, NULL, NULL, '2022-05-25 09:50:31', '2022-05-25 09:50:31'),
(6, 'vikash@gmail.com', 'vikash@gmail.com', NULL, '$2y$10$TQiNuwvqaR12BWrMtkbTNuifGDrDlyazsQKZQpNImk3T1vhD2gQFu', 'user', 977470, NULL, NULL, '2022-06-01 16:14:03', '2022-09-12 10:23:20'),
(7, 'harshna.patel@gmail.com', 'harshna.patel@gmail.com', NULL, '$2y$10$RVuUaGnx9RV81nRyHEwHu.wOyrjr.mcDeeoAVMQnAvZ1nDXuNlJ7i', 'user', 0, NULL, NULL, '2022-06-08 12:38:32', '2022-06-08 12:38:32'),
(8, 'vikash111@gmail.com', 'vikash111@gmail.com', NULL, '$2y$10$igwrVBxHEEYa97omS/JBMOnL1czbKuXX.7IgYqJfDByuIkEhFlRei', 'user', 0, NULL, NULL, '2022-06-08 12:39:13', '2022-06-08 12:39:13'),
(9, 'vikashkumar@gmail.com', 'vikashkumar@gmail.com', NULL, '$2y$10$oZD7KPnFlJuDG3tjm/qs6uIblh84ln18GTLvEcQDQuqtV88cUQ7ry', 'user', 0, NULL, NULL, '2022-06-08 17:42:28', '2022-06-08 17:42:28'),
(10, 'nimisha.patel@nascentinfo.com', 'nimisha.patel@nascentinfo.com', NULL, '$2y$10$apavWdvURmtZLFLkAqnvBO4/xmuzJu8GHE0Ha3rm6qBGdmY.hYlze', 'user', 203718, NULL, NULL, '2022-06-16 02:57:39', '2022-09-09 10:43:28'),
(11, 'grishma.patel@nascentinfo.com', 'grishma.patel@nascentinfo.com', NULL, '$2y$10$SjYAiL97XvfeuVnEj8nhy.Le5Ph6gKN3ZVigFzdlz4E0YbH.fOjrO', 'user', 0, NULL, NULL, '2022-06-16 03:08:36', '2022-06-16 03:08:36'),
(12, 'sumit.padhiyar@nascentinfo.com', 'sumit.padhiyar@nascentinfo.com', NULL, '$2y$10$xTxyDZJ6Tqdeu5kmLNCxmeOKMnlVGfmHRomTkJydwcY5zkh0tae1S', 'user', 0, NULL, NULL, '2022-06-16 04:17:39', '2022-06-16 04:17:39'),
(13, 'vinay.bhatt@nascentinfo.com', 'vinay.bhatt@nascentinfo.com', NULL, '$2y$10$MurES4KR0XuGWhM0wyaTfewkAYXrv57.oNBABZfFPChj8Q78pRBba', 'user', 0, NULL, NULL, '2022-06-17 05:15:07', '2022-06-17 05:15:07'),
(14, 'nimisha.patel@nascent.com', 'nimisha.patel@nascent.com', NULL, '$2y$10$yJzLZWvK1uXX3yJ9dQ0ea.ppNJklGhO0HwfNsb0q8DklQn/.syhuK', 'user', 0, NULL, NULL, '2022-06-21 03:34:06', '2022-06-21 03:34:06'),
(15, 'harshna111@gmail.com', 'harshna111@gmail.com', NULL, '$2y$10$F/hOSKNMt9xJ9oG9TR97z.TGbHKloq9X8lqzxI9NeKUMC5AzmITLu', 'user', 0, NULL, NULL, '2022-07-15 15:06:18', '2022-07-15 15:06:18'),
(16, 'harin.parekh2001@gmail.com', 'harin.parekh2001@gmail.com', NULL, '$2y$10$EA4xMMe6SwsShftHv8yCD.3WNpO6iM55Ct2gm4bqmKdSxJx65olgu', 'user', 0, NULL, 'U3KTpbJaq2rw5hUcVD7BmlDZLtp5HTwY58UukUQbWtKUir9vORkqasdLdbzU', '2022-08-01 17:27:01', '2022-09-09 16:14:50'),
(17, 'ankur.doshi@nascentinfo.com', 'ankur.doshi@nascentinfo.com', NULL, '$2y$10$EM5ezjOtP4ccWdemk2i6BeixH71TtYAGc/MJQ/hKM.1ExmhBgJbWy', 'admin', 0, NULL, 'ChRXTQJKcTfjXV5btuzJaE8yzPGK4heYftZWk2bhxFzSHnN7xoLyeJqKA2Xo', '2022-08-18 04:00:00', '2022-09-22 17:16:45'),
(18, 'dasf@gmail.com', 'dasf@gmail.com', NULL, '$2y$10$/x6XRmZ5dw2uBn6AEwn6IO2fFAn.dHOln709LtC1kBZ6FQJjvID8K', 'user', 0, NULL, NULL, '2022-08-24 13:34:25', '2022-08-24 13:34:25'),
(19, 'sahil', 'sahil.gohel@nascentinfo.com', NULL, '$2y$10$r8rDShq9dKSUUSFSKTI/u.dFAOZ22ycDbcmbM4zz1gE0iA0JQsAWK', 'user', 663248, 1, NULL, '2022-09-08 13:59:17', '2022-09-08 15:33:05'),
(37, 'Harshna', 'harshna.patel@nascentinfo.com', NULL, '$2y$10$IUkgwtFCgWdJtcC09793ZO1d3SWfUH.kpU1pm1wcjaTlMv1kGmUnq', 'user', 304965, 1, NULL, '2022-09-12 11:01:11', '2022-09-15 13:57:23'),
(38, 'ankur', 'doshi.ankur91@gmail.com', NULL, '$2y$10$w3c30a0o33qBC3b3O2bBYurTFnIpiG408kGCkc8T4T03TDGP/8EgS', 'user', 463300, 1, NULL, '2022-09-12 11:15:02', '2022-09-12 17:41:03'),
(39, 'Vikash Kumar', 'abc@gmail.com', NULL, NULL, 'user', 852946, 0, NULL, '2022-09-12 17:09:10', '2022-09-29 15:45:51'),
(42, 'ankur doshi', 'doshi.ankur9@gmail.com', NULL, NULL, 'user', 438345, 0, NULL, '2022-09-14 17:02:04', '2022-09-16 10:31:40'),
(43, 'vikash kumar', 'vikash.kumar@nascentinfo.com', NULL, '$2y$10$XVt8nNaiDCdC/QNKVoc.SOYqig0a.qOcWOYvZx68hl0HD.A6Y4Fie', 'user', 989935, 0, NULL, '2022-09-28 13:00:14', '2022-10-06 13:44:07'),
(44, 'Barkha Patel', 'barkha.patel@nascentinfo.com', NULL, '$2y$10$ASsFYhQpqEyZVl/3vQzaRuxwjtS/3pARf3z8PFWsxyrP2/24nKIIW', 'user', 113164, 1, NULL, '2023-03-29 16:28:32', '2023-03-29 16:29:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mstPageName`
--
ALTER TABLE `mstPageName`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_aboutus`
--
ALTER TABLE `mst_aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_aboutus1`
--
ALTER TABLE `mst_aboutus1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_achievement`
--
ALTER TABLE `mst_achievement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_activities`
--
ALTER TABLE `mst_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_administrativeoffice`
--
ALTER TABLE `mst_administrativeoffice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_announcement`
--
ALTER TABLE `mst_announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_bookexchange`
--
ALTER TABLE `mst_bookexchange`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_common_pages`
--
ALTER TABLE `mst_common_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_contactus`
--
ALTER TABLE `mst_contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_copyright`
--
ALTER TABLE `mst_copyright`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_event`
--
ALTER TABLE `mst_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_event_gallery`
--
ALTER TABLE `mst_event_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_functions`
--
ALTER TABLE `mst_functions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_introduction`
--
ALTER TABLE `mst_introduction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_knowledge_category`
--
ALTER TABLE `mst_knowledge_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_knowledge_center`
--
ALTER TABLE `mst_knowledge_center`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_language`
--
ALTER TABLE `mst_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_leaders`
--
ALTER TABLE `mst_leaders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_librarian_desk`
--
ALTER TABLE `mst_librarian_desk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_libraryTime`
--
ALTER TABLE `mst_libraryTime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_managementofvillagelibraries`
--
ALTER TABLE `mst_managementofvillagelibraries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_membership`
--
ALTER TABLE `mst_membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_membership1`
--
ALTER TABLE `mst_membership1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_membership_payment`
--
ALTER TABLE `mst_membership_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_membership_query`
--
ALTER TABLE `mst_membership_query`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `mst_members_application_type`
--
ALTER TABLE `mst_members_application_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_mission_vision`
--
ALTER TABLE `mst_mission_vision`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_partners`
--
ALTER TABLE `mst_partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_photo_gallery`
--
ALTER TABLE `mst_photo_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_programcalendar`
--
ALTER TABLE `mst_programcalendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_readingcorner`
--
ALTER TABLE `mst_readingcorner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_referenceservice`
--
ALTER TABLE `mst_referenceservice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_saleofoldmagazines`
--
ALTER TABLE `mst_saleofoldmagazines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_studentreadingroom`
--
ALTER TABLE `mst_studentreadingroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_technicaldepartment`
--
ALTER TABLE `mst_technicaldepartment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_tvroom`
--
ALTER TABLE `mst_tvroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_upcoming_event`
--
ALTER TABLE `mst_upcoming_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mstPageName`
--
ALTER TABLE `mstPageName`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mst_aboutus`
--
ALTER TABLE `mst_aboutus`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `mst_aboutus1`
--
ALTER TABLE `mst_aboutus1`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mst_achievement`
--
ALTER TABLE `mst_achievement`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `mst_activities`
--
ALTER TABLE `mst_activities`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `mst_administrativeoffice`
--
ALTER TABLE `mst_administrativeoffice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `mst_announcement`
--
ALTER TABLE `mst_announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `mst_bookexchange`
--
ALTER TABLE `mst_bookexchange`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mst_common_pages`
--
ALTER TABLE `mst_common_pages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `mst_contactus`
--
ALTER TABLE `mst_contactus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mst_copyright`
--
ALTER TABLE `mst_copyright`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mst_event`
--
ALTER TABLE `mst_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `mst_event_gallery`
--
ALTER TABLE `mst_event_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `mst_functions`
--
ALTER TABLE `mst_functions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `mst_introduction`
--
ALTER TABLE `mst_introduction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mst_knowledge_category`
--
ALTER TABLE `mst_knowledge_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `mst_knowledge_center`
--
ALTER TABLE `mst_knowledge_center`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `mst_language`
--
ALTER TABLE `mst_language`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `mst_leaders`
--
ALTER TABLE `mst_leaders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `mst_librarian_desk`
--
ALTER TABLE `mst_librarian_desk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `mst_libraryTime`
--
ALTER TABLE `mst_libraryTime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mst_managementofvillagelibraries`
--
ALTER TABLE `mst_managementofvillagelibraries`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mst_membership`
--
ALTER TABLE `mst_membership`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `mst_membership1`
--
ALTER TABLE `mst_membership1`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `mst_membership_payment`
--
ALTER TABLE `mst_membership_payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `mst_membership_query`
--
ALTER TABLE `mst_membership_query`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `mst_members_application_type`
--
ALTER TABLE `mst_members_application_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mst_mission_vision`
--
ALTER TABLE `mst_mission_vision`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mst_partners`
--
ALTER TABLE `mst_partners`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `mst_photo_gallery`
--
ALTER TABLE `mst_photo_gallery`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `mst_programcalendar`
--
ALTER TABLE `mst_programcalendar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `mst_readingcorner`
--
ALTER TABLE `mst_readingcorner`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `mst_referenceservice`
--
ALTER TABLE `mst_referenceservice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mst_saleofoldmagazines`
--
ALTER TABLE `mst_saleofoldmagazines`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mst_studentreadingroom`
--
ALTER TABLE `mst_studentreadingroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `mst_technicaldepartment`
--
ALTER TABLE `mst_technicaldepartment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `mst_tvroom`
--
ALTER TABLE `mst_tvroom`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `mst_upcoming_event`
--
ALTER TABLE `mst_upcoming_event`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
