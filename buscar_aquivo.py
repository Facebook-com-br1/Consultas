from flask import Flask, request, jsonify
import os
import re

app = Flask(__name__)

def extract_logins_from_directory(target_url):
    current_directory = os.getcwd()
    dbs_directory = os.path.join(current_directory, 'dbs')

    txt_files = [os.path.join(dbs_directory, f) for f in os.listdir(dbs_directory) if f.endswith('.txt')]

    logins = []

    for file_path in txt_files:
        try:
            with open(file_path, 'r', encoding='utf-8') as f:
                text = f.read()
        except UnicodeDecodeError:
            with open(file_path, 'r', encoding='latin-1') as f:
                text = f.read()

        pattern = rf'{re.escape(target_url)}:(\S+)'
        matches = re.findall(pattern, text)
        logins.extend(matches)

    return logins

@app.route('/buscar_arquivo')
def buscar_arquivo():
    url = request.args.get('url', '')
    logins = extract_logins_from_directory(url)
    return jsonify(logins)

if __name__ == '__main__':
    app.run(debug=True)