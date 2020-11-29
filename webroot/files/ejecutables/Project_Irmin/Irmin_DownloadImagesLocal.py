#URL Library
import urllib.request
import Irmin_ProcessImages
import Irmin_ProcessImages2
import Irmin_ConnectionDB
from PIL import Image
import os
import numpy as np


def main():

    print('Conectando a la DB Irmin_Test...')
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
    #mainPath = 'http://estaticos.smn.gob.ar/vmsr/satelite/TOP_C13_ARG_ALTA_'
    #mainPath = '/Users/nicolas.donnelly/Project_Irmin/Local/'
    mainPath = '/xampp/htdocs/irmin/webroot/files/images/photo/origen/'

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
    fecha_hora_actualizacion = datetime.now().strftime('%Y-%m-%d %H:%M:%S')
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

        mycursor = mydb.cursor()
        mycursor.execute('SELECT MAX(id) from ultima_descarga')
        result = mycursor.fetchall()
        for i in result:
            maxID = i[0]
    except:
        print("Error DB: ultima_descarga")

    minCont = 0
    conR = sinR = 0
    segOK = ''
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

            s = 0
            while s < 61:
                if segOK == '':
                    if s < 10:
                        seg = '0' + str(s)
                    else:
                        seg = str(s)  
                else:
                    seg = segOK

                hora = hour + ':' + min + ':' + seg
                fecha_hora = fecha + ' ' + hora
                nameImage = date + '_' + hour + min + seg + 'Z.jpg'

                url = mainPath + nameImage

                try:
                    #localPath = '/Users/nicolas.donnelly/Project_Irmin/Images2/' + nameImage
                    localPath = '/xampp/htdocs/irmin/webroot/files/images/photo/Images/' + nameImage
                    #urllib.request.urlretrieve(url, localPath)
                    #shutil.move(url, localPath)
                    os.rename(url, localPath)
                    resp = 1    
                except:
                    if segOK != '':
                        segOK = ''
                        s = 0
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
                            conR = conR + 1
                            msj = "Imagen encontrada: " + nameImage + " con riesgo...\n"
                        else:              
                            hay_actividad = 0
                            sinR = sinR + 1
                            msj = "Imagen encontrada: " + nameImage + " sin riesgo...\n"
                        
                        print(msj)
                        #salida = salida + msj
                        segOK = seg
                        s = 99
                        photo = nameImage
                        photo_dir = 'Images' #localPath
                        created = datetime.now()
                        modified = created
                        copyI2DB(mydb, fecha_hora, photo, photo_dir, hay_actividad, created, modified)
                s = s + 1

            minCont = minCont + 1
            
            #Update LastUpdate - Completado
            completado = minCont
            sql = "UPDATE ultima_descarga SET completado = %s WHERE id = %s"
            val = (completado, maxID)
            mycursor = mydb.cursor()
            try:
                mycursor.execute(sql, val)
                mydb.commit()
            except:
                print("Error DB: ultima_descarga - completado")

    #Update LastUpdate - Salida
    msj = 'Proceso finalizado con Exito. '
    if conR == 0 and sinR == 0:
        salida = msj + 'No se han encontrado nuevas imagenes'
    else:
        salida = msj + 'Se han encontrado ' + str(conR) + ' imagenes con riesgo y ' + str(sinR) + ' imagenes sin riesgo.'   

    sql = "UPDATE ultima_descarga SET salida = %s WHERE id = %s"
    val = (salida, maxID)
    mycursor = mydb.cursor()
    try:
        mycursor.execute(sql, val)
        mydb.commit()
        print("Descargar finalizada con Exito")
    except:
        print("Error DB: ultima_descarga - salida")    


#Insert Images in DB
def copyI2DB(mydb, fecha_hora, photo, photo_dir, hay_actividad, created, modified):
    sql = "INSERT INTO images (fecha_hora_imagen, photo, photo_dir, hay_actividad, created, modified) VALUES (%s, %s, %s, %s, %s, %s)"
    val = (fecha_hora, photo, photo_dir, hay_actividad, created, modified)
    
    mycursor = mydb.cursor()
    try:
        mycursor.execute(sql, val)
        mydb.commit()
    except:
        print("Error DB: image")

#MAIN Program
main()