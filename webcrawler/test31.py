import pymysql
conexão = pymysql.connect(
    host = "localhost",
    user = "root",
    passwd = ""
)
cursor = conexão.cursor()
cursor.execute("CREATE DATABASE funcionariosbd")