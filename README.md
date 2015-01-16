# inmobci
examen de primer trimestre con code igniter

añadir en este archivo de configuración:
sudo gedit /etc/apache2/sites-enabled/000-default.conf
esto (entre DocumentRoot y ErrorLog):

	<Directory /var/www/web/ci>
	    AllowOverride All
	</Directory>
