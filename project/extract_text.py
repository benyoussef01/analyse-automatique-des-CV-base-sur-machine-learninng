from pdfminer.high_level import extract_text
from deep_translator import GoogleTranslator
import clean
import glob 
import json
 

jsonObject = []
fileds = ['technicien électrique', 'technicien informatique','technicien mécanique']
for filed in fileds:
  pdf_url = glob.glob("C:/Users/Samiya RSI/Desktop/PFE/data/"+filed+"/*.pdf")
  
  if len(pdf_url) > 0: 
     for url in pdf_url:
       print("pdf path", url)
       original_text = extract_text(url)
       clean_text = clean.doc_clean(original_text)
       frensh_text = GoogleTranslator(source="auto", target='fr').translate(clean_text)
       json_data = {"data": frensh_text, "classe": filed}
       jsonObject.append(json_data)


with open('C:/Users/Samiya RSI/Desktop/PFE/data.json', 'w', encoding='utf-8') as f:
    json.dump(jsonObject, f, ensure_ascii=False, indent=4)
