from pdfminer.high_level import extract_text



def extract_text_from_pdf(pdf_path):
    text= extract_text(pdf_path)
    return text

print(extract_text_from_pdf('C:/Users/Samiya RSI/Desktop/PFE/cv.pdf'))