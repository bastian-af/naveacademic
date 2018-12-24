#SQL Injection

El ataque realizado con inyección sql corresponde al tipo **Time-Based Blind**, estas inyecciones 
realizan ataques relacionados al tiempo de respuesta del sitio. En este caso en particular la inyección
retrasa la respuesta del servidor 10 segundos, por lo que cuando se ingresa al sitio web no se proyecta ningún resultado
hasta que se acabe este tiempo.

URL: http://localhost/navegadorcito_v2/query_v1.php?rut=123%27%20and%20sleep(10)=%27 

Resultado URL: http://localhost/navegadorcito_v2/query_v1.php?rut=123' and sleep(10)='

Nota: Se Utilizo un rut distinto al ejemplo debido a que éste fue eliminado de la DB. Por lo que si el rut utilizado en esta inyección llega a ser eliminado, la inyección queda inutilizable