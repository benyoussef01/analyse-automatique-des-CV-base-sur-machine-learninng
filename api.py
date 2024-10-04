import keyword
import pickle
import clean
import glob
import flask
from flask_cors import CORS, cross_origin
import json
from flask import request, jsonify
import numpy as np
from pdfminer.high_level import extract_text
from deep_translator import GoogleTranslator
app = flask.Flask(__name__)
cors = CORS(app)
app.config['CORS_HEADERS'] = 'Content-Type'
app.config["DEBUG"] = True
current_path = 'C:/Users/Samiya RSI/Desktop/PFE'
model_path = current_path + "/models/model.pkl"
transformer_path = current_path + "/models/transformer.pkl"
loaded_model = pickle.load(open(model_path, 'rb'))
loaded_tfidf_model = pickle.load(open(transformer_path, 'rb'))
pdf_url = glob.glob(current_path + "/cvweb/pdf/*.pdf")


@app.route('/', methods=['GET'])
@cross_origin()
def home():
    if 'cvType' in request.args:
        cvType = str(request.args['cvType'])
    if 'motCle' in request.args:
        motCle = str(request.args['motCle'])
    print("cv entrer: " + str(cvType))
    print("mot Cle: " + str(motCle))
    cv_type = cvType
    keyWord = motCle
    typeNumber = 0
    keyWordNumber = 0
    myClasses = []
    myStats   = []
    tab       = []
    my_dict = {}
    if len(pdf_url) > 0:
        for url in pdf_url:
            original_text = extract_text(url)

            clean_text = clean.doc_clean(original_text)
            frensh_text = GoogleTranslator(
                source="auto", target='fr').translate(clean_text)
            features = loaded_tfidf_model.transform([frensh_text])
            y_predect = loaded_model.predict_proba(features)
            best_classId = np.argmax(y_predect)
            class_name = loaded_model.classes_[best_classId]
            if (class_name == cv_type):
                typeNumber = typeNumber + 1
                if(keyWord.upper() in original_text.upper()):

                    keyWordNumber = keyWordNumber + 1
                    
                    arr = url.split('/')
                    latest = arr[6]

                    myClasses.append(url.split('/')[-1])
                    my_dict[typeNumber] = url.split('/')[-1]
                    print('La type de CV ' + url.split('/')
                          [-1] + ' est ' + class_name)
        myStats.append('numbre totale de cv de type  ' +
            cv_type + ' est :' + str(typeNumber))
        myStats.append('le pourcentage de cv de type  ' + cv_type + " qu' ayant l'option " +
            keyWord + ' est :' + str(((keyWordNumber / typeNumber) * 100)) + "%")
        """print('numbre totale de cv de type  ' +
            cv_type + ' est :' + str(typeNumber))
        print('le pourcentage de cv de type  ' + cv_type + " qu' ayant l'option " +
            keyWord + ' est :' + str(((keyWordNumber / typeNumber) * 100)) + "%")"""

    return jsonify(my_dict)


app.run()
