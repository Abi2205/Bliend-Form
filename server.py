from flask import Flask, request, render_template, redirect
import sqlite3

app = Flask(__name__)

# Connect to SQLite database
def get_db_connection():
    conn = sqlite3.connect('database.db')
    conn.row_factory = sqlite3.Row
    return conn

# Initialize the database
def init_db():
    conn = get_db_connection()
    with conn:
        conn.execute('''
            CREATE TABLE IF NOT EXISTS profiles (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT,
                date TEXT,
                contact TEXT,
                email TEXT,
                dob TEXT,
                gender TEXT,
                marital_status TEXT,
                district TEXT,
                state TEXT,
                nationality TEXT,
                pincode TEXT,
                current_org TEXT,
                current_desig TEXT,
                employee_type TEXT,
                open_positions TEXT,
                experience TEXT,
                education TEXT,
                ug_percentage TEXT,
                expected_salary TEXT,
                smoke TEXT,
                alcohol TEXT,
                marketing_interest TEXT,
                why_company TEXT,
                resume BLOB
            )
        ''')
    conn.close()

@app.route('/', methods=['GET', 'POST'])
def form():
    if request.method == 'POST':
        # Save form data to the database
        conn = get_db_connection()
        with conn:
            conn.execute('''
                INSERT INTO profiles (name, date, contact, email, dob, gender, marital_status, district, state, nationality, pincode, current_org, current_desig, employee_type, open_positions, experience, education, ug_percentage, expected_salary, smoke, alcohol, marketing_interest, why_company, resume)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            ''', (
                request.form['name'], 
                request.form['date'], 
                request.form['contact'], 
                request.form['email'], 
                request.form['dob'], 
                request.form['gender'], 
                request.form['marital-status'], 
                request.form['district'], 
                request.form['state'], 
                request.form['nationality'], 
                request.form['pincode'], 
                request.form['current-org'], 
                request.form['current-desig'], 
                request.form['employee-type'], 
                request.form['open-positions'], 
                request.form['experience'], 
                request.form['education'], 
                request.form['ug-percentage'], 
                request.form['expected-salary'], 
                request.form['smoke'], 
                request.form['alcohol'], 
                request.form['marketing-interest'], 
                request.form['why-company'], 
                request.files['resume'].read()
            ))
        conn.close()
        return redirect('/view')

    return render_template('form.html')

@app.route('/view')
def view():
    # Fetch all profiles from the database
    conn = get_db_connection()
    profiles = conn.execute('SELECT * FROM profiles').fetchall()
    conn.close()
    return render_template('view.html', profiles=profiles)

if __name__ == '__main__':
    init_db()
    app.run(debug=True)
