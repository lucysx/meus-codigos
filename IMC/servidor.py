from socket import *
import pickle
import threading
servidor = socket(AF_INET, SOCK_STREAM)
host = gethostname()
porta = 5454
tamanho = 1024
servidor.bind((host, porta))
servidor.listen()
print("Conectado na porta %s." % porta)

def handle_client(clientsocket, addr):
    print("Conexão com %s" % str(addr))

    data = pickle.loads(clientsocket.recv(tamanho))

    if data['operacao'] == "1":
        massa = data['massa']
        altura = data['altura']

        resultado = {}
        altura = altura * altura
        resultado['imc'] = massa / altura

        if resultado['imc'] < 18.5:
            resultado['msg'] = "abaixo do peso"
        elif resultado['imc'] < 25:
            resultado['msg'] = "no peso normal"
        elif resultado['imc'] < 30:
            resultado['msg'] = "com sobrepeso"
        elif resultado['imc'] < 35:
            resultado['msg'] = "com obesidade de grau 1"
        elif resultado['imc'] < 40:
            resultado['msg'] = "com obesidade de grau 2"
        else:
            resultado['msg'] = "com obesisdade de grau 3"

    clientsocket.send(pickle.dumps(resultado))

    clientsocket.close()

while True:
    clientsocket, addr = servidor.accept()
    thread = threading.Thread(target=handle_client, args=(clientsocket, addr))
    thread.start()