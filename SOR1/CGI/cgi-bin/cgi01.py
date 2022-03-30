#!/urs/bin/envy python3
import cgi
import cgitb

#python3 -m http.server 8080 --cgi

cgitb.enable()

form = cgi.FieldStorage()

resultadoC = 0
comp = form.getvalue("comp")
unidI = form.getvalue("unidI")
unidF = form.getvalue("unidF")

resultadoT = 0
temp = form.getvalue("temp")
unid1 = form.getvalue("unid1")
unid2 = form.getvalue("unid2")

if comp != None:
    comp = float(comp)
    
if temp == None:
	if comp != 0 and unidI != unidF:
		if unidI == "Centímetros" and unidF == "Metros":
			resultadoC = comp/100
		elif unidI == "Centímetros" and unidF == "Quilômetros":
			resultadoC = comp/100000
		elif unidI == "Metros" and unidF == "Centímetros":
			resultadoC = comp*100
		elif unidI == "Metros" and unidF == "Quilômetros":
			resultadoC = comp/1000
		elif unidI == "Quilômetros" and unidF == "Centimetros":
			resultadoC = comp*100000
		elif unidI == "Quilômetros" and unidF == "Metros":
			resultadoC = comp*1000

	print("Content-Type:text/html\r\n\r\n")
	print("<html>")
	print("<head>")
	print("<style>"
			"body{"
    			"background: cornsilk;"
    			"text-align: center;"
    			"display: flex;"
    			"flex-direction: column;"
    			"justify-items: center;"
    			"align-items: center;"
			"}"
			"div{"
				"background: lightsteelblue;"
				"width: 600px;"
				"height: 380px;"
				"text-align: center;"
				"display: flex;"
				"flex-direction: column;"
				"justify-items: center;"
				"align-items: center;"
				"border-color: cornsilk;"
				"border-radius: 10px;"
			"}"
		"</style>")
	print("</head>")
	print("<body>")
	print("<div>")
	print("<h2>Resultado %s %s<h2>" % (resultadoC, unidF))
	print("</div>")
	print("</body>")
	print("</html>")
 
if temp != None:
	temp = float(temp)
	if temp != 0 and unid1 != unid2:
		if unid1 == "Segundos" and unid2 == "Minutos":
			resultadoT = temp/60
		elif unid1 == "Segundos" and unid2 == "Horas":
			resultadoT = temp/3600
		elif unid1 == "Minutos" and unid2 == "Segundos":
			resultadoT = temp*60
		elif unid1 == "Minutos" and unid2 == "Horas":
			resultadoT = temp/60
		elif unid1 == "Horas" and unid2 == "Segundos":
			resultadoT = temp*3600
		elif unid1 == "Horas" and unid2 == "Minutos":
			resultadoT = temp*60

	print("Content-Type:text/html\r\n\r\n")
	print("<html>")
	print("<head>")
	print("<style>"
			"body{"
    			"background: cornsilk;"
    			"text-align: center;"
    			"display: flex;"
    			"flex-direction: column;"
    			"justify-items: center;"
    			"align-items: center;"
			"}"
			"div{"
				"background: lightsteelblue;"
				"width: 600px;"
				"height: 380px;"
				"text-align: center;"
				"display: flex;"
				"flex-direction: column;"
				"justify-items: center;"
				"align-items: center;"
				"border-color: cornsilk;"
				"border-radius: 10px;"
			"}"
		"</style>")
	print("</head>")
	print("<body>")
	print("<h2>Resultado %s %s<h2>" % (resultadoT, unid2))
	print("</body>")
	print("</html>")