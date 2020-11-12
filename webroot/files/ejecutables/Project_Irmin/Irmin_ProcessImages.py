from PIL import Image

# Open an Image
def open_image(path):
  newImage = Image.open(path)
  return newImage

def compareImage(coloursList):
    [red, green, blue] = coloursList
    coloursImage = open_image('/Users/nicolas.donnelly/Project_Irmin/Images/Colors.jpg')  
    pixeles = coloursImage.load()
    
    # x between 140-220
    xini = x = 140
    xfin = 220
    
    # y constant 60
    y = 60

    ok = False
    width, height = coloursImage.size
    while ok == False and x < xfin:   
        [rc, gc, bc] = pixeles[x,y]
        if [red, green, blue] == [rc, gc, bc] :
            ok = True
        else:
            ok = False
        x = x + 1  
    return ok
        

def processImage(localPath):
    newImage = open_image(localPath)
    pixeles = newImage.load()
    #width, height = newImage.size

    x = 360
    width = 600
    
    height = 650
    ok = False
    while ok == False and x < width:
        y = 100
        while ok == False and y < height:
            [red, green, blue] = pixeles[x,y]
            if compareImage([red, green, blue]) == True:
                ok = True
            else:
                ok = False
            y = y + 1   
        x = x + 1     
    return ok

