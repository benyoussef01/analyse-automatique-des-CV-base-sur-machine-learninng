import keyword
import pickle
import clean
import glob
import sys
import numpy as np
from pdfminer.high_level import extract_text
from deep_translator import GoogleTranslator
# technicien
arg1 = sys.argv[1]
# informatique
arg2 = sys.argv[2]
# for example java
arg3 = sys.argv[3]
cvType = arg1 + " " + arg2
current_path = 'C:/Users/Samiya RSI/Desktop/PFE'
model_path= current_path + "/models/model.pkl"
transformer_path= current_path + "/models/transformer.pkl"
loaded_model = pickle.load(open(model_path, 'rb'))
loaded_tfidf_model = pickle.load(open(transformer_path, 'rb'))
pdf_url = glob.glob(current_path + "/cvweb/pdf/*.pdf")
cv_type = cvType
keyWord = arg3
typeNumber = 0
keyWordNumber = 0
myClasses = []
if len(pdf_url) > 0: 
     for url in pdf_url:
       original_text = extract_text(url)
       
       clean_text = clean.doc_clean(original_text)
       frensh_text = GoogleTranslator(source="auto", target='fr').translate(clean_text)
       features=loaded_tfidf_model.transform([frensh_text])
       y_predect = loaded_model.predict_proba(features)
       best_classId = np.argmax(y_predect)
       class_name = loaded_model.classes_[best_classId]
       if (class_name == cv_type) :
            typeNumber = typeNumber + 1 
            if(keyWord.upper() in clean_text.upper()):

                    keyWordNumber = keyWordNumber + 1
                    myClasses.append(url.split('/')[-1])
                    #print('La type de CV ' + url.split('/')[-1] + ' est ' + class_name)
       


print(myClasses)
#print('numbre totale de cv de type  ' + cv_type + ' est :' + str(typeNumber))
#print('le pourcentage de cv de type  ' + cv_type + " qu' ayant l'option " + keyWord + ' est :' + str(((keyWordNumber /typeNumber) *100)) + "%")


