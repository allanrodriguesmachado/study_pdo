class Restaurant:
    restaurants = []

    def __init__(self, name, category):
        self.name = name
        self.category = category
        self._status = False
        Restaurant.restaurants.append(self)

    def __str__(self):
        return f' {self.name} | {self.category}'

    def list_restaurant(self):
        for restaurant in Restaurant.restaurants:
            print(restaurant)

    @property
    def active(self):
        return 'Ativo' if self.active else 'Inativo'


sushi = Restaurant('Shushi', 'Comida')
sushi.list_restaurant()
