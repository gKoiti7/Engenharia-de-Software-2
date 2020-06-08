import pymysql
import datetime
import time

def Funcao_Alimentar_Banco(servidores,contador3):
# Criação de tabela com a data 
    conexão = pymysql.connect(
        host = "localhost",
        user = "root",
        passwd = "",
        database = "servidores"
        )

    agora = datetime.datetime.now() 
    data_strin = "`"+str(agora.day)+" "+str(agora.month)+" "+str(agora.year)+"`"
    dat = "ALTER TABLE `transparencia`ADD COLUMN "+(data_strin)+" DOUBLE"
    cursor = conexão.cursor()
    
    cursor.execute(dat)
    print(agora.hour,agora.minute,agora.second)
    # subir para o bd
    for x in range(0, contador3):
        for y in range(0, 10):
            servlist = list(servidores[x][y].values())
                       
            Funcao_Alimentar(servlist[0],servlist[1],servlist[2],data_strin)
    print("concluido")

def Funcao_Alimentar(Nome_Funcionario,Nome_Cargo,Novo_Salario,data_strin):
    conexão = pymysql.connect(
    host = "localhost",
    user = "root",
    passwd = "",
    database = "servidores"
    )
    mycursor = conexão.cursor()
    mycursor.execute("SELECT * FROM transparencia")
    myresult = mycursor.fetchall()

    for row in myresult:
        Sala = round (Novo_Salario,5)
        Nome_Coluna =str(data_strin)
        try:
            carregar = str("UPDATE `servidores`.`transparencia` SET "+ Nome_Coluna +"='"+str(Sala)+"' WHERE  `Nome`='"+str(Nome_Funcionario)+"' ")
            mycursor.execute(carregar)
        except:
            #Se nao for um funcionario ja cadastrado,sera cadastrado no banco
            carreg = str("INSERT INTO transparencia(Nome, Cargo, "+Nome_Coluna+") VALUES(%s,%s,%s)")
            valores = (Nome_Funcionario,Nome_Cargo,Sala)
            mycursor.execute(carreg,valores)
            break
    conexão.commit()

      
