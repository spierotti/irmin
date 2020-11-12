from PIL import Image
from numpy import asarray
import numpy as np


def compareImage(data):
    # Opens a image in RGB mode 
    coloursImage = Image.open('/xampp/htdocs/irmin/webroot/files/ejecutables/Project_Irmin/Images/Colors.png')  
   
    # Size of the image in pixels (size of orginal image) 
    # (This is not mandatory) 
    width, height = coloursImage.size 
    
    # Setting the points for cropped image 
    left = 160
    top = 48
    right = 370
    bottom = 100
    
    # Cropped image of above dimension 
    # (It will not change orginal image) 
    colours = coloursImage.crop((left, top, right, bottom)) 
    
    # Shows the image in image viewer 
    #colours.show() 
    
    # convert image to numpy array
    dataC = asarray(colours)
    dataC = dataC.reshape(dataC.shape[0]*dataC.shape[1],dataC.shape[2])
    dataC = [str(x) for x in dataC]
    dataC = np.unique(dataC)

    existe = False
    pixel = 0
    for pixel in dataC:
        if pixel in data:
            print ('Encontro: ' + pixel)
            return True
    return False        
        

def processImage(localPath):

    # Opens a image in RGB mode 
    newImage = Image.open(localPath) 
    
    # Size of the image in pixels (size of orginal image) 
    # (This is not mandatory) 
    width, height = newImage.size 
    
    # Setting the points for cropped image 
    left = 360
    top = 100
    right = 630
    bottom = 650
    
    # Cropped image of above dimension 
    # (It will not change orginal image) 
    subImage = newImage.crop((left, top, right, bottom))
    
    # Shows the image in image viewer 
    #subImage.show() 
    
    # convert image to numpy array
    data = asarray(subImage)
    data = data.reshape(data.shape[0]*data.shape[1],data.shape[2])
    data = [str(x) for x in data]
    data = np.unique(data)

    for px in data:
        px=px.replace('[','')
        px=px.replace(']','')
        px=px.split()

        r=int(px[0]) + 1
        g=int(px[1]) + 1
        b=int(px[2]) + 1

        if r == 254 and g == 154 and b == 7:
            print('Aca esta!')


        br = 1.0*b/r 
        rgbr = 1.0*(r-g-b)/r
        if br <= 0.35 and rgbr > 0.32 and r > 90:
            return True

    return compareImage(data)