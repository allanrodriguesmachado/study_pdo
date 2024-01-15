import os

restaurantes = ['Pizza Boa', 'SushiJapa']

def exibir_nome():
    print("""
    ░██████╗░█████╗░██████╗░░█████╗░██████╗░  ███████╗██╗░░██╗██████╗░██████╗░███████╗░██████╗░██████╗
    ██╔════╝██╔══██╗██╔══██╗██╔══██╗██╔══██╗  ██╔════╝╚██╗██╔╝██╔══██╗██╔══██╗██╔════╝██╔════╝██╔════╝
    ╚█████╗░███████║██████╦╝██║░░██║██████╔╝  █████╗░░░╚███╔╝░██████╔╝██████╔╝█████╗░░╚█████╗░╚█████╗░
    ░╚═══██╗██╔══██║██╔══██╗██║░░██║██╔══██╗  ██╔══╝░░░██╔██╗░██╔═══╝░██╔══██╗██╔══╝░░░╚═══██╗░╚═══██╗
    ██████╔╝██║░░██║██████╦╝╚█████╔╝██║░░██║  ███████╗██╔╝╚██╗██║░░░░░██║░░██║███████╗██████╔╝██████╔╝
    ╚═════╝░╚═╝░░╚═╝╚═════╝░░╚════╝░╚═╝░░╚═╝  ╚══════╝╚═╝░░╚═╝╚═╝░░░░░╚═╝░░╚═╝╚══════╝╚═════╝░╚═════╝░  
    """)


def mostrar_opcao():
    print("1. Cadastrar restaurante")
    print("2. Listar restaurante")
    print("3. Ativar restaurante")
    print("4. Sair \n")


def opcao_selecionada():
    try:
        options_choose = int(input("Escolha um opção: "))

        def finalizar_app():
            os.system('cls')
            print('Finalizando App')

        if options_choose == 1:
            adicionar_restaurante()
            exit()

        if options_choose == 2:
            listar_restaurante()
            exit()

        if options_choose == 3:
            print("Ativar restaurante")
            exit()

        if options_choose == 4:
            finalizar_app()
            exit()

        opcao_invalida()
    except:
        opcao_invalida()


def opcao_invalida():
    os.system('cls')
    print("Opção invalida")
    input("Digite qualquer tecla para voltar para o menu principal")
    main()


def adicionar_restaurante():
    print('Digite o nome do restaurante que deseja cadastrar')
    adicionar = input(f'Digite o nome: ')
    restaurantes.append(adicionar)
    print(f'O restaurante adicionado foi', adicionar)
    main()


def listar_restaurante():
    print('Lista de restaurantes')
    for restaurante in restaurantes:
        print(f'O restaurantes cadastrados: {restaurante}')
    # main()


def main():
    exibir_nome()
    mostrar_opcao()
    opcao_selecionada()


if __name__ == '__main__':
    main()
