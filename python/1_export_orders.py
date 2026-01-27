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

# Fetch one result
row = cursor.fetchall()
# door de rows loopen en unpacking te tuples in row
for x, y in row:
    # de waardes van de tuples in een dictionary stopen
    dictionary = dict(menu_item_id=x, quantity=y)
    # De dictionary in een list veranderen
    list_from_dict = list(dictionary.items())
    # Die list veranderen naar json
    # Zodat we hem later kunnen gebruiken voor analyse
    json_str = json.dumps(list_from_dict)
    print(json_str)

# Close connection and cursor
cursor.close()
connectie.close()
