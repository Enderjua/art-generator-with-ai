from flask import Flask, send_file, render_template
import openai
import random
import string
import requests

app = Flask(__name__)

openai.api_key = "PUT YOUR API KEY"

def random_string_generator(size=10, chars=string.ascii_letters + string.digits):
    return ''.join(random.choice(chars) for _ in range(size))


@app.route('/')
def home():
    return "<h1>Here is API Bro :D</h1>"

@app.route('/image/<string:prompt>/<int:n>/<string:size>')
def image(prompt, n, size):
    image_resp = openai.Image.create(
        prompt=prompt,
        n=n,
        size=size
    )
    image = image_resp["data"][0]["url"]
    response = requests.get(image)
    photoName = "generatorJuaPhotos" + random_string_generator() +".png"
    open("/opt/lampp/htdocs/generatePhoto/"+photoName, "wb").write(response.content)
    return photoName

    
if __name__ == '__main__':
    app.run(debug=True)
