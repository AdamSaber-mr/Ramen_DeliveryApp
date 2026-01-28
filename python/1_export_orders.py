import mysql.connector
import json

# Connect to server
connectie = mysql.connector.connect(
    host="localhost",
    port=8889,
    user="root",
    password="root",
    database='Yume_ramen_bp02'
)

# Get a cursor (hetzelfde als pdo statement in php ($stmt))
# Cursor is het object waarmee je SQL’s verstuurt en resultaten ophaalt ($stmt)
cursor = connectie.cursor()

# Execute a query (nog geen data terug) alleen voorbereiden
cursor.execute(
    "SELECT menu_item_id, quantity FROM order_items"
)

# Resultaten ophalen
row = cursor.fetchall()

dict_list = []
# door de rows loopen en unpacking te tuples in row
for x, y in row:
    # de waardes van de tuples in een dictionary list stopen
    dict_list.append(dict(menu_item_id=x, quantity=y))


# json.dumps() converteert een object eerst naar een JSON-string
json_str = json.dumps(dict_list)
print(json_str)

# Schrijf naar een .json bestand
# json.dump() schrijft een Python-object direct naar een bestand.
with open('data.json', 'w') as bestand:
    json.dump(dict_list, bestand, indent=4)
    # 'indent' maakt het bestand leesbaar
    # de w is een schrijfmodus waarmee hij de bestand opent

# Close connection and cursor
cursor.close()
connectie.close()
