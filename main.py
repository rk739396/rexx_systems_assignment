from flask import Flask, request, jsonify, render_template
from PyPDF2 import PdfFileWriter, PdfFileReader
import textract as tx
import requests
import cv2
import numpy as np
import os
import re
import base64
# app = Flask(__name__)

# if __name__ == "__main__":
#     app.run(debug=True)

app = Flask(__name__)

@app.route('/', methods=['GET','POST'])
def home():

    # urlGet = request.form['url']
    urlGet=request.form.get('url')
    if urlGet is None:
      return jsonify({'status': False,"message":"No Content",'response':400, 'data':None})

  
    # try:
    #     url
    # except NameError:
    #     print("well, it WASN'T defined after all!")
    # else:
    #     print("sure, it was defined.")   
    r = requests.get(urlGet, stream=True)
    with open('metadata.pdf', 'wb') as fd:
        for chunk in r.iter_content(chunk_size=128):
            fd.write(chunk)


    file = 'metadata.pdf'
    pages_to_keep = [2] # page numbering starts from 0
    infile = PdfFileReader(file, 'rb')
    output = PdfFileWriter()

    for i in pages_to_keep:
        p = infile.getPage(i)
        output.addPage(p)

    with open('newfile.pdf', 'wb') as f:
        output.write(f)


    text = tx.process('newfile.pdf')
    print("Getting text type is",len(text))

    # if text =='\x0c':
    if len(text)<300:
      return jsonify({'status': False,"message":"No Content",'response':400, 'data':None})



    output = text.decode('utf-8')

    import io




    with io.open('output.txt','w', encoding='utf8') as f:
        
        f.write(output)



    fh = open("output.txt", "r")
    lines = fh.readlines()
    fh.close()

    lines = filter(lambda x: not x.isspace(), lines)
    # print(lines)
    # Write
    fh = open("output.txt", "w")
    fh.write("".join(lines))
    fh.close()


    # In[15]:


    def search_string_in_file(file_name, string_to_search):
        line_number = 0
        list_of_results = []
        with open(file_name, 'r') as read_obj:
            for line in read_obj:
                line_number += 1
                if string_to_search in line:
                    list_of_results.append((line_number, line.rstrip()))
        return list_of_results


    # In[16]:


    matched_lines = search_string_in_file('output.txt', 'Details of Managing')


    import sys
    fin = open( 'output.txt', "r" )
    data_list = fin.readlines()
    fin.close()
    # remove list items from index 0 to matched lines from output.txt (inclusive)
    del data_list[0:matched_lines[0][0]+1]    
    # write the changed data (list) to a file
    fout = open("output.txt", "w")
    fout.writelines(data_list)
    fout.close()



    DesigMatched_Lines = search_string_in_file('sample.txt', 'Designation')


# ------------------------Storing output.txt file content into line_1st into file list ---------------------
    with open('output.txt', 'r') as text_file:
        line_1st = text_file.readlines()
# ------------------------Storing output.txt file content into line_1st into file list END---------------------

# ------------------------Removin /n from line_1st  ---------------------
    line_1st = list(map(lambda x:x.strip(),line_1st))

    extracted_Name = []
    extracted_Desig = []
    extracted_Resid = []
    prof_list = []

    sentence= line_1st
    word="Name"
    if word in sentence:
        for i, j in enumerate(sentence):
            if j == word:
                extracted_Name.append(line_1st[i+1])
    DesigrWord = "Designation/Status"            
    if word in sentence:
        for k, j in enumerate(sentence):
            if j == DesigrWord:
                extracted_Desig.append(line_1st[k+1])   
    ResidWord = "Resident of State"            
    if word in sentence:
        for m, j in enumerate(sentence):
            if j == ResidWord:
                extracted_Resid.append(line_1st[m+1])               


    for index,pro in enumerate(extracted_Name):
        prof_list.append({"name":pro,"designation":extracted_Desig[index],"resident":extracted_Resid[index]})
    
    
    length = len(prof_list)
    if length>0:
      status = True
    else:
      status = False
        



    return jsonify({'status': status,"message":"success",'response':200, 'data':prof_list})
    
# ext_aadar = extract_aadhar(image)
            
if __name__ == '__main__':
  app.run(host='0.0.0.0', port=8080, debug=True) #debug = True
    # app.run(debug=True)


