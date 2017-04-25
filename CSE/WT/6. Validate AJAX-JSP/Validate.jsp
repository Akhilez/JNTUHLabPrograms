<%@ page language="java" contentType="text/html; charset=UTF-8"
         pageEncoding="UTF-8" import="java.io.*,java.sql.*" %>
<%
    String name = null, p = null, result = null;

    name = request.getParameter("user");
    p = request.getParameter("pass");

    Connection con;
    PreparedStatement pst;
    ResultSet rs;

    try {
        DriverManager.registerDriver(new com.mysql.jdbc.Driver());
        con = DriverManager.getConnection("jdbc:mysql://localhost:3306/wtdb", "root", "kmit");
        pst = con.prepareStatement("select * from log where username=? and password=?");

        pst.setString(1, name);
        pst.setString(2, p);
        rs = pst.executeQuery();

        if (rs.next())
            result = "welcome," + name;
        else
            result = "You are not an authorized user";

        rs.close();
        pst.close();
        con.close();

        response.setContentType("text/plain");
        response.setCharacterEncoding("UTF-8");
        out.println(result);
    } catch (Exception e) {
        out.println(e.toString());
    }
%>