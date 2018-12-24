##Resultados query_v3

En el archivo php **query_v3.php** se utulizó la tecnica _prepared statements_ para crear las consultas y así mitigar los ataques por inyección SQL. 

Las inyecciones Probadas fueron: 

1) **URL: ** navegadorcito_v2/query_v1.php?rut=12345678%27OR%20%271=1
   **SQL Injection: ** SELECT​ ​%* ​ ​FROM ​ ​Alumno ​ ​WHERE ​ ​rut ​ ​= ​ ​12345678 ​ ​OR ​ ​1=1

2)	**URL: ** http://localhost/navegadorcito_v2/query_v1.php?rut=123%27%20and%20sleep(10)=%27 
	**SQL Injection: ** SELECT​ ​* ​ ​FROM ​ ​Alumno ​ ​WHERE ​ ​rut ​ ​= ​ ​12345678 and sleep(10)


para 1) luego de aplicar _prepared statements_, el navegador simplemente no muestra ningun resultado, y solo aparecen texto estandar imprimido por pantalla, por lo tanto la técnica aplicada detuvo la injección a pesar de existir un true permanente (OR 1=1) 


para 2)luego de aplicar _prepared statements_, el sitio no presenta mayores retrasos en la entrega de resultados, a pesar de exisitir un deelay de 10 segundos (sleep(10))