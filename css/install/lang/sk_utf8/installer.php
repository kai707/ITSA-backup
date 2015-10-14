<?php
/// Please, do not edit this file manually! It's auto generated from
/// contents stored in your standard lang pack files:
/// (langconfig.php, install.php, moodle.php, admin.php and error.php)
///
/// If you find some missing string in Moodle installation, please,
/// keep us informed using http://moodle.org/bugs Thanks!
///
/// File generated by cvs://contrib/lang2installer/installer_builder
/// using strings defined in stringnames.txt (same dir)

$string['admindirerror'] = 'Adresár pre správu (admin) nie je určený správne';
$string['admindirname'] = 'Adresár pre správu (admin)';
$string['admindirsettinghead'] = 'Nastavovanie adresáre \'admin\'...';
$string['admindirsettingsub'] = 'Na niektorých serveroch je URL adresa /admin vyhradená pre špeciálne účely (napr. pre ovládací panel). Na takých serveroch môže dojsť ku kolízii so štandardným umiestením stránok pre správu Moodle. Ak máte tento problém, premenujte adresár \'admin\' vo vašej inštalácii Moodle a do tohto poľa zadajte jeho nový názov. Príklad: <br /> <br /><b>moodleadmin</b><br /> <br />
Všetky generované odkazy na stránky správy Moodle budú používať tento nový názov.';
$string['bypassed'] = 'Obídené';
$string['cannotcreatelangdir'] = 'Nie je možné vytvoriť adresár pre jazykové súbory.';
$string['cannotcreatetempdir'] = 'Nie je možné vytvoriť dočasný adresár.';
$string['cannotdownloadcomponents'] = 'Nie je možné stiahnuť komponenty.';
$string['cannotdownloadzipfile'] = 'Nie je možné stiahnuť súbor ZIP.';
$string['cannotfindcomponent'] = 'Komponent nenájdený.';
$string['cannotsavemd5file'] = 'Nie je možné uložiť súbor MD5.';
$string['cannotsavezipfile'] = 'Nie je možné uložiť súbor ZIP.';
$string['cannotunzipfile'] = 'Nie je možné dekomprimovať súbor.';
$string['caution'] = 'Varovanie';
$string['check'] = 'Kontrolovať';
$string['chooselanguagehead'] = 'Vyberte jazyk';
$string['chooselanguagesub'] = 'Zvoľte si jazyk PRE INŠTALOVANIE. Jazyk pre stránky Moodle a pre užívateľov budete môcť vybrať neskôr.';
$string['closewindow'] = 'Zavrieť toto okno';
$string['compatibilitysettingshead'] = 'Kontrola nastavenia PHP...';
$string['compatibilitysettingssub'] = 'Pre správny beh Moodle by váš server mal vyhovieť vo všetkých nasledujúcich testoch.';
$string['componentisuptodate'] = 'Komponent je aktuálny.';
$string['configfilenotwritten'] = 'Inštalačný skript nebol schopný automaticky vytvoriť config.php súbor, obsahujúci Vaše zvolené nastavenia, pravdepodobne preto, že adresár Moodle nie je zapisovateľný. Môžete ručne skopírovať nasledovný kód do súboru s názvom config.php v rámci  koreňového adresára Moodle.';
$string['configfilewritten'] = 'súbor config.php bol úspešne vytvorený';
$string['configurationcompletehead'] = 'Konfigurácia ukončená';
$string['configurationcompletesub'] = 'Moodle sa pokúsil uložiť súbor s konfiguráciou do koreňového adresára inštalácie Moodle.';
$string['continue'] = 'Pokračovať';
$string['ctyperecommended'] = 'Pre zlepšenie výkonu na portáli (najmä pre nie latinkové jazyky) je doporučené nainštalovať voliteľnú knižnicu ctype.';
$string['ctyperequired'] = 'Voliteľná knižnica ctype je vyžadovaná v Moodle na zlepšenie výkonu na portáli a podporu kompatibility viacerých jazykov.';
$string['curlrecommended'] = 'Pre beh sieťových funkcionalít (\"Moodle Networking\") je treba nainštalovať voliteľnú knižnicu Curl.';
$string['customcheck'] = 'Ostatné kontroly';
$string['database'] = 'Databáza';
$string['databasecreationsettingshead'] = 'Teraz musíte nastaviť pripojenie k databáze, kam si bude Moodle ukladať väčšinu svojich údajov. Táto databáza môže byť vytvorená inštalátorom automaticky podľa nasledujúceho nastavenia.';
$string['databasecreationsettingssub'] = '<b>Typ:</b> inštalátor nastaví na \"mysql\"<br />
<b>Hostiteľ:</b> inštalátor nastaví na \"localhost\"<br />
<b>Názov:</b> názov databázy, napr. moodle<br />
<b>Používateľ:</b> inštalátor nastaví na \"root\"<br />
<b>Heslo:</b> heslo k tomuto účtu<br />
<b>Predpona tabuliek:</b> voliteľná predpona, ktorá sa vloží pred názvy všetkých tabuliek (umožňuje používať jednu databázu pre viac inštalácií Moodle)';
$string['databasesettingshead'] = 'Teraz potrebujete nastaviť pripojenie k databáze, kam si bude Moodle ukladať väčšinu svojich údajov. Táto databáza už musí byť vytvorená a tiež musí byť vytvorené používateľské meno a prístupové heslo.';
$string['databasesettingssub'] = '<b>Typ:</b> mysql alebo postgres7<br />
<b>Hostiteľ:</b> napr. localhost alebo db.nasaskola.sk<br />
<b>Názov:</b> názov databázy, napr. moodle<br />
<b>Používateľ:</b> používateľské meno účtu pre prístup k databáze<br />
<b>Heslo:</b> heslo k tomuto účtu<br />
<b>Predpona tabuliek:</b> voliteľná predpona, ktorá sa vloží pred názvy všetkých tabuliek (umožňuje používať jednu databázu pre viac inštalácií Moodle)';
$string['databasesettingssub_mssql'] = '<b>Typ:</b> SQL*Server (bez UTF-8) <b><font color=\"red\">Len na experimentovanie! (nie je určené pre produkčné servery)</font></b><br />
<b>Hostiteľ (Host):</b> napr. localhost alebo db.nasaskola.sk<br />
<b>Názov (Name):</b> názov databázy, napr. moodle<br />
<b>Používateľ (User):</b> uživatel oprávněný pro práci s databází<br />
<b>Heslo (Password):</b> heslo pro uživatele<br />
<b>Předpona (Tables Prefix):</b> jednotná předpona názvů všech tabulek, např. mdl_ (povinné)';
$string['databasesettingssub_mssql_n'] = '<b>Typ:</b> SQL*Server (s UTF-8) <br />
<b>Hostiteľ (Host):</b> napr. localhost alebo db.nasaskola.sk<br />
<b>Názov (Name):</b> názov databázy, napr. moodle<br />
<b>Používateľ (User):</b> používateľ oprávnený pre prácu s databázou<br />
<b>Heslo (Password):</b> heslo pre používateľa<br />
<b>Predpona (Tables Prefix):</b> jednotná predpona názvov všetkých tabuliek, napr. mdl_ (povinné)';
$string['databasesettingssub_mysql'] = '<b>Typ:</b> MySQL<br />
<b>Hostiteľ (Host):</b> napr. localhost alebo db.nasaskola.sk<br />
<b>Název (Name):</b> názov databázy, např. moodle<br />
<b>Používateľ (User):</b> používateľ oprávnený pre prácu s databázou<br />
<b>Heslo (Password):</b> heslo pre používateľa<br />
<b>Predpona (Tables Prefix):</b> jednotná predpona názvov všetkých tabuliek, napr. mdl_ (povinné)';
$string['databasesettingssub_mysqli'] = '<b>Typ:</b> Vylepšené MySQL<br />
<b>Hostiteľ (Host):</b> eg localhost alebo db.isp.com<br />
<b>Názov (Name):</b> názov databázy, napr. moodle<br />
<b>Používateľ (User):</b> používateľ oprávnený pre prácu s databázou<br />
<b>Heslo (Password):</b> heslo pre používateľa<br />
<b>Predpona (Tables Prefix):</b> jednotná predpona názvov všetkých tabuliek, napr. mdl_ (voliteľné)';
$string['databasesettingssub_oci8po'] = '<b>Typ:</b> Oracle<br />
<b>Hostitel (Host):</b> nepoužité, musí být prázdne<br />
<b>Názov (Name):</b> daný názov pripojenia tnsnames.ora<br />
<b>Používateľ (User):</b> používateľ oprávnený pre prácu s databázou<br />
<b>Heslo (Password):</b> heslo pre používateľa<br />
<b>Predpona (Tables Prefix):</b> jednotná predpona názvov všetkých tabuliek (povinné, max 2 znaky)';
$string['databasesettingssub_odbc_mssql'] = '<b>Typ:</b> SQL*Server (cez ODBC) <b><font color=\"red\">Len na experimentovanie! (nie je určené pre produkčné servery)</font></b><br />
<b>Hostiteľ (Host):</b> názov DSN podľa ovládacieho panelu ODBC<br />
<b>Názov (Name):</b> názov databázy, napr. moodle<br />
<b>Používateľ (User):</b> používateľ oprávnený pre prácu s databázou<br />
<b>Heslo (Password):</b> heslo pre používateľa<br />
<b>Predpona (Tables Prefix):</b> jednotná predpona názvov všetkých tabuliek (povinné)';
$string['databasesettingssub_postgres7'] = '<b>Typ:</b> PostgreSQL<br />
<b>Hostiteľ (Host):</b> napr. localhost alebo db.nasaskola.sk<br />
<b>Názov (Name):</b> názov databázy, napr. moodle<br />
<b>Používateľ (User):</b> používateľ oprávnený pre prácu s databázou<br />
<b>Heslo (Password):</b> heslo pre používateľa<br />
<b>Predpona (Tables Prefix):</b> jednotná predpona názvov všetkých tabuliek, napr. mdl_ (povinné)';
$string['databasesettingswillbecreated'] = '<b>Poznámka:</b> inštalátor sa pokúsi vytvoriť databázu automaticky, ak neexistuje.';
$string['dataroot'] = 'Adresár pre údaje';
$string['datarooterror'] = '\'Adresár pre údaje\', ktorý ste zadali, nemôže byť nájdený alebo vytvorený. Upravte buď cestu alebo vytvorte ten adresár ručne.';
$string['datarootpublicerror'] = 'Adresár \'data\', ktorý ste zvolili, je priamo dostupný z webu. Musíte zvoliť iný adresár.';
$string['dbconnectionerror'] = 'Nemohli sme sa pripojiť k vami zadanej databáze. Prosím skontrolujte nastavenia Vašej databázy.';
$string['dbcreationerror'] = 'Chyba pri vytváraní databázy. Ale bolo možné vytvoriť databázu so zadaným menom a jej nastaveniami';
$string['dbhost'] = 'Hosťovský server';
$string['dbprefix'] = 'Predpona tabuliek';
$string['dbtype'] = 'Typ';
$string['dbwrongencoding'] = 'Vybraná databáza používa nedoporučené kódovanie $a. Vhodnejšie by bolo používať databázu s kódovaním Unicode (UTF-8). Túto kontrolu môžete preskočiť zaškrtnutím poľa \"Preskočiť test kódovania DB\", môžete však v budúcnosti naraziť na problémy.';
$string['dbwronghostserver'] = 'Musíte rešpektovať pravidlá pre \"Host\" ako bolo vysvetlené vyššie.';
$string['dbwrongnlslang'] = 'Premenná prostredia NLS_LANG vo vašom web serveri musí používať znakovú sadu AL32UTF8. Viď dokumentáciu k PHP o tom, ako správne nastaviť správne OCI8 .';
$string['dbwrongprefix'] = 'Musíte rešpektovať pravidlá pre \"Tables Prefix\" ako bolo vysvetlené vyššie.';
$string['directorysettingshead'] = 'Potvrďte prosím adresy tejto inštalácie Moodle.';
$string['directorysettingssub'] = '<b>Webová adresa</b>:
zadajte celú webovú adresu, na ktorej bude Moodle dostupný. Ak sú vaše stránky dostupné na viacerých URL, vyberte z nich tú, ktorú budú vaši študenti používať najčastejšie. Na konci adresy nepíšte lomítko.
<br />
<br />
<b>Adresár Moodle</b>:
zadajte celú cestu k adresáru s touto inštaláciou. Uistite sa, že sú v nej správne uvedené malé/VEĽKÉ písmená.
<br />
<br />
<b>Dátový adresár</b>:
potrebujete diskový priestor, kam bude Moodle ukladať nahrané (uploadované) súbory. K tomuto adresári musí mať proces webového serveru právo na čítanie A ZÁPIS (webový server býva spustený pod užívateľom \'nobody\' alebo \'apache\' alebo podobne). Tento adresár by ale zároveň nemal byť dostupný priamo cez webové rozhranie (môže obsahovať neverejné údaje).';
$string['dirroot'] = 'Adresár Moodle';
$string['dirrooterror'] = 'Nastavenia v \'Adresári Moodle\' sú nesprávne - nemôžeme tu nájsť inštaláciu Moodle. Hodnota nižšie bola vynulovaná.';
$string['download'] = 'Stiahnuť';
$string['downloadedfilecheckfailed'] = 'Kontrola stiahnutého súboru dopadla negatívne';
$string['downloadlanguagebutton'] = 'Stiahnuť jazykový balíček \"$a\"';
$string['downloadlanguagehead'] = 'Stiahnuť jazykový balíček';
$string['downloadlanguagenotneeded'] = 'V inštalácii je možné pokračovať v jazyku \"$a\".';
$string['downloadlanguagesub'] = 'Teraz máte možnosť si stiahnuť si niektorý z jazykových balíčkov Moodle a pokračovať v tomto jazyku.<br /><br />Ak si práve nemôžete alebo nechcete stiahnuť jazykový balíček, bude inštalačný proces pokračovať v angličtine. Jazykové balíčky si budete môcť stiahnuť aj neskôr po ukončení inštalácie.';
$string['environmenterrortodo'] = 'Pre pokračovanie v inštalácii tejto verzie Moodle je nutné najprv vyriešiť problémy v programovom prostredí (chyby) serveru uvedené vyššie!';
$string['environmenthead'] = 'Kontrola programového prostredia...';
$string['environmentrecommendcustomcheck'] = 'ak tento test nebude úspešne vykonaný, indikuje to prítomnosť problému';
$string['environmentrecommendinstall'] = 'doporučený komponent';
$string['environmentrecommendversion'] = 'doporučená je verzia $a->needed, teraz používate verziu $a->current';
$string['environmentrequirecustomcheck'] = 'tento test musí byť úspešne splnený';
$string['environmentrequireinstall'] = 'vyžadovaný komponent';
$string['environmentrequireversion'] = 'vyžadovaná je verzia $a->needed, teraz používate verziu $a->current';
$string['environmentsub'] = 'Teraz sa preveruje, či vybrané komponenty vášho systému splňujú požiadavky inštalácie.';
$string['environmentxmlerror'] = 'Chyba pri zisťovaní údajov o programovom prostredí ($a->error_code)';
$string['error'] = 'Chyba';
$string['fail'] = 'Neúspešné';
$string['fileuploads'] = 'prenesené súbory';
$string['fileuploadserror'] = 'Toto by malo byť zapnuté';
$string['fileuploadshelp'] = '<p>Zdá sa, že na Vašom serveri nie je aktivovaný prenos súborov.</p>

<p>Moodle môže byť aj napriek tomu nainštalovaný, ale bez tejto možnosti, nebudete schopní preniesť súbory kurzu, alebo obrázky v nových používateľských profiloch.</p>

<p>Na aktivovanie prenosu súborov, Vy (alebo Váš systémový administrátor) budete musieť upraviť main php.ini súbor v systéme a zmeniť nastavenie pre <b>file_uploads</b> na \'1\'.</p>';
$string['gdversion'] = 'Verzia knižnice GD';
$string['gdversionerror'] = 'Knižnica GD by mala existovať na spracovávanie a vytváranie obrázkov';
$string['gdversionhelp'] = '<p>Na Vašom serveri zrejme nie je nainštalovaná GD knižnica.</p>

<p>GD je knižnica, ktorú si vyžaduje PHP, aby mohlo Moodle povoliť spracovávať obrázky (napr. ikony v používateľských profiloch) a vytvárať nové obrázky (napr. grafy z prihlásení). Moodle bude stále pracovať bez GD - tieto možnosti budú dostupné len Vám.</p>

<p>Keď chcete pridať GD do PHP pod Unixom, vytvorte PHP použitím --with-gd parameter.</p>

<p>Pod Windows môžete upraviť php.ini a odkomentovať riadok obsahujúci php_gd2.dll.</p>';
$string['globalsquotes'] = 'Nie bezpečné používanie globálnych premenných';
$string['globalsquoteserror'] = 'Opravte svoje nastavenia PHP: vypnite register_globals a/alebo zapnite magic_quotes_gpc';
$string['globalsquoteshelp'] = '<p>Kombinácia vypnutých Magic Quotes GPC a zapnutých Register Globals nie je doporučená.</p>

<p>Odporúčané nastavenie je<b>magic_quotes_gpc = On</b> a <b>register_globals = Off</b> vo vašom php.ini</p>

<p>Ak nemáte prístup k vašemu php.ini, skúste pridať nasledovný riadok do súboru .htaccess vo vašom  Moodle adresári:
<blockquote>php_value magic_quotes_gpc On</blockquote>
<blockquote>php_value register_globals Off</blockquote>
</p>';
$string['globalswarning'] = '<p><strong>Bezpečnostné upozornenie</strong>: pre správne fungovanie Moodle je nutné upraviť nastavenie PHP <br />na vašom serveri.<p/><p><em>Musíte</em> nastaviť <code>register_globals=off</code>. <p>Nastavenie skontrolujte v súbore <code>php.ini</code>, v konfiguračnom súbore Apache/IIS, alebo v súbore <code>.htaccess</code>.</p>';
$string['help'] = 'Pomoc';
$string['iconvrecommended'] = 'Inštalácia voliteľnej knižnice ICONV je vysoko doporučovaná, pretože zvyšuje výkon stránok, najmä ak používate mäkčeňové jazyky - napr. slovenčinu.';
$string['info'] = 'Informácie';
$string['installation'] = 'Inštalácia';
$string['invalidmd5'] = 'Neplatný MD5 hash';
$string['langdownloaderror'] = 'Bohužiaľ, jazyk \"$a\" sa nepodarilo nainštalovať. Inštalácia bude pokračovať v angličtine.';
$string['langdownloadok'] = 'Podarilo so úspešne nainštalovať jazykový balíček \"$a\". Inštalácia bude pokračovať v tomto jazyku.';
$string['language'] = 'Jazyk';
$string['magicquotesruntime'] = 'Magic Quotes Run Time';
$string['magicquotesruntimeerror'] = 'Toto by malo byť vypnuté';
$string['magicquotesruntimehelp'] = '<p>Magic quotes runtime by malo byť vypnuté, aby Moodle fungoval tak, ako má.</p>

<p>Zvyčajne je voľba štandardne vypnutá ... pozri nastavenia <b>magic_quotes_runtime</b> vo Vašom php.ini súbore.</p>

<p>Ak nemáte prístup k súboru php.ini, mali by ste nasledovný riadok do súboru s názvom .htaccess v rámci adresára Moodle: 
<blockquote>php_value magic_quotes_runtime Off</blockquote>
</p>';
$string['mbstringrecommended'] = 'Inštalácia voliteľnej knižnice MBSTRING je vysoko doporučovaná, pretože zvyšuje výkon stránok, najmä ak používate mäkčeňové jazyky - napr. slovenčinu.';
$string['memorylimit'] = 'Limit pamäte';
$string['memorylimiterror'] = 'PHP limit pamäte je nastavený na minimum...S týmto môžete mať neskôr problémy.';
$string['memorylimithelp'] = '<p>PHP limit pamäte pre Váš server je momentálne nastavený na $a.</p>

<p>Toto môže neskôr spôsobiť problémy v Moodle, najmä ak máte veľa modulov a/alebo veľa používateľov.</p>

<p>Odporúčame Vám, aby ste nastavili PHP s vyšším limitom pamäte, ak je to možné, napr. 40M. Na to existuje veľa spôsobov, ktoré môžete vyskúšať:</p>
<ol>
<li>Ak je to možné, znovu vytvorte PHP s <i>--enable-memory-limit</i>. Toto umožní Moodle samonastavenie limitu pamäte.</li>
<li>Ak máte prístup k Vášmu php.ini súboru, môžete zmeniť <b>memory_limit</b> nastavenie, napr. na 40M. Ak nemáte prístup k súboru, môžete sa na to spýtať Vášho administrátora.</li>
Na niektorých PHP serveroch, si môžete vytvoriť súbor .htaccess v Adresári Moodle, ktorý bude obsahovať tento riadok: <p><blockquote>php_value memory_limit 40M</blockquote></p>
<p>Avšak, na niektorých serveroch bude toto brániť <b>všetkým</b> PHP stránkam v práci (budete vidieť chyby, keď sa pozriete na stránky), takže budete musieť odstrániť súbor .htaccess.</p></li>
</ol>';
$string['missingrequiredfield'] = 'Chýba niektoré z povinných polí';
$string['moodledocslink'] = 'Moodle Docs pre túto stránku';
$string['mssql'] = 'SQL*Server (mssql)';
$string['mssqlextensionisnotpresentinphp'] = 'PHP nebolo správne nakonfigurované s MSSQL rozšírením, a tak nemôže komunikovať s SQL*Server. Prosím, skontrolujte si Váš php.ini súbor alebo znovu vytvorte PHP.';
$string['mssql_n'] = 'SQL*Server s UTF-8 podporou (mssql_n)';
$string['mysql'] = 'MySQL (mysql)';
$string['mysql416bypassed'] = 'Ak ale vo vašej inštalácii Moodle používate IBA jazyky založené na latinke (iso-8859-1), môžete aj ďalej používať súčasne nainštalovanú verziu MySQL 4.1.12 (alebo vyšší).';
$string['mysql416required'] = 'Minimálnou verziou potrebnou pre Moodle 1.6 -- a pre neskorší bezpečný prevod všetkých údajov do UTF-8 -- je MySQL 4.1.16.';
$string['mysqlextensionisnotpresentinphp'] = 'PHP nebolo správne nakonfigurované s MySQL rozšírením, a tak nemôže komunikovať s MySQL. Prosím, skontrolujte si Váš php.ini súbor alebo znovu vytvorte PHP.';
$string['mysqli'] = 'Vylepšené MySQL (mysqli)';
$string['mysqliextensionisnotpresentinphp'] = 'PHP nebolo správne nakonfigurované s rozšírením MySQLi, aby mohlo komunikovať s MySQL. Skontrolujte svoj súbor php.ini alebo prekompilujte PHP. Rozšírenie MySQLi  nie je dostupné pre PHP 4.';
$string['name'] = 'Meno';
$string['next'] = 'Ďalší';
$string['oci8po'] = 'Oracle (oci8po)';
$string['ociextensionisnotpresentinphp'] = 'PHP nebolo správne nakonfigurované s OCI8 rozšírením, a tak nemôže komunikovať s Oracle. Prosím, skontrolujte si Váš php.ini súbor alebo znovu vytvorte PHP.';
$string['odbcextensionisnotpresentinphp'] = 'PHP nebolo správne nakonfigurované s ODBC rozšírením, a tak nemôže komunikovať s SQL*Serverom. Prosím, skontrolujte si Váš php.ini súbor alebo znovu vytvorte PHP.';
$string['odbc_mssql'] = 'SQL*Server cez ODBC (odbc_mssql)';
$string['ok'] = 'OK';
$string['opensslrecommended'] = 'Pre beh sieťových funkcionalít (\"Moodle Networking\") je treba nainštalovať voliteľnú knižnicu OpenSSL.';
$string['parentlanguage'] = '<< PREKLADATELIA: Ak chcete definovať sekundárny jazyk, ktorý má Moodle používať v prípadoch, keď reťazce vo vašom jazykovom balíčku chýbajú, zadajte ho sem. Príklad: cs_utf8>>';
$string['pass'] = 'Prejsť';
$string['password'] = 'Heslo';
$string['pgsqlextensionisnotpresentinphp'] = 'PHP nebolo správne nakonfigurované s PGSQL rozšírením, a tak nemôže komunikovať s PostgreSQL. Prosím, skontrolujte si Váš php.ini súbor alebo znovu vytvorte PHP.';
$string['php50restricted'] = 'V PHP 5.0.x bolo nájdených množstvo chýb; prejdite buď na vyššiu verziu 5.1.x, alebo na nižšiu verziu 4.3.x či 4.4.x.';
$string['phpversion'] = 'Verzia PHP';
$string['phpversionerror'] = 'Verzia PHP musí byť aspoň  4.1.0';
$string['phpversionhelp'] = '<p>Moodle si vyžaduje verziu PHP aspoň  4.1.0.</p>
<p>Vy máte momentálne nainštalovanú túto verziu $a</p>
<p>Musíte obnoviť PHP alebo presunúť na hostiteľský počítač s novou verziou PHP!</p>';
$string['postgres7'] = 'PostgreSQL (postgres7)';
$string['postgresqlwarning'] = '<strong>Poznámka:</strong> Ak pozorujete občasné problémy s pripojením, môžete skúsiť nastaviť pole hostiteľského servera nasledovne
host=\'postgresql_host\' port=\'5432\' dbname=\'postgresql_database_name\' user=\'postgresql_user\' password=\'postgresql_user_password\'
a ponechajte prázdne polia databáza, používateľ a heslo. Viac informácií na <a href=\"http://docs.moodle.org/en/Installing_Postgres_for_PHP\">Moodle Docs</a>';
$string['previous'] = 'Predchádzajúci';
$string['qtyperqpwillberemoved'] = 'Počas aktualizácie budú odobrané otázky typu RQP. Nemali ste žiadne také, takže by ste nemali zbadať žiadne problémy.';
$string['qtyperqpwillberemovedanyway'] = 'Počas aktualizácie budú odobrané otázky typu RQP. Vo vašej databáze sa otázky takéhoto typu nachádzajú a nebudú fungovať ak nepreinštalujete program z http://moodle.org/mod/data/view.php?d=13&amp;rid=797 predtým, ako budete pokračovať v aktualizácii.';
$string['remotedownloaderror'] = 'Stiahnutie komponentu na server zlyhalo, skontrolujte nastavenia proxy, doporučené je PHP rozšírenie cURL. <br /><br />Musíte stiahnuť súbor <a href=\"$a->url\">$a->url</a> manuálne, skopírovať ho do \"$a->dest\" na serveri a rozzipovať ho tam.';
$string['remotedownloadnotallowed'] = 'Nahrávanie komponentov na server nie je povolené (direktíva allow_url_fopen je v stave \'vypnuté\').<br /><br />Musíte súbor stiahnuť <a href=\"$a->url\">$a->url</a> ručne, skopírovať ho na serveri do umiestnenia \"$a->dest\" a tam ho dekomprimovať.';
$string['report'] = 'Záznamy';
$string['restricted'] = 'Obmedzený';
$string['safemode'] = 'Bezpečný mód';
$string['safemodeerror'] = 'Moodle môže mať problémy, ak je zapnutý bezpečný mód';
$string['safemodehelp'] = '<p>Moodle môže mať viacero problémov, ak je zapnutý bezpečný mód, pravdepodobne nedovolí vytvárať nové súbory.</p>

<p>Bezpečný mód je zvyčajne povolený verejnými poskytovateľmi webového priestoru, takže by ste si mali nájsť nového poskytovateľa webového priestoru pre stránku Moodle.</p>';
$string['serverchecks'] = 'Kontroly servera';
$string['sessionautostart'] = 'Autoštart sekcie';
$string['sessionautostarterror'] = 'Toto by malo byť vypnuté';
$string['sessionautostarthelp'] = '<p>Moodle vyžaduje podporu sekcií a nebude bez nich fungovať.</p>';
$string['skipdbencodingtest'] = 'Preskočiť test kódovania DB';
$string['status'] = 'Status';
$string['thischarset'] = 'UTF-8';
$string['thisdirection'] = 'ltr';
$string['thislanguage'] = 'Slovenčina';
$string['unicoderecommended'] = 'Doporučujeme ukladanie údajov v kódovaní Unicode (UTF-8). Nové inštalácie by mali byť založené nad databázou s východzím kódovaním Unicode. Ak prechádzate z nižších verzií, mali by ste premigrovať na UTF-8 (viď stránku Administratíva).';
$string['unicoderequired'] = 'Je nutné ukladanie údajov v kódovaní Unicode (UTF-8). Nové inštalácie musia byť založené nad databázou s východzím kódovaním Unicode. Ak prechádzate z nižších verzií, mali by ste premigrovať na UTF-8 (viď stránku Administratíva).';
$string['user'] = 'Používateľ';
$string['welcomep10'] = '$a->installername ($a->installerversion)';
$string['welcomep20'] = 'Podarilo so vám úspešne nainštalovať a spustiť balíček <strong>$a->packname $a->packversion</strong>. Gratulujeme!';
$string['welcomep30'] = '<strong>$a->installername</strong> obsahuje aplikáciu k vytvoreniu prostredia, v ktorom bude prevádzkovaný váš <strong>Moodle</strong>. Menovite sa jedná o:';
$string['welcomep40'] = 'Balíček tiež obsahuje <strong>Moodle vo verzii $a->moodlerelease ($a->moodleversion)</strong>.';
$string['welcomep50'] = 'Použitie všetkých aplikácií v tomto balíčku je viazané ich príslušnými licenciami. Kompletný balíček <strong>$a->installername</strong> je software s <a href=\"http://www.opensource.org/docs/definition_plain.html\"> otvoreným kódom (open source)</a> a je šírený pod licenciou <a href=\"http://www.gnu.org/copyleft/gpl.html\">GPL</a>.';
$string['welcomep60'] = 'Nasledujúce stránky vás povedú v nekoľkých jednoduchých krokoch nastavením <strong>Moodle</strong> na vašom počítači. Môžete prijať východzie nastavenie, alebo si ich upraviť podľa svojich potrieb.';
$string['welcomep70'] = 'Stlačením nižšie uvedeného tlačidla \"Ďalší\" pokračujte v nastavení vašej inštalácie Moodle.';
$string['wrongdestpath'] = 'Chybné cieľové umiestnenie';
$string['wrongsourcebase'] = 'Chybné URL zdrojového serveru';
$string['wrongzipfilename'] = 'Chybné meno súboru ZIP';
$string['wwwroot'] = 'Web adresa';
$string['wwwrooterror'] = 'Táto web adresa pravdepodobne nie je platná - táto inštalácia Moodle tu pravdepodobne nie je.';
$string['xmlrpcrecommended'] = 'Pre beh sieťových funkcionalít (\"Moodle Networking\") je treba nainštalovať voliteľnú knižnicu xlmrpc.';
$string['ziprequired'] = 'Moodle v súčasnosti vyžaduje PHP zásuvný modul ZIP. Knižnice info-ZIP alebo PclZip už nie sú používané.';
?>
