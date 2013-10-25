<%@LANGUAGE=VBScript%>

<%
	Dim fooVB
	fooVB = "fooVB"
%>


<SCRIPT LANGUAGE=VBScript RUNAT=SERVER>
	Dim fooVB1
	fooVB1 = "fooVB1"
</SCRIPT>


<SCRIPT LANGUAGE=JavaScript RUNAT=SERVER>
	var fooJS1 = "fooJS1";
	//var fooFromVB = fooVB1+" was readable in JS1"
	//The previous line doesn't work--JS cannot get at the fooVB1 variable.
	//See #1 above
</SCRIPT>


<SCRIPT LANGUAGE=VBScript RUNAT=SERVER>
	Dim fooFromJS
	fooFromJS = fooJS1+" was readable in VB2"
	'The previous line does work, but as per #2 above,
	'this variable can never be used by the <% %> code below.
	fooFromVB = fooVB1+" was readable in VB2"
	Response.Write(fooFromJS)
	'Note that the previous line takes effect at the VERY end of the page, after </html>
</SCRIPT>

<SCRIPT LANGUAGE=JavaScript RUNAT=SERVER>
	var fooFromJS2 = fooJS1+" was readable in JS2"
</SCRIPT>

<SCRIPT LANGUAGE=JavaScript RUNAT=SERVER>
	function OneThroughTen(){
		for (var i=0;i<10;i++) Response.Write(i+"<br>");
	}
	function WriteFoo(){
		Response.Write(FOOVB+"<br>\n");
		if (Response.Buffer) Response.Flush();
	}
	function WriteFooVB1(){
		Response.Write(FOOVB1+"<br>\n");
		if (Response.Buffer) Response.Flush();
	}
	function WriteFooJS1(){
		//Note that case matters for the following js variable
		//"FOOJS1" does not work here
		Response.Write(fooJS1+"<br>\n");
		if (Response.Buffer) Response.Flush();
	}
</SCRIPT>


<pre>
	<%=fooVB%> aka <%=FOOVB%><br>
	<%=fooVB1%> aka <%=FOOVB1%><br>
	<%=fooJS1%> aka <%=FOOJS1%><br>
	<br>
	fooFromVB : <%=fooFromVB%><br>
	fooFromJS : <%=fooFromJS%><br>
	fooFromJS2 : <%=fooFromJS2%><br>
</pre>

<script runat="server" language="javascript">
	Response.write('FromVBscript'+fooVB);
</script>

<%
	ONETHROUGHTEN()
	WRITEFOO()
	WRITEFOOVB1()
	WRITEFOOJS1()
%>