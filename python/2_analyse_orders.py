import json

# Open het bestand json in leesmodus ('r') read dus
with open('./python/data.json', 'r') as bestand:
    data = json.load(bestand)  # haal de data op


totaal_telling = {}
# Pak de waardes van de dictionarys van de data
# veranderen naar bruikbare data (1,2) inplaats van met woorden
for row in data:
    menu_id = row["menu_item_id"]  # pak de waardes van de id
    quantity = row["quantity"]  # pak de waardes van de totaal

    # als die id er nog niet is → zet ik ’m erin
    if menu_id not in totaal_telling:
        # toevoegen    # id (1) = # totaal (2)
        totaal_telling[menu_id] = quantity
    # Als de id al bestaat voeg je alleen de totaal toe aan id
    else:
        totaal_telling[menu_id] += quantity

# items() geeft een nieuw object terug van jouw list in tuples
# dat gebruiken we, want we kunnen een dictionary niet sorteren
totaal_telling = totaal_telling.items()

# Sorteer lijst | reverse=True zorgt voor hoog naar laag
# sorted() pakt een iterable en een key en daar soorteerd hij mee
gesorteerd_list = sorted(
    totaal_telling,
    key=lambda item: item[1],  # pakt de 1de index (quantity)
    reverse=True
)

# slice de list zodat je alleen de eerst 3 pakt uit de list
top3_gerechten = gesorteerd_list[:3]

# de top 3 weer terug veranderen in een dictionary
dictionary_top3 = []
# door de rows loopen en unpacking te tuples in row
for x, y in top3_gerechten:
    # de waardes van de tuples in een dictionary list stopen
    dictionary_top3.append(dict(gerecht_id=x, quantity=y))


# Schrijf naar een .json bestand
# json.dump() schrijft een Python-object direct naar een bestand.
with open('./python/populair.json', 'w') as bestand:
    json.dump(dictionary_top3, bestand, indent=4)
    # 'indent' maakt het bestand leesbaar
    # de w is een schrijfmodus waarmee hij de bestand opent (write the file)

print(dictionary_top3)
