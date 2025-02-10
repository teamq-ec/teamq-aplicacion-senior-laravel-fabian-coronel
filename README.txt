
1. instalar mysql como bd local
   - se deja por defecto usuario root y contraseña en blanco
   - bd es test que se crea con el script peliculas.sql

2. restaurar bd de archivo peliculas.sql
   - el archivo .env debe estar asi:
     	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=test
	DB_USERNAME=root
3. Se necesita Postman para probar la API REST
4. Lanzar la API-REST
5. Se utilizo Sanctum para la autenticacion basada en tokens
6. Todos los endponts estan bajo la capa de autenticacion por lo que para un login utilizar:
	 "email": "fcoronel@gmail.co2m", 
    	 "password": "$12$CPVrCjkgp57WA7rJh50ShOaLYLsbmW4wtD/LwYsIXFfqprT4lXYgO"
7. Esto logueo genera un token para poner como cabecera y poder acceder a todos los endpoints
8. estos son los enpoints a probar:
	http://127.0.0.1:8000/api/login
	http://127.0.0.1:8000/api/users
	http://127.0.0.1:8000/api/peliculas
	http://127.0.0.1:8000/api/peliculas/{id}/imagenes
	http://127.0.0.1:8000/api/peliculas?director={director}
	http://127.0.0.1:8000/api/peliculas?director={genero}
	http://127.0.0.1:8000/api/peliculas?director={estreno}