import Irmin_ConnectionDB
import yagmail
from datetime import datetime, timedelta, date

def main():
    print('Conectando a la DB Irmin_Test...')
    mydb = Irmin_ConnectionDB.connectionDB()
    if mydb == False:
        print('Error en Conexion...Contacte al administrador del Sistema IRMIN')    
    else:
        print('Conexion realizada con exito...')
        body = checkDaily(mydb)
        sendEmail(body)

def checkDaily(mydb):
    today = date.today()
    time_from = ' 00:00:00'
    time_to = ' 23:59:59'
    yesterday = today - timedelta(days=1)
    today_body = str(today.day) + "/" + str(today.month) + "/" + str(today.year)
    yesterday_body = str(yesterday.day) + "/" + str(yesterday.month) + "/" + str(yesterday.year)
    yesterday_from = str(yesterday) + time_from
    yesterday_to = str(yesterday) + time_to
    sql = "SELECT * FROM irmin_test.images WHERE (fecha_hora_imagen > '" + yesterday_from + "' and fecha_hora_imagen < '" + yesterday_to + "'and hay_actividad = 1)"
    
    mycursor = mydb.cursor()
    try:
        mycursor.execute(sql)
        records = mycursor.fetchall()
        body = [
            "<p style='text-align: right;'>Fecha: " + today_body + "</p>",
            "<p><br></p>",
            "<p>Buenos d&iacute;as,</p>",
            "<p>En el dia " + yesterday_body + " se han encontrado " + str(mycursor.rowcount) + " im&aacute;genes con condiciones predisponentes para la ca&iacute;da de granizo.</p>",
            "<p><br></p>",
            "<p>Cualquier pregunta no dude en consultar al administrador del sistema proyecto: proyecto.irmin@gmail.com.</p>",
            "<p><br></p>",
            "<p>Muchas gracias,</p>",
            "<p><strong><u>IRMIN Admin</u></strong></p>",
        ]

        #New Informe
        datetimeNow = datetime.utcnow().strftime('%Y-%m-%d %H:%M:%S')
        fecha_hora_informe = created = modified = datetimeNow
        descripcion = "Fecha: " + today_body + " - En el dia " + yesterday_body + " se han encontrado " + str(mycursor.rowcount) + " imagenes con condiciones predisponentes para la caida de granizo."
        sql = "INSERT INTO informes (fecha_hora_informe, descripcion, created, modified) VALUES (%s, %s, %s, %s)"
        val = (fecha_hora_informe, descripcion, created, modified)
        mycursor = mydb.cursor()
        try:
            mycursor.execute(sql, val)
            mydb.commit()
            #print(mycursor.rowcount, "OK...")

            mycursor = mydb.cursor()
            mycursor.execute('SELECT MAX(id) from informes')
            result = mycursor.fetchall()
            for i in result:
                informe_id = i[0]
        except:
            body = "Error DB: Informe"

        #New Imagen-Informe
        for image in records:
            image_id = image[0]
            sql = "INSERT INTO images_informes (image_id, informe_id) VALUES (%s, %s)"
            val = (image_id, informe_id)
            mycursor = mydb.cursor()
            try:
                mycursor.execute(sql, val)
                mydb.commit()
                #print(mycursor.rowcount, "OK...")
            except:
                body = "Error en Imagenes e Informes"
    except:
        body = "Error DB: Informes"

    return body

def sendEmail(body):
    yag = yagmail.SMTP('proyecto.irmin@gmail.com', 'Proyectoirmin123')
    subject = 'Reporte Diario: ' + datetime.now().strftime("%d%m%Y")
    yag.send('donnelly.nicolas@gmail.com', subject, body)

#Code
main()