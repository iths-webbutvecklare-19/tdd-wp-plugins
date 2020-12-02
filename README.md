# Testa plugins med TDD och PHPUnit

Installera Composer:
```bash
# Ställ dig i WordPress-mappen (htdocs) och skriv:
omposer require --dev phpunit/phpunit
```
För att starta PHPUnit:
```bash
# Composer lägger PHPUnit inuti mappen "vendor/bin/"
cd wp-content/plugins/

# Vi befinner oss i mappen "wp-content/plugins/" och måste backa ut två steg med ".."
# "nikama" är namnet på pluginet
..\..\vendor\bin\phpunit.bat nikama/tests/CartTest.php
```

Det är inte praktiskt att testa enskilda filer på det här sättet, så i större projekt bör man skapa start-skript eller alias. Exempel alias:
```bash
# MacOS
alias tdd=..\..\vendor\bin\phpunit $*

# Windows
alias tdd=..\..\vendor\bin\phpunit.bat $*
```
