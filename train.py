import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.linear_model import LogisticRegression
from sklearn.feature_extraction.text import TfidfVectorizer
import pickle
import json

#get my path
my_path = 'C:/Users/aliyo/OneDrive/Bureau/PFE22'
#get my database
path = my_path + "/data.json"
my_DataBase = pd.read_json(path)
# split my database to trinning and to testing parts
dataForTraining, dataForTesting = train_test_split(my_DataBase,random_state = 20)
# get list of classes in trining part of database
classesInTraining = dataForTraining['classe'].values
# get list of classes in testing part of database
classesInTesting = dataForTesting['classe'].values
# to optimaze ower data we extract the features using tfidf
# first of all we create the transformer
feature_transformer=TfidfVectorizer(use_idf=True)
feature_transformer.fit_transform(my_DataBase['data'].values)
# second we extract features using the transformer
trainFeatures=feature_transformer.transform(dataForTraining['data'].values)
testFeatures=feature_transformer.transform(dataForTesting['data'].values)
# intialize model
Logistic_model = LogisticRegression(verbose=1, solver='liblinear',random_state=0, C=5, penalty='l2',max_iter=1000)
# start trinning the model 
model = Logistic_model.fit(trainFeatures,classesInTraining)
# start evaluation
# first get prediction
preds = model.predict(testFeatures)
#second calculat number of true results
numberOfRight = 0
for i in range(len(preds)):
   if preds[i] == classesInTesting[i]:
      numberOfRight +=1
#third calculat accuracy
accuracy = numberOfRight / len(preds)

print("AccuracyVal = ", accuracy)


#save models
model_path = my_path + "/models/model.pkl"
transformer_path = my_path + "/models/transformer.pkl"
pickle.dump(model,open(model_path, 'wb'))
pickle.dump(feature_transformer,open(transformer_path,'wb'))



