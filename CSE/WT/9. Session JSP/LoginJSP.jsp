<%@ page language="java" contentType="text/html; charset=UTF-8"
         pageEncoding="UTF-8" import="java.util.Date" %>
<html>
<body>
<%
    response.setContentType("text/html");
    HttpSession s = request.getSession();
    String s1 = request.getParameter("t1");
    Date d1 = new Date();

    s.setAttribute("mydate", d1);
    s.setAttribute("uname", s1);

%>
HELLO <% out.println(s1); %>
YOUR SESSION STARTED AT : <% out.println(d1); %>

<form action='SDS2.jsp' method='post'>
    <input type='submit' value='Logout'>
</form>

<%out.close();%>

</body>
</html>