import string
import re
from nltk.corpus import stopwords
from nltk.tokenize import TweetTokenizer
import nltk

nltk.download('stopwords')



cache_french_stopwords=stopwords.words('french')

new_sent=''

def doc_clean(tweet):
       # Remove tickers
       sent_no_tickers=re.sub(r'\$\w*','',tweet)
       tw_tknzr=TweetTokenizer(strip_handles=True, reduce_len=True)
       temp_tw_list = tw_tknzr.tokenize(sent_no_tickers)
       
       # Remove stopwords
        
       list_no_stopwords=[i for i in temp_tw_list if i.lower() not in cache_french_stopwords]
       
      
       # Remove hyperlinks
       list_no_hyperlinks=[re.sub(r'https?:\/\/.*\/\w*','',i) for i in list_no_stopwords]
       
       
       # Remove hashtags
       list_no_hashtags=[re.sub(r'#', '', i) for i in list_no_hyperlinks]
       
       
       # Remove Punctuation and split 's, 't, 've with a space for filter
       list_no_punctuation=[re.sub(r'['+string.punctuation+']+', ' ', i) for i in list_no_hashtags]
      
       
       # Remove multiple whitespace
       new_sent = ' '.join(list_no_punctuation)
       
       # Remove any words with 2 or fewer letters
       filtered_list = tw_tknzr.tokenize(new_sent)
       
       list_filtered = [re.sub(r'^\w\w?$', '', i) for i in filtered_list]
       
       
       filtered_sent =' '.join(list_filtered)
       
       clean_sent=re.sub(r'\s\s+', ' ', filtered_sent)
       
       #Remove any whitespace at the front of the sentence
       clean_sent=clean_sent.lstrip(' ')
       
       
       #convertir en miniscule
       lower_sent = clean_sent.lower()
       
       
       #eviter les nombres
       result = re.sub(r'\d+', '', clean_sent)

       
       #eviter les autres défauts
       
       result.replace('’', '').replace('«', '').replace('»', '')
       
       #new_sent = ' '.join(result)

       return(result)


def nettoyer_document(chemin_du_document):
    if os.path.exists(chemin_du_document) and os.path.isfile(chemin_du_document) and chemin_du_document.lower().endswith('.pdf'):
        # Ouvrir le document PDF
        document = fitz.open(chemin_du_document)

        texte_original = ""

        # Parcourir chaque page du document
        for numero_page in range(document.page_count):
            page = document[numero_page]

            # Extraire le texte de la page
            texte_page = page.get_text()

            # Ajouter le texte de la page au texte complet
            texte_original += texte_page

        # Fermer le document PDF
        document.close()

        # Appliquer la fonction de nettoyage
        texte_nettoye = doc_clean(texte_original)

        # Faites quelque chose avec le texte nettoyé, comme l'enregistrement dans un nouveau fichier
        # ou l'utilisation dans votre application.
        print(f"Document nettoyé :\n{texte_nettoye}\n")

    else:
        print(f"Le chemin spécifié '{chemin_du_document}' n'est pas valide, n'est pas un fichier PDF, ou n'existe pas.\n")

# Exemple d'utilisation avec un seul chemin de fichier PDF
chemin_du_document_pdf = "chemin/vers/votre/document.pdf" #(t7ot chemin met3ik)
nettoyer_document(chemin_du_document_pdf)