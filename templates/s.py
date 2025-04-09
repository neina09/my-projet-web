import random
import numpy as np

# Définition des villes et des distances entre elles
villes = ['A', 'B', 'C', 'D', 'E']
distances = {
    'A': {'B': 10, 'C': 20, 'D': 30, 'E': 40},
    'B': {'A': 10, 'C': 25, 'D': 35, 'E': 45},
    'C': {'A': 20, 'B': 25, 'D': 30, 'E': 40},
    'D': {'A': 30, 'B': 35, 'C': 30, 'E': 45},
    'E': {'A': 40, 'B': 45, 'C': 40, 'D': 45}
}

# Fonction pour calculer la distance totale d'un chemin
def calculer_distance(chemin):
    distance_totale = 0
    for i in range(len(chemin) - 1):
        distance_totale += distances[chemin[i]][chemin[i+1]]
    return distance_totale

# Algorithme génétique
def genetic_algorithm(villes, distances, population_size=100, mutation_rate=0.1, generations=200):
    # Initialisation de la population : permutations valides
    population = [random.sample(villes, len(villes)) for _ in range(population_size)]

    for generation in range(generations):
        # Évaluation
        scores = [1 / calculer_distance(individu) for individu in population]
        scores_sum = sum(scores)
        probabilities = [score / scores_sum for score in scores]

        # Sélection des parents par roulette
        parents = [population[np.random.choice(range(population_size), p=probabilities)] for _ in range(population_size)]

        # Croisement (Order Crossover simplifié)
        enfants = []
        for i in range(0, population_size, 2):
            parent1, parent2 = parents[i], parents[i + 1]
            cut = len(villes) // 2
            enfant1 = parent1[:cut] + [v for v in parent2 if v not in parent1[:cut]]
            enfant2 = parent2[:cut] + [v for v in parent1 if v not in parent2[:cut]]
            enfants.append(enfant1)
            enfants.append(enfant2)

        # Mutation
        for enfant in enfants:
            if random.random() < mutation_rate:
                i, j = random.sample(range(len(villes)), 2)
                enfant[i], enfant[j] = enfant[j], enfant[i]

        population = enfants

    # Meilleur chemin trouvé
    meilleur = min(population, key=calculer_distance)
    print("=== Algorithme génétique ===")
    print("Chemin optimal :", meilleur)
    print("Score :", calculer_distance(meilleur))
    return meilleur

# Lin-Kernighan simplifié (2-opt naïf)
def lin_kernighan(villes, distances):
    chemin = villes[:]
    best_distance = calculer_distance(chemin)
    improved = True

    while improved:
        improved = False
        for i in range(1, len(chemin) - 2):
            for j in range(i + 1, len(chemin)):
                if j - i == 1: continue
                nouveau_chemin = chemin[:i] + chemin[i:j][::-1] + chemin[j:]
                new_distance = calculer_distance(nouveau_chemin)
                if new_distance < best_distance:
                    chemin = nouveau_chemin
                    best_distance = new_distance
                    improved = True
    print("\n=== Lin-Kernighan (2-opt) ===")
    print("Chemin optimal :", chemin)
    print("Score :", best_distance)
    return chemin

# Exécution
chemin_gen = genetic_algorithm(villes, distances)
chemin_lin = lin_kernighan(villes, distances)
