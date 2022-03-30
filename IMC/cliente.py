import socket
import pickle

host = socket.gethostname()
porta = 5454
tamanho = 1024
conexao = (host, porta)

serverSocket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
serverSocket.connect(conexao)

usuarios = []
imcs = []
alturas = []
massas = []

print("Calculadora de IMC - Multithread\nPreencha os dados para calcular seu IMC")
usuario = input("Nome de Usuário: ")
massa = float(input("Massa (Kg): "))
altura = float(input("Altura (m): "))

data = {}
data['operacao'] = "1"
data['massa'] = massa
data['altura'] = altura

serverSocket.send(pickle.dumps(data))

resposta = pickle.loads(serverSocket.recv(tamanho))

serverSocket.close()

print("Resultado:\n{}\nSeu IMC é {:.2f}\nVocê está {}".format(usuario, resposta['imc'], resposta['msg']))