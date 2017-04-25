<%@ page language="java" contentType="text/html; charset=UTF-8"
         pageEncoding="UTF-8" import="java.util.Date" %>
<html>
<body>
<%
    HttpSession s = request.getSession();
    String name = (String) s.getAttribute("uname");
    Date d1 = (Date) s.getAttribute("mydate");
    Date d2 = new Date();

    long diff = d2.getTime() - d1.getTime();
    long diffSeconds = diff / 1000 % 60;
    long diffMinutes = diff / (60 * 1000) % 60;
    long diffHours = diff / (60 * 60 * 1000);
%>

Thank you,<%out.println(name);%>
YOUR SESSION DURATION:

<% out.print("Hours: " + diffHours + ", Minutes: " + diffMinutes + ", Seconds: " + diffSeconds);%>

</body>

</html>