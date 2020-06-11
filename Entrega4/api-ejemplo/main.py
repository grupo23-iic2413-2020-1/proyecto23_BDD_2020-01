from flask import Flask, render_template, request, abort, json
from pymongo import MongoClient
import pandas as pd
import matplotlib.pyplot as plt
import os

# Para este ejemplo pediremos la id
# y no la generaremos automáticamente
USER_KEYS = ['uid', 'name', 'last_name',
            'occupation', 'follows', 'age']

USER = "grupo23"
PASS = "grupo23"
DATABASE = "grupo23"

# El cliente se levanta en la URL de la wiki
# URL = "mongodb://grupoXX:grupoXX@gray.ing.puc.cl/grupoXX"
URL = f"mongodb://{USER}:{PASS}@gray.ing.puc.cl/{DATABASE}"
client = MongoClient(URL)

# Utilizamos la base de datos del grupo
db = client["grupo23"]

# Seleccionamos la collección de usuarios
usuarios = db.users
mensajes = db.messages


'''
Usuarios:
  "uid": <id del usuario>,
  "name": <nombre>,
  "last_name": <apellido>,
  "age": <edad>,
  "occupation": <a qué se dedica>,
  "follows": [<arreglo con una lista de ids de usuarios>]
'''

# Iniciamos la aplicación de flask
app = Flask(__name__)

@app.route("/")
def home():
    '''
    Página de inicio
    '''
    
    text = "<h1>Entrega 4: API Grupo 23-50 </h1>"
    return text

# Mapeamos esta función a la ruta '/plot' con el método get.
@app.route("/plot")
def plot():
    '''
    Muestra un gráfico a partir de los datos ingresados
    '''
    # Ejemplo no directamente relacionado con la entrega
    # Pero que muestra las cosas que son posibles hacer
    # con nuestra API

    # Obtenermos todos los usuarios
    users = usuarios.find({}, {"_id": 0})

    # Hacemos un data frame (tabla poderosa) con la columna
    # 'name' indexada
    df = pd.DataFrame(list(users)).set_index('name')

    # Hacemos un gráfico de pi en base a la edad
    df.plot.pie(y='age')

    # Export la figura para usarla en el html
    pth = os.path.join('static', 'plot.png')
    plt.savefig(pth)

    # Retorna un html "rendereado"
    return render_template('plot.html')

@app.route("/users")
def get_users():
    '''
    Obtiene todos los usuarios
    '''
    # Omitir el _id porque no es json serializable
    resultados = list(usuarios.find({}, {"_id": 0}))
    return json.jsonify(resultados)

@app.route("/users/<int:uid>")
def get_user(uid):
    '''
    Obtiene el usuario de id entregada
    '''
    user = list(usuarios.find({"uid": uid}, {"_id": 0}))
    if len(user) > 0:
        messages = list(mensajes.find({"sender": uid}, {"_id": 0, "date": 0, "lat": 0, "long": 0, "sender": 0, "mid": 0, "receptant": 0}))
        retorno = {"user": user, "messages": messages}
        #sort_retorno = sorted(retorno.items(), reverse=True)
        return json.jsonify(retorno)
    
    else:
        text = "<h1>Error: No existe el usario con uid: {}  </h1>".format(uid)
        return text
        
    

@app.route("/users", methods=['POST'])
def create_user():
    '''
    Crea un nuevo usuario en la base de datos
    Se  necesitan todos los atributos de model, a excepcion de _id
    '''

    # En este caso nos entregarán la id del usuario,
    # Y los datos serán ingresados como json
    # Body > raw > JSON en Postman
    data = {key: request.json[key] for key in USER_KEYS}

    # El valor de result nos puede ayudar a revisar
    # si el usuario fue insertado con éxito
    result = usuarios.insert_one(data)

    return json.jsonify({'success': True, 'message': 'Usuario con id 1 creado'})


@app.route("/test")
def test():
    # Obtener un parámero de la URL
    # Ingresar desde Params en Postman
    # O agregando ?name=... a URL
    param = request.args.get('name', False)
    print("URL param:", param)

    # Obtener un header
    # Ingresar desde Headers en Postman
    param2 = request.headers.get('name', False)
    print("Header:", param2)

    # Obtener el body
    # Ingresar desde Body en Postman
    body = request.data
    print("Body:", body)

    return f'''
            OK
            <p>parámetro name de la URL: {param}<p>
            <p>header: {param2}</p>
            <p>body: {body}</p>
            '''

@app.route("/messages")
def get_messages():
    '''
    Obtiene todos los usuarios
    '''
    # Omitir el _id porque no es json serializable
    id1 = request.args.get("id1")
    id2 = request.args.get("id2")
    
    if id1 and id2:
        id1 = int(id1)
        id2 = int(id2)
        resultados = list(mensajes.find({"$or": [{"sender": id1, "receptant": id2},
        {"sender": id2, "receptant": id1}]}, {"_id": 0}))
        if len(resultados) > 0:
            return json.jsonify(resultados)

        else:
            text = "<h1>No existen mensajes entre:  {} y {} </h1>".format(id1, id2)
            return text
            

    else:
        resultados = list(mensajes.find({}, {"_id": 0}))

        return json.jsonify(resultados)
    #text = "<h1>Somos: {} </h1>".format([id1, id2])
    #return text

@app.route("/messages/<int:mid>")
def get_message(mid):
    '''
    Obtiene el mensaje de id entregada
    '''
    message = list(mensajes.find({"mid": mid}, {"_id": 0}))
    if len(message) > 0:
        return json.jsonify(message)

    else:
        text = "<h1>Error: No existe mensaje con mid: {}  </h1>".format(mid)
        return text


if __name__ == "__main__":
    app.run()
    # app.run(debug=True) # Para debuggear!
# ¡Mucho ánimo y éxito! ¡Saludos! :D
