##Resultados query_v2

En el archivo php **query_v2.php** se aplicó santinización para mitigar los ataques por inyección SQL. 

Las inyecciones Probadas fueron: 

1) 	**URL: ** navegadorcito_v2/query_v1.php?rut=12345678%27OR%20%271=1
   	**SQL Injection: ** SELECT​ ​%* ​ ​FROM ​ ​Alumno ​ ​WHERE ​ ​rut ​ ​= ​ ​12345678 ​ ​OR ​ ​1=1

2)	**URL: ** http://localhost/navegadorcito_v2/query_v1.php?rut=123%27%20and%20sleep(10)=%27 
	**SQL Injection: ** SELECT​ ​* ​ ​FROM ​ ​Alumno ​ ​WHERE ​ ​rut ​ ​= ​ ​12345678 and sleep(10)


para 1) luego de aplicar la satinización, el navegador simplemente no muestra ningun resultado, por lo tanto la sanitización detuvo la injección a pesar de existir un true permanente (OR 1=1).

para 2)luego de aplicar satinización, el sitio no presenta mayores retrasos en la entrega de resultados, a pesar de exisitir un deelay de 10 segundos (sleep(10))