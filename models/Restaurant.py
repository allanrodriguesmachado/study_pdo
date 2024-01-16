from models.Evaluation import Evaluation


class Restaurant:
    restaurants = []

    def __init__(self, name, category):
        self._name = name.title()
        self._category = category.title()
        self._status = False
        self._evaluation = []
        Restaurant.restaurants.append(self)

    def __str__(self):
        return f' {self._name} | {self._category}'

    @classmethod
    def list_restaurant(cls):
        for restaurant in Restaurant.restaurants:
            print(
                f'Name: {restaurant._name} | Category: {restaurant._category} | Status: {restaurant.active} | Media: {str(restaurant.media_evaluation)}')

    @property
    def active(self):
        return '⌧' if self._status else '☐'

    def alter_state(self):
        self._status = not self._status

    def evaluation(self, full_name, nota):
        if 0 < nota <= 5:
            evaluation = Evaluation(full_name, nota)
            return self._evaluation.append(evaluation)
        print('A nota fornecida não é válida, deve estar entre 0 e 5')
        exit()

    @property
    def media_evaluation(self):
        if not self._evaluation:
            return 'Sem Avaliação'

        sum_notes = sum(Evaluation._nota for Evaluation in self._evaluation)
        quantity_notes = len(self._evaluation)
        media = round(sum_notes / quantity_notes, 1)
        return media
