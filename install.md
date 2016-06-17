## Installazione ##
Assicurarsi di avere Apache, PHP e mySQL installati e configurati.

### Passi installazione: ###
* Creare un database su mySQL
    * "create database [nome_db];"
* Importare lo scheletro del database;
    * "mysqldump -u [nome_utente] -p [nome_db] < dump.sql"
* Copiare la cartella wp_raga10 nella cartella di Apache
* Modificare il file wp-config.php che si trova nella cartella appena copiata e inserire le proprie credenziali di accesso di mySQL,il nome del database e l'indirizzo IP del dbms;
* Installare il pacchetto php-gd / php5-gd per abilitare il supporto ai captcha
    * Scommentare la riga "extension=gd.so" nel file [/etc/php/php.ini]
* Ora tutto dovrebbe funzionare!


### Accounts ###
L'account admin predefinito è:
username = TecnicoDiTerritorio
password = password

Gli account esempio associazione sono:
username = AssociazioneA
password = password

username = AssociazioneB
password = password
