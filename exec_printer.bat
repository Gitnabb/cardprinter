@echo on
SET file=%1
"C:\Program Files (x86)\Foxit Software\Foxit Reader\FoxitReader.exe" /t C:\xampp\htdocs\printer\%file%

echo ---- Print started ---- >> printer.log
echo File %file% was downloaded from astudent server and sent to printer >> printer.log
echo Print queue: >> printer.log
Cscript %WINDIR%\System32\Printing_Admin_Scripts\en-US\Prnjobs.vbs -l | find "enumerated" >> printer.log
echo Date was %date% %time% >> printer.log
echo ---- Print stopped ---- >> printer.log
echo - >> printer.log

del %file%