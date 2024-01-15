import os
add = {}
restaurantes = [
    {
        'nome': 'SushiTemaki',
        'categoria': 'Comida',
        'status': True
    },
    {
        'nome': 'BurguerDev',
        'categoria': 'Comida',
        'status': False
    }
]


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
    restaurante = input(f'Digite o nome: '),
    categoria = input(f'Digite a categoria: '),
    add = {
        'nome': restaurante,
        'categoria': categoria
    }
    restaurantes.append(add)
    print(f'O restaurante adicionado foi', adicionar_restaurante)
    main()


def listar_restaurante():
    print('Lista de restaurantes')
    for restaurante in restaurantes:
        print(f'Restaurante : ', restaurante['nome'], '|', restaurante['categoria'], '|', restaurante['status']),
    main()


def main():
    exibir_nome()
    mostrar_opcao()
    opcao_selecionada()


if __name__ == '__main__':
    main()
