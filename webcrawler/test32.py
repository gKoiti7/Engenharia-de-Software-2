import pymysql
conexão = pymysql.connect(
    host = "localhost",
    user = "root",
    passwd = "",
    database = "funcionariosbd"
)
cursor = conexão.cursor()
cursor.execute("CREATE TABLE funcionarios(id INT AUTO_INCREMENT PRIMARY KEY,nome VARCHAR(255),cargo VARCHAR(255),salario VARCHAR(255))")
