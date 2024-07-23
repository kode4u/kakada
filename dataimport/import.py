import mysql.connector

def execute_queries_from_file(filename):
    # Connect to the MySQL database
    conn = mysql.connector.connect(
        host='localhost',          # e.g., 'localhost'
        user='root',      # e.g., 'root'
        password='',  # e.g., 'password'
        database='kakada'   # e.g., 'your_database'
    )
    cursor = conn.cursor()
    start=1
    count=0
    try:
        with open(filename, 'r', encoding='utf-8') as file:
            for line in file:
                count=count + 1
                if count < start:
                    continue
                query = line.strip()
                if query:
                    cursor.execute(query)
                    print(str(count)+"Executed: ")
                    conn.commit()


        # Commit the transaction
        conn.commit()
    except mysql.connector.Error as err:
        print(f"Error: {err}")
        print(str(count)+"Executed: "+query)

        # conn.rollback()
    finally:
        cursor.close()
        conn.close()

if __name__ == "__main__":
    execute_queries_from_file('data3.sql')
