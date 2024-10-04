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
