@echo off

rem *************************************************************
rem ** Symfony - Reset modelu symfony z bazy
rem *************************************************************

call symfony.bat propel:build-schema
call symfony.bat propel:build --model
call symfony.bat propel:data-dump dump.yml
call symfony.bat propel:build --all --no-confirmation
call symfony.bat propel:insert-sql --no-confirmation
call symfony.bat propel:data-load
call symfony.bat cc