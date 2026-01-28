import json

# Open het bestand json in leesmodus ('r') read dus
with open('./python/data.json', 'r') as bestand:
    data = json.load(bestand)  # haal de data op


totaal_telling = []
# Pak de waardes van de dictionarys van de data
for row in data:
    x = row["menu_item_id"]  # pak de waardes van elke menu id
    y = row["quantity"]  # pak de waardes van elke quantity
    if x not in totaal_telling:
        totaal_telling.append(x)

    # voeg die waardes toe aan een dict lijst
    totaal_gerecht = dict(gerecht_id=x, totaal=y)

print(totaal_telling)
