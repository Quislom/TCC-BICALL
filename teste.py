import serial

# Conectar-se à porta serial do Arduino
ser = serial.Serial('COM3', 9600)  # Substitua COM_PORT pela sua porta serial correta

# Esperar por dados do Arduino
while True:
    line = ser.readline().decode('utf-8').strip()  # Lê a linha do Arduino
    print(f"ID da digital recebido: {line}")  # Exibe a mensagem do Arduino no terminal

    if "Botão de deletar pressionado" in line:
        # Solicitar ID da digital ao usuário
        id_digital = input("Digite o ID da digital que deseja excluir (de 1 a 127): ")
        try:
            id_digital = int(id_digital)
            if 1 <= id_digital <= 127:
                print(f"ID da digital {id_digital} para exclusão")
                # Enviar ID para o Arduino ou banco de dados
            else:
                print("ID inválido.")
        except ValueError:
            print("Por favor, insira um número válido.")
