from models.Restaurant import Restaurant

restaurant_praca = Restaurant('Praça', 'Gourmet')
restaurant_praca.evaluation('Allan Rodrigues', 10)


def main():
    Restaurant.list_restaurant()


if __name__ == '__main__':
    main()