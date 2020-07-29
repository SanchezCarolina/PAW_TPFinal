# Programación en Ambiente Web 2019 - Trabajo Práctico Final

## PASOS A SEGUIR PARA EJECUTAR EL SISTEMA EN LOCALHOST:

-Dirigirse a la carpeta 'config' abrir el archivo 'parameters.php' y a continuacion en la linea que muestre lo siguiente:
'define ("base_url", "http://localhost/SanchezTPFinal/");' 
cambiar la url con los datos reales de donde hayas colocado la carpeta del proyecto y con el nombre correspondiente.

-Crear una base de datos en PhpMyAdmin. Para eso entrar en la carpeta 'database' y copiar el contenido del archivo 'database.sql', luego pegarlo en la seccion SQL de PhpMyAdmin.

-Cargar la base de datos para que la página cuente con la información minima para funcionar. Para ello, primero crear mediante la web un usuario admin con la siguiente informacion (mail: admin@gmail.com, contraseña: admin) y otro usuario comun con la informacion(usuario1@gmail.com, contraseña: usuario1). Luego entrar en la carpeta 'database' y copiar el contenido del archivo 'datos_base.txt', luego pegarlo en la seccion SQL de la base de datos creada anteriormente.

-Para el usuario admin, entrar a PHPMyAdmin y modificar el rol del usuario, en lugar de 'user' colocar 'admin'.

-Para probar el funcionamiento del formulario de contacto con que cuenta el sistema se deberá modificar el archivo 'enviarCorreo.php' el cual se encuentra en 'views/usuario/enviarCorreo.php'. Una vez dentro del archivo modificar la siguiente linea: " $mail->addAddress('caro17sanchez@gmail.com');" borrar la direccion de correo electronico que aparece ahí y en su lugar agregar otra a la que se tenga acceso.

-Modificar, si fuera necesario, el archivo 'db.php' que se encuentra dentro de la carpeta 'config', para poder establecer la conexión con la base de datos creada. 

-El sistema ya está listo para su uso.

