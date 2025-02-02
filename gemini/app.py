from flask import Flask, request, jsonify
import google.generativeai as genai

app = Flask(__name__)

GOOGLE_API_KEY = "AIzaSyAJHeVFjYRRVmchBRgG05AgdlpEnYKaQyg"
genai.configure(api_key=GOOGLE_API_KEY)

@app.route('/generate', methods=['POST'])
def generate_content():
    data = request.get_json()
    prompt = data['prompt']  # Assuming the prompt is sent in the request JSON
    
    model = genai.GenerativeModel('gemini-1.5-flash')
    response = model.generate_content(prompt)
    
    # Extracting text from response (assuming response is a string)
    generated_text = response.text

    return jsonify({'generated_text': generated_text})

if __name__ == '__main__':
    app.run(debug=True)