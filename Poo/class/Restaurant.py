class Restaurant:
    restaurants = []

    def __init__(self, name, category):
        self.name = name
        self.category = category
        self.status = False
        Restaurant.restaurants.append(self)

    def __str__(self):
        return f' {self.name} | {self.category}'

    def list_restaurant(self):
        for restaurant in Restaurant.restaurants:
            print(restaurant)


sushi = Restaurant('Shushi', 'Comida')
sushi.list_restaurant()
