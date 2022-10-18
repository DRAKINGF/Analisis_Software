Pasos para tener la base de datos actual, primero crear una base de datos en pgAdmin 
los datos necesarios y relevantes serán los siguientes

1)para el nombre de la base de datos le pondrán la por defecto que es: 
$bd='postgres'; (Variables de Código fuente)
tienen que ir a la parte de schemas para poder escoger él por defecto que es "public"
revisar si tienen tablas creadas le hacen backup si quieren, pero no es necesario, solo 
borran ese esquema y crean uno nuevo con el mismo nombre "public".

2)
luego el usuario por defecto que es:
$user='postgres';(Variables de Código fuente)

3) y por último la contraseña del usuario de pgAdmin que es :
$pass='1234';(Variables de Código fuente)
solo tienen que cambiar en el código o cambian la contraseña en pgAdmin para 
la contraseña del codigo fuente

Luego de hacer lo anterior tendrán que ir al esquema public que han creado y crear una 
una herramienta de querys o queryTools o eso mismo, para poder ingresar las consultas
en orden en que aparezcan solo ejecutan todas las consultas, Actualmente en el archivo Restaurar BD (LEER)
