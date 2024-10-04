from django.shortcuts import render
from django.http import HttpResponse

def analyse(request):
    return HttpResponse("Hello world!")
