import pymysql
from flask import Flask, jsonify, request
from flask_sqlalchemy import SQLAlchemy
from sqlalchemy import text


app = Flask(__name__)

# MySQL database configuration with SQLAlchemy
userpass = 'mysql+pymysql://root:@'
basedir  = '127.0.0.1'
dbname   = '/vuln_app'
socket   = '?unix_socket=/opt/lampp/var/mysql/mysql.sock'
dbname   = dbname + socket
app.config['SQLALCHEMY_DATABASE_URI'] = userpass + basedir + dbname

app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = True

db = SQLAlchemy(app)

@app.route('/api/data', methods=['GET'])
def get_data():
    conn = db.engine.connect()
    result = conn.execute(text("SELECT * FROM users"))
    data = []
    for row in result:
        data.append({
            'id': row[0],
            'name': row[1],
            'email': row[2]
        })
    return jsonify(data)

@app.route('/api/data/<string:id>', methods=['GET'])
def get_data_by_id(id):
    conn = db.engine.connect()
    result = conn.execute(text(f"SELECT * FROM users WHERE id = {id}"))
    row = result.fetchone()
    if row:
        return jsonify({
            'id': row[0],
            'name': row[1],
            'email': row[2]
        })
    else:
        return jsonify({'error': 'Not found'}), 404

if __name__ == '__main__':
    app.run(debug=True)