from models.Restaurant import Restaurant

restaurant_praca = Restaurant('Praça', 'Gourmet')
restaurant_praca.evaluation('Allan Rodrigues', 10)
restaurant_praca.evaluation('Allan Rodrigues', 3)
restaurant_praca.evaluation('Allan Rodrigues', 4)


def main():
    Restaurant.list_restaurant()


if __name__ == '__main__':
    main()