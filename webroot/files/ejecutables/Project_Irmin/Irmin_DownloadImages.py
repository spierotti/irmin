#URL Library
import urllib.request
import Irmin_ProcessImages
import Irmin_ProcessImages2
import Irmin_ConnectionDB
from PIL import Image
import os

def main():
    print('Conectacdo a la DB Irmin_Test...')
    mydb = Irmin_ConnectionDB.connectionDB()
    if mydb == False:
        print('Error en Conexion...Contacte al administrador del Sistema IRMIN')    
    else:
        print('Conexion realizada con exito...')
        print('Comenzando la descarga de Imagenes...')
        downloadImagesMain(mydb)


def downloadImagesMain(mydb):
    #Date Time import Library
    from datetime import datetime

    #NameUrl
    ##MainPath
    mainPath = 'http://estaticos.smn.gob.ar/vmsr/satelite/TOP_C13_ARG_ALTA_'

    ##Date
    date = datetime.utcnow().strftime("%Y%m%d")
    fecha = datetime.utcnow().strftime("%Y-%m-%d")

    ##Time
    hourIni = int(datetime.utcnow().strftime("%H"))

    #LastUpdate
    #Get lastUpdate
    mycursor = mydb.cursor()
    mycursor.execute('SELECT MAX(fecha_hora_actualizacion) FROM ultima_descarga')
    result = mycursor.fetchall()
    for i in result:
        lastUpdate = i[0]

    #Insert NewUpdate    
    datetimeNow = datetime.utcnow()
    fecha_hora_actualizacion = datetimeNow.strftime('%Y-%m-%d %H:%M:%S')
    salida = ""
    completado = 0
    
    total = int((datetimeNow - lastUpdate).total_seconds()/3600)
    #La web del SMN solo registra las ULTIMAS 24 imagenes (6 imagenes por hora [cada 10 min] de las ultimas 4/5 horas)
    
    if (total > 4):
        totHours = 4
    else:
        if total == 0:
            totHours = 1
        else:   
            totHours = total

    sql = "INSERT INTO ultima_descarga (fecha_hora_actualizacion, salida, total, completado) VALUES (%s, %s, %s, %s)"
    val = (fecha_hora_actualizacion, salida, ((totHours + 1) * 6), completado)
    mycursor = mydb.cursor()
    try:
        mycursor.execute(sql, val)
        mydb.commit()
        #print(mycursor.rowcount, "OK...")

        mycursor = mydb.cursor()
        mycursor.execute('SELECT MAX(id) from ultima_descarga')
        result = mycursor.fetchall()
        for i in result:
            maxID = i[0]
    except:
        print("Error DB: ultima_descarga")

    minCont = 0
    for h in range (totHours + 1):
        if hourIni - h < 10:
            hour = '0' + str(hourIni - h)
        else:
            hour = str(hourIni - h)  
        
        for m in (0, 10, 20, 30, 40, 50):
            if m < 10:
                min = '0' + str(m)
            else:
                min = str(m)  

            for s in range (60):
                if s < 10:
                    seg = '0' + str(s)
                else:
                    seg = str(s)  

                hora = hour + ':' + min + ':' + seg
                fecha_hora = fecha + ' ' + hora
                nameImage = date + '_' + hour + min + seg + 'Z.jpg'

                url = mainPath + nameImage

                try:
                    localPath = '/Users/nicolas.donnelly/Project_Irmin/Images/' + nameImage
                    urllib.request.urlretrieve(url, localPath)
                    resp = 1    
                except:
                    resp = 0

                imageID = 0
                if resp == 1:
                    mycursor = mydb.cursor()
                    sql = "SELECT id FROM images where photo = '" + nameImage + "'"
                    mycursor.execute(sql)
                    result = mycursor.fetchall()
                    for i in result:
                        imageID = i[0]

                    if imageID == 0:
                        if Irmin_ProcessImages2.processImage(localPath) == True:
                            hay_actividad = 1
                            msj = "Imagen encontrada: " + nameImage + " con riesgo...\n"
                        else:              
                            hay_actividad = 0
                            msj = "Imagen encontrada " + nameImage + " sin riesgo...\n"
                        
                        print(msj)
                        salida = salida + msj

                        photo = nameImage
                        photo_dir = localPath
                        created = datetime.now()
                        modified = created
                        copyI2DB(mydb, fecha_hora, photo, photo_dir, hay_actividad, created, modified)
             
            minCont = minCont + 1
            
            #Update LastUpdate - Completado
            completado = minCont
            sql = "UPDATE ultima_descarga SET completado = %s WHERE id = %s"
            val = (completado, maxID)
            mycursor = mydb.cursor()
            try:
                mycursor.execute(sql, val)
                mydb.commit()
                #print(mycursor.rowcount, "OK...")
            except:
                print("Error DB: ultima_descarga - completado")

    #Update LastUpdate - Salida
    if salida == "":
        salida = 'No se han encontrado nuevas imagenes'
    sql = "UPDATE ultima_descarga SET salida = %s WHERE id = %s"
    val = (salida, maxID)
    mycursor = mydb.cursor()
    try:
        mycursor.execute(sql, val)
        mydb.commit()
        #print(mycursor.rowcount, "OK...")
    except:
        print("Error DB: ultima_descarga - salida")    



def copyI2DB(mydb, fecha_hora, photo, photo_dir, hay_actividad, created, modified):
    sql = "INSERT INTO images (fecha_hora_imagen, photo, photo_dir, hay_actividad, created, modified) VALUES (%s, %s, %s, %s, %s, %s)"
    val = (fecha_hora, photo, photo_dir, hay_actividad, created, modified)
    
    mycursor = mydb.cursor()
    try:
        mycursor.execute(sql, val)
        mydb.commit()
        #print(mycursor.rowcount, "Image inserted...")
    except:
        print("Error DB: image")

main()

#https://towardsdatascience.com/color-identification-in-images-machine-learning-application-b26e770c4c71
#https://www.youtube.com/watch?v=3MFGufhCzyo